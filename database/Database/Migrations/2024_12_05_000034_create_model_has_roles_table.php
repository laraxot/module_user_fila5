<?php

declare(strict_types=1);
<<<<<<< .merge_file_0bIEzq

=======
<<<<<<< .merge_file_bY8wEi
=======

>>>>>>> .merge_file_ge7ZZe
>>>>>>> .merge_file_W1j8GU
use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

/*
 * Class CreateModelHasRolesTable.
 */
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
<<<<<<< .merge_file_0bIEzq
=======
<<<<<<< .merge_file_bY8wEi
            if ($this->getColumnType('model_id') === 'uuid') {
                $table->string('model_id', 36)->index()->change();
            }
            if ($this->getColumnType('role_id') === 'uuid') {
=======
>>>>>>> .merge_file_W1j8GU
            if ('uuid' === $this->getColumnType('model_id')) {
                $table->string('model_id', 36)->index()->change();
            }
            if ('uuid' === $this->getColumnType('role_id')) {
<<<<<<< .merge_file_0bIEzq
=======
>>>>>>> .merge_file_ge7ZZe
>>>>>>> .merge_file_W1j8GU
                $table->integer('role_id')->index()->change();
            }
            // $this->updateUser($table);
            $this->updateTimestamps($table);
        });
    }
};
