<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\Permission;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
=======
use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;
>>>>>>> f548be94 (.)
=======
use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;
=======
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\Permission;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev

/*
 * Class CreatePermissionsTable.
 */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
return new class extends XotBaseMigration
{
    protected ?string $model_class = Permission::class;

=======
return new class extends XotBaseMigration {
>>>>>>> f548be94 (.)
=======
return new class extends XotBaseMigration {
=======
return new class extends XotBaseMigration
{
    protected ?string $model_class = Permission::class;

>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
return new class extends XotBaseMigration {
    protected ?string $model_class = Permission::class;

>>>>>>> laraxot/dev
    /**
     * Run the migrations.
     */
    public function up(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
        // -- CACHE --
        try {
            if (app()->bound(Factory::class)) {
                $cache = app(Factory::class);
                $cache_store = config('permission.cache.store');
                $cache_key = config('permission.cache.key');
<<<<<<< HEAD
                $store = is_string($cache_store) && $cache_store !== 'default' ? $cache_store : null;
=======
                $store = is_string($cache_store) && 'default' !== $cache_store ? $cache_store : null;
>>>>>>> laraxot/dev
                if (is_string($cache_key)) {
                    $cache->store($store)->forget($cache_key);
                }
            }
        } catch (Exception $e) {
        }

        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('guard_name');
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table): void {
            $table->bigIncrements('id');
            // permission id
            $table->string('name');
            // For MySQL 8.0 use string('name', 125);
            $table->string('guard_name');
            // For MySQL 8.0 use string('guard_name', 125);
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
        // -- CACHE --
        try {
            if (app()->bound(Factory::class)) {
                $cache = app(Factory::class);
                $cache_store = config('permission.cache.store');
                $cache_key = config('permission.cache.key');
                $store = is_string($cache_store) && $cache_store !== 'default' ? $cache_store : null;
                if (is_string($cache_key)) {
                    $cache->store($store)->forget($cache_key);
                }
            }
        } catch (Exception $e) {
        }

        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('guard_name');
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
            $table->unique(['name', 'guard_name']);
        });
        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
            if (
                ! $this->hasColumn('created_at')
                && ! $this->hasColumn('updated_at')
            ) {
                $this->updateTimestamps($table);
            } else {
                $xot = XotData::make();
                $userClass = $xot->getUserClass();
                if (! $this->hasColumn('updated_by')) {
                    $table->foreignIdFor($userClass, 'updated_by')->nullable();
                }
                if (! $this->hasColumn('created_by')) {
                    $table->foreignIdFor($userClass, 'created_by')->nullable();
                }
            }
<<<<<<< HEAD
=======
            // $this->updateUser($table);
            $this->updateTimestamps($table);
>>>>>>> f548be94 (.)
=======
            // $this->updateUser($table);
            $this->updateTimestamps($table);
=======
            if (
                ! $this->hasColumn('created_at')
                && ! $this->hasColumn('updated_at')
            ) {
                $this->updateTimestamps($table);
            } else {
                $xot = XotData::make();
                $userClass = $xot->getUserClass();
                if (! $this->hasColumn('updated_by')) {
                    $table->foreignIdFor($userClass, 'updated_by')->nullable();
                }
                if (! $this->hasColumn('created_by')) {
                    $table->foreignIdFor($userClass, 'created_by')->nullable();
                }
            }
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
        });
    }
};
