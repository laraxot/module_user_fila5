<?php

declare(strict_types=1);

uses(PHPUnit\Framework\TestCase::class);

/**
 * Gate facts:
 * 1. Behaviour: AuthenticationLog connection ownership + action source contract
 *    (Modules\User\Actions\Auth\RecordAuthenticationLogAction).
 * 2. Existing: HasAuthenticationLogTraitTest, UserAuthenticationTest — no action unit.
 * 3. User: «authentication_logs e' giusto che sia dentro fixcity_user».
 */
test('authentication log model declares user connection', function (): void {
    $source = (string) file_get_contents(
        dirname(__DIR__, 4).'/app/Models/AuthenticationLog.php'
    );
    $base = (string) file_get_contents(
        dirname(__DIR__, 4).'/app/Models/BaseModel.php'
    );

    expect($source)->toContain('extends BaseModel');
    expect($base)->toContain("protected \$connection = 'user'");
});

test('record authentication log action guards missing table', function (): void {
    $source = (string) file_get_contents(
        dirname(__DIR__, 4).'/app/Actions/Auth/RecordAuthenticationLogAction.php'
    );

    expect($source)
        ->toContain('hasTable')
        ->toContain("Log::warning")
        ->toContain('authentication_logs missing on user connection');
});

test('record authentication log action types UserContract and HasAuthentications not BaseUser', function (): void {
    $source = (string) file_get_contents(
        dirname(__DIR__, 4).'/app/Actions/Auth/RecordAuthenticationLogAction.php'
    );

    expect($source)
        ->toContain('UserContract&HasAuthentications')
        ->toContain('use Modules\User\Contracts\UserContract')
        ->toContain('use Modules\User\Contracts\HasAuthentications')
        ->not->toContain('use Modules\User\Models\BaseUser')
        ->not->toContain('BaseUser $user');
});

test('auth login listeners guard UserContract not BaseUser', function (): void {
    $login = (string) file_get_contents(
        dirname(__DIR__, 4).'/app/Listeners/LoginListener.php'
    );
    $failed = (string) file_get_contents(
        dirname(__DIR__, 4).'/app/Listeners/FailedLoginListener.php'
    );

    foreach ([$login, $failed] as $source) {
        expect($source)
            ->toContain('instanceof UserContract')
            ->toContain('instanceof HasAuthentications')
            ->not->toContain('instanceof BaseUser');
    }
});
