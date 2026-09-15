<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

use Modules\User\Tests\TestCase;
use Modules\Xot\Tests\ModuleDeepCoverage;

/** @phpstan-ignore-next-line method.nonObject, function.void (Pest uses()->group() chain: pest-plugin-phpstan extension is disabled in root phpstan.neon, so PHPStan does not know uses() returns a bindable TestCase call) */
uses(TestCase::class)->group('no-user-db');

/** @return array{string, string} */
/** @return list{string, string} */
function userDeepContext(): array
{
    return [dirname(__DIR__, 2).'/app', 'Modules\\User\\'];
}

describe('User deep coverage', function (): void {
    test('all actions execute method is invoked', function (): void {
        [$appRoot, $ns] = userDeepContext();
        ModuleDeepCoverage::testExecuteAllActions($appRoot, $ns);
    });

    test('all events are instantiable', function (): void {
        [$appRoot, $ns] = userDeepContext();
        ModuleDeepCoverage::testInstantiateAllEvents($appRoot, $ns);
    });

    test('all datas from or construct', function (): void {
        [$appRoot, $ns] = userDeepContext();
        ModuleDeepCoverage::testFromAllDatas($appRoot, $ns);
    });

    test('providers register without fatal', function (): void {
        [$appRoot, $ns] = userDeepContext();
        ModuleDeepCoverage::testRegisterAllProviders($appRoot, $ns);
    });

    test('filament columns and widgets instantiate', function (): void {
        [$appRoot, $ns] = userDeepContext();
        ModuleDeepCoverage::testInstantiateFilamentColumns($appRoot, $ns);
    });
});
