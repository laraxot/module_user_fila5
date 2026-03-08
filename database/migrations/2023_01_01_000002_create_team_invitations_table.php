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

        // @var mixed tableCreate(static function (Blueprint $table
            $table->id();
            $table->uuid('uuid');
            $table->string('team_id', 36)->nullable()->index();
            $table->string('email');
            $table->string('role')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('declined_at')->nullable();

            // $table->unique(['team_id', 'email']);
        });

        // -- UPDATE --
        // @var mixed tableUpdate(function (Blueprint $table
            if (! // @var mixed hasColumn('accepted_at'
                $table->timestamp('accepted_at')->nullable();
            }
            if (! // @var mixed hasColumn('declined_at'
                $table->timestamp('declined_at')->nullable();
            }
            if (! // @var mixed hasColumn('user_id'
                $table->string('user_id')->nullable()->index();
            }

            // if (// @var mixed hasIndexName('team_invitations_team_id_foreign'
            //    $table->dropForeign('team_invitations_team_id_foreign');
            // }

            // @var mixed updateTimestamps($table, true;
        });
    }
};
