<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

interface TwoFactorAuthenticationProvider
{
    /**
     * Generate a new secret key.
     */
    /**
     * @return mixed
     */
    public function generateSecretKey(): string;

    /**
     * Get the two factor authentication QR code URL.
     */
    /**
     * @return mixed
     */
    public function qrCodeUrl(string $companyName, string $companyEmail, string $secret): string;

    /**
     * Verify the given token.
     */
    /**
     * @return mixed
     */
    public function verify(string $secret, string $code): bool;
}
