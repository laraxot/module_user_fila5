<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
    /**
     * Run the migrations.
<<<<<<< HEAD
     */
    public function up(): void
=======
     *
     * @return void
     */
    public function up()
>>>>>>> 60a2c9a9 (.)
    {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->morphs('tokenable');
                $table->string('name');
                $table->string('token', 64)->unique();
                $table->text('abilities')->nullable();
                $table->timestamp('last_used_at')->nullable();
                $table->timestamp('expires_at')->nullable();
            });

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
<<<<<<< HEAD
                // if (! $this->hasColumn('email'
=======
                // if (! $this->hasColumn('email')) {
>>>>>>> 60a2c9a9 (.)
                //    $table->string('email')->nullable();
                // }
            }
        );
    }
};
