<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_aM6lXn

=======
<<<<<<< .merge_file_DKzjsL
=======

>>>>>>> .merge_file_DUkE1E
>>>>>>> .merge_file_B0LqEj
=======

>>>>>>> df2ba808 (.)
use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\Device;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

<<<<<<< HEAD
<<<<<<< .merge_file_aM6lXn
return new class extends XotBaseMigration {
=======
<<<<<<< .merge_file_DKzjsL
return new class extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> .merge_file_DUkE1E
>>>>>>> .merge_file_B0LqEj
=======
return new class extends XotBaseMigration {
>>>>>>> df2ba808 (.)
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
            if (! $this->hasColumn('push_notifications_token')) {
                $table->string('push_notifications_token')->nullable();
            }

            if (! $this->hasColumn('push_notifications_enabled')) {
                $table->boolean('push_notifications_enabled')->nullable();
            }
            // -- change
            if ($this->hasColumn('device_id')) {
                $table->string('device_id', 36)->nullable()->change();
            }
            // dddx($this->getColumnType('device_id'));//varchar
<<<<<<< HEAD
<<<<<<< .merge_file_aM6lXn
            if ('uuid' === $this->getColumnType('user_id')) {
=======
<<<<<<< .merge_file_DKzjsL
            if ($this->getColumnType('user_id') === 'uuid') {
=======
            if ('uuid' === $this->getColumnType('user_id')) {
>>>>>>> .merge_file_DUkE1E
>>>>>>> .merge_file_B0LqEj
=======
            if ('uuid' === $this->getColumnType('user_id')) {
>>>>>>> df2ba808 (.)
                $table->string('user_id', 36)->nullable()->change();
            }

            $this->updateTimestamps($table);
        });
    }
};
