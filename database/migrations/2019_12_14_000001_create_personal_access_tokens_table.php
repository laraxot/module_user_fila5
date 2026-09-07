<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
    /**
     * Run the migrations.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return void
     */
    public function up()
=======
     */
    public function up(): void
>>>>>>> 2024e2e7 (.)
=======
     */
    public function up(): void
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
                // if (! $this->hasColumn('email')) {
=======
                // if (! $this->hasColumn('email'
>>>>>>> 2024e2e7 (.)
=======
                // if (! $this->hasColumn('email'
>>>>>>> f589f9b2 (.)
                //    $table->string('email')->nullable();
                // }
            }
        );
    }
};
