<?php

declare(strict_types=1);

use Modules\Xot\Database\Migrations\XotBaseMigration;

<<<<<<< HEAD
return new class() extends XotBaseMigration
{
=======
return new class extends XotBaseMigration {
>>>>>>> laraxot/dev
    /**
     * Run the migrations.
     */
    public function up(): void
    {
<<<<<<< HEAD
        // `config()` restituisce mixed: i tipi si restringono a runtime con guard che
        // servono davvero (una config assente qui è un errore di deploy, non un caso
        // di tipo da annotare), non con `@var` inline.
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        $teams = config('permission.teams');

        if (! \is_array($tableNames) || $tableNames === []) {
            throw new Exception('Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.');
        }

        if (! \is_array($columnNames)) {
=======
        /**
         * @var array<string, string|null> $tableNames
         */
        $tableNames = config('permission.table_names');
        /**
         * @var array<string, string|null> $columnNames
         */
        $columnNames = config('permission.column_names');
        /**
         * @var array<string, mixed>|null $teams
         */
        $teams = config('permission.teams');

        if (empty($tableNames)) {
>>>>>>> laraxot/dev
            throw new Exception('Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.');
        }

        if ($teams && empty($columnNames['team_foreign_key'] ?? null)) {
            throw new Exception('Error: team_foreign_key on config/permission.php not loaded. Run [php artisan config:clear] and try again.');
        }

<<<<<<< HEAD
        $cacheStore = config('permission.cache.store');
        $cacheKey = config('permission.cache.key');

        try {
            // Verifica se l'applicazione è completamente inizializzata
            if (\is_string($cacheKey) && app()->bound('cache')) {
                $store = \is_string($cacheStore) && $cacheStore !== 'default' ? $cacheStore : null;
                app('cache')->store($store)->forget($cacheKey);
=======
        /**
         * @var string|null $cache_store
         */
        $cache_store = config('permission.cache.store');

        /**
         * @var string $cache_key
         */
        $cache_key = config('permission.cache.key');

        try {
            // Verifica se l'applicazione è completamente inizializzata
            if (app()->bound('cache')) {
                app('cache')->store('default' !== $cache_store ? $cache_store : null)->forget($cache_key);
>>>>>>> laraxot/dev
            }
        } catch (Exception $e) {
            // Silently ignore cache errors during package discovery
            // echo $e->getMessage();
        }
    }

    /* -- is in xotbasemigration
     * public function down(): void
     * {
     * $tableNames = config('permission.table_names');
     *
     * if (empty($tableNames)) {
     * throw new Exception('Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
     * }
     *
     * Schema::drop($tableNames['role_has_permissions']);
     * Schema::drop($tableNames['model_has_roles']);
     * Schema::drop($tableNames['model_has_permissions']);
     * Schema::drop($tableNames['roles']);
     * Schema::drop($tableNames['permissions']);
     * }
     */
};
