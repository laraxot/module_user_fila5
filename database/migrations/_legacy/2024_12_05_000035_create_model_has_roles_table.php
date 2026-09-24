<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_gvldLZ

=======
>>>>>>> .merge_file_WQ21D1
=======
<<<<<<< .merge_file_bm7aD0

=======
<<<<<<< .merge_file_OM6A5Y

=======
>>>>>>> .merge_file_jEDmIs
>>>>>>> .merge_file_icr9Ys
>>>>>>> df2ba808 (.)
use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

/*
 * Class CreateModelHasRolesTable.
 */
return new class extends XotBaseMigration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table): void {
            $team_class = XotData::make()->getTeamClass();
            $table->id();
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
            if ('uuid' === $this->getColumnType('model_id')) {
                $table->string('model_id', 36)->index()->change();
            }
            if ('uuid' === $this->getColumnType('role_id')) {
                $table->integer('role_id')->index()->change();
            }
            $this->updateTimestamps($table);
        });
    }
};
