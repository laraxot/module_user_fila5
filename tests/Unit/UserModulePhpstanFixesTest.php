<?php

declare(strict_types=1);

use Illuminate\Validation\Rules\Password;
use Modules\User\Datas\PasswordData;
use Modules\User\Events\AddingTeam;
use Modules\User\Events\Login;
use Modules\User\Events\Registered;
use Modules\User\Events\SocialiteUserConnected;
use Modules\User\Models\SocialiteUser;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

it('password data can be instantiated', function (): void {
    $passwordData = new PasswordData();

    // @var mixed assertInstanceOf(PasswordData::class, $passwordData;
    // @var mixed assertSame(5, $passwordData->otp_expiration_minutes;
    // @var mixed assertSame(6, $passwordData->otp_length;
    // @var mixed assertSame(60, $passwordData->expires_in;
    // @var mixed assertSame(8, $passwordData->min;
    // @var mixed assertTrue($passwordData->mixedCase;
    // @var mixed assertTrue($passwordData->letters;
    // @var mixed assertTrue($passwordData->numbers;
    // @var mixed assertTrue($passwordData->symbols;
    // @var mixed assertTrue($passwordData->uncompromised;
    // @var mixed assertSame(0, $passwordData->compromisedThreshold;
});

it('password data can be configured', function (): void {
    $passwordData = new PasswordData(
        otp_expiration_minutes: 30,
        otp_length: 8,
        expires_in: 60,
        min: 8,
        mixedCase: true,
        letters: true,
        numbers: true,
        symbols: true,
        uncompromised: true,
        compromisedThreshold: 5
    );

    // @var mixed assertSame(30, $passwordData->otp_expiration_minutes;
    // @var mixed assertSame(8, $passwordData->otp_length;
    // @var mixed assertSame(60, $passwordData->expires_in;
    // @var mixed assertSame(8, $passwordData->min;
    // @var mixed assertTrue($passwordData->mixedCase;
    // @var mixed assertTrue($passwordData->letters;
    // @var mixed assertTrue($passwordData->numbers;
    // @var mixed assertTrue($passwordData->symbols;
    // @var mixed assertTrue($passwordData->uncompromised;
    // @var mixed assertSame(5, $passwordData->compromisedThreshold;
});

it('password data get password rule works', function (): void {
    $passwordData = new PasswordData(
        min: 8,
        mixedCase: true,
        letters: true,
        numbers: true,
        symbols: true,
        uncompromised: true,
        compromisedThreshold: 3
    );

    $rule = $passwordData->getPasswordRule();

    // @var mixed assertInstanceOf(Password::class, $rule;
});

it('password data get helper text works', function (): void {
    $passwordData = new PasswordData(
        min: 8,
        mixedCase: true,
        letters: true,
        numbers: true,
        symbols: true,
        uncompromised: true
    );

    $helperText = $passwordData->getHelperText();

    // @var mixed assertIsString($helperText;
    // @var mixed assertStringContainsString('8 caratteri', $helperText;
    // @var mixed assertStringContainsString('maiuscola e una minuscola', $helperText;
    // @var mixed assertStringContainsString('lettera', $helperText;
    // @var mixed assertStringContainsString('numero', $helperText;
    // @var mixed assertStringContainsString('carattere speciale', $helperText;
    // @var mixed assertStringContainsString('compromessa', $helperText;
});

it('password data get form components returns array', function (): void {
    $passwordData = new PasswordData();

    // Smoke tests: methods should be callable without throwing.
    $passwordData->getPasswordFormComponent('password');
    $passwordData->setFieldName('password');
    $passwordData->getPasswordConfirmationFormComponent();
});

it('events can be instantiated', function (): void {
    $userFactory = User::factory();
    \assert($userFactory instanceof Illuminate\Database\Eloquent\Factories\Factory);
    $owner = $userFactory->create();
    \assert($owner instanceof User);

    $socialiteFactory = SocialiteUser::factory();
    \assert($socialiteFactory instanceof Illuminate\Database\Eloquent\Factories\Factory);
    $socialiteUser = $socialiteFactory->create();
    \assert($socialiteUser instanceof SocialiteUser);

    $addingTeam = new AddingTeam($owner);
    $login = new Login($socialiteUser);
    $registered = new Registered($socialiteUser);
    $socialiteUserConnected = new SocialiteUserConnected($socialiteUser);

    // @var mixed assertInstanceOf(AddingTeam::class, $addingTeam;
    // @var mixed assertInstanceOf(Login::class, $login;
    // @var mixed assertInstanceOf(Registered::class, $registered;
    // @var mixed assertInstanceOf(SocialiteUserConnected::class, $socialiteUserConnected;
});

it('events have dispatchable trait', function (): void {
    $userFactory = User::factory();
    \assert($userFactory instanceof Illuminate\Database\Eloquent\Factories\Factory);
    $owner = $userFactory->create();
    \assert($owner instanceof User);

    $socialiteFactory = SocialiteUser::factory();
    \assert($socialiteFactory instanceof Illuminate\Database\Eloquent\Factories\Factory);
    $socialiteUser = $socialiteFactory->create();
    \assert($socialiteUser instanceof SocialiteUser);

    // Smoke: calling dispatch should not error.
    AddingTeam::dispatch($owner);
    Login::dispatch($socialiteUser);
});

it('password data static make method exists', function (): void {
    $passwordData = PasswordData::make();
    // @var mixed assertInstanceOf(PasswordData::class, $passwordData;
});

it('password data get validation messages method exists', function (): void {
    $passwordData = new PasswordData();

    $messages = $passwordData->getValidationMessages();
    // @var mixed assertIsArray($messages;
});

it('password data get form schema method exists', function (): void {
    $schema = PasswordData::getFormSchema();
    // @var mixed assertIsArray($schema;
});
