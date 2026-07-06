<?php

declare(strict_types=1);

use PHPUnit\Framework\Assert;

use function Safe\exec;
use function Safe\file_get_contents;
use function Safe\glob;

$userMigrationSyntaxFiles = static function (): array {
    $basePath = dirname(__DIR__, 4).'/database/migrations';
    $files = array_filter(glob($basePath.'/*.php'), 'is_string');

    sort($files);

    return $files;
};

it('does not contain merge conflict markers in user migrations', function () use ($userMigrationSyntaxFiles): void {
    foreach ($userMigrationSyntaxFiles() as $migrationFile) {
        Assert::assertStringNotContainsString('<<<<<<<', file_get_contents($migrationFile), $migrationFile);
    }
});

it('has valid php syntax in user migrations', function () use ($userMigrationSyntaxFiles): void {
    foreach ($userMigrationSyntaxFiles() as $migrationFile) {
        $output = [];
        $exitCode = 0;

        exec('php -l '.escapeshellarg($migrationFile), $output, $exitCode);

        Assert::assertSame(0, $exitCode, $migrationFile);
    }
});
