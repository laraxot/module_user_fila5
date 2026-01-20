<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
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
<<<<<<< HEAD
            // ponytail: timestamps solo in tableUpdate via updateTimestamps() (regola XotBaseMigration)
=======
            // $table->timestamp('created_at')->nullable();
            $this->timestamps($table);
>>>>>>> f548be94 (.)
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
<<<<<<< HEAD
            $this->updateTimestamps($table);
            // if (! $this->hasColumn('email'))
            //    $table->string('email')->nullable();
            // }
            // $this->updateUser($table);
            if ('uuid' === $this->getColumnType('id')) {
                $table->dropColumn('id');
            }
            if (! $this->hasColumn('id')) {
=======
            // if (! $this->hasColumn('email')) {
            //    $table->string('email')->nullable();
            // }
            // $this->updateUser($table);
            if ($this->getColumnType('id') === 'uuid') {
                $table->dropColumn('id');
            }
            if (!$this->hasColumn('id')) {
>>>>>>> f548be94 (.)
                $table->id();
            }
        });
    }
};
