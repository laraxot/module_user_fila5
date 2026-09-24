<?php

declare(strict_types=1);
<<<<<<< .merge_file_0EZElo
<<<<<<< HEAD
<<<<<<< .merge_file_XBTWvN

=======
>>>>>>> .merge_file_D8uNY9
=======
<<<<<<< .merge_file_r2VQpT

=======
<<<<<<< .merge_file_OHAwcT

=======
>>>>>>> .merge_file_xg1CZp
>>>>>>> .merge_file_ADwD8m
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_nnRqYq
use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\User;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    protected ?string $model_class = User::class;

    public function up(): void
    {
        // Add the `lang` column to the users table when it is missing.
        $this->tableUpdate(function (Blueprint $table): void {
            if (! $this->hasColumn('lang')) {
                $table->string('lang', 5)->nullable();
            }
        });
    }
};
