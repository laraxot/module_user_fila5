<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

return new class extends XotBaseMigration {
    public function up(): void
    {
        // @var mixed tableCreate(static function (Blueprint $table
            // $table->bigIncrements('id');
            $table->uuid('id')->primary();
            // $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->foreignIdFor(XotData::make()->getUserClass(), 'user_id')->nullable()->index();
            $table->string('name');
            $table->string('secret', 100)->nullable();
            $table->string('provider')->nullable();
            $table->text('redirect');
            $table->boolean('personal_access_client');
            $table->boolean('password_client');
            $table->boolean('revoked');
        });

        // -- UPDATE --
        // @var mixed tableUpdate(function (Blueprint $table
            if ('string' !== // @var mixed getColumnType('id'
                $table->uuid('id')->change(); // is  just primary
            }
            // @var mixed updateTimestamps($table, false;
            // @var mixed updateUser($table;
        });
    }
};
