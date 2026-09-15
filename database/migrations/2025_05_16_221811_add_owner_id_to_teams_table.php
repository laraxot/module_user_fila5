<?php

declare(strict_types=1);

namespace Modules\User\Database\Migrations;

use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\Team;
use Modules\Xot\Database\Migrations\XotBaseMigration;

<<<<<<< HEAD
return new class extends XotBaseMigration {
=======
<<<<<<< HEAD
return new class extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    protected ?string $model_class = Team::class;

    public function up(): void
    {
        $this->tableUpdate(function (Blueprint $table): void {
            if (! $this->hasColumn('owner_id')) {
                $table->uuid('owner_id')->nullable()->after('id');
            }
        });
    }
};
