<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_iFRRRX

=======
<<<<<<< .merge_file_cAw4BG
=======

>>>>>>> .merge_file_P0A27u
>>>>>>> .merge_file_NJV0zg
=======

>>>>>>> df2ba808 (.)
use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

<<<<<<< HEAD
<<<<<<< .merge_file_iFRRRX
return new class extends XotBaseMigration {
=======
<<<<<<< .merge_file_cAw4BG
return new class extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> .merge_file_P0A27u
>>>>>>> .merge_file_NJV0zg
=======
return new class extends XotBaseMigration {
>>>>>>> df2ba808 (.)
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
<<<<<<< HEAD
<<<<<<< .merge_file_iFRRRX
            if ('varchar' === $this->getColumnType('token')) {
=======
<<<<<<< .merge_file_cAw4BG
            if ($this->getColumnType('token') === 'varchar') {
=======
            if ('varchar' === $this->getColumnType('token')) {
>>>>>>> .merge_file_P0A27u
>>>>>>> .merge_file_NJV0zg
=======
            if ('varchar' === $this->getColumnType('token')) {
>>>>>>> df2ba808 (.)
                $table->text('token')->nullable()->change();
            }
            $this->updateTimestamps($table);

            // $this->updateUser($table);
        });
    }
};
