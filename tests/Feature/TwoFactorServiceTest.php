<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
use PragmaRX\Google2FA\Google2FA;

uses(TestCase::class);

/**
 * Persistence-layer tests for two-factor columns on users.
 * TwoFactorService was removed; site uses Fortify-style column contract.
 *
 * @return array{secret: string, recovery_codes: list<string>, qr_code: string}
 */
function enableTwoFactorForUser(User $user, Google2FA $google2fa): array
{
    $secret = $google2fa->generateSecretKey();
    $recoveryCodes = generateTwoFactorRecoveryCodes();

    $user->forceFill([
        'two_factor_secret' => encrypt($secret),
        'two_factor_recovery_codes' => encrypt(json_encode($recoveryCodes)),
        'two_factor_confirmed_at' => null,
    ])->save();

    $issuer = rawurlencode((string) config('app.name', 'Fixcity'));
    $email = rawurlencode($user->email);
    $qrCode = "otpauth://totp/{$issuer}:{$email}?secret={$secret}&issuer={$issuer}";

    return [
        'secret' => $secret,
        'recovery_codes' => $recoveryCodes,
        'qr_code' => $qrCode,
    ];
}

/** @return list<string> */
function generateTwoFactorRecoveryCodes(int $count = 10): array
{
    return array_map(
        static fn (): string => Str::random(10).'-'.Str::random(10),
        range(1, $count)
    );
}

/** @return list<string> */
function readStoredRecoveryCodes(User $user): array
{
    $encrypted = $user->fresh()->two_factor_recovery_codes;

    if (null === $encrypted) {
        return [];
    }

    $decoded = json_decode((string) decrypt($encrypted), true);

    return is_array($decoded) ? $decoded : [];
}

function confirmTwoFactorForUser(User $user, Google2FA $google2fa, string $secret, string $code): bool
{
    if (! $google2fa->verifyKey($secret, $code)) {
        return false;
    }

    $user->forceFill(['two_factor_confirmed_at' => now()])->save();

    return true;
}

function verifyTwoFactorCode(User $user, Google2FA $google2fa, string $code): bool
{
    $encrypted = $user->fresh()->two_factor_secret;

    if (null === $encrypted) {
        return false;
    }

    return $google2fa->verifyKey((string) decrypt($encrypted), $code);
}

function verifyTwoFactorRecoveryCode(User $user, string $code): bool
{
    $codes = readStoredRecoveryCodes($user);

    if (! in_array($code, $codes, true)) {
        return false;
    }

    $remaining = array_values(array_filter($codes, static fn (string $item): bool => $item !== $code));

    $user->forceFill([
        'two_factor_recovery_codes' => encrypt(json_encode($remaining)),
    ])->save();

    return true;
}

function disableTwoFactorForUser(User $user): void
{
    $user->forceFill([
        'two_factor_secret' => null,
        'two_factor_recovery_codes' => null,
        'two_factor_confirmed_at' => null,
    ])->save();
}

/** @return list<string> */
function regenerateTwoFactorRecoveryCodes(User $user): array
{
    $codes = generateTwoFactorRecoveryCodes();
    $user->forceFill([
        'two_factor_recovery_codes' => encrypt(json_encode($codes)),
    ])->save();

    return $codes;
}

beforeEach(function (): void {
    $this->skipUnlessUserColumn('users', 'two_factor_secret');
    $this->skipUnlessUserColumn('users', 'two_factor_recovery_codes');
    $this->skipUnlessUserColumn('users', 'two_factor_confirmed_at');

    $this->user = $this->createTestUser();
    $this->google2fa = new Google2FA();
});

test('enable generates secret and qr code', function (): void {
    $result = enableTwoFactorForUser($this->user, $this->google2fa);

    expect($result)->toHaveKeys(['secret', 'qr_code', 'recovery_codes']);
    expect($result['secret'])->toBeString();
    expect($result['qr_code'])->toBeString();
    expect($result['recovery_codes'])->toHaveCount(10);
});

test('enable stores encrypted secret', function (): void {
    enableTwoFactorForUser($this->user, $this->google2fa);

    expect($this->user->fresh()->two_factor_secret)->not->toBeNull();
    expect($this->user->fresh()->two_factor_confirmed_at)->toBeNull();
});

test('enable generates 10 recovery codes', function (): void {
    $result = enableTwoFactorForUser($this->user, $this->google2fa);

    expect($result['recovery_codes'])->toHaveCount(10);

    foreach ($result['recovery_codes'] as $code) {
        expect($code)->toMatch('/^[a-zA-Z0-9]+-[a-zA-Z0-9]+$/');
    }
});

test('confirm enables 2fa with valid code', function (): void {
    $result = enableTwoFactorForUser($this->user, $this->google2fa);
    $validCode = $this->google2fa->getCurrentOtp($result['secret']);

    $confirmed = confirmTwoFactorForUser($this->user, $this->google2fa, $result['secret'], $validCode);

    expect($confirmed)->toBeTrue();
    expect($this->user->fresh()->two_factor_confirmed_at)->not->toBeNull();
});

test('confirm fails with invalid code', function (): void {
    $result = enableTwoFactorForUser($this->user, $this->google2fa);

    $confirmed = confirmTwoFactorForUser($this->user, $this->google2fa, $result['secret'], '000000');

    expect($confirmed)->toBeFalse();
    expect($this->user->fresh()->two_factor_confirmed_at)->toBeNull();
});

test('disable removes all 2fa data', function (): void {
    $result = enableTwoFactorForUser($this->user, $this->google2fa);
    confirmTwoFactorForUser(
        $this->user,
        $this->google2fa,
        $result['secret'],
        $this->google2fa->getCurrentOtp($result['secret'])
    );

    disableTwoFactorForUser($this->user);

    $fresh = $this->user->fresh();
    expect($fresh->two_factor_secret)->toBeNull();
    expect($fresh->two_factor_recovery_codes)->toBeNull();
    expect($fresh->two_factor_confirmed_at)->toBeNull();
});

test('verify validates correct code', function (): void {
    $result = enableTwoFactorForUser($this->user, $this->google2fa);
    $validCode = $this->google2fa->getCurrentOtp($result['secret']);

    $verified = verifyTwoFactorCode($this->user, $this->google2fa, $validCode);

    expect($verified)->toBeTrue();
});

test('verify rejects incorrect code', function (): void {
    enableTwoFactorForUser($this->user, $this->google2fa);

    $verified = verifyTwoFactorCode($this->user, $this->google2fa, '000000');

    expect($verified)->toBeFalse();
});

test('verify returns false if no secret', function (): void {
    $verified = verifyTwoFactorCode($this->user, $this->google2fa, '123456');

    expect($verified)->toBeFalse();
});

test('verify recovery code works once', function (): void {
    $result = enableTwoFactorForUser($this->user, $this->google2fa);
    $recoveryCode = $result['recovery_codes'][0];

    $verified = verifyTwoFactorRecoveryCode($this->user, $recoveryCode);

    expect($verified)->toBeTrue();
    expect(readStoredRecoveryCodes($this->user->fresh()))->toHaveCount(9);
});

test('verify recovery code fails if already used', function (): void {
    $result = enableTwoFactorForUser($this->user, $this->google2fa);
    $recoveryCode = $result['recovery_codes'][0];

    verifyTwoFactorRecoveryCode($this->user, $recoveryCode);

    $verified = verifyTwoFactorRecoveryCode($this->user, $recoveryCode);

    expect($verified)->toBeFalse();
});

test('verify recovery code fails with invalid code', function (): void {
    enableTwoFactorForUser($this->user, $this->google2fa);

    $verified = verifyTwoFactorRecoveryCode($this->user, 'invalid-code');

    expect($verified)->toBeFalse();
});

test('regenerate recovery codes creates new set', function (): void {
    $result = enableTwoFactorForUser($this->user, $this->google2fa);
    $oldCodes = $result['recovery_codes'];

    $newCodes = regenerateTwoFactorRecoveryCodes($this->user);

    expect($newCodes)->toHaveCount(10);
    expect($newCodes)->not->toBe($oldCodes);
});

test('regenerate recovery codes invalidates old ones', function (): void {
    $result = enableTwoFactorForUser($this->user, $this->google2fa);
    $oldCode = $result['recovery_codes'][0];

    regenerateTwoFactorRecoveryCodes($this->user);

    $verified = verifyTwoFactorRecoveryCode($this->user, $oldCode);

    expect($verified)->toBeFalse();
});

test('qr code contains user email', function (): void {
    $result = enableTwoFactorForUser($this->user, $this->google2fa);

    expect($result['qr_code'])->toContain(rawurlencode($this->user->email));
});

test('qr code is valid otpauth url', function (): void {
    $result = enableTwoFactorForUser($this->user, $this->google2fa);

    expect($result['qr_code'])->toStartWith('otpauth://totp/');
    expect($result['qr_code'])->toContain('secret=');
});

test('secret is properly encrypted in database', function (): void {
    $result = enableTwoFactorForUser($this->user, $this->google2fa);

    $encrypted = $this->user->fresh()->two_factor_secret;

    expect($encrypted)->not->toBe($result['secret']);
    expect(decrypt($encrypted))->toBe($result['secret']);
});

test('recovery codes are properly encrypted in database', function (): void {
    $result = enableTwoFactorForUser($this->user, $this->google2fa);

    $encrypted = $this->user->fresh()->two_factor_recovery_codes;

    expect($encrypted)->not->toBeNull();
    expect(json_decode((string) decrypt($encrypted), true))->toBe($result['recovery_codes']);
});

test('enable can be called multiple times', function (): void {
    $result1 = enableTwoFactorForUser($this->user, $this->google2fa);
    $result2 = enableTwoFactorForUser($this->user, $this->google2fa);

    expect($result1['secret'])->not->toBe($result2['secret']);
});

test('confirm sets confirmed_at timestamp', function (): void {
    $result = enableTwoFactorForUser($this->user, $this->google2fa);
    $validCode = $this->google2fa->getCurrentOtp($result['secret']);

    confirmTwoFactorForUser($this->user, $this->google2fa, $result['secret'], $validCode);

    $confirmedAt = $this->user->fresh()->two_factor_confirmed_at;

    expect($confirmedAt)->not->toBeNull();
    expect(Carbon::parse((string) $confirmedAt))->toBeInstanceOf(Carbon::class);
});
