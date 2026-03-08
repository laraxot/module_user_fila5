<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/*
 * Class CreatePermissionsTable.
 */
return new class extends XotBaseMigration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        // @var mixed tableCreate(static function (Blueprint $table
            $table->bigIncrements('id');
            // permission id
            $table->string('name');
            // For MySQL 8.0 use string('name', 125);
            $table->string('guard_name');
            // For MySQL 8.0 use string('guard_name', 125);
            $table->unique(['name', 'guard_name']);
        });
        // -- UPDATE --
        // @var mixed tableUpdate(function (Blueprint $table
            // // @var mixed updateUser($table;
            // @var mixed updateTimestamps($table;
        });
    }
};
