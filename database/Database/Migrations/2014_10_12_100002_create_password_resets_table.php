<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_TfDAzh
use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
=======
=======
>>>>>>> laraxot/dev

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
<<<<<<< HEAD
>>>>>>> .merge_file_nfyzfi
=======
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
<<<<<<< .merge_file_TfDAzh
            if ($this->getColumnType('id') === 'uuid') {
=======
            if ('uuid' === $this->getColumnType('id')) {
>>>>>>> .merge_file_nfyzfi
=======
            if ('uuid' === $this->getColumnType('id')) {
>>>>>>> laraxot/dev
                $table->dropColumn('id');
            }
            if (! $this->hasColumn('id')) {
                $table->id();
            }
        });
    }
};
