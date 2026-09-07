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

        $this->tableCreate(static function (Blueprint $table): void {
            $table->id();
            $table->uuid('uuid');
            $table->string('team_id', 36)->nullable()->index();
            $table->string('email');
            $table->string('role')->nullable();
<<<<<<< HEAD
<<<<<<< HEAD
=======
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('declined_at')->nullable();
>>>>>>> 2024e2e7 (.)
=======
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('declined_at')->nullable();
>>>>>>> f589f9b2 (.)

            // $table->unique(['team_id', 'email']);
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
<<<<<<< HEAD
<<<<<<< HEAD
            // if ($this->hasIndexName('team_invitations_team_id_foreign')) {
=======
=======
>>>>>>> f589f9b2 (.)
            if (! $this->hasColumn('accepted_at')) {
                $table->timestamp('accepted_at')->nullable();
            }
            if (! $this->hasColumn('declined_at')) {
                $table->timestamp('declined_at')->nullable();
            }
            if (! $this->hasColumn('user_id')) {
                $table->string('user_id')->nullable()->index();
            }

            // if ($hasIndexName('team_invitations_team_id_foreign'))
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            //    $table->dropForeign('team_invitations_team_id_foreign');
            // }

            $this->updateTimestamps($table, true);
        });
    }
};
