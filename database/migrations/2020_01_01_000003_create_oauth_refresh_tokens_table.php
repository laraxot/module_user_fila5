<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\OauthAccessToken;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table): void {
            $table->string('id', 100)->primary();
            // $table->string('access_token_id', 100)->index();
            $table->foreignIdFor(OauthAccessToken::class, 'access_token_id')->index();
            $table->boolean('revoked');
            $table->dateTime('expires_at')->nullable();
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
<<<<<<< HEAD
<<<<<<< HEAD
            // if (! $this->hasColumn('email')) {
=======
            // if (! $this->hasColumn('email'))
>>>>>>> 2024e2e7 (.)
=======
            // if (! $this->hasColumn('email'))
>>>>>>> f589f9b2 (.)
            //    $table->string('email')->nullable();
            // }
            $this->updateUser($table);
        });
    }
};
