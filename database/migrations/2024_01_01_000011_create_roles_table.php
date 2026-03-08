<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/*
 * Class CreateRolesTable.
 */
return new class extends XotBaseMigration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        // @var mixed tableCreate(static function (Blueprint $table
            $table->id();
            $table->foreignId('team_id')->nullable()->index();
            $table->string('name');
            $table->string('guard_name')->default('web');
            $table->string('display_name')->nullable();
            $table->text('description')->nullable();
        });
        // -- UPDATE --
        // @var mixed tableUpdate(function (Blueprint $table
            if (! // @var mixed hasColumn('id'
                $table->id();
            }
            if (! // @var mixed hasColumn('team_id'
                $table->foreignId('team_id')->nullable()->index();
            }
            if (! // @var mixed hasColumn('display_name'
                $table->string('display_name')->nullable();
            }
            if (! // @var mixed hasColumn('description'
                $table->text('description')->nullable();
            }
            // @var mixed updateTimestamps($table;
        });
    }
};
