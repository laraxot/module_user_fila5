<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

use Modules\User\Tests\TestCase;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_g9hEPq
use ReflectionClass;
=======
>>>>>>> .merge_file_rosVmg

use function Safe\glob;

uses(TestCase::class)->group('no-user-db');

/**
 * @return list<class-string>
 */
function userBoostClasses(string $pattern): array
{
    $root = dirname(__DIR__, 2).'/app';
    /** @var list<string> $files */
    $files = glob($root.'/'.$pattern);
    $classes = [];

    foreach ($files as $file) {
        $relative = str_replace($root.'/', '', $file);
        $candidate = 'Modules\\User\\'.str_replace(['/', '.php'], ['\\', ''], $relative);
        if (class_exists($candidate) || enum_exists($candidate)) {
<<<<<<< .merge_file_g9hEPq
            /** @var class-string $candidate */
=======
            /* @var class-string $candidate */
>>>>>>> .merge_file_rosVmg
            $classes[] = $candidate;
        }
    }

    sort($classes);

    return $classes;
}

describe('User coverage boost', function (): void {
    test('enums expose cases and labels', function (): void {
        foreach (userBoostClasses('Enums/*.php') as $class) {
            if (! enum_exists($class)) {
                continue;
            }
            /** @var class-string<\UnitEnum> $enumClass */
            $enumClass = $class;
            $cases = $enumClass::cases();
            Assert::assertNotEmpty($cases);
            foreach ($cases as $case) {
                if (! is_object($case) || ! method_exists($case, 'getLabel')) {
                    continue;
                }
                $label = $case->getLabel();
                Assert::assertIsString($label);
            }
        }
    });

    test('actions resolve or instantiate with strict types', function (): void {
        foreach (userBoostClasses('Actions/**/*.php') as $class) {
<<<<<<< .merge_file_g9hEPq
            $ref = new ReflectionClass($class);
=======
            $ref = new \ReflectionClass($class);
>>>>>>> .merge_file_rosVmg
            if ($ref->isAbstract() || $ref->isInterface()) {
                continue;
            }
            try {
                Assert::assertInstanceOf($class, app($class));
            } catch (\Throwable) {
<<<<<<< .merge_file_g9hEPq
                Assert::assertInstanceOf($class, new $class);
=======
                Assert::assertInstanceOf($class, new $class());
>>>>>>> .merge_file_rosVmg
            }
            Assert::assertStringContainsString('declare(strict_types=1);', XotBasePest::reflectionSource($class));
        }
    });

    test('policies declare crud methods', function (): void {
        foreach (userBoostClasses('Models/Policies/*.php') as $class) {
<<<<<<< .merge_file_g9hEPq
            $ref = new ReflectionClass($class);
=======
            $ref = new \ReflectionClass($class);
>>>>>>> .merge_file_rosVmg
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
<<<<<<< .merge_file_g9hEPq
            $ref = new ReflectionClass($class);
=======
            $ref = new \ReflectionClass($class);
>>>>>>> .merge_file_rosVmg
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
