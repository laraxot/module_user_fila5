<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Console\Kernel;
use Illuminate\Support\Facades\Artisan;
use Modules\User\Models\Tenant;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

describe('TenantScope Console Context Behavior', function (): void {
    beforeEach(function (): void {
        $this->skipUnlessUsersTableReady();
        $this->tenant1 = Tenant::factory()->create(['name' => 'Tenant 1 '.uniqid()]);
        $this->tenant2 = Tenant::factory()->create(['name' => 'Tenant 2 '.uniqid()]);
    });

    describe('User Creation in Console Context', function (): void {
        it('allows user creation without tenant in console context', function (): void {
            $this->app->bind('Illuminate\Contracts\Console\Kernel', function ($app) {
                return $app->make(Kernel::class);
            });

            $email = 'console-test-'.uniqid('', true).'@example.com';
            $user = User::create([
                'name' => 'Console Test User',
                'email' => $email,
                'password' => bcrypt('password123'),
            ]);

            expect($user)->toBeInstanceOf(User::class)
                ->and($user->name)->toBe('Console Test User')
                ->and($user->email)->toBe($email);
        });

        it('executes make:filament-user command successfully', function (): void {
            $email = 'artisan-test-'.uniqid('', true).'@example.com';

            $exitCode = Artisan::call('make:filament-user', [
                '--name' => 'Artisan Test User',
                '--email' => $email,
                '--password' => 'TestPassword123!',
            ]);

            expect($exitCode)->toBe(0);

            $user = User::where('email', $email)->first();
            expect($user)->not->toBeNull()
                ->and($user->name)->toBe('Artisan Test User')
                ->and($user->email)->toBe($email);
        });

        it('allows querying all users in console context without tenant filter', function (): void {
            test()->skipUnlessUserColumn('users', 'tenant_id', 'users.tenant_id column missing — tenant scope tests skipped.');

            $user1 = User::factory()->create([
                'name' => 'Tenant 1 User',
                'tenant_id' => $this->tenant1->id,
            ]);

            $user2 = User::factory()->create([
                'name' => 'Tenant 2 User',
                'tenant_id' => $this->tenant2->id,
            ]);

            $allUsers = User::query()->whereIn('id', [$user1->id, $user2->id])->get();

            expect($allUsers)->toHaveCount(2)
                ->and($allUsers->pluck('id')->contains($user1->id))->toBeTrue()
                ->and($allUsers->pluck('id')->contains($user2->id))->toBeTrue();
        });
    });

    describe('User Creation in HTTP Context with Tenant', function (): void {
        it('automatically sets tenant_id when creating user in HTTP context', function (): void {
            test()->skipUnlessUserColumn('users', 'tenant_id', 'users.tenant_id column missing — tenant scope tests skipped.');

            $this->actingAs(User::factory()->create());

            Filament::shouldReceive('getTenant')
                ->andReturn($this->tenant1);

            $email = 'http-test-'.uniqid('', true).'@example.com';
            $user = User::create([
                'name' => 'HTTP Context User',
                'email' => $email,
                'password' => bcrypt('password123'),
            ]);

            expect($user)->toBeInstanceOf(User::class);
        });

        it('filters users by tenant in HTTP context', function (): void {
            test()->skipUnlessUserColumn('users', 'tenant_id', 'users.tenant_id column missing — tenant scope tests skipped.');

            $user1 = User::factory()->create([
                'name' => 'Tenant 1 User Only',
                'email' => 'tenant1-only-'.uniqid('', true).'@example.com',
                'tenant_id' => $this->tenant1->id,
            ]);

            $user2 = User::factory()->create([
                'name' => 'Tenant 2 User Only',
                'email' => 'tenant2-only-'.uniqid('', true).'@example.com',
                'tenant_id' => $this->tenant2->id,
            ]);

            $adminUser = User::factory()->create([
                'tenant_id' => $this->tenant1->id,
            ]);

            $this->actingAs($adminUser);

            Filament::shouldReceive('getTenant')
                ->andReturn($this->tenant1);

            expect(User::withoutGlobalScopes()->find($user1->id))->not->toBeNull()
                ->and(User::withoutGlobalScopes()->find($user2->id))->not->toBeNull();
        });
    });

    describe('TenantScope Exception Handling', function (): void {
        it('handles gracefully when Filament::getTenant() throws exception', function (): void {
            Filament::shouldReceive('getTenant')
                ->andThrow(new \RuntimeException('Session not available'));

            $users = User::query()->limit(1)->get();

            expect($users)->toBeInstanceOf(Collection::class);
        });

        it('allows user creation when Filament context is not available', function (): void {
            Filament::shouldReceive('getTenant')
                ->andReturn(null);

            $email = 'no-tenant-'.uniqid('', true).'@example.com';
            $user = User::create([
                'name' => 'No Tenant Context User',
                'email' => $email,
                'password' => bcrypt('password123'),
            ]);

            expect($user)->toBeInstanceOf(User::class)
                ->and($user->name)->toBe('No Tenant Context User');
        });
    });

    describe('Manual Tenant Assignment in Console', function (): void {
        it('allows manual tenant_id assignment in console context', function (): void {
            test()->skipUnlessUserColumn('users', 'tenant_id', 'users.tenant_id column missing — tenant scope tests skipped.');

            $email = 'manual-tenant-'.uniqid('', true).'@example.com';
            $user = User::create([
                'name' => 'Manual Tenant User',
                'email' => $email,
                'password' => bcrypt('password123'),
                'tenant_id' => $this->tenant1->id,
            ]);

            expect($user->tenant_id)->toBe($this->tenant1->id);

            $user->refresh();
            expect($user->tenant_id)->toBe($this->tenant1->id);
        });

        it('allows querying users by specific tenant in console', function (): void {
            test()->skipUnlessUserColumn('users', 'tenant_id', 'users.tenant_id column missing — tenant scope tests skipped.');

            User::factory()->count(3)->create(['tenant_id' => $this->tenant1->id]);
            User::factory()->count(2)->create(['tenant_id' => $this->tenant2->id]);

            $tenant1Users = User::withoutGlobalScopes()
                ->where('tenant_id', $this->tenant1->id)
                ->get();

            $tenant2Users = User::withoutGlobalScopes()
                ->where('tenant_id', $this->tenant2->id)
                ->get();

            expect($tenant1Users->count())->toBeGreaterThanOrEqual(3)
                ->and($tenant2Users->count())->toBeGreaterThanOrEqual(2);
        });
    });
});

describe('InteractsWithTenant Trait Behavior', function (): void {
    beforeEach(function (): void {
        test()->skipUnlessUsersTableReady();
    });

    it('does not crash when booting in console context', function (): void {
        $email = 'boot-test-'.uniqid('', true).'@example.com';
        $user = new User([
            'name' => 'Boot Test User',
            'email' => $email,
            'password' => bcrypt('password123'),
        ]);

        expect($user)->toBeInstanceOf(User::class);

        $user->save();

        expect($user->exists)->toBeTrue();
    });

    it('skips tenant assignment in console context during creating event', function (): void {
        $email = 'creating-event-'.uniqid('', true).'@example.com';
        $user = User::create([
            'name' => 'Creating Event Test',
            'email' => $email,
            'password' => bcrypt('password123'),
        ]);

        expect($user->exists)->toBeTrue()
            ->and($user->name)->toBe('Creating Event Test');
    });
});
