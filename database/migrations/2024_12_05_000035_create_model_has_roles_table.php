<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\Schema;
// ---- models ---
use Modules\User\Models\Role;
=======
// ---- models ---
>>>>>>> 2024e2e7 (.)
=======
// ---- models ---
>>>>>>> f589f9b2 (.)
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

/*
 * Class CreateModelHasRolesTable.
 */
<<<<<<< HEAD
<<<<<<< HEAD
return new class extends XotBaseMigration {
=======
return new class extends XotBaseMigration
{
>>>>>>> 2024e2e7 (.)
=======
return new class extends XotBaseMigration
{
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
            if (!$this->hasColumn('team_id')) {
=======
            if (! $this->hasColumn('team_id')) {
>>>>>>> 2024e2e7 (.)
=======
            if (! $this->hasColumn('team_id')) {
>>>>>>> f589f9b2 (.)
                $table->foreignIdFor($team_class, 'team_id')->nullable();
            }
            if ($this->getColumnType('model_id') === 'uuid') {
                $table->string('model_id', 36)->index()->change();
            }
            if ($this->getColumnType('role_id') === 'uuid') {
                $table->integer('role_id')->index()->change();
            }
            $this->updateTimestamps($table);
        });
    }
};
