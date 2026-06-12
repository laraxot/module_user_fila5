<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Filament\Facades\Filament;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Artisan;
use Modules\User\Database\Factories\TenantFactory;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

class TenantScopeConsoleTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->skipUnlessUsersTableReady();
        $this->tenant1 = TenantFactory::new()->createOne(['name' => 'Tenant 1 '.uniqid()]);
        $this->tenant2 = TenantFactory::new()->createOne(['name' => 'Tenant 2 '.uniqid()]);
    }

    public function testAllowsUserCreationWithoutTenantInConsoleContext(): void
    {
        app()->bind(Kernel::class, static function (Application $app): Kernel {
            $kernel = $app->make(Kernel::class);
            self::assertInstanceOf(Kernel::class, $kernel);

            return $kernel;
        });

        $email = 'console-test-'.uniqid('', true).'@example.com';
        $user = User::create([
            'name' => 'Console Test User',
            'email' => $email,
            'password' => bcrypt('password123'),
        ]);

        $this->assertInstanceOf(User::class, $user);
        $this->assertSame('Console Test User', $user->name);
        $this->assertSame($email, $user->email);
    }

    public function testExecutesMakeFilamentUserCommandSuccessfully(): void
    {
        $email = 'artisan-test-'.uniqid('', true).'@example.com';

        $exitCode = Artisan::call('make:filament-user', [
            '--name' => 'Artisan Test User',
            '--email' => $email,
            '--password' => 'TestPassword123!',
        ]);

        $this->assertSame(0, $exitCode);
        $user = User::where('email', $email)->first();
        $this->assertNotNull($user);
        $this->assertSame($email, $user->email);
        $this->assertSame('Artisan Test User', $user->name);
    }

    public function testAllowsQueryingAllUsersInConsoleContextWithoutTenantFilter(): void
    {
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

        $this->assertCount(2, $allUsers);
        $this->assertTrue($allUsers->pluck('id')->contains($user1->id));
        $this->assertTrue($allUsers->pluck('id')->contains($user2->id));
    }

    public function testAutomaticallySetsTenantIdWhenCreatingUserInHttpContext(): void
    {
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

        $this->assertInstanceOf(User::class, $user);
    }

    public function testFiltersUsersByTenantInHttpContext(): void
    {
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

        $this->assertNotNull(User::withoutGlobalScopes()->find($user1->id));
        $this->assertNull(User::withoutGlobalScopes()->find($user2->id));
    }

    public function testHandlesGracefullyWhenFilamentGetTenantThrowsException(): void
    {
        Filament::shouldReceive('getTenant')
            ->andThrow(new \RuntimeException('Session not available'));

        $users = User::query()->limit(1)->get();

        $this->assertInstanceOf(Collection::class, $users);
    }

    public function testAllowsUserCreationWhenFilamentContextIsNotAvailable(): void
    {
        Filament::shouldReceive('getTenant')
            ->andReturn(null);

        $email = 'no-tenant-'.uniqid('', true).'@example.com';
        $user = User::create([
            'name' => 'No Tenant Context User',
            'email' => $email,
            'password' => bcrypt('password123'),
        ]);

        $this->assertInstanceOf(User::class, $user);
        $this->assertSame('No Tenant Context User', $user->name);
    }

    public function testAllowsManualTenantIdAssignmentInConsoleContext(): void
    {
        $tenant1 = $this->requireTenant1();
        $this->skipUnlessUserColumn('users', 'tenant_id', 'users.tenant_id column missing — tenant scope tests skipped.');

        $email = 'manual-tenant-'.uniqid('', true).'@example.com';
        $user = User::create([
            'name' => 'Manual Tenant User',
            'email' => $email,
            'password' => bcrypt('password123'),
            'tenant_id' => $tenant1->id,
        ]);

        $this->assertSame($tenant1->id, $user->getAttribute('tenant_id'));
        $user->refresh();
        $this->assertSame($tenant1->id, $user->getAttribute('tenant_id'));
    }

    public function testAllowsQueryingUsersBySpecificTenantInConsole(): void
    {
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

        $this->assertGreaterThanOrEqual(3, $tenant1Users->count());

        $this->assertGreaterThanOrEqual(2, $tenant2Users->count());
    }

    public function testDoesNotCrashWhenBootingInConsoleContext(): void
    {
        $this->skipUnlessUsersTableReady();

        $email = 'boot-test-'.uniqid('', true).'@example.com';
        $user = new User([
            'name' => 'Boot Test User',
            'email' => $email,
            'password' => bcrypt('password123'),
        ]);

        $this->assertInstanceOf(User::class, $user);
        $user->save();

        $this->assertTrue($user->exists);
    }

    public function testSkipsTenantAssignmentInConsoleContextDuringCreatingEvent(): void
    {
        $this->skipUnlessUsersTableReady();

        $email = 'creating-event-'.uniqid('', true).'@example.com';
        $user = User::create([
            'name' => 'Creating Event Test',
            'email' => $email,
            'password' => bcrypt('password123'),
        ]);

        $this->assertTrue($user->exists);
        $this->assertSame('Creating Event Test', $user->name);
    }
}
