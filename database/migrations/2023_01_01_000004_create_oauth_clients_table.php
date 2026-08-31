<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

<<<<<<< HEAD
return new class() extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> laraxot/dev
    public function up(): void
    {
        $this->tableCreate(static function (Blueprint $table): void {
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
        $this->tableUpdate(function (Blueprint $table): void {
<<<<<<< HEAD
            if ($this->getColumnType('id') !== 'string') {
=======
            if ('string' !== $this->getColumnType('id')) {
>>>>>>> laraxot/dev
                $table->uuid('id')->change(); // is  just primary
            }
            $this->updateTimestamps($table, false);
            $this->updateUser($table);
        });
    }
};
