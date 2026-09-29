<?php

declare(strict_types=1);

use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Http Livewire retired after Filament widget switch', function (): void {
    test('app/Http/Livewire directory is gone', function (): void {
        Assert::assertDirectoryDoesNotExist(base_path('Modules/User/app/Http/Livewire'));
    });

    test('app/Livewire directory is gone', function (): void {
        Assert::assertDirectoryDoesNotExist(base_path('Modules/User/app/Livewire'));
    });

    test('no residual livewire alias cache in app dir', function (): void {
        Assert::assertFileDoesNotExist(base_path('Modules/User/app/Http/Livewire/_components.json'));
        Assert::assertFileDoesNotExist(base_path('Modules/User/app/Livewire/_components.json'));
    });
});
