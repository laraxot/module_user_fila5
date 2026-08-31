<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\User;
use Modules\Xot\Database\Migrations\XotBaseMigration;

<<<<<<< HEAD
return new class() extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> laraxot/dev
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
