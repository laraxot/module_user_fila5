<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\OauthClient;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
    public function up(): void
    {
        // @var mixed tableCreate(static function (Blueprint $table
            $table->uuid('id')->primary();
            // $table->unsignedBigInteger('client_id');
            // $table->uuid('client_id');
            $table->foreignIdFor(OauthClient::class, 'client_id');
        });

        // -- UPDATE --
        // @var mixed tableUpdate(function (Blueprint $table
            // if (! // @var mixed hasColumn('uuid'
            //    $table->uuid('uuid')->nullable();
            // }

            // @var mixed updateUser($table;
            // @var mixed updateTimestamps($table, false;
        });
    }
};
