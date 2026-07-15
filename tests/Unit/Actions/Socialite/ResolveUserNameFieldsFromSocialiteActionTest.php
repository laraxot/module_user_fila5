<?php

declare(strict_types=1);

use Laravel\Socialite\Contracts\User as SocialiteUser;
use Modules\User\Actions\Socialite\ResolveUserNameFieldsFromSocialiteAction;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

function createMockSocialiteUser(?string $name, ?string $email): SocialiteUser
{
    $mock = typedMock(SocialiteUser::class);
    $mock->allows([
        'getName' => $name,
        'getEmail' => $email,
    ]);

    return $mock;
}

it('resolves first and last name from full name', function (): void {
    $ssoUser = createMockSocialiteUser('John Doe', 'john@example.com');
    $fields = app(ResolveUserNameFieldsFromSocialiteAction::class)->execute($ssoUser);

    expect($fields->firstName)->toEqual('John');
    expect($fields->lastName)->toEqual('Doe');
});

it('resolves name from single word', function (): void {
    $ssoUser = createMockSocialiteUser('John', 'john@example.com');
    $fields = app(ResolveUserNameFieldsFromSocialiteAction::class)->execute($ssoUser);

    expect($fields->firstName)->toEqual('John');
    expect($fields->lastName)->toEqual('John');
});

it('falls back to email when name is empty', function (): void {
    $ssoUser = createMockSocialiteUser(null, 'john.doe@example.com');
    $fields = app(ResolveUserNameFieldsFromSocialiteAction::class)->execute($ssoUser);

    expect($fields->firstName)->toEqual('John');
    expect($fields->lastName)->toEqual('Doe');
});

it('handles empty name and email', function (): void {
    $ssoUser = createMockSocialiteUser(null, null);
    $fields = app(ResolveUserNameFieldsFromSocialiteAction::class)->execute($ssoUser);

    expect($fields->firstName)->toEqual('');
    expect($fields->lastName)->toEqual('');
});

it('handles empty string name', function (): void {
    $ssoUser = createMockSocialiteUser('', '');
    $fields = app(ResolveUserNameFieldsFromSocialiteAction::class)->execute($ssoUser);

    expect($fields->firstName)->toEqual('');
    expect($fields->lastName)->toEqual('');
});

it('resolves three word names', function (): void {
    $ssoUser = createMockSocialiteUser('John Michael Doe', 'john@example.com');
    $fields = app(ResolveUserNameFieldsFromSocialiteAction::class)->execute($ssoUser);

    expect($fields->firstName)->toEqual('John');
    expect($fields->lastName)->toEqual('Michael Doe');
});
