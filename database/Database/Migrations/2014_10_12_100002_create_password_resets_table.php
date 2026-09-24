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
>>>>>>> 350420cb (Check & fix styling)
use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
<<<<<<< HEAD
>>>>>>> .merge_file_nfyzfi
=======
>>>>>>> 350420cb (Check & fix styling)
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
>>>>>>> 350420cb (Check & fix styling)
                $table->dropColumn('id');
            }
            if (! $this->hasColumn('id')) {
                $table->id();
            }
        });
    }
};
