<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

use Modules\User\Models\Permission;
use Modules\User\Models\Profile;
use Modules\User\Models\Role;
use Modules\User\Models\SocialiteUser;
use Modules\User\Models\Tenant;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

uses(\Modules\User\Tests\TestCase::class);

it('can create a user with basic attributes', function () {
    $email = 'john-'.uniqid('', true).'@example.com';
    $user = $this->createTestUser([
        'name' => 'John Doe',
        'email' => $email,
        'password' => bcrypt('password123'),
    ]);

    expect($user)->toBeInstanceOf(User::class);
    expect($user->name)->toBe('John Doe');
    expect($user->email)->toBe($email);
    expect($user->exists)->toBeTrue();
});

it('can create a user with profile', function () {
    $this->skipUnlessUserTable('profiles', 'profiles table missing on user connection.');
    $this->skipUnlessUserColumn('profiles', 'user_id', 'profiles.user_id column missing on user connection.');
    $this->skipUnlessUserColumn('profiles', 'uuid', 'profiles.uuid column missing on user connection.');

    $email = 'jane-'.uniqid('', true).'@example.com';
    $user = $this->createTestUser([
        'name' => 'Jane Smith',
        'email' => $email,
    ]);

    Profile::factory()->create(['user_id' => $user->id]);

    $user->refresh();

    expect($user->profile)->toBeInstanceOf(Profile::class);
    expect($user->profile->user_id)->toBe($user->id);
});

it('can authenticate a user', function () {
    $email = 'auth-'.uniqid('', true).'@example.com';
    $user = $this->createTestUser([
        'email' => $email,
        'password' => bcrypt('secret123'),
    ]);

    expect(auth()->attempt([
        'email' => $email,
        'password' => 'secret123',
    ]))->toBeTrue();

    expect(auth()->id())->toBe($user->id);
});

it('can create a user role', function () {
    $roleName = 'admin-'.uniqid();
    $role = Role::factory()->create([
        'name' => $roleName,
        'guard_name' => 'web',
    ]);

    expect($role)->toBeInstanceOf(Role::class);
    expect($role->name)->toBe($roleName);
});

it('can create a user permission', function () {
    $permissionName = 'edit_posts_'.uniqid();
    $permission = Permission::factory()->create([
        'name' => $permissionName,
        'guard_name' => 'web',
    ]);

    expect($permission)->toBeInstanceOf(Permission::class);
    expect($permission->name)->toBe($permissionName);
});

it('can assign role to user', function () {
    $this->skipUnlessRoleAssignmentSupported();

    $user = $this->createTestUser();
    $roleName = 'editor-'.uniqid();
    $role = Role::factory()->create([
        'name' => $roleName,
        'guard_name' => 'web',
    ]);

    $user->assignRole($role);

    expect($user->hasRole($roleName))->toBeTrue();
});

it('can attach permission to user', function () {
    $this->skipUnlessDirectPermissionSupported();

    $user = $this->createTestUser();
    $permissionName = 'delete_users_'.uniqid();
    $permission = Permission::factory()->create([
        'name' => $permissionName,
        'guard_name' => 'web',
    ]);

    $user->givePermissionTo($permission);

    expect($user->can($permissionName))->toBeTrue();
});

it('can create a tenant user', function () {
    $this->skipUnlessUserColumn('users', 'tenant_id', 'users.tenant_id column missing on user connection.');

    $tenant = Tenant::factory()->create([
        'name' => 'Test Tenant '.uniqid(),
        'domain' => 'tenant-'.uniqid().'.example.com',
    ]);

    $email = 'tenant-'.uniqid('', true).'@example.com';
    $user = $this->createTestUser([
        'name' => 'Tenant User',
        'email' => $email,
        'tenant_id' => $tenant->id,
    ]);

    expect($user->tenant_id)->toBe($tenant->id);
    expect($user->tenant?->name)->toBe($tenant->name);
});

it('can create a user with socialite data', function () {
    $email = 'social-'.uniqid('', true).'@example.com';
    $user = $this->createTestUser([
        'name' => 'Social User',
        'email' => $email,
    ]);

    SocialiteUser::factory()->create([
        'user_id' => $user->id,
        'provider' => 'google',
        'provider_id' => 'google_'.uniqid(),
        'token' => 'google_token',
    ]);

    $socialiteUser = $user->socialiteUsers()->first();

    expect($socialiteUser)->toBeInstanceOf(SocialiteUser::class);
    expect($socialiteUser?->provider)->toBe('google');
});
