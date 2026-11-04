<?php

declare(strict_types=1);

use Modules\User\Datas\UserConfigData;
use Modules\User\Filament\Pages\SettingPage;
use Modules\User\Tests\TestCase;

uses(TestCase::class)->group('no-user-db');

test('setting page resolves config name and data class by convention', function (): void {
    expect(SettingPage::getConfigName())->toBe('user')
        ->and(SettingPage::getConfigDataClass())->toBe(UserConfigData::class);
});

test('config data reads the tenant file named after the module', function (): void {
    expect(UserConfigData::tenantConfigName())->toBe('user');
});
