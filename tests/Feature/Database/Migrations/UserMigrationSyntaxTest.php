<?php

declare(strict_types=1);

use Modules\User\Tests\TestCase;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use PHPUnit\Framework\Assert;
use Webmozart\Assert\Assert as WebmozartAssert;

use function Safe\exec;
use function Safe\file_get_contents;
use function Safe\glob;

uses(TestCase::class);

/** @return list<string> */
function getUserMigrationFiles(): array
{
    $basePath = dirname(__DIR__, 4).'/database/migrations';
    $result = [];

    foreach (glob($basePath.'/*.php') as $file) {
        $result[] = app(SafeStringCastAction::class)->execute($file);
    }

    sort($result);

    return $result;
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
        WebmozartAssert::isArray($output);
        WebmozartAssert::allString($output);

        Assert::assertSame(0, $exitCode, implode(PHP_EOL, $output));
    }
});
