<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $teams = config('permission.teams');
<<<<<<< HEAD
        $tableNames = (array) config('permission.table_names');
        $columnNames = (array) config('permission.column_names');

        /** @var string $permissionsTable */
        $permissionsTable = $tableNames['permissions'] ?? 'permissions';
        /** @var string $rolesTable */
        $rolesTable = $tableNames['roles'] ?? 'roles';
        /** @var string $modelHasPermissionsTable */
        $modelHasPermissionsTable = $tableNames['model_has_permissions'] ?? 'model_has_permissions';
        /** @var string $modelHasRolesTable */
        $modelHasRolesTable = $tableNames['model_has_roles'] ?? 'model_has_roles';
        /** @var string $roleHasPermissionsTable */
        $roleHasPermissionsTable = $tableNames['role_has_permissions'] ?? 'role_has_permissions';

        /** @var string $rolePivotKey */
        $rolePivotKey = $columnNames['role_pivot_key'] ?? 'role_id';
        /** @var string $permissionPivotKey */
        $permissionPivotKey = $columnNames['permission_pivot_key'] ?? 'permission_id';
        /** @var string|null $teamForeignKey */
        $teamForeignKey = $columnNames['team_foreign_key'] ?? null;
        /** @var string $modelMorphKey */
        $modelMorphKey = $columnNames['model_morph_key'] ?? 'model_id';

        throw_if(empty($tableNames), 'Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.');
        throw_if($teams && empty($teamForeignKey), 'Error: team_foreign_key on config/permission.php not loaded. Run [php artisan config:clear] and try again.');

        Schema::connection('user')->create($permissionsTable, static function (Blueprint $table) {
=======
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        $pivotRole = $columnNames['role_pivot_key'] ?? 'role_id';
        $pivotPermission = $columnNames['permission_pivot_key'] ?? 'permission_id';

        throw_if(empty($tableNames), 'Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.');
        throw_if($teams && empty($columnNames['team_foreign_key'] ?? null), 'Error: team_foreign_key on config/permission.php not loaded. Run [php artisan config:clear] and try again.');

        Schema::connection('user')->create($tableNames['permissions'], static function (Blueprint $table) {
>>>>>>> laraxot/dev
            $table->id(); // permission id
            $table->string('name');
            $table->string('guard_name');
            $table->timestamps();

            $table->unique(['name', 'guard_name']);
        });

<<<<<<< HEAD
        Schema::connection('user')->create($rolesTable, static function (Blueprint $table) use ($teams, $teamForeignKey) {
            $table->id(); // role id
            if ($teams || config('permission.testing')) { // permission.testing is a fix for sqlite testing
                /** @var string $teamForeignKey */
                $teamKey = $teamForeignKey;
                $table->unsignedBigInteger($teamKey)->nullable();
                $table->index($teamKey, 'roles_team_foreign_key_index');
=======
        Schema::connection('user')->create($tableNames['roles'], static function (Blueprint $table) use ($teams, $columnNames) {
            $table->id(); // role id
            if ($teams || config('permission.testing')) { // permission.testing is a fix for sqlite testing
                $table->unsignedBigInteger($columnNames['team_foreign_key'])->nullable();
                $table->index($columnNames['team_foreign_key'], 'roles_team_foreign_key_index');
>>>>>>> laraxot/dev
            }
            $table->string('name');
            $table->string('guard_name');
            $table->timestamps();
            if ($teams || config('permission.testing')) {
<<<<<<< HEAD
                /** @var string $teamForeignKey */
                $teamKey = $teamForeignKey;
                $table->unique([$teamKey, 'name', 'guard_name']);
=======
                $table->unique([$columnNames['team_foreign_key'], 'name', 'guard_name']);
>>>>>>> laraxot/dev
            } else {
                $table->unique(['name', 'guard_name']);
            }
        });

<<<<<<< HEAD
        Schema::connection('user')->create($modelHasPermissionsTable, static function (Blueprint $table) use ($permissionsTable, $permissionPivotKey, $teamForeignKey, $modelMorphKey, $teams) {
            $table->unsignedBigInteger($permissionPivotKey);

            $table->string('model_type');
            $table->unsignedBigInteger($modelMorphKey);
            $table->index([$modelMorphKey, 'model_type'], 'model_has_permissions_model_id_model_type_index');

            $table->foreign($permissionPivotKey)
                ->references('id') // permission id
                ->on($permissionsTable)
                ->cascadeOnDelete();
            if ($teams) {
                /** @var string $teamForeignKey */
                $teamKey = $teamForeignKey;
                $table->unsignedBigInteger($teamKey);
                $table->index($teamKey, 'model_has_permissions_team_foreign_key_index');

                $table->primary([$teamKey, $permissionPivotKey, $modelMorphKey, 'model_type'],
                    'model_has_permissions_permission_model_type_primary');
            } else {
                $table->primary([$permissionPivotKey, $modelMorphKey, 'model_type'],
=======
        Schema::connection('user')->create($tableNames['model_has_permissions'], static function (Blueprint $table) use ($tableNames, $columnNames, $pivotPermission, $teams) {
            $table->unsignedBigInteger($pivotPermission);

            $table->string('model_type');
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_permissions_model_id_model_type_index');

            $table->foreign($pivotPermission)
                ->references('id') // permission id
                ->on($tableNames['permissions'])
                ->cascadeOnDelete();
            if ($teams) {
                $table->unsignedBigInteger($columnNames['team_foreign_key']);
                $table->index($columnNames['team_foreign_key'], 'model_has_permissions_team_foreign_key_index');

                $table->primary([$columnNames['team_foreign_key'], $pivotPermission, $columnNames['model_morph_key'], 'model_type'],
                    'model_has_permissions_permission_model_type_primary');
            } else {
                $table->primary([$pivotPermission, $columnNames['model_morph_key'], 'model_type'],
>>>>>>> laraxot/dev
                    'model_has_permissions_permission_model_type_primary');
            }
        });

<<<<<<< HEAD
        Schema::connection('user')->create($modelHasRolesTable, static function (Blueprint $table) use ($rolesTable, $rolePivotKey, $teamForeignKey, $modelMorphKey, $teams) {
            $table->unsignedBigInteger($rolePivotKey);

            $table->string('model_type');
            $table->unsignedBigInteger($modelMorphKey);
            $table->index([$modelMorphKey, 'model_type'], 'model_has_roles_model_id_model_type_index');

            $table->foreign($rolePivotKey)
                ->references('id') // role id
                ->on($rolesTable)
                ->cascadeOnDelete();
            if ($teams) {
                /** @var string $teamForeignKey */
                $teamKey = $teamForeignKey;
                $table->unsignedBigInteger($teamKey);
                $table->index($teamKey, 'model_has_roles_team_foreign_key_index');

                $table->primary([$teamKey, $rolePivotKey, $modelMorphKey, 'model_type'],
                    'model_has_roles_role_model_type_primary');
            } else {
                $table->primary([$rolePivotKey, $modelMorphKey, 'model_type'],
=======
        Schema::connection('user')->create($tableNames['model_has_roles'], static function (Blueprint $table) use ($tableNames, $columnNames, $pivotRole, $teams) {
            $table->unsignedBigInteger($pivotRole);

            $table->string('model_type');
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_roles_model_id_model_type_index');

            $table->foreign($pivotRole)
                ->references('id') // role id
                ->on($tableNames['roles'])
                ->cascadeOnDelete();
            if ($teams) {
                $table->unsignedBigInteger($columnNames['team_foreign_key']);
                $table->index($columnNames['team_foreign_key'], 'model_has_roles_team_foreign_key_index');

                $table->primary([$columnNames['team_foreign_key'], $pivotRole, $columnNames['model_morph_key'], 'model_type'],
                    'model_has_roles_role_model_type_primary');
            } else {
                $table->primary([$pivotRole, $columnNames['model_morph_key'], 'model_type'],
>>>>>>> laraxot/dev
                    'model_has_roles_role_model_type_primary');
            }
        });

<<<<<<< HEAD
        Schema::connection('user')->create($roleHasPermissionsTable, static function (Blueprint $table) use ($permissionsTable, $rolesTable, $rolePivotKey, $permissionPivotKey) {
            $table->unsignedBigInteger($permissionPivotKey);
            $table->unsignedBigInteger($rolePivotKey);

            $table->foreign($permissionPivotKey)
                ->references('id') // permission id
                ->on($permissionsTable)
                ->cascadeOnDelete();

            $table->foreign($rolePivotKey)
                ->references('id') // role id
                ->on($rolesTable)
                ->cascadeOnDelete();

            $table->primary([$permissionPivotKey, $rolePivotKey], 'role_has_permissions_permission_id_role_id_primary');
        });

        /** @var string|null $cacheStore */
        $cacheStore = config('permission.cache.store');
        if ($cacheStore === 'default') {
            $cacheStore = null;
        }

        /** @var string $cacheKey */
        $cacheKey = config('permission.cache.key');

        app('cache')
            ->store($cacheStore)
            ->forget($cacheKey);
=======
        Schema::connection('user')->create($tableNames['role_has_permissions'], static function (Blueprint $table) use ($tableNames, $pivotRole, $pivotPermission) {
            $table->unsignedBigInteger($pivotPermission);
            $table->unsignedBigInteger($pivotRole);

            $table->foreign($pivotPermission)
                ->references('id') // permission id
                ->on($tableNames['permissions'])
                ->cascadeOnDelete();

            $table->foreign($pivotRole)
                ->references('id') // role id
                ->on($tableNames['roles'])
                ->cascadeOnDelete();

            $table->primary([$pivotPermission, $pivotRole], 'role_has_permissions_permission_id_role_id_primary');
        });

        app('cache')
            ->store(config('permission.cache.store') != 'default' ? config('permission.cache.store') : null)
            ->forget(config('permission.cache.key'));
>>>>>>> laraxot/dev
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<< HEAD
        $tableNames = (array) config('permission.table_names');

        throw_if(empty($tableNames), 'Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');

        /** @var string $permissionsTable */
        $permissionsTable = $tableNames['permissions'] ?? 'permissions';
        /** @var string $rolesTable */
        $rolesTable = $tableNames['roles'] ?? 'roles';
        /** @var string $modelHasPermissionsTable */
        $modelHasPermissionsTable = $tableNames['model_has_permissions'] ?? 'model_has_permissions';
        /** @var string $modelHasRolesTable */
        $modelHasRolesTable = $tableNames['model_has_roles'] ?? 'model_has_roles';
        /** @var string $roleHasPermissionsTable */
        $roleHasPermissionsTable = $tableNames['role_has_permissions'] ?? 'role_has_permissions';

        Schema::connection('user')->dropIfExists($roleHasPermissionsTable);
        Schema::connection('user')->dropIfExists($modelHasRolesTable);
        Schema::connection('user')->dropIfExists($modelHasPermissionsTable);
        Schema::connection('user')->dropIfExists($rolesTable);
        Schema::connection('user')->dropIfExists($permissionsTable);
=======
        $tableNames = config('permission.table_names');

        throw_if(empty($tableNames), 'Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');

        Schema::connection('user')->dropIfExists($tableNames['role_has_permissions']);
        Schema::connection('user')->dropIfExists($tableNames['model_has_roles']);
        Schema::connection('user')->dropIfExists($tableNames['model_has_permissions']);
        Schema::connection('user')->dropIfExists($tableNames['roles']);
        Schema::connection('user')->dropIfExists($tableNames['permissions']);
>>>>>>> laraxot/dev
    }
};
