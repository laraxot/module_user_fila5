<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_0bIEzq

=======
<<<<<<< .merge_file_bY8wEi
=======

>>>>>>> .merge_file_ge7ZZe
>>>>>>> .merge_file_W1j8GU
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
<<<<<<< HEAD
<<<<<<< .merge_file_0bIEzq
=======
<<<<<<< .merge_file_bY8wEi
            if ($this->getColumnType('model_id') === 'uuid') {
                $table->string('model_id', 36)->index()->change();
            }
            if ($this->getColumnType('role_id') === 'uuid') {
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
                $table->integer('role_id')->index()->change();
            }
            // $this->updateUser($table);
            $this->updateTimestamps($table);
        });
    }
};
