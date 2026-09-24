<?php

declare(strict_types=1);
<<<<<<< .merge_file_jCNFj0
<<<<<<< HEAD
<<<<<<< .merge_file_SJwWnc

=======
>>>>>>> .merge_file_5xUWD1
=======
<<<<<<< .merge_file_srEgzu

=======
<<<<<<< .merge_file_Q8qFmb

=======
>>>>>>> .merge_file_REPung
>>>>>>> .merge_file_RNzmj5
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_v0OY8N
use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
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
            if ($this->getColumnType('id') === 'uuid') {
                $table->dropColumn('id');
            }
            if (! $this->hasColumn('id')) {
                $table->id();
            }
        });
    }
};
