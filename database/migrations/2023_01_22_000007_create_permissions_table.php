<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;
=======
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\Permission;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

/*
 * Class CreatePermissionsTable.
 */
<<<<<<< HEAD
<<<<<<< HEAD
return new class extends XotBaseMigration {
=======
=======
>>>>>>> f589f9b2 (.)
return new class extends XotBaseMigration
{
    protected ?string $model_class = Permission::class;

<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    /**
     * Run the migrations.
     */
    public function up(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table): void {
            $table->bigIncrements('id');
            // permission id
            $table->string('name');
            // For MySQL 8.0 use string('name', 125);
            $table->string('guard_name');
            // For MySQL 8.0 use string('guard_name', 125);
=======
=======
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            $table->unique(['name', 'guard_name']);
        });
        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
<<<<<<< HEAD
<<<<<<< HEAD
            // $this->updateUser($table);
            $this->updateTimestamps($table);
=======
=======
>>>>>>> f589f9b2 (.)
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
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
        });
    }
};
