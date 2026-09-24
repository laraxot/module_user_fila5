<?php

declare(strict_types=1);
<<<<<<< .merge_file_toJAuD
<<<<<<< HEAD
<<<<<<< .merge_file_i9zNTW
=======

>>>>>>> .merge_file_GLH6Rk
=======
>>>>>>> 350420cb (Check & fix styling)
=======
>>>>>>> .merge_file_yQ1dl4
use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

/*
 * Class CreateModelHasRolesTable.
 */
<<<<<<< .merge_file_toJAuD
<<<<<<< HEAD
<<<<<<< .merge_file_i9zNTW
return new class extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> .merge_file_GLH6Rk
=======
return new class extends XotBaseMigration {
>>>>>>> 350420cb (Check & fix styling)
=======
return new class extends XotBaseMigration
{
>>>>>>> .merge_file_yQ1dl4
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
<<<<<<< .merge_file_toJAuD
<<<<<<< HEAD
<<<<<<< .merge_file_i9zNTW
=======
>>>>>>> .merge_file_yQ1dl4
            if ($this->getColumnType('model_id') === 'uuid') {
                $table->string('model_id', 36)->index()->change();
            }
            if ($this->getColumnType('role_id') === 'uuid') {
<<<<<<< .merge_file_toJAuD
=======
=======
>>>>>>> 350420cb (Check & fix styling)
            if ('uuid' === $this->getColumnType('model_id')) {
                $table->string('model_id', 36)->index()->change();
            }
            if ('uuid' === $this->getColumnType('role_id')) {
<<<<<<< HEAD
>>>>>>> .merge_file_GLH6Rk
=======
>>>>>>> 350420cb (Check & fix styling)
=======
>>>>>>> .merge_file_yQ1dl4
                $table->integer('role_id')->index()->change();
            }
            $this->updateTimestamps($table);
        });
    }
};
