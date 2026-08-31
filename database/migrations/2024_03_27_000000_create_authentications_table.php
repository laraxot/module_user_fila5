<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\Authentication;
use Modules\Xot\Database\Migrations\XotBaseMigration;

<<<<<<< HEAD
return new class() extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> laraxot/dev
    protected ?string $model_class = Authentication::class;

    public function up(): void
    {
        $this->tableCreate(function (Blueprint $table): void {
            $table->id();
            $table->string('type');
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->json('location')->nullable();
        });

        $this->tableUpdate(function (Blueprint $table): void {
            $this->updateTimestamps($table, false);
        });
    }
};
