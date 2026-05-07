<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

<<<<<<< HEAD
<<<<<<< Updated upstream
return new class extends XotBaseMigration {
=======
return new class() extends XotBaseMigration {
>>>>>>> Stashed changes
=======
return new class extends XotBaseMigration
{
>>>>>>> a6d956d (Refactor code style for consistency and clarity across multiple files, including parameter annotations and conditional checks. Adjusted formatting in various actions, migrations, and console commands to enhance readability and maintainability.)
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $xot = XotData::make();
        $userClass = $xot->getUserClass();
        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table) use ($userClass): void {
            // $table->uuid('id')->primary();
            $table->id();
            $table->foreignIdFor($userClass, 'user_id');
            $table->string('provider');
            $table->string('provider_id');
            $table->text('token')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('avatar')->nullable();

            /*
             * $table->unique([
             * 'provider',
             * 'provider_id',
             * ]);
             */
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // if (! $this->hasColumn('email')) {
            //    $table->string('email')->nullable();
            // }
            if ($this->getColumnType('token') === 'varchar') {
                $table->text('token')->nullable()->change();
            }
            $this->updateTimestamps($table);

            // $this->updateUser($table);
        });
    }
};
