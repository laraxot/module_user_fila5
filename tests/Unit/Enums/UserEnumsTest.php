<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Enums;

use Modules\User\Enums\LanguageEnum;
use Modules\User\Enums\SocialProviderEnum;
use Modules\User\Enums\SystemRole;
use Modules\User\Enums\UserType;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

test('UserType enum has expected cases', function (): void {
    expect(class_exists(UserType::class))->toBeTrue();

    $values = array_map(static fn ($case) => $case->value, UserType::cases());

    expect($values)->toContain('master_admin')
        ->and($values)->toContain('customer_user');
});

test('SystemRole enum has expected cases', function (): void {
    expect(class_exists(SystemRole::class))->toBeTrue();

    $values = array_map(static fn ($case) => $case->value, SystemRole::cases());

    expect($values)->toContain('%');
});

test('SocialProviderEnum enum has expected cases', function (): void {
    expect(class_exists(SocialProviderEnum::class))->toBeTrue();

    $values = array_map(static fn ($case) => $case->value, SocialProviderEnum::cases());

    expect($values)->toContain('google')
        ->and($values)->toContain('auth0');
});

test('LanguageEnum enum has expected cases', function (): void {
    expect(class_exists(LanguageEnum::class))->toBeTrue();

    $values = array_map(static fn ($case) => $case->value, LanguageEnum::cases());

    expect($values)->toContain('it')
        ->and($values)->toContain('en');
});

test('UserType has getLabel method', function (): void {
    expect(method_exists(UserType::class, 'getLabel'))->toBeTrue();
});
