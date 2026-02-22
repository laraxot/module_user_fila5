<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
uses(Modules\User\Tests\TestCase::class);

>>>>>>> 60a2c9a9 (.)
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
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
=======
>>>>>>> 60a2c9a9 (.)

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
    Assert::assertInstanceOf(PermissionData::class, $permissionData);
=======
    expect($permissionData)->toBeInstanceOf(PermissionData::class);
>>>>>>> 60a2c9a9 (.)
});

test('PermissionModelsData can be instantiated', function () {
    $modelsData = PermissionModelsData::from([
        'permission' => 'Modules\User\Models\Permission',
        'role' => 'Modules\User\Models\Role',
    ]);

<<<<<<< HEAD
    Assert::assertInstanceOf(PermissionModelsData::class, $modelsData);
=======
    expect($modelsData)->toBeInstanceOf(PermissionModelsData::class);
>>>>>>> 60a2c9a9 (.)
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
    Assert::assertInstanceOf(PermissionTableNamesData::class, $tableNamesData);
=======
    expect($tableNamesData)->toBeInstanceOf(PermissionTableNamesData::class);
>>>>>>> 60a2c9a9 (.)
});

test('PermissionColumnNamesData can be instantiated', function () {
    $columnNamesData = PermissionColumnNamesData::from([
        'model_morph_key' => 'model_id',
    ]);

<<<<<<< HEAD
    Assert::assertInstanceOf(PermissionColumnNamesData::class, $columnNamesData);
=======
    expect($columnNamesData)->toBeInstanceOf(PermissionColumnNamesData::class);
>>>>>>> 60a2c9a9 (.)
});

test('PermissionCacheData can be instantiated', function () {
    $cacheData = PermissionCacheData::from([
        'expiration_time' => DateInterval::createFromDateString('24 hours'),
        'key' => 'spatie.permission.cache',
        'store' => 'default',
    ]);

<<<<<<< HEAD
    Assert::assertInstanceOf(PermissionCacheData::class, $cacheData);
=======
    expect($cacheData)->toBeInstanceOf(PermissionCacheData::class);
>>>>>>> 60a2c9a9 (.)
});

test('DeviceData can be instantiated', function () {
    $deviceData = DeviceData::from([
        'id' => 1,
        'name' => 'Test Device',
        'user_id' => 1,
    ]);

<<<<<<< HEAD
    Assert::assertInstanceOf(DeviceData::class, $deviceData);
=======
    expect($deviceData)->toBeInstanceOf(DeviceData::class);
>>>>>>> 60a2c9a9 (.)
});

test('SocialProviderData can be instantiated', function () {
    $socialProviderData = SocialProviderData::from([
        'id' => 1,
        'name' => 'google',
        'active' => true,
    ]);

<<<<<<< HEAD
    Assert::assertInstanceOf(SocialProviderData::class, $socialProviderData);
=======
    expect($socialProviderData)->toBeInstanceOf(SocialProviderData::class);
>>>>>>> 60a2c9a9 (.)
});

test('FilamentUserData can be instantiated', function () {
    $filamentUserData = FilamentUserData::from([
        'id' => 1,
        'name' => 'Test User',
    ]);

<<<<<<< HEAD
    Assert::assertInstanceOf(FilamentUserData::class, $filamentUserData);
=======
    expect($filamentUserData)->toBeInstanceOf(FilamentUserData::class);
>>>>>>> 60a2c9a9 (.)
});

test('SuperAdminData can be instantiated', function () {
    $superAdminData = SuperAdminData::from([
        'id' => 1,
        'name' => 'Super Admin',
    ]);

<<<<<<< HEAD
    Assert::assertInstanceOf(SuperAdminData::class, $superAdminData);
=======
    expect($superAdminData)->toBeInstanceOf(SuperAdminData::class);
>>>>>>> 60a2c9a9 (.)
});

test('FilamentShieldData can be instantiated', function () {
    $filamentShieldData = FilamentShieldData::from([
        'enabled' => true,
    ]);

<<<<<<< HEAD
    Assert::assertInstanceOf(FilamentShieldData::class, $filamentShieldData);
=======
    expect($filamentShieldData)->toBeInstanceOf(FilamentShieldData::class);
>>>>>>> 60a2c9a9 (.)
});

test('PasswordData can be instantiated', function () {
    $passwordData = PasswordData::from([
        'min' => 8,
        'max' => 100,
    ]);

<<<<<<< HEAD
    Assert::assertInstanceOf(PasswordData::class, $passwordData);
=======
    expect($passwordData)->toBeInstanceOf(PasswordData::class);
>>>>>>> 60a2c9a9 (.)
});

test('ShieldResourceData can be instantiated', function () {
    $shieldResourceData = ShieldResourceData::from([
        'name' => 'users',
        'enabled' => true,
    ]);

<<<<<<< HEAD
    Assert::assertInstanceOf(ShieldResourceData::class, $shieldResourceData);
=======
    expect($shieldResourceData)->toBeInstanceOf(ShieldResourceData::class);
>>>>>>> 60a2c9a9 (.)
});
