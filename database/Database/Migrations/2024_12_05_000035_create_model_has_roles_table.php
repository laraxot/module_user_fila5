<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_FUkbHd

=======
<<<<<<< .merge_file_i9zNTW
=======

>>>>>>> .merge_file_GLH6Rk
>>>>>>> .merge_file_DfJbVA
=======

>>>>>>> df2ba808 (.)
use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

/*
 * Class CreateModelHasRolesTable.
 */
<<<<<<< HEAD
<<<<<<< .merge_file_FUkbHd
return new class extends XotBaseMigration {
=======
<<<<<<< .merge_file_i9zNTW
return new class extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> .merge_file_GLH6Rk
>>>>>>> .merge_file_DfJbVA
=======
return new class extends XotBaseMigration {
>>>>>>> df2ba808 (.)
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
<<<<<<< HEAD
<<<<<<< .merge_file_FUkbHd
=======
<<<<<<< .merge_file_i9zNTW
            if ($this->getColumnType('model_id') === 'uuid') {
                $table->string('model_id', 36)->index()->change();
            }
            if ($this->getColumnType('role_id') === 'uuid') {
=======
>>>>>>> .merge_file_DfJbVA
=======
>>>>>>> df2ba808 (.)
            if ('uuid' === $this->getColumnType('model_id')) {
                $table->string('model_id', 36)->index()->change();
            }
            if ('uuid' === $this->getColumnType('role_id')) {
<<<<<<< HEAD
<<<<<<< .merge_file_FUkbHd
=======
>>>>>>> .merge_file_GLH6Rk
>>>>>>> .merge_file_DfJbVA
=======
>>>>>>> df2ba808 (.)
                $table->integer('role_id')->index()->change();
            }
            $this->updateTimestamps($table);
        });
    }
};
