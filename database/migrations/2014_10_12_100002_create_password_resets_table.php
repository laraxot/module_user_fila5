<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

<<<<<<< HEAD
return new class() extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> laraxot/dev
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
            // ponytail: timestamps solo in tableUpdate via updateTimestamps() (regola XotBaseMigration)
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            $this->updateTimestamps($table);
            // if (! $this->hasColumn('email'))
            //    $table->string('email')->nullable();
            // }
            // $this->updateUser($table);
<<<<<<< HEAD
            if ($this->getColumnType('id') === 'uuid') {
=======
            if ('uuid' === $this->getColumnType('id')) {
>>>>>>> laraxot/dev
                $table->dropColumn('id');
            }
            if (! $this->hasColumn('id')) {
                $table->id();
            }
        });
    }
};
