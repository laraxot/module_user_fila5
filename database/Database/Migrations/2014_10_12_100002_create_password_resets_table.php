<?php

declare(strict_types=1);
<<<<<<< .merge_file_5OgyJn
<<<<<<< HEAD
<<<<<<< .merge_file_5qWbWO
=======
<<<<<<< .merge_file_TfDAzh
=======
>>>>>>> .merge_file_ArnY9L
use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
<<<<<<< .merge_file_5OgyJn
=======
>>>>>>> .merge_file_WN8ZMH
=======
>>>>>>> df2ba808 (.)

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
<<<<<<< HEAD
<<<<<<< .merge_file_5qWbWO
=======
>>>>>>> .merge_file_nfyzfi
>>>>>>> .merge_file_WN8ZMH
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_ArnY9L
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(function (Blueprint $table): void {
            $table->id();
            $table->string('uuid', 36)->nullable()->index();
            $table->string('email')->index();
            $table->string('token');
            // $table->timestamp('created_at')->nullable();
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            $this->updateTimestamps($table);
            // if (! $this->hasColumn('email')) {
            //    $table->string('email')->nullable();
            // }
            // $this->updateUser($table);
<<<<<<< .merge_file_5OgyJn
<<<<<<< HEAD
<<<<<<< .merge_file_5qWbWO
            if ('uuid' === $this->getColumnType('id')) {
=======
<<<<<<< .merge_file_TfDAzh
            if ($this->getColumnType('id') === 'uuid') {
=======
            if ('uuid' === $this->getColumnType('id')) {
>>>>>>> .merge_file_nfyzfi
>>>>>>> .merge_file_WN8ZMH
=======
            if ('uuid' === $this->getColumnType('id')) {
>>>>>>> df2ba808 (.)
=======
            if ($this->getColumnType('id') === 'uuid') {
>>>>>>> .merge_file_ArnY9L
                $table->dropColumn('id');
            }
            if (! $this->hasColumn('id')) {
                $table->id();
            }
        });
    }
};
