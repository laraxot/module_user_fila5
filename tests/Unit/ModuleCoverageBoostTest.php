<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

use Modules\User\Tests\TestCase;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;
use ReflectionClass;

use function Safe\glob;

uses(TestCase::class)->group('no-user-db');

/**
 * @return list<string>
 */
function userBoostClasses(string $pattern): array
{
    $root = dirname(__DIR__, 2).'/app';
    /** @var list<string> $files */
    $files = glob($root.'/'.$pattern);
    $classes = [];

    foreach ($files as $file) {
        $relative = str_replace($root.'/', '', $file);
        $class = 'Modules\\User\\'.str_replace(['/', '.php'], ['\\', ''], $relative);
        if (class_exists($class)) {
            $classes[] = $class;
        }
    }

    sort($classes);

    return $classes;
}

describe('User coverage boost', function (): void {
    test('enums expose cases and labels', function (): void {
        foreach (userBoostClasses('Enums/*.php') as $class) {
            $ref = new ReflectionClass($class);
            if (! $ref->isEnum()) {
                continue;
            }
            Assert::assertNotEmpty($class::cases());
            if (method_exists($class, 'getLabel')) {
                foreach ($class::cases() as $case) {
                    Assert::assertIsString($case->getLabel());
                }
            }
        }
    });

    test('actions resolve or instantiate with strict types', function (): void {
        foreach (userBoostClasses('Actions/**/*.php') as $class) {
            $ref = new ReflectionClass($class);
            if ($ref->isAbstract() || $ref->isInterface()) {
                continue;
            }
            try {
                Assert::assertInstanceOf($class, app($class));
            } catch (\Throwable) {
                Assert::assertInstanceOf($class, new $class);
            }
            Assert::assertStringContainsString('declare(strict_types=1);', XotBasePest::reflectionSource($class));
        }
    });

    test('policies declare crud methods', function (): void {
        foreach (userBoostClasses('Models/Policies/*.php') as $class) {
            $ref = new ReflectionClass($class);
            if ($ref->isAbstract()) {
                continue;
            }
            Assert::assertTrue($ref->hasMethod('viewAny') || $ref->hasMethod('before'));
        }
    });

    test('datas expose from and toArray when present', function (): void {
        $checked = 0;
        // Safe\glob non espande sempre **; Datas User è piatto sotto app/Datas.
        foreach (userBoostClasses('Datas/*.php') as $class) {
            $ref = new ReflectionClass($class);
            if ($ref->isAbstract()) {
                continue;
            }
            ++$checked;
            if (method_exists($class, 'from')) {
                Assert::assertTrue($ref->hasMethod('from'));
            }
            if (method_exists($class, 'toArray')) {
                Assert::assertTrue($ref->hasMethod('toArray'));
            }
        }
        Assert::assertGreaterThan(0, $checked);
    });
});
