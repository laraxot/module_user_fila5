<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\User\Tests\TestCase;
=======

>>>>>>> laraxot/dev
use PHPUnit\Framework\Assert;

use function Safe\exec;
use function Safe\file_get_contents;
use function Safe\glob;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(Modules\User\Tests\TestCase::class);
>>>>>>> laraxot/dev

/** @return list<string> */
function getUserMigrationFiles(): array
{
    $basePath = dirname(__DIR__, 4).'/database/migrations';
    $files = glob($basePath.'/*.php');
<<<<<<< HEAD
    $result = [];

    foreach ($files as $file) {
        if (! is_string($file)) {
            continue;
        }
        $result[] = $file;
    }

    sort($result);

    return $result;
=======

    sort($files);

    /* @var list<string> $files */
    return $files;
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
        $outputLines = array_map(static fn (string $line): string => $line, $output);
=======
        $outputLines = array_map(static fn (mixed $line): string => (string) $line, $output);
>>>>>>> laraxot/dev
        Assert::assertSame(0, $exitCode, implode(PHP_EOL, $outputLines));
    }
});
