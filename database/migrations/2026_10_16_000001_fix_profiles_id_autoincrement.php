<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Fresh installs: the oldest profiles migration creates `id` as char(36) without a default,
 * and the newer one (bigint auto-increment) is skipped because the table already exists.
 * Profile creation at first login then fails. Converts the column only when it is still a
 * string type and the table is empty; otherwise it does nothing.
 */
<<<<<<< .merge_file_1NnfLj
return new class extends Migration {
    // No hardcoded `protected $connection = 'user'`: on a fresh install where the optional 'user'
    // connection has no database configured (see config/database.php), that would eagerly connect
    // to its placeholder-less mysql default and fail. Resolve it the same way XotBaseMigration does.
    public function getConnection(): ?string
=======
<<<<<<< .merge_file_4HgXIV
return new class extends Migration
{
    protected $connection = 'user';

=======
return new class() extends Migration
{
>>>>>>> .merge_file_tlA1ka
    public function up(): void
>>>>>>> .merge_file_j0Yg1x
    {
        if (! DB::connection('user')->getDatabaseName()) {
            $default = config('database.default');

            return is_string($default) ? $default : 'mariadb';
        }

<<<<<<< .merge_file_1NnfLj
        return 'user';
    }

    public function up(): void
    {
        $connection = $this->getConnection() ?? 'user';
        $schema = Schema::connection($connection);
=======
        // `MODIFY ... AUTO_INCREMENT` esiste solo in MySQL/MariaDB (SQLite dei test: niente da convertire).
        if (! in_array(DB::connection('user')->getDriverName(), ['mysql', 'mariadb'], true)) {
            return;
        }
>>>>>>> .merge_file_j0Yg1x

        if (! $schema->hasTable('profiles')) {
            return;
        }

        $type = $schema->getColumnType('profiles', 'id');
        $empty = DB::connection($connection)->table('profiles')->count() === 0;

        if ($connection === 'user' && in_array($type, ['char', 'varchar', 'string', 'guid', 'uuid'], true) && $empty) {
            DB::connection($connection)->statement('ALTER TABLE profiles MODIFY id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT');
        }
    }

    public function down(): void
    {
        // Intentionally empty: never revert to a non auto-increment id.
    }
};
