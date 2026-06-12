<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;
use PragmaRX\Google2FA\Google2FA;

use function Safe\json_decode;
use function Safe\json_encode;

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
    $fresh = $user->fresh();
    if (null === $fresh) {
        return [];
    }

    $encrypted = $fresh->two_factor_recovery_codes;

    if (null === $encrypted) {
        return [];
    }

    $decoded = json_decode((string) decrypt($encrypted), true);
    Assert::assertIsArray($decoded);
    /** @var list<string> $codes */
    $codes = array_values(array_filter($decoded, static fn (mixed $item): bool => is_string($item)));

    return $codes;
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
    $fresh = $user->fresh();
    if (null === $fresh) {
        return false;
    }

    $encrypted = $fresh->two_factor_secret;

    if (null === $encrypted) {
        return false;
    }

    return (bool) $google2fa->verifyKey((string) decrypt($encrypted), $code);
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

final class TwoFactorServiceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->skipUnlessUserColumn('users', 'two_factor_secret');
        $this->skipUnlessUserColumn('users', 'two_factor_recovery_codes');
        $this->skipUnlessUserColumn('users', 'two_factor_confirmed_at');

        $this->user = $this->createTestUser();
        $this->google2fa = new Google2FA();
    }

    public function testEnableGeneratesSecretAndQrCode(): void
    {
        $google2fa = $this->requireGoogle2fa();
        $user = $this->requireUser();
        $result = enableTwoFactorForUser($user, $google2fa);

        Assert::assertIsString($result['secret']);
        Assert::assertIsString($result['qr_code']);
        Assert::assertCount(10, $result['recovery_codes']);
    }

    public function testEnableStoresEncryptedSecret(): void
    {
        $google2fa = $this->requireGoogle2fa();
        $user = $this->requireUser();
        enableTwoFactorForUser($user, $google2fa);

        $fresh = $user->fresh();
        Assert::assertNotNull($fresh);
        Assert::assertNotNull($fresh->two_factor_secret);
        $fresh = $user->fresh();
        Assert::assertNotNull($fresh);
        Assert::assertNull($fresh->two_factor_confirmed_at);
    }

    public function testEnableGenerates10RecoveryCodes(): void
    {
        $google2fa = $this->requireGoogle2fa();
        $user = $this->requireUser();
        $result = enableTwoFactorForUser($user, $google2fa);

        Assert::assertCount(10, $result['recovery_codes']);
        foreach ($result['recovery_codes'] as $code) {
            Assert::assertMatchesRegularExpression('/^[a-zA-Z0-9]+-[a-zA-Z0-9]+$/', (string) $code);
        }
    }

    public function testConfirmEnables2faWithValidCode(): void
    {
        $google2fa = $this->requireGoogle2fa();
        $user = $this->requireUser();
        $result = enableTwoFactorForUser($user, $google2fa);
        $validCode = $google2fa->getCurrentOtp($result['secret']);

        $confirmed = confirmTwoFactorForUser($user, $google2fa, $result['secret'], $validCode);

        Assert::assertTrue($confirmed);
        $fresh = $user->fresh();
        Assert::assertNotNull($fresh);
        Assert::assertNotNull($fresh->two_factor_confirmed_at);
    }

    public function testConfirmFailsWithInvalidCode(): void
    {
        $google2fa = $this->requireGoogle2fa();
        $user = $this->requireUser();
        $result = enableTwoFactorForUser($user, $google2fa);

        $confirmed = confirmTwoFactorForUser($user, $google2fa, $result['secret'], '000000');

        Assert::assertFalse($confirmed);
        $fresh = $user->fresh();
        Assert::assertNotNull($fresh);
        Assert::assertNull($fresh->two_factor_confirmed_at);
    }

    public function testDisableRemovesAll2faData(): void
    {
        $google2fa = $this->requireGoogle2fa();
        $user = $this->requireUser();
        $result = enableTwoFactorForUser($user, $google2fa);
        confirmTwoFactorForUser(
            $user,
            $google2fa,
            $result['secret'],
            $google2fa->getCurrentOtp($result['secret'])
        );

        disableTwoFactorForUser($user);

        $fresh = $user->fresh();
        Assert::assertNotNull($fresh);
        Assert::assertNull($fresh->two_factor_secret);
        Assert::assertNull($fresh->two_factor_recovery_codes);
        Assert::assertNull($fresh->two_factor_confirmed_at);
    }

    public function testVerifyValidatesCorrectCode(): void
    {
        $google2fa = $this->requireGoogle2fa();
        $user = $this->requireUser();
        $result = enableTwoFactorForUser($user, $google2fa);
        $validCode = $google2fa->getCurrentOtp($result['secret']);

        $verified = verifyTwoFactorCode($user, $google2fa, $validCode);

        Assert::assertTrue($verified);
    }

    public function testVerifyRejectsIncorrectCode(): void
    {
        $google2fa = $this->requireGoogle2fa();
        $user = $this->requireUser();
        enableTwoFactorForUser($user, $google2fa);

        $verified = verifyTwoFactorCode($user, $google2fa, '000000');

        Assert::assertFalse($verified);
    }

    public function testVerifyReturnsFalseIfNoSecret(): void
    {
        $google2fa = $this->requireGoogle2fa();
        $user = $this->requireUser();
        $verified = verifyTwoFactorCode($user, $google2fa, '123456');

        Assert::assertFalse($verified);
    }

    public function testVerifyRecoveryCodeWorksOnce(): void
    {
        $google2fa = $this->requireGoogle2fa();
        $user = $this->requireUser();
        $result = enableTwoFactorForUser($user, $google2fa);
        $recoveryCode = $result['recovery_codes'][0];

        $verified = verifyTwoFactorRecoveryCode($user, $recoveryCode);

        Assert::assertTrue($verified);
        $freshUser = $user->fresh();
        Assert::assertNotNull($freshUser);
        Assert::assertCount(9, readStoredRecoveryCodes($freshUser));
    }

    public function testVerifyRecoveryCodeFailsIfAlreadyUsed(): void
    {
        $google2fa = $this->requireGoogle2fa();
        $user = $this->requireUser();
        $result = enableTwoFactorForUser($user, $google2fa);
        $recoveryCode = $result['recovery_codes'][0];

        verifyTwoFactorRecoveryCode($user, $recoveryCode);

        $verified = verifyTwoFactorRecoveryCode($user, $recoveryCode);

        Assert::assertFalse($verified);
    }

    public function testVerifyRecoveryCodeFailsWithInvalidCode(): void
    {
        $google2fa = $this->requireGoogle2fa();
        $user = $this->requireUser();
        enableTwoFactorForUser($user, $google2fa);

        $verified = verifyTwoFactorRecoveryCode($user, 'invalid-code');

        Assert::assertFalse($verified);
    }

    public function testRegenerateRecoveryCodesCreatesNewSet(): void
    {
        $google2fa = $this->requireGoogle2fa();
        $user = $this->requireUser();
        $result = enableTwoFactorForUser($user, $google2fa);
        $oldCodes = $result['recovery_codes'];

        $newCodes = regenerateTwoFactorRecoveryCodes($user);

        Assert::assertCount(10, $newCodes);
        Assert::assertNotSame($oldCodes, $newCodes);
    }

    public function testRegenerateRecoveryCodesInvalidatesOldOnes(): void
    {
        $google2fa = $this->requireGoogle2fa();
        $user = $this->requireUser();
        $result = enableTwoFactorForUser($user, $google2fa);
        $oldCode = $result['recovery_codes'][0];

        regenerateTwoFactorRecoveryCodes($user);

        $verified = verifyTwoFactorRecoveryCode($user, $oldCode);

        Assert::assertFalse($verified);
    }

    public function testQrCodeContainsUserEmail(): void
    {
        $google2fa = $this->requireGoogle2fa();
        $user = $this->requireUser();
        $result = enableTwoFactorForUser($user, $google2fa);

        Assert::assertStringContainsString((string) rawurlencode($user->email), (string) $result['qr_code']);
    }

    public function testQrCodeIsValidOtpauthUrl(): void
    {
        $google2fa = $this->requireGoogle2fa();
        $user = $this->requireUser();
        $result = enableTwoFactorForUser($user, $google2fa);

        Assert::assertStringStartsWith('otpauth://totp/', (string) $result['qr_code']);
        Assert::assertStringContainsString((string) 'secret=', (string) $result['qr_code']);
    }

    public function testSecretIsProperlyEncryptedInDatabase(): void
    {
        $google2fa = $this->requireGoogle2fa();
        $user = $this->requireUser();
        $result = enableTwoFactorForUser($user, $google2fa);

        $freshUser = $user->fresh();
        Assert::assertNotNull($freshUser);
        $encrypted = $freshUser->two_factor_secret;

        Assert::assertNotNull($encrypted);
        Assert::assertIsString($encrypted);
        Assert::assertNotSame($result['secret'], $encrypted);
        Assert::assertSame($result['secret'], decrypt($encrypted));
    }

    public function testRecoveryCodesAreProperlyEncryptedInDatabase(): void
    {
        $google2fa = $this->requireGoogle2fa();
        $user = $this->requireUser();
        $result = enableTwoFactorForUser($user, $google2fa);

        $freshUser = $user->fresh();
        Assert::assertNotNull($freshUser);
        $encrypted = $freshUser->two_factor_recovery_codes;

        Assert::assertNotNull($encrypted);
        Assert::assertSame($result['recovery_codes'], json_decode((string) decrypt($encrypted), true));
    }

    public function testEnableCanBeCalledMultipleTimes(): void
    {
        $google2fa = $this->requireGoogle2fa();
        $user = $this->requireUser();
        $result1 = enableTwoFactorForUser($user, $google2fa);
        $result2 = enableTwoFactorForUser($user, $google2fa);

        Assert::assertNotSame($result2['secret'], $result1['secret']);
    }

    public function testConfirmSetsConfirmedAtTimestamp(): void
    {
        $google2fa = $this->requireGoogle2fa();
        $user = $this->requireUser();
        $result = enableTwoFactorForUser($user, $google2fa);
        $validCode = $google2fa->getCurrentOtp($result['secret']);

        confirmTwoFactorForUser($user, $google2fa, $result['secret'], $validCode);

        $freshUser = $user->fresh();
        Assert::assertNotNull($freshUser);
        $confirmedAt = $freshUser->two_factor_confirmed_at;

        Assert::assertNotNull($confirmedAt);
        Assert::assertInstanceOf(Carbon::class, Carbon::parse((string) $confirmedAt));
    }
}
