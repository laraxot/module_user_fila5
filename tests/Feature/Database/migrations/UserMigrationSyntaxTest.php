<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Database\Migrations;

use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\exec;
use function Safe\file_get_contents;

uses(TestCase::class);

function assertMigrationPhpSyntaxValid(string $migrationFile): void
{
    $output = [];
    $exitCode = 0;
    exec('php -l '.escapeshellarg($migrationFile), $output, $exitCode);

    $message = implode(PHP_EOL, array_values(array_filter($output, 'is_string')));

    Assert::assertSame(0, $exitCode, $message);
}

describe('User Migration Syntax', function (): void {
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
            assertMigrationPhpSyntaxValid($migrationFile);
        }
    });
});
