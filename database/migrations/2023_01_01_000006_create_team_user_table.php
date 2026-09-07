<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

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
            // $table->uuid('id')->primary();
            $table->id();
            $table->foreignId('team_id');
            $table->uuid('user_id')->nullable()->index();
            // $table->foreignIdFor(\Modules\Xot\Datas\XotData::make()->getUserClass());
            $table->string('role')->nullable();

            // $table->unique(['team_id', 'user_id']);
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
<<<<<<< HEAD
<<<<<<< HEAD
            $this->updateTimestamps(
                table: $table,
                hasSoftDeletes: true,
            );
=======
            $this->updateTimestamps(table: $table, hasSoftDeletes: true);
>>>>>>> 2024e2e7 (.)
=======
            $this->updateTimestamps(table: $table, hasSoftDeletes: true);
>>>>>>> f589f9b2 (.)

            // $this->updateUser($table);
        });
    }
};
