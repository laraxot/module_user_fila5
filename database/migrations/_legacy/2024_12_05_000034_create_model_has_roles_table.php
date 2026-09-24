<?php

declare(strict_types=1);
<<<<<<< .merge_file_xGoQP2
<<<<<<< HEAD
<<<<<<< .merge_file_uD1fjE

=======
>>>>>>> .merge_file_T73nTr
=======
<<<<<<< .merge_file_nHIiAa

=======
<<<<<<< .merge_file_nVulNs

=======
>>>>>>> .merge_file_ANQ0hs
>>>>>>> .merge_file_URIDz4
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_V9snFn
use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

/*
 * Class CreateModelHasRolesTable.
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
