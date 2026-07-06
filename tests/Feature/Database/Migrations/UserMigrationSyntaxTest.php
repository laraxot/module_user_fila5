<?php

declare(strict_types=1);

/** @return list<string> */
dataset('userMigrationFiles', static function (): array {
    $basePath = dirname(__DIR__, 4).'/database/migrations';
    $files = glob($basePath.'/*.php');

    if (false === $files) {
        return [];
    }

    sort($files);

    return $files;
});

it('does not contain merge conflict markers in user migrations', function (string $migrationFile): void {
    $contents = file_get_contents($migrationFile);

    expect($contents)->not->toBeFalse()
        ->and($contents)->not->toContain('<<<<<<<');
})->with('userMigrationFiles');

it('has valid php syntax in user migrations', function (string $migrationFile): void {
    $output = [];
    $exitCode = 0;

    exec('php -l '.escapeshellarg($migrationFile), $output, $exitCode);

    expect($exitCode)->toBe(
        0,
        implode(PHP_EOL, $output),
    );
})->with('userMigrationFiles');
