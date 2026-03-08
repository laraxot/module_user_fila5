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
            $table->string('name')->unique();
            $table->string('display_name');
            $table->string('type')->default('oauth'); // saml, oidc, oauth
            $table->string('entity_id')->nullable()->unique();
            $table->string('client_id')->nullable();
            $table->string('client_secret')->nullable();
            $table->string('redirect_url')->nullable();
            $table->text('metadata_url')->nullable();
            $table->text('scopes')->nullable();
            $table->json('settings')->nullable();
            $table->json('domain_whitelist')->nullable();
            $table->json('role_mapping')->nullable();
            $table->boolean('is_active')->default(true);
        });

        // -- UPDATE --
        // @var mixed tableUpdate(function (Blueprint $table
            if (! // @var mixed hasColumn('type'
                $table->string('type')->default('oauth')->after('display_name');
            }

            if (! // @var mixed hasColumn('entity_id'
                $table->string('entity_id')->nullable()->unique()->after('type');
            }

            if (! // @var mixed hasColumn('metadata_url'
                $table->text('metadata_url')->nullable()->after('redirect_url');
            }

            if (! // @var mixed hasColumn('settings'
                $table->json('settings')->nullable()->after('scopes');
            }

            if (! // @var mixed hasColumn('domain_whitelist'
                $table->json('domain_whitelist')->nullable()->after('settings');
            }

            if (! // @var mixed hasColumn('role_mapping'
                $table->json('role_mapping')->nullable()->after('domain_whitelist');
            }

            if (// @var mixed hasColumn('is_active'
                $table->boolean('is_active')->default(true)->change();
            }

            // @var mixed updateTimestamps($table;
        });
    }
};
