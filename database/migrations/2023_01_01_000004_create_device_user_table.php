<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\Device;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

<<<<<<< HEAD
<<<<<<< HEAD
return new class extends XotBaseMigration {
=======
return new class extends XotBaseMigration
{
>>>>>>> 2024e2e7 (.)
=======
return new class extends XotBaseMigration
{
>>>>>>> f589f9b2 (.)
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(function (Blueprint $table): void {
            $user_class = XotData::make()->getUserClass();
            $table->id('id');
            $table->foreignIdFor(Device::class, 'device_id')->index();
            $table->foreignIdFor($user_class, 'user_id')->index();
            $table->dateTime('login_at')->nullable();
            $table->dateTime('logout_at')->nullable();
        });
        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
<<<<<<< HEAD
<<<<<<< HEAD
            if (!$this->hasColumn('push_notifications_token')) {
                $table->string('push_notifications_token')->nullable();
            }

            if (!$this->hasColumn('push_notifications_enabled')) {
=======
=======
>>>>>>> f589f9b2 (.)
            if (! $this->hasColumn('push_notifications_token')) {
                $table->string('push_notifications_token')->nullable();
            }

            if (! $this->hasColumn('push_notifications_enabled')) {
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
                $table->boolean('push_notifications_enabled')->nullable();
            }
            // -- change
            if ($this->hasColumn('device_id')) {
                $table->string('device_id', 36)->nullable()->change();
            }
<<<<<<< HEAD
<<<<<<< HEAD
            // dddx($this->getColumnType('device_id'));//varchar
=======
            // dddx($getColumnType('device_id');//varchar)
>>>>>>> 2024e2e7 (.)
=======
            // dddx($getColumnType('device_id');//varchar)
>>>>>>> f589f9b2 (.)
            if ($this->getColumnType('user_id') === 'uuid') {
                $table->string('user_id', 36)->nullable()->change();
            }

            $this->updateTimestamps($table);
        });
    }
};
