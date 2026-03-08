<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\Tenant;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
    protected ?string $model_class = Tenant::class;

    /**
     * Esegue la migrazione.
     */
    public function up(): void
    {
        // -- CREATE --
        // @var mixed tableCreate(static function (Blueprint $table
            $table->string('id')->primary();
            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->string('domain')->nullable();
            $table->string('database')->nullable();
            $table->boolean('is_active')->default(true);
        });

        // -- UPDATE --
        // @var mixed tableUpdate(function (Blueprint $table
            // Aggiungi colonne mancanti se non esistono
            if (! // @var mixed hasColumn('email_address'
                $table->string('email_address')->nullable();
            }
            if (! // @var mixed hasColumn('phone'
                $table->string('phone')->nullable();
            }
            if (! // @var mixed hasColumn('mobile'
                $table->string('mobile')->nullable();
            }
            if (! // @var mixed hasColumn('address'
                $table->text('address')->nullable();
            }
            if (! // @var mixed hasColumn('primary_color'
                $table->string('primary_color')->nullable();
            }
            if (! // @var mixed hasColumn('secondary_color'
                $table->string('secondary_color')->nullable();
            }

            // @var mixed updateTimestamps($table, true;
        });
    }
};
