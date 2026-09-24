<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\Xot\Database\Migrations\XotBaseMigration;
=======

use Modules\Xot\Database\Migrations\XotBaseMigration;
use Webmozart\Assert\Assert;
>>>>>>> 350420cb (Check & fix styling)

return new class extends XotBaseMigration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
<<<<<<< HEAD
        $cache_key = config('permission.cache.key');

        try {
            // Verifica se l'applicazione è completamente inizializzata
            if (app()->bound('cache') && is_string($cache_key)) {
                $store = config('permission.cache.store');
                app('cache')->store(is_string($store) ? $store : null)->forget($cache_key);
=======
        /**
         * @var array<string, string> $tableNames
         */
        $tableNames = config('permission.table_names');
        Assert::isArray($tableNames);
        /**
         * @var array<string, string> $columnNames
         */
        $columnNames = config('permission.column_names');
        Assert::isArray($columnNames);
        /**
         * @var bool $teams
         */
        $teams = config('permission.teams');
        Assert::boolean($teams);

        if (empty($tableNames)) {
            throw new Exception('Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.');
        }

        if ($teams && empty($columnNames['team_foreign_key'] ?? null)) {
            throw new Exception('Error: team_foreign_key on config/permission.php not loaded. Run [php artisan config:clear] and try again.');
        }

        /**
         * @var string|null $cache_store
         */
        $cache_store = config('permission.cache.store');
        Assert::nullOrString($cache_store);

        /**
         * @var string $cache_key
         */
        $cache_key = config('permission.cache.key');
        Assert::string($cache_key);

        try {
            // Verifica se l'applicazione è completamente inizializzata
            if (app()->bound('cache')) {
                app('cache')->store('default' !== $cache_store ? $cache_store : null)->forget($cache_key);
>>>>>>> 350420cb (Check & fix styling)
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
