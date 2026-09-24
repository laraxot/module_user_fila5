<?php

declare(strict_types=1);
<<<<<<< .merge_file_oCFfhv
<<<<<<< HEAD
<<<<<<< .merge_file_0bIEzq

=======
<<<<<<< .merge_file_bY8wEi
=======

>>>>>>> .merge_file_ge7ZZe
>>>>>>> .merge_file_W1j8GU
=======

>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_BOmKiY
use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

/*
 * Class CreateModelHasRolesTable.
 */
<<<<<<< .merge_file_oCFfhv
<<<<<<< HEAD
<<<<<<< .merge_file_0bIEzq
return new class extends XotBaseMigration {
=======
<<<<<<< .merge_file_bY8wEi
return new class extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> .merge_file_ge7ZZe
>>>>>>> .merge_file_W1j8GU
=======
return new class extends XotBaseMigration {
>>>>>>> df2ba808 (.)
=======
return new class extends XotBaseMigration
{
>>>>>>> .merge_file_BOmKiY
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
<<<<<<< .merge_file_oCFfhv
<<<<<<< HEAD
<<<<<<< .merge_file_0bIEzq
=======
<<<<<<< .merge_file_bY8wEi
=======
>>>>>>> .merge_file_BOmKiY
            if ($this->getColumnType('model_id') === 'uuid') {
                $table->string('model_id', 36)->index()->change();
            }
            if ($this->getColumnType('role_id') === 'uuid') {
<<<<<<< .merge_file_oCFfhv
=======
>>>>>>> .merge_file_W1j8GU
=======
>>>>>>> df2ba808 (.)
            if ('uuid' === $this->getColumnType('model_id')) {
                $table->string('model_id', 36)->index()->change();
            }
            if ('uuid' === $this->getColumnType('role_id')) {
<<<<<<< HEAD
<<<<<<< .merge_file_0bIEzq
=======
>>>>>>> .merge_file_ge7ZZe
>>>>>>> .merge_file_W1j8GU
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_BOmKiY
                $table->integer('role_id')->index()->change();
            }
            // $this->updateUser($table);
            $this->updateTimestamps($table);
        });
    }
};
