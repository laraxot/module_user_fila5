<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

<<<<<<< .merge_file_fvVHiL
return new class extends XotBaseMigration {
=======
return new class extends XotBaseMigration
{
>>>>>>> .merge_file_BpHe86
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $xot = XotData::make();
        $userClass = $xot->getUserClass();
        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table) use ($userClass): void {
            // $table->uuid('id')->primary();
            $table->id();
            $table->foreignIdFor($userClass, 'user_id');
            $table->string('provider');
            $table->string('provider_id');
            $table->text('token')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('avatar')->nullable();

            /*
             * $table->unique([
             * 'provider',
             * 'provider_id',
             * ]);
             */
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // if (! $this->hasColumn('email')) {
            //    $table->string('email')->nullable();
            // }
<<<<<<< .merge_file_fvVHiL
            if ('varchar' === $this->getColumnType('token')) {
=======
            if ($this->getColumnType('token') === 'varchar') {
>>>>>>> .merge_file_BpHe86
                $table->text('token')->nullable()->change();
            }
            $this->updateTimestamps($table);

            // $this->updateUser($table);
        });
    }
};
