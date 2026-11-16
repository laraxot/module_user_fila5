<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models;

use Modules\User\Models\Permission;
use Modules\User\Tests\TestCase;

uses(\Modules\User\Tests\TestCase::class);

class PermissionTest extends TestCase
{
<<<<<<< .merge_file_U0x4IA
=======
    /*
     * created_by/updated_by sono foreignIdFor(User) e l'utente ha chiave UUID: su MariaDB la
     * colonna e' di tipo UUID nativo, che scarta valori come 'user123'. Si usano UUID validi.
     */
    private const string CREATOR_ID = '0195f4a2-0000-7000-8000-000000000123';

    private const string UPDATER_ID = '0195f4a2-0000-7000-8000-000000000456';

    private const string ADMIN_ID = '0195f4a2-0000-7000-8000-0000000000ad';

>>>>>>> .merge_file_8JLSYR
    public function test_can_create_permission_with_minimal_data(): void
    {
        $permission = Permission::factory()->create([
            'name' => 'test.permission',
            'guard_name' => 'web',
        ]);

        $this->assertDatabaseHas('permissions', [
            'id' => $permission->id,
            'name' => 'test.permission',
            'guard_name' => 'web',
<<<<<<< .merge_file_U0x4IA
        ]);
=======
        ], 'user');
>>>>>>> .merge_file_8JLSYR
    }

    public function test_can_create_permission_with_all_fields(): void
    {
        $permissionData = [
            'name' => 'full.permission',
            'guard_name' => 'web',
<<<<<<< .merge_file_U0x4IA
            'created_by' => 'user123',
            'updated_by' => 'user456',
=======
            'created_by' => self::CREATOR_ID,
            'updated_by' => self::UPDATER_ID,
>>>>>>> .merge_file_8JLSYR
        ];

        $permission = Permission::factory()->create($permissionData);

        $this->assertDatabaseHas('permissions', [
            'id' => $permission->id,
            'name' => 'full.permission',
            'guard_name' => 'web',
<<<<<<< .merge_file_U0x4IA
            'created_by' => 'user123',
            'updated_by' => 'user456',
        ]);
=======
            'created_by' => self::CREATOR_ID,
            'updated_by' => self::UPDATER_ID,
        ], 'user');
>>>>>>> .merge_file_8JLSYR
    }

    public function test_permission_has_connection_attribute(): void
    {
        $permission = new Permission;

        static::assertSame('user', $permission->getConnectionName());
    }

    public function test_permission_has_key_type_attribute(): void
    {
        $permission = new Permission;

        // permissions.id e' bigIncrements (migration 2026_09_01_150112): chiave intera.
        static::assertSame('int', $permission->getKeyType());
    }

    public function test_permission_has_fillable_attributes(): void
    {
        $permission = new Permission;

        $expectedFillable = [
            'name',
            'guard_name',
            'display_name',
            'description',
            'created_by',
            'updated_by',
        ];

        static::assertSame($expectedFillable, $permission->getFillable());
    }

    public function test_permission_has_casts(): void
    {
        $permission = new Permission;

        // Il model non dichiara casts propri: resta solo quello della chiave intera.
        $expectedCasts = [
            'id' => 'int',
        ];

        static::assertSame($expectedCasts, $permission->getCasts());
    }

    public function test_can_find_permission_by_name(): void
    {
        $permission = Permission::factory()->create(['name' => 'unique.permission']);

        $foundPermission = Permission::where('name', 'unique.permission')->first();

        static::assertNotNull($foundPermission);
        static::assertSame($permission->id, $foundPermission->id);
    }

    public function test_can_find_permission_by_guard_name(): void
    {
        Permission::factory()->create(['guard_name' => 'web']);
        Permission::factory()->create(['guard_name' => 'api']);
        Permission::factory()->create(['guard_name' => 'web']);

        $webPermissions = Permission::where('guard_name', 'web')->get();

        static::assertCount(2, $webPermissions);
        static::assertTrue($webPermissions->every(fn (Permission $permission) => $permission->guard_name === 'web'));
    }

    public function test_can_find_permission_by_created_by(): void
    {
<<<<<<< .merge_file_U0x4IA
        $permission = Permission::factory()->create(['created_by' => 'user123']);

        $foundPermission = Permission::where('created_by', 'user123')->first();
=======
        $permission = Permission::factory()->create(['created_by' => self::CREATOR_ID]);

        $foundPermission = Permission::where('created_by', self::CREATOR_ID)->first();
>>>>>>> .merge_file_8JLSYR

        static::assertNotNull($foundPermission);
        static::assertSame($permission->id, $foundPermission->id);
    }

    public function test_can_find_permission_by_updated_by(): void
    {
<<<<<<< .merge_file_U0x4IA
        $permission = Permission::factory()->create(['updated_by' => 'user456']);

        $foundPermission = Permission::where('updated_by', 'user456')->first();
=======
        $permission = Permission::factory()->create(['updated_by' => self::UPDATER_ID]);

        $foundPermission = Permission::where('updated_by', self::UPDATER_ID)->first();
>>>>>>> .merge_file_8JLSYR

        static::assertNotNull($foundPermission);
        static::assertSame($permission->id, $foundPermission->id);
    }

    public function test_can_find_permissions_by_name_pattern(): void
    {
        Permission::factory()->create(['name' => 'user.create']);
        Permission::factory()->create(['name' => 'user.update']);
        Permission::factory()->create(['name' => 'user.delete']);
        Permission::factory()->create(['name' => 'post.read']);

        $userPermissions = Permission::where('name', 'like', 'user.%')->get();

        static::assertCount(3, $userPermissions);
        static::assertTrue($userPermissions->every(fn (Permission $permission) => str_starts_with($permission->name, 'user.')));
    }

    public function test_can_update_permission(): void
    {
        $permission = Permission::factory()->create(['name' => 'old.permission']);

        $permission->update(['name' => 'new.permission']);

        $this->assertDatabaseHas('permissions', [
            'id' => $permission->id,
            'name' => 'new.permission',
<<<<<<< .merge_file_U0x4IA
        ]);
=======
        ], 'user');
>>>>>>> .merge_file_8JLSYR
    }

    public function test_can_handle_null_values(): void
    {
        $permission = Permission::factory()->create([
            'name' => 'test.permission',
            'guard_name' => 'web',
            'created_by' => null,
            'updated_by' => null,
        ]);

        $this->assertDatabaseHas('permissions', [
            'id' => $permission->id,
            'created_by' => null,
            'updated_by' => null,
<<<<<<< .merge_file_U0x4IA
        ]);
=======
        ], 'user');
>>>>>>> .merge_file_8JLSYR
    }

    public function test_can_find_permissions_by_multiple_criteria(): void
    {
        Permission::factory()->create([
            'name' => 'admin.user.create',
            'guard_name' => 'web',
<<<<<<< .merge_file_U0x4IA
            'created_by' => 'admin',
=======
            'created_by' => self::ADMIN_ID,
>>>>>>> .merge_file_8JLSYR
        ]);

        Permission::factory()->create([
            'name' => 'admin.user.update',
            'guard_name' => 'api',
<<<<<<< .merge_file_U0x4IA
            'created_by' => 'admin',
        ]);

        $permissions = Permission::where('name', 'like', 'admin.user.%')->where('created_by', 'admin')->get();

        static::assertCount(2, $permissions);
        static::assertTrue($permissions->every(
            fn (Permission $permission) => str_starts_with($permission->name, 'admin.user.') && $permission->created_by === 'admin'));
=======
            'created_by' => self::ADMIN_ID,
        ]);

        $permissions = Permission::where('name', 'like', 'admin.user.%')->where('created_by', self::ADMIN_ID)->get();

        static::assertCount(2, $permissions);
        static::assertTrue($permissions->every(
            fn (Permission $permission) => str_starts_with($permission->name, 'admin.user.') && $permission->created_by === self::ADMIN_ID));
>>>>>>> .merge_file_8JLSYR
    }

    public function test_permission_has_roles_relationship(): void
    {
        $permission = Permission::factory()->create();

        static::assertTrue(method_exists($permission, 'roles'));
    }

    public function test_permission_has_users_relationship(): void
    {
        $permission = Permission::factory()->create();

        static::assertTrue(method_exists($permission, 'users'));
    }

    public function test_permission_can_use_role_scopes(): void
    {
        $permission = Permission::factory()->create();

<<<<<<< .merge_file_U0x4IA
        static::assertTrue(method_exists($permission, 'role'));
=======
        static::assertTrue($permission->hasNamedScope('role'));
>>>>>>> .merge_file_8JLSYR
    }

    public function test_permission_can_use_permission_scopes(): void
    {
        $permission = Permission::factory()->create();

<<<<<<< .merge_file_U0x4IA
        static::assertTrue(method_exists($permission, 'permission'));
        static::assertTrue(method_exists($permission, 'withoutPermission'));
=======
        static::assertTrue($permission->hasNamedScope('permission'));
        static::assertTrue($permission->hasNamedScope('withoutPermission'));
>>>>>>> .merge_file_8JLSYR
    }

    public function test_permission_can_use_without_role_scopes(): void
    {
        $permission = Permission::factory()->create();

<<<<<<< .merge_file_U0x4IA
        static::assertTrue(method_exists($permission, 'withoutRole'));
=======
        static::assertTrue($permission->hasNamedScope('withoutRole'));
>>>>>>> .merge_file_8JLSYR
    }

    public function test_permission_has_factory_method(): void
    {
        static::assertNotNull(Permission::factory());
    }

    public function test_permission_has_get_table_method(): void
    {
        $permission = new Permission;

        static::assertSame('permissions', $permission->getTable());
    }
}
