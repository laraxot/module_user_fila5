<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\User\Models\Role;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

/*
 * Class CreateModelHasRolesTable.
 */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
return new class extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> f548be94 (.)
=======
return new class extends XotBaseMigration {
=======
return new class extends XotBaseMigration
{
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
return new class extends XotBaseMigration {
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            if (! $this->hasColumn('team_id')) {
=======
            if (!$this->hasColumn('team_id')) {
>>>>>>> f548be94 (.)
=======
            if (!$this->hasColumn('team_id')) {
=======
            if (! $this->hasColumn('team_id')) {
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
                $table->foreignIdFor($team_class, 'team_id')->nullable();
            }
            if ($this->getColumnType('model_id') === 'uuid') {
                $table->string('model_id', 36)->index()->change();
            }
            if ($this->getColumnType('role_id') === 'uuid') {
=======
            if (! $this->hasColumn('team_id')) {
                $table->foreignIdFor($team_class, 'team_id')->nullable();
            }
            if ('uuid' === $this->getColumnType('model_id')) {
                $table->string('model_id', 36)->index()->change();
            }
            if ('uuid' === $this->getColumnType('role_id')) {
>>>>>>> laraxot/dev
                $table->integer('role_id')->index()->change();
            }
            // $this->updateUser($table);
            $this->updateTimestamps($table);
        });
    }
};
