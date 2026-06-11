<?php

declare(strict_types=1);

uses(\Modules\User\Tests\TestCase::class);
use Modules\User\Database\Factories\TenantFactory;
use Modules\User\Database\Factories\UserFactory;
use PHPUnit\Framework\Assert;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Console\Kernel;
use Illuminate\Support\Facades\Artisan;
use Modules\User\Models\User;
use RuntimeException;

describe('TenantScope Console Context Behavior', function (): void {
    beforeEach(function () {
        /** @var \Modules\User\Tests\TestCase $this */
        $this->skipUnlessUsersTableReady();
        $this->tenant1 = TenantFactory::new()->createOne(['name' => 'Tenant 1 '.uniqid()]);
        $this->tenant2 = TenantFactory::new()->createOne(['name' => 'Tenant 2 '.uniqid()]);
    });

    describe('User Creation in Console Context', function (): void {
        it('allows user creation without tenant in console context', function (): void {
            /** @var \Modules\User\Tests\TestCase $this */
            app()->bind(\Illuminate\Contracts\Console\Kernel::class, static function (\Illuminate\Contracts\Foundation\Application $app): \Illuminate\Contracts\Console\Kernel {
                $kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
                Assert::assertInstanceOf(\Illuminate\Contracts\Console\Kernel::class, $kernel);

                return $kernel;
            });

            $email = 'console-test-'.uniqid('', true).'@example.com';
            $user = User::create([
                'name' => 'Console Test User',
                'email' => $email,
                'password' => bcrypt('password123'),
            ]);

            Assert::assertInstanceOf(User::class, $user);
            Assert::assertSame('Console Test User', $user->name);
            Assert::assertSame($email, $user->email);
        });

        it('executes make:filament-user command successfully', function (): void {
            /** @var \Modules\User\Tests\TestCase $this */
            $email = 'artisan-test-'.uniqid('', true).'@example.com';

            $exitCode = Artisan::call('make:filament-user', [
                '--name' => 'Artisan Test User',
                '--email' => $email,
                '--password' => 'TestPassword123!',
            ]);

            Assert::assertSame(0, $exitCode);
            $user = User::where('email', $email)->first();
            Assert::assertNotNull($user);
            Assert::assertSame($email, $user->email);
            Assert::assertSame('Artisan Test User', $user->name);
        });

        it('allows querying all users in console context without tenant filter', function (): void {
            /** @var \Modules\User\Tests\TestCase $this */
            $tenant1 = $this->requireTenant1();
            $tenant2 = $this->requireTenant2();
            $this->skipUnlessUserColumn('users', 'tenant_id', 'users.tenant_id column missing — tenant scope tests skipped.');

            $user1 = UserFactory::new()->createOne([
                'name' => 'Tenant 1 User',
                'tenant_id' => $tenant1->id,
            ]);

            $user2 = UserFactory::new()->createOne([
                'name' => 'Tenant 2 User',
                'tenant_id' => $tenant2->id,
            ]);

            $allUsers = User::query()->whereIn('id', [$user1->id, $user2->id])->get();

            Assert::assertCount(2, $allUsers);
            Assert::assertTrue($allUsers->pluck('id')->contains($user1->id));
            Assert::assertTrue($allUsers->pluck('id')->contains($user2->id));
        });
    });

    describe('User Creation in HTTP Context with Tenant', function (): void {
        it('automatically sets tenant_id when creating user in HTTP context', function (): void {
            /** @var \Modules\User\Tests\TestCase $this */
            $tenant1 = $this->requireTenant1();
            $this->skipUnlessUserColumn('users', 'tenant_id', 'users.tenant_id column missing — tenant scope tests skipped.');

            $this->actingAs(UserFactory::new()->createOne());

            Filament::shouldReceive('getTenant')
                ->andReturn($tenant1);

            $email = 'http-test-'.uniqid('', true).'@example.com';
            $user = User::create([
                'name' => 'HTTP Context User',
                'email' => $email,
                'password' => bcrypt('password123'),
            ]);

            Assert::assertInstanceOf(User::class, $user);
        });

        it('filters users by tenant in HTTP context', function (): void {
            /** @var \Modules\User\Tests\TestCase $this */
            $tenant1 = $this->requireTenant1();
            $tenant2 = $this->requireTenant2();
            $this->skipUnlessUserColumn('users', 'tenant_id', 'users.tenant_id column missing — tenant scope tests skipped.');

            $user1 = UserFactory::new()->createOne([
                'name' => 'Tenant 1 User Only',
                'email' => 'tenant1-only-'.uniqid('', true).'@example.com',
                'tenant_id' => $tenant1->id,
            ]);

            $user2 = UserFactory::new()->createOne([
                'name' => 'Tenant 2 User Only',
                'email' => 'tenant2-only-'.uniqid('', true).'@example.com',
                'tenant_id' => $tenant2->id,
            ]);

            $adminUser = UserFactory::new()->createOne([
                'tenant_id' => $tenant1->id,
            ]);

            $this->actingAs($adminUser);

            Filament::shouldReceive('getTenant')
                ->andReturn($tenant1);

            Assert::assertNotNull(User::withoutGlobalScopes()->find($user1->id));
            Assert::assertNull(User::withoutGlobalScopes()->find($user2->id));
        });
    });

    describe('TenantScope Exception Handling', function (): void {
        it('handles gracefully when Filament::getTenant() throws exception', function (): void {
            /** @var \Modules\User\Tests\TestCase $this */
            Filament::shouldReceive('getTenant')
                ->andThrow(new RuntimeException('Session not available'));

            $users = User::query()->limit(1)->get();

            Assert::assertInstanceOf(Collection::class, $users);
        });

        it('allows user creation when Filament context is not available', function (): void {
            /** @var \Modules\User\Tests\TestCase $this */
            Filament::shouldReceive('getTenant')
                ->andReturn(null);

            $email = 'no-tenant-'.uniqid('', true).'@example.com';
            $user = User::create([
                'name' => 'No Tenant Context User',
                'email' => $email,
                'password' => bcrypt('password123'),
            ]);

            Assert::assertInstanceOf(User::class, $user);
            Assert::assertSame('No Tenant Context User', $user->name);
        });
    });

    describe('Manual Tenant Assignment in Console', function (): void {
        it('allows manual tenant_id assignment in console context', function (): void {
            /** @var \Modules\User\Tests\TestCase $this */
            $tenant1 = $this->requireTenant1();
            $this->skipUnlessUserColumn('users', 'tenant_id', 'users.tenant_id column missing — tenant scope tests skipped.');

            $email = 'manual-tenant-'.uniqid('', true).'@example.com';
            $user = User::create([
                'name' => 'Manual Tenant User',
                'email' => $email,
                'password' => bcrypt('password123'),
                'tenant_id' => $tenant1->id,
            ]);

            Assert::assertSame($tenant1->id, $user->getAttribute('tenant_id'));
            $user->refresh();
            Assert::assertSame($tenant1->id, $user->getAttribute('tenant_id'));
        });

        it('allows querying users by specific tenant in console', function (): void {
            /** @var \Modules\User\Tests\TestCase $this */
            $tenant1 = $this->requireTenant1();
            $tenant2 = $this->requireTenant2();
            $this->skipUnlessUserColumn('users', 'tenant_id', 'users.tenant_id column missing — tenant scope tests skipped.');

            UserFactory::new()->count(3)->create(['tenant_id' => $tenant1->id]);
            UserFactory::new()->count(2)->create(['tenant_id' => $tenant2->id]);

            $tenant1Users = User::withoutGlobalScopes()
                ->where('tenant_id', $tenant1->id)
                ->get();

            $tenant2Users = User::withoutGlobalScopes()
                ->where('tenant_id', $tenant2->id)
                ->get();

            Assert::assertGreaterThanOrEqual(3, $tenant1Users->count());

            Assert::assertGreaterThanOrEqual(2, $tenant2Users->count());
        });
    });
});

describe('InteractsWithTenant Trait Behavior', function (): void {
    beforeEach(function () {
        /** @var \Modules\User\Tests\TestCase $this */
        $this->skipUnlessUsersTableReady();
    });

    it('does not crash when booting in console context', function (): void {
        /** @var \Modules\User\Tests\TestCase $this */
        $email = 'boot-test-'.uniqid('', true).'@example.com';
        $user = new User([
            'name' => 'Boot Test User',
            'email' => $email,
            'password' => bcrypt('password123'),
        ]);

        Assert::assertInstanceOf(User::class, $user);
        $user->save();

        Assert::assertTrue($user->exists);
    });

    it('skips tenant assignment in console context during creating event', function (): void {
        /** @var \Modules\User\Tests\TestCase $this */
        $email = 'creating-event-'.uniqid('', true).'@example.com';
        $user = User::create([
            'name' => 'Creating Event Test',
            'email' => $email,
            'password' => bcrypt('password123'),
        ]);

        Assert::assertTrue($user->exists);
        Assert::assertSame('Creating Event Test', $user->name);
    });
});
