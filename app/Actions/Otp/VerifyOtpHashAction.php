<?php

declare(strict_types=1);

namespace Modules\User\Actions\Otp;

use Illuminate\Contracts\Hashing\Hasher;
use Spatie\QueueableAction\QueueableAction;

final class VerifyOtpHashAction
{
    use QueueableAction;

<<<<<<< HEAD
    /**
     * @return void
     */
=======
>>>>>>> d33e3c69 (.)
    public function __construct(
        private readonly Hasher $hasher,
    ) {
    }

    public function execute(string $value, string $hashedValue): bool
    {
        return $this->hasher->check($value, $hashedValue);
    }
}
