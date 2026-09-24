<?php

declare(strict_types=1);
<<<<<<< .merge_file_ZmSptz
<<<<<<< HEAD
<<<<<<< .merge_file_TfDAzh
=======
>>>>>>> .merge_file_OgWRJA
use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
<<<<<<< .merge_file_ZmSptz
=======

=======
>>>>>>> 350420cb (Check & fix styling)
use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
<<<<<<< HEAD
>>>>>>> .merge_file_nfyzfi
=======
>>>>>>> 350420cb (Check & fix styling)
=======
>>>>>>> .merge_file_OgWRJA
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
<<<<<<< .merge_file_ZmSptz
<<<<<<< HEAD
<<<<<<< .merge_file_TfDAzh
            if ($this->getColumnType('id') === 'uuid') {
=======
            if ('uuid' === $this->getColumnType('id')) {
>>>>>>> .merge_file_nfyzfi
=======
            if ('uuid' === $this->getColumnType('id')) {
>>>>>>> 350420cb (Check & fix styling)
=======
            if ($this->getColumnType('id') === 'uuid') {
>>>>>>> .merge_file_OgWRJA
                $table->dropColumn('id');
            }
            if (! $this->hasColumn('id')) {
                $table->id();
            }
        });
    }
};
