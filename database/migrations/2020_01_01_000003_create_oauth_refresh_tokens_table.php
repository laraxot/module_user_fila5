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
        // @var mixed tableCreate(static function (Blueprint $table
            $table->string('id', 100)->primary();
            // $table->string('access_token_id', 100)->index();
            $table->foreignIdFor(OauthAccessToken::class, 'access_token_id')->index();
            $table->boolean('revoked');
            $table->dateTime('expires_at')->nullable();
        });

        // -- UPDATE --
        // @var mixed tableUpdate(function (Blueprint $table
            // if (! // @var mixed hasColumn('email'
            //    $table->string('email')->nullable();
            // }
            // @var mixed updateUser($table;
        });
    }
};
