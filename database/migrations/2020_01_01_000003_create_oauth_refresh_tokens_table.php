<?php

declare(strict_types=1);
<<<<<<< HEAD
use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\OauthAccessToken;
=======

use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\OauthToken;
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table): void {
            $table->string('id', 100)->primary();
            // $table->string('access_token_id', 100)->index();
<<<<<<< HEAD
            $table->foreignIdFor(OauthAccessToken::class, 'access_token_id')->index();
=======
            $table->foreignIdFor(OauthToken::class, 'access_token_id')->index();
>>>>>>> 350420cb (Check & fix styling)
            $table->boolean('revoked');
            $table->dateTime('expires_at')->nullable();
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // if (! $this->hasColumn('email'))
            //    $table->string('email')->nullable();
            // }
            $this->updateUser($table);
        });
    }
};
