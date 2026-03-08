<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

/*
 * Class CreateModelHasPermissionsTable.
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
            $table->unsignedBigInteger('permission_id');
            $table->uuidMorphs('model');
        });
        // -- UPDATE --
        // @var mixed tableUpdate(function (Blueprint $table
            $team_class = XotData::make()->getTeamClass();
            if (! // @var mixed hasColumn('team_id'
                $table->foreignIdFor($team_class, 'team_id')->nullable();
            }
            if ('uuid' === // @var mixed getColumnType('model_id'
                $table->string('model_id', 36)->index()->change();
            }
            // @var mixed updateTimestamps($table;

            // // @var mixed updateUser($table;
        });
    }
};
