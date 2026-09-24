<?php

declare(strict_types=1);
<<<<<<< .merge_file_xI0ugl
<<<<<<< HEAD
<<<<<<< .merge_file_9Yghdm

=======
>>>>>>> .merge_file_bVufkk
=======
<<<<<<< .merge_file_s0SXi4

=======
<<<<<<< .merge_file_ZYs34e

=======
>>>>>>> .merge_file_cPnpWv
>>>>>>> .merge_file_mo1EOZ
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_XT5zsC
use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\User\Models\Role;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

/*
 * Class CreateModelHasRolesTable.
 */
/*
 * Owner migration `User::model_has_roles` (consolidamento 2026-09-01).
 * Colonne unione viste nei duplicati non presenti qui: nessuna.
 */
return new class extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table): void {
            $team_class = XotData::make()->getTeamClass();
            $table->id();
            // $table->foreignIdFor(Role::class, 'role_id')->nullable();
            $table->integer('role_id')->index()->nullable();
            $table->uuidMorphs('model');
            $table->foreignIdFor($team_class, 'team_id')->nullable();
        });
        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            $team_class = XotData::make()->getTeamClass();
            if (! $this->hasColumn('team_id')) {
                $table->foreignIdFor($team_class, 'team_id')->nullable();
            }
            if ($this->getColumnType('model_id') === 'uuid') {
                $table->string('model_id', 36)->index()->change();
            }
            if ($this->getColumnType('role_id') === 'uuid') {
                $table->integer('role_id')->index()->change();
            }
            // $this->updateUser($table);
            $this->updateTimestamps($table);
        });
    }
};
