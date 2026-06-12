<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Database\Migrations;

use Modules\User\Tests\TestCase;

use function Safe\exec;
use function Safe\file_get_contents;
use function Safe\glob;

/**
 * @return list<string>
 */
function userMigrationFiles(): array
{
    $basePath = dirname(__DIR__, 4).'/database/migrations';
    /** @var list<string> $files */
    $files = glob($basePath.'/*.php');
    sort($files);

    return $files;
}

class UserMigrationSyntaxTest extends TestCase
{
    public function testUserMigrationsDoNotContainMergeConflictMarkers(): void
    {
        foreach (userMigrationFiles() as $migrationFile) {
            $contents = file_get_contents($migrationFile);

            $this->assertStringNotContainsString('<<<<<<<', $contents, $migrationFile);
            $this->assertStringNotContainsString('=======', $contents, $migrationFile);
            $this->assertStringNotContainsString('>>>>>>>', $contents, $migrationFile);
        }
    }

    public function testUserMigrationsHaveValidPhpSyntax(): void
    {
        foreach (userMigrationFiles() as $migrationFile) {
            $output = [];
            $exitCode = 0;

            exec('php -l '.escapeshellarg($migrationFile), $output, $exitCode);

            /* @var list<string> $output */
            $this->assertSame(0, $exitCode, implode(PHP_EOL, $output ?? []));
        }
    }
}
