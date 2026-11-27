<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Database\Migrations;

use Modules\User\Models\SocialiteUser;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\exec;
use function Safe\file_get_contents;
use function Safe\preg_match;

uses(TestCase::class);

/**
 * Path of the single `*_create_{table}_table.php` migration that owns a table of the User module.
 *
 * The name is derived from the model (`User` is `users`, `SocialiteUser` is `socialite_users`) and
 * never pinned to a timestamp: the owner of `users` was already renamed once, from
 * `2026_11_12_120000` to `2026_11_17_114812`, without changing what it guards.
 */
function ownerMigrationOf(string $table): string
{
    $suffix = '_create_'.$table.'_table.php';
    $owners = array_values(array_filter(
        userMigrationFiles(),
        static fn (string $file): bool => str_ends_with($file, $suffix),
    ));

    Assert::assertCount(
        1,
        $owners,
        'Exactly one owner migration expected for `'.$table.'`, found: '.implode(', ', array_map('basename', $owners)),
    );

    return $owners[0];
}

/**
 * Guards the User module migrations: one owner migration per model, no leftovers of the
 * migrations folded into it, no merge conflict markers, valid PHP syntax.
 *
 * Single file by design: the copy in `tests/Feature/Database/migrations/` (lowercase) was merged
 * here, where PSR-4 places the `...\Database\Migrations` namespace.
 *
 * @see Modules/User/docs/migration-consolidation.md
 * @see Modules/Xot/docs/stories/case-only-duplicate-directories.story.md
 */
describe('User Migration Syntax', function (): void {
    test('users table is owned by one migration that stamps timestamps with soft deletes', function (): void {
        $contents = file_get_contents(ownerMigrationOf('users'));

        Assert::assertStringContainsString(
            '$this->updateTimestamps(table: $table, hasSoftDeletes: true);',
            $contents,
        );
        Assert::assertStringNotContainsString('$table->softDeletes();', $contents);
    });

    test('socialite_users table is owned by one migration bound to the SocialiteUser model', function (): void {
        $contents = file_get_contents(ownerMigrationOf('socialite_users'));

        Assert::assertStringContainsString('protected ?string $model_class = SocialiteUser::class;', $contents);
        Assert::assertStringContainsString('$this->updateTimestamps($table);', $contents);
    });

    test('socialite user model lives on the user connection', function (): void {
        $connectionName = (new SocialiteUser())->getConnectionName();

        Assert::assertSame('user', $connectionName);
    });

    test('migrations replaced by an owner migration no longer exist', function (string $replacedMigration): void {
        $path = module_path('User', 'database/migrations/'.$replacedMigration);

        Assert::assertFileDoesNotExist($path);
    })->with([
        'repair_users_deleted_at_column' => '2026_11_12_000002_repair_users_deleted_at_column.php',
        'repair_users_type_state_columns' => '2026_10_22_000001_repair_users_type_state_columns.php',
        'add_digital_identity_columns_to_users_table' => '2026_11_11_000001_add_digital_identity_columns_to_users_table.php',
        'add_lang_column' => '2026_02_13_172135_add_lang_column.php',
        'create_socialite_user_table' => '2023_01_01_000003_create_socialite_user_table.php',
    ]);

    test('user migrations do not contain merge conflict markers', function (): void {
        $offenders = [];

        foreach (userMigrationFiles() as $migrationFile) {
            if (preg_match('/^(<{7,}|={7}|>{7,})( |$)/m', file_get_contents($migrationFile)) === 1) {
                $offenders[] = basename($migrationFile);
            }
        }

        Assert::assertSame([], $offenders, 'Merge conflict markers found in the listed migrations');
    });

    test('user migrations have valid php syntax', function (): void {
        $failures = [];

        foreach (userMigrationFiles() as $migrationFile) {
            $output = [];
            $exitCode = 0;

            exec('php -l '.escapeshellarg($migrationFile), $output, $exitCode);

            if ($exitCode !== 0) {
                $failures[basename($migrationFile)] = implode(PHP_EOL, array_filter($output ?? [], 'is_string'));
            }
        }

        Assert::assertSame([], $failures, 'php -l failed on the listed migrations');
    });
});
