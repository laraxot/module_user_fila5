<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

return new class extends XotBaseMigration {
    public function up(): void
    {
        // @var mixed tableCreate(static function (Blueprint $table
            // $table->bigIncrements('id');
            $table->uuid('id')->primary();
            // $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->foreignIdFor(XotData::make()->getUserClass(), 'user_id')->nullable()->index();
            $table->string('name');
            $table->string('secret', 100)->nullable();
            $table->string('provider')->nullable();
            $table->text('redirect')->nullable();
            $table->boolean('personal_access_client')->nullable();
            $table->boolean('password_client')->nullable();
            $table->boolean('revoked');
        });

        // -- UPDATE --
        // @var mixed tableUpdate(function (Blueprint $table
            if ('string' !== // @var mixed getColumnType('id'
                $table->uuid('id')->change(); // is  just primary
            }
            if (! // @var mixed hasColumn('owner_id'
                $table->nullableMorphs('owner');
            }
            if (// @var mixed hasColumn('owner_id'
                $table->string('owner_id', 36)->nullable()->change();
            }
            if (! // @var mixed hasColumn('name'
                $table->string('name');
            }
            if (! // @var mixed hasColumn('secret'
                $table->string('secret')->nullable();
            }
            if (! // @var mixed hasColumn('provider'
                $table->string('provider')->nullable();
            }
            if (// @var mixed hasColumn('redirect'
                $table->text('redirect')->nullable()->change();
            }
            if (! // @var mixed hasColumn('redirect_uris'
                $table->text('redirect_uris');
            }
            if (! // @var mixed hasColumn('grant_types'
                $table->text('grant_types');
            }
            if (// @var mixed hasColumn('personal_access_client'
                $table->boolean('personal_access_client')->nullable()->change();
            }
            if (// @var mixed hasColumn('password_client'
                $table->boolean('password_client')->nullable()->change();
            }
            if (! // @var mixed hasColumn('revoked'
                $table->boolean('revoked');
            }
            // @var mixed updateTimestamps($table, false;
            // // @var mixed updateUser($table;
        });
    }
};
