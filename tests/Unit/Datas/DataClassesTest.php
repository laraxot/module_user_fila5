<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
uses(Modules\User\Tests\TestCase::class);

=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Modules\User\Datas\DeviceData;
use Modules\User\Datas\FilamentShieldData;
use Modules\User\Datas\FilamentUserData;
use Modules\User\Datas\PasswordData;
use Modules\User\Datas\PermissionCacheData;
use Modules\User\Datas\PermissionColumnNamesData;
use Modules\User\Datas\PermissionData;
use Modules\User\Datas\PermissionModelsData;
use Modules\User\Datas\PermissionTableNamesData;
use Modules\User\Datas\ShieldResourceData;
use Modules\User\Datas\SocialProviderData;
use Modules\User\Datas\SuperAdminData;
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> f589f9b2 (.)
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

test('PermissionData can be instantiated', function () {
    $permissionData = PermissionData::from([
        'models' => PermissionModelsData::from(['permission' => 'Modules\User\Models\Permission', 'role' => 'Modules\User\Models\Role']),
        'table_names' => PermissionTableNamesData::from(['permissions' => 'permissions', 'roles' => 'roles', 'model_has_permissions' => 'model_has_permissions', 'model_has_roles' => 'model_has_roles', 'role_has_permissions' => 'role_has_permissions']),
        'column_names' => PermissionColumnNamesData::from(['model_morph_key' => 'model_id']),
        'register_permission_check_method' => false,
        'teams' => false,
        'display_permission_in_exception' => false,
        'display_role_in_exception' => false,
        'enable_wildcard_permission' => false,
        'cache' => PermissionCacheData::from(['enabled' => true, 'key' => 'spatie.permission.cache', 'expiration_time' => DateInterval::createFromDateString('24 hours'), 'store' => 'default']),
    ]);

<<<<<<< HEAD
<<<<<<< HEAD
    expect($permissionData)->toBeInstanceOf(PermissionData::class);
=======
    Assert::assertInstanceOf(PermissionData::class, $permissionData);
>>>>>>> 2024e2e7 (.)
=======
    Assert::assertInstanceOf(PermissionData::class, $permissionData);
>>>>>>> f589f9b2 (.)
});

test('PermissionModelsData can be instantiated', function () {
    $modelsData = PermissionModelsData::from([
        'permission' => 'Modules\User\Models\Permission',
        'role' => 'Modules\User\Models\Role',
    ]);

<<<<<<< HEAD
<<<<<<< HEAD
    expect($modelsData)->toBeInstanceOf(PermissionModelsData::class);
=======
    Assert::assertInstanceOf(PermissionModelsData::class, $modelsData);
>>>>>>> 2024e2e7 (.)
=======
    Assert::assertInstanceOf(PermissionModelsData::class, $modelsData);
>>>>>>> f589f9b2 (.)
});

test('PermissionTableNamesData can be instantiated', function () {
    $tableNamesData = PermissionTableNamesData::from([
        'permissions' => 'permissions',
        'roles' => 'roles',
        'model_has_permissions' => 'model_has_permissions',
        'model_has_roles' => 'model_has_roles',
        'role_has_permissions' => 'role_has_permissions',
    ]);

<<<<<<< HEAD
<<<<<<< HEAD
    expect($tableNamesData)->toBeInstanceOf(PermissionTableNamesData::class);
=======
    Assert::assertInstanceOf(PermissionTableNamesData::class, $tableNamesData);
>>>>>>> 2024e2e7 (.)
=======
    Assert::assertInstanceOf(PermissionTableNamesData::class, $tableNamesData);
>>>>>>> f589f9b2 (.)
});

test('PermissionColumnNamesData can be instantiated', function () {
    $columnNamesData = PermissionColumnNamesData::from([
        'model_morph_key' => 'model_id',
    ]);

<<<<<<< HEAD
<<<<<<< HEAD
    expect($columnNamesData)->toBeInstanceOf(PermissionColumnNamesData::class);
=======
    Assert::assertInstanceOf(PermissionColumnNamesData::class, $columnNamesData);
>>>>>>> 2024e2e7 (.)
=======
    Assert::assertInstanceOf(PermissionColumnNamesData::class, $columnNamesData);
>>>>>>> f589f9b2 (.)
});

test('PermissionCacheData can be instantiated', function () {
    $cacheData = PermissionCacheData::from([
        'expiration_time' => DateInterval::createFromDateString('24 hours'),
        'key' => 'spatie.permission.cache',
        'store' => 'default',
    ]);

<<<<<<< HEAD
<<<<<<< HEAD
    expect($cacheData)->toBeInstanceOf(PermissionCacheData::class);
=======
    Assert::assertInstanceOf(PermissionCacheData::class, $cacheData);
>>>>>>> 2024e2e7 (.)
=======
    Assert::assertInstanceOf(PermissionCacheData::class, $cacheData);
>>>>>>> f589f9b2 (.)
});

test('DeviceData can be instantiated', function () {
    $deviceData = DeviceData::from([
        'id' => 1,
        'name' => 'Test Device',
        'user_id' => 1,
    ]);

<<<<<<< HEAD
<<<<<<< HEAD
    expect($deviceData)->toBeInstanceOf(DeviceData::class);
=======
    Assert::assertInstanceOf(DeviceData::class, $deviceData);
>>>>>>> 2024e2e7 (.)
=======
    Assert::assertInstanceOf(DeviceData::class, $deviceData);
>>>>>>> f589f9b2 (.)
});

test('SocialProviderData can be instantiated', function () {
    $socialProviderData = SocialProviderData::from([
        'id' => 1,
        'name' => 'google',
        'active' => true,
    ]);

<<<<<<< HEAD
<<<<<<< HEAD
    expect($socialProviderData)->toBeInstanceOf(SocialProviderData::class);
=======
    Assert::assertInstanceOf(SocialProviderData::class, $socialProviderData);
>>>>>>> 2024e2e7 (.)
=======
    Assert::assertInstanceOf(SocialProviderData::class, $socialProviderData);
>>>>>>> f589f9b2 (.)
});

test('FilamentUserData can be instantiated', function () {
    $filamentUserData = FilamentUserData::from([
        'id' => 1,
        'name' => 'Test User',
    ]);

<<<<<<< HEAD
<<<<<<< HEAD
    expect($filamentUserData)->toBeInstanceOf(FilamentUserData::class);
=======
    Assert::assertInstanceOf(FilamentUserData::class, $filamentUserData);
>>>>>>> 2024e2e7 (.)
=======
    Assert::assertInstanceOf(FilamentUserData::class, $filamentUserData);
>>>>>>> f589f9b2 (.)
});

test('SuperAdminData can be instantiated', function () {
    $superAdminData = SuperAdminData::from([
        'id' => 1,
        'name' => 'Super Admin',
    ]);

<<<<<<< HEAD
<<<<<<< HEAD
    expect($superAdminData)->toBeInstanceOf(SuperAdminData::class);
=======
    Assert::assertInstanceOf(SuperAdminData::class, $superAdminData);
>>>>>>> 2024e2e7 (.)
=======
    Assert::assertInstanceOf(SuperAdminData::class, $superAdminData);
>>>>>>> f589f9b2 (.)
});

test('FilamentShieldData can be instantiated', function () {
    $filamentShieldData = FilamentShieldData::from([
        'enabled' => true,
    ]);

<<<<<<< HEAD
<<<<<<< HEAD
    expect($filamentShieldData)->toBeInstanceOf(FilamentShieldData::class);
=======
    Assert::assertInstanceOf(FilamentShieldData::class, $filamentShieldData);
>>>>>>> 2024e2e7 (.)
=======
    Assert::assertInstanceOf(FilamentShieldData::class, $filamentShieldData);
>>>>>>> f589f9b2 (.)
});

test('PasswordData can be instantiated', function () {
    $passwordData = PasswordData::from([
        'min' => 8,
        'max' => 100,
    ]);

<<<<<<< HEAD
<<<<<<< HEAD
    expect($passwordData)->toBeInstanceOf(PasswordData::class);
=======
    Assert::assertInstanceOf(PasswordData::class, $passwordData);
>>>>>>> 2024e2e7 (.)
=======
    Assert::assertInstanceOf(PasswordData::class, $passwordData);
>>>>>>> f589f9b2 (.)
});

test('ShieldResourceData can be instantiated', function () {
    $shieldResourceData = ShieldResourceData::from([
        'name' => 'users',
        'enabled' => true,
    ]);

<<<<<<< HEAD
<<<<<<< HEAD
    expect($shieldResourceData)->toBeInstanceOf(ShieldResourceData::class);
=======
    Assert::assertInstanceOf(ShieldResourceData::class, $shieldResourceData);
>>>>>>> 2024e2e7 (.)
=======
    Assert::assertInstanceOf(ShieldResourceData::class, $shieldResourceData);
>>>>>>> f589f9b2 (.)
});
