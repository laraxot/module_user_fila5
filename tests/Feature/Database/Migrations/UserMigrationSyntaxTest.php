<?php

declare(strict_types=1);

use PHPUnit\Framework\Assert;

use function Safe\exec;
use function Safe\file_get_contents;
use function Safe\glob;

uses(Modules\User\Tests\TestCase::class);

/** @return list<string> */
function getUserMigrationFiles(): array
{
    $basePath = dirname(__DIR__, 4).'/database/migrations';
    $files = glob($basePath.'/*.php');

    sort($files);

    /* @var list<string> $files */
    return $files;
}

it('does not contain merge conflict markers in user migrations', function (): void {
    foreach (getUserMigrationFiles() as $migrationFile) {
        $contents = file_get_contents($migrationFile);

        Assert::assertNotFalse($contents, "Could not read {$migrationFile}");
        Assert::assertStringNotContainsString('<<<<<<<', $contents, "Merge conflict marker in {$migrationFile}");
    }
});

it('has valid php syntax in user migrations', function (): void {
    foreach (getUserMigrationFiles() as $migrationFile) {
        $output = [];
        $exitCode = 0;

        exec('php -l '.escapeshellarg($migrationFile), $output, $exitCode);
        /** @var list<string> $output */
        $outputLines = array_map(static fn (mixed $line): string => (string) $line, $output);
        Assert::assertSame(0, $exitCode, implode(PHP_EOL, $outputLines));
    }
});

it('has exactly one create_teams_table migration and no add_owner_id alter', function (): void {
    $files = getUserMigrationFiles();

    $teamsCreates = array_filter(
        $files,
        static fn (string $file): bool => 1 === preg_match('/create_teams_table\.php$/', $file),
    );
    $teamsAlters = array_filter(
        $files,
        static fn (string $file): bool => 1 === preg_match('/add_.*_to_teams_table\.php$/', $file),
    );

    Assert::assertCount(1, $teamsCreates, 'Deve esistere esattamente una migrazione create_teams_table nel modulo User.');
    Assert::assertCount(0, $teamsAlters, 'Vietato usare migrazioni add_*_to_teams_table: consolidare nella migrazione unica del modello.');

    $createTeams = (string) array_values($teamsCreates)[0];
    $contents = file_get_contents($createTeams);
    Assert::assertStringContainsString('owner_id', $contents, 'La migrazione create_teams_table deve contenere la colonna owner_id.');
});
