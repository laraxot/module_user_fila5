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
        $teams = config()->boolean('permission.teams', false);
        $tableNames = config()->array('permission.table_names', []);

        // I nomi delle tabelle/colonne seguono SEMPRE config/permission.php (immutabile): i default sono solo il fallback del package.
        $permissionsTable = $this->configString('permission.table_names.permissions', 'permissions');
        $rolesTable = $this->configString('permission.table_names.roles', 'roles');
        $modelHasPermissionsTable = $this->configString('permission.table_names.model_has_permissions', 'model_has_permissions');
        $modelHasRolesTable = $this->configString('permission.table_names.model_has_roles', 'model_has_roles');
        $roleHasPermissionsTable = $this->configString('permission.table_names.role_has_permissions', 'role_has_permissions');

        $rolePivotKey = $this->configString('permission.column_names.role_pivot_key', 'role_id');
        $permissionPivotKey = $this->configString('permission.column_names.permission_pivot_key', 'permission_id');
        $modelMorphKey = $this->configString('permission.column_names.model_morph_key', 'model_id');
        $configuredTeamKey = $this->configString('permission.column_names.team_foreign_key', '');

        throw_if($tableNames === [], 'Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.');
        throw_if($teams && $configuredTeamKey === '', 'Error: team_foreign_key on config/permission.php not loaded. Run [php artisan config:clear] and try again.');

        // Con teams disattivi la colonna serve solo se permission.testing (fix sqlite): allora vale il default del package.
        $teamForeignKey = $configuredTeamKey === '' ? 'team_id' : $configuredTeamKey;

        Schema::connection('user')->create($permissionsTable, static function (Blueprint $table) {
            $table->id(); // permission id
            $table->string('name');
            $table->string('guard_name');
            $table->timestamps();

            $table->unique(['name', 'guard_name']);
        });

        Schema::connection('user')->create($rolesTable, static function (Blueprint $table) use ($teams, $teamForeignKey) {
            $table->id(); // role id
            if ($teams || config('permission.testing')) { // permission.testing is a fix for sqlite testing
                $table->unsignedBigInteger($teamForeignKey)->nullable();
                $table->index($teamForeignKey, 'roles_team_foreign_key_index');
            }
            $table->string('name');
            $table->string('guard_name');
            $table->timestamps();
            if ($teams || config('permission.testing')) {
                $table->unique([$teamForeignKey, 'name', 'guard_name']);
            } else {
                $table->unique(['name', 'guard_name']);
            }
        });

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
                $table->unsignedBigInteger($teamForeignKey);
                $table->index($teamForeignKey, 'model_has_permissions_team_foreign_key_index');

                $table->primary([$teamForeignKey, $permissionPivotKey, $modelMorphKey, 'model_type'],
                    'model_has_permissions_permission_model_type_primary');
            } else {
                $table->primary([$permissionPivotKey, $modelMorphKey, 'model_type'],
                    'model_has_permissions_permission_model_type_primary');
            }
        });

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
                $table->unsignedBigInteger($teamForeignKey);
                $table->index($teamForeignKey, 'model_has_roles_team_foreign_key_index');

                $table->primary([$teamForeignKey, $rolePivotKey, $modelMorphKey, 'model_type'],
                    'model_has_roles_role_model_type_primary');
            } else {
                $table->primary([$rolePivotKey, $modelMorphKey, 'model_type'],
                    'model_has_roles_role_model_type_primary');
            }
        });

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

        $cacheStore = $this->configString('permission.cache.store', 'default');

        app('cache')
            ->store($cacheStore === 'default' ? null : $cacheStore)
            ->forget($this->configString('permission.cache.key', 'spatie.permission.cache'));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        throw_if(config()->array('permission.table_names', []) === [], 'Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');

        $permissionsTable = $this->configString('permission.table_names.permissions', 'permissions');
        $rolesTable = $this->configString('permission.table_names.roles', 'roles');
        $modelHasPermissionsTable = $this->configString('permission.table_names.model_has_permissions', 'model_has_permissions');
        $modelHasRolesTable = $this->configString('permission.table_names.model_has_roles', 'model_has_roles');
        $roleHasPermissionsTable = $this->configString('permission.table_names.role_has_permissions', 'role_has_permissions');

        Schema::connection('user')->dropIfExists($roleHasPermissionsTable);
        Schema::connection('user')->dropIfExists($modelHasRolesTable);
        Schema::connection('user')->dropIfExists($modelHasPermissionsTable);
        Schema::connection('user')->dropIfExists($rolesTable);
        Schema::connection('user')->dropIfExists($permissionsTable);
    }

    /**
     * Valore stringa non vuoto di config, altrimenti il default (le chiavi *_pivot_key sono null di proposito).
     */
    private function configString(string $key, string $default): string
    {
        $value = config($key);

        return is_string($value) && $value !== '' ? $value : $default;
    }
};
