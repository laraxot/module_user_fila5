<?php

declare(strict_types=1);

uses(\Modules\User\Tests\TestCase::class);
use function Safe\exec;
use function Safe\glob;
use PHPUnit\Framework\Assert;
use function Safe\file_get_contents;

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

test('user migrations do not contain merge conflict markers', function (): void {
    foreach (userMigrationFiles() as $migrationFile) {
        $contents = file_get_contents($migrationFile);

        Assert::assertStringNotContainsString('<<<<<<<', $contents, $migrationFile);
        Assert::assertStringNotContainsString('=======', $contents, $migrationFile);
        Assert::assertStringNotContainsString('>>>>>>>', $contents, $migrationFile);
    }
});

test('user migrations have valid php syntax', function (): void {
    foreach (userMigrationFiles() as $migrationFile) {
        $output = [];
        $exitCode = 0;

        exec('php -l '.escapeshellarg($migrationFile), $output, $exitCode);

        /** @var list<string> $output */
        Assert::assertSame(0, $exitCode, implode(PHP_EOL, $output));
    }
});
