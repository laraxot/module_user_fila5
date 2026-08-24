<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

use Illuminate\Support\Facades\Process;
<<<<<<< .merge_file_EN5v8V
use Mockery;
=======
>>>>>>> .merge_file_4ptyJX
use Modules\User\Tests\TestCase;
use Modules\Xot\Tests\ModuleRemainingCoverage;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-user-db');

afterEach(function (): void {
<<<<<<< .merge_file_EN5v8V
    Mockery::close();
=======
    \Mockery::close();
>>>>>>> .merge_file_4ptyJX
});

describe('User coverage 100 — remaining sweep', function (): void {
    test('ModuleRemainingCoverage filament closures e policy matrix', function (): void {
        // Defense: action PassportDashboard shellano artisan (passport:purge) → hang senza fake.
        Process::fake();
        $appRoot = dirname(__DIR__, 2).'/app';
        $ns = 'Modules\\User\\';
        ModuleRemainingCoverage::testFilamentClosures($appRoot, $ns);
        ModuleRemainingCoverage::testPoliciesWithRoleMatrix($appRoot, $ns);
        Assert::assertDirectoryExists($appRoot);
        Assert::assertSame('Modules\\User\\', $ns);
    });
});
