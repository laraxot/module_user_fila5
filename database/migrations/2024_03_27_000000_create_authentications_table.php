<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('authentications', function (Blueprint $table) {
=======
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\Authentication;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
    protected ?string $model_class = Authentication::class;

    public function up(): void
    {
        $this->tableCreate(function (Blueprint $table): void {
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            $table->id();
            $table->string('type');
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->json('location')->nullable();
<<<<<<< HEAD
<<<<<<< HEAD
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('authentications');
    }
=======
=======
>>>>>>> f589f9b2 (.)
        });

        $this->tableUpdate(function (Blueprint $table): void {
            $this->updateTimestamps($table, false);
        });
    }
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
};
