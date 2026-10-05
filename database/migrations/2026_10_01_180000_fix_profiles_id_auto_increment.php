<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\Profile;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    protected string $table = 'profiles';
    protected ?string $model_class = Profile::class;

    public function up(): void
    {
        $this->tableUpdate(function (Blueprint $table): void {
            if ($this->hasColumn('id')) { $table->dropPrimary(['id']); $table->bigIncrements('id')->change()->primary(); }
            else { $table->bigIncrements('id')->primary(); }
            if (! $this->hasColumn('uuid')) { $table->string('uuid', 36)->index()->nullable(); }
        });
    }

    public function down(): void
    {
        $this->tableUpdate(function (Blueprint $table): void {
            if ($this->hasColumn('id')) { $table->dropPrimary(['id']); $table->uuid('id')->primary(); }
        });
    }
};