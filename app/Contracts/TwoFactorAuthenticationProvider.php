<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

interface TwoFactorAuthenticationProvider
{
    /**
     * Generate a new secret key.
     */
<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function generateSecretKey(): string;

    /**
     * Get the two factor authentication QR code URL.
     */
<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function qrCodeUrl(string $companyName, string $companyEmail, string $secret): string;

    /**
     * Verify the given token.
     */
<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function verify(string $secret, string $code): bool;
}
