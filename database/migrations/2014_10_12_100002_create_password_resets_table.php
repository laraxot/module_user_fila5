<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        // @var mixed tableCreate(function (Blueprint $table
            $table->id();
            $table->string('uuid', 36)->nullable()->index();
            $table->string('email')->index();
            $table->string('token');
            // $table->timestamp('created_at')->nullable();
            // @var mixed timestamps($table;
        });

        // -- UPDATE --
        // @var mixed tableUpdate(function (Blueprint $table
            // if (! // @var mixed hasColumn('email'
            //    $table->string('email')->nullable();
            // }
            // // @var mixed updateUser($table;
            if ('uuid' === // @var mixed getColumnType('id'
                $table->dropColumn('id');
            }
            if (! // @var mixed hasColumn('id'
                $table->id();
            }
        });
    }
};
