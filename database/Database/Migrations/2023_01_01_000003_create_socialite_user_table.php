<?php

declare(strict_types=1);
<<<<<<< .merge_file_UnEi6M
<<<<<<< HEAD
<<<<<<< .merge_file_cAw4BG
=======

>>>>>>> .merge_file_P0A27u
=======
>>>>>>> 350420cb (Check & fix styling)
=======
>>>>>>> .merge_file_9slc6G
use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

<<<<<<< .merge_file_UnEi6M
<<<<<<< HEAD
<<<<<<< .merge_file_cAw4BG
return new class extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> .merge_file_P0A27u
=======
return new class extends XotBaseMigration {
>>>>>>> 350420cb (Check & fix styling)
=======
return new class extends XotBaseMigration
{
>>>>>>> .merge_file_9slc6G
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
<<<<<<< .merge_file_UnEi6M
<<<<<<< HEAD
<<<<<<< .merge_file_cAw4BG
            if ($this->getColumnType('token') === 'varchar') {
=======
            if ('varchar' === $this->getColumnType('token')) {
>>>>>>> .merge_file_P0A27u
=======
            if ('varchar' === $this->getColumnType('token')) {
>>>>>>> 350420cb (Check & fix styling)
=======
            if ($this->getColumnType('token') === 'varchar') {
>>>>>>> .merge_file_9slc6G
                $table->text('token')->nullable()->change();
            }
            $this->updateTimestamps($table);

            // $this->updateUser($table);
        });
    }
};
