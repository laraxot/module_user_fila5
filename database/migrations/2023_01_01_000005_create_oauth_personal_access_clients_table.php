<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\OauthClient;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
    public function up(): void
    {
        $this->tableCreate(static function (Blueprint $table): void {
            $table->uuid('id')->primary();
            // $table->unsignedBigInteger('client_id');
            // $table->uuid('client_id');
            $table->foreignIdFor(OauthClient::class, 'client_id');
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            // if (! $this->hasColumn('uuid'))
=======
            // if (! $this->hasColumn('uuid')) {
>>>>>>> f548be94 (.)
=======
            // if (! $this->hasColumn('uuid')) {
=======
            // if (! $this->hasColumn('uuid'))
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
            // if (! $this->hasColumn('uuid'))
>>>>>>> laraxot/dev
            //    $table->uuid('uuid')->nullable();
            // }

            $this->updateUser($table);
            $this->updateTimestamps($table, false);
        });
    }
};
