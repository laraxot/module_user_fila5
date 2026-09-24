<?php

<<<<<<< HEAD
declare(strict_types=1);
/**
 * ---.
 */
=======
/**
 * ---.
 */

declare(strict_types=1);

>>>>>>> 350420cb (Check & fix styling)
use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
    /**
<<<<<<< HEAD
     * Esegue la migrazione.
=======
     * Run the migrations.
>>>>>>> 350420cb (Check & fix styling)
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table): void {
            $table->id();
            $table->uuid('uuid')->nullable()->index();
            $table->string('user_id', 36)->nullable()->index();
            // $table->foreignIdFor(\Modules\Xot\Datas\XotData::make()->getUserClass());
            $table->string('name');
            $table->boolean('personal_team')->default(false);
        });
        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // MySqlConnection::getDoctrineSchemaManager does not exist.
            // MySqlConnection::getSchemaGrammar() ?
<<<<<<< HEAD
            // if ($this->hasIndexName('team_invitations_team_id_foreign')) {
=======
            // if ($hasIndexName('team_invitations_team_id_foreign'))
>>>>>>> 350420cb (Check & fix styling)
            //    $table->dropForeign('team_invitations_team_id_foreign');
            // }
            if ($this->hasColumn('uuid')) {
                $table->uuid('uuid')->nullable()->change();
            }
            if ($this->hasColumn('personal_team')) {
                $table->boolean('personal_team')->default(false)->change();
            }
<<<<<<< HEAD
=======

            if (! $this->hasColumn('code')) {
                $table->string('code', 36)->nullable()->index();
            }
            $this->updateTimestamps($table, true);

            // $this->updateUser($table);
>>>>>>> 350420cb (Check & fix styling)
        });
    }
};
