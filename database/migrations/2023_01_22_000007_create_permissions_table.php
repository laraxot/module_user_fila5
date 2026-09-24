<?php

declare(strict_types=1);
<<<<<<< HEAD
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\Permission;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;
=======

use Illuminate\Contracts\Cache\Factory;
use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Webmozart\Assert\Assert;
>>>>>>> 350420cb (Check & fix styling)

/*
 * Class CreatePermissionsTable.
 */
<<<<<<< .merge_file_kQNao3
return new class extends XotBaseMigration {
<<<<<<< HEAD
=======
return new class extends XotBaseMigration
{
>>>>>>> .merge_file_AfGmNE
    protected ?string $model_class = Permission::class;

=======
>>>>>>> 350420cb (Check & fix styling)
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CACHE --
        try {
            if (app()->bound(Factory::class)) {
                $cache = app(Factory::class);
                $cache_store = config('permission.cache.store');
                $cache_key = config('permission.cache.key');
<<<<<<< .merge_file_kQNao3
<<<<<<< HEAD
                $store = is_string($cache_store) && 'default' !== $cache_store ? $cache_store : null;
=======
                $store = is_string($cache_store) && $cache_store !== 'default' ? $cache_store : null;
>>>>>>> .merge_file_AfGmNE
                if (is_string($cache_key)) {
                    $cache->store($store)->forget($cache_key);
                }
=======
                Assert::nullOrString($cache_store);
                Assert::string($cache_key);
                $store = 'default' !== $cache_store ? $cache_store : null;
                $cache->store($store)->forget($cache_key);
>>>>>>> 350420cb (Check & fix styling)
            }
        } catch (Exception $e) {
        }

        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('guard_name');
            $table->unique(['name', 'guard_name']);
        });
        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
<<<<<<< HEAD
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
=======
            // Usa Schema::hasColumn direttamente per verificare esistenza
            $tableName = 'permissions';
            if (
                ! Illuminate\Support\Facades\Schema::connection('user')->hasColumn($tableName, 'created_at')
                && ! Illuminate\Support\Facades\Schema::connection('user')->hasColumn($tableName, 'updated_at')
            ) {
                $this->updateTimestamps($table);
            } else {
                // Se i timestamp esistono già, aggiungi solo i campi user se mancanti
                $xot = Modules\Xot\Datas\XotData::make();
                $userClass = $xot->getUserClass();
                if (! Illuminate\Support\Facades\Schema::connection('user')->hasColumn($tableName, 'updated_by')) {
                    $table->foreignIdFor($userClass, 'updated_by')->nullable();
                }
                if (! Illuminate\Support\Facades\Schema::connection('user')->hasColumn($tableName, 'created_by')) {
>>>>>>> 350420cb (Check & fix styling)
                    $table->foreignIdFor($userClass, 'created_by')->nullable();
                }
            }
        });
    }
};
