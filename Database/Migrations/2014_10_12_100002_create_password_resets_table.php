<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

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
        // -- CREATE --
        $this->tableCreate(function (Blueprint $table): void {
            $table->id();
            $table->string('uuid', 36)->nullable()->index();
            $table->string('email')->index();
            $table->string('token');
            // $table->timestamp('created_at')->nullable();
            $this->timestamps($table);
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // if (! $this->hasColumn('email')) {
            //    $table->string('email')->nullable();
            // }
            // $this->updateUser($table);
            if ($this->getColumnType('id') === 'uuid') {
                $table->dropColumn('id');
            }
            if (! $this->hasColumn('id')) {
                $table->id();
            }
        });
    }
};
