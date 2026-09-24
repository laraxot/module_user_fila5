<?php

declare(strict_types=1);
<<<<<<< .merge_file_qOIT7q
<<<<<<< HEAD
<<<<<<< .merge_file_bY8wEi
=======

>>>>>>> .merge_file_ge7ZZe
=======
>>>>>>> 350420cb (Check & fix styling)
=======
>>>>>>> .merge_file_i62h1M
use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

/*
 * Class CreateModelHasRolesTable.
 */
<<<<<<< .merge_file_qOIT7q
<<<<<<< HEAD
<<<<<<< .merge_file_bY8wEi
return new class extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> .merge_file_ge7ZZe
=======
return new class extends XotBaseMigration {
>>>>>>> 350420cb (Check & fix styling)
=======
return new class extends XotBaseMigration
{
>>>>>>> .merge_file_i62h1M
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
<<<<<<< .merge_file_qOIT7q
<<<<<<< HEAD
<<<<<<< .merge_file_bY8wEi
=======
>>>>>>> .merge_file_i62h1M
            if ($this->getColumnType('model_id') === 'uuid') {
                $table->string('model_id', 36)->index()->change();
            }
            if ($this->getColumnType('role_id') === 'uuid') {
<<<<<<< .merge_file_qOIT7q
=======
=======
>>>>>>> 350420cb (Check & fix styling)
            if ('uuid' === $this->getColumnType('model_id')) {
                $table->string('model_id', 36)->index()->change();
            }
            if ('uuid' === $this->getColumnType('role_id')) {
<<<<<<< HEAD
>>>>>>> .merge_file_ge7ZZe
=======
>>>>>>> 350420cb (Check & fix styling)
=======
>>>>>>> .merge_file_i62h1M
                $table->integer('role_id')->index()->change();
            }
            // $this->updateUser($table);
            $this->updateTimestamps($table);
        });
    }
};
