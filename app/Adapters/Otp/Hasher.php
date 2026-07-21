<?php

declare(strict_types=1);

namespace Modules\User\Adapters\Otp;

use Illuminate\Contracts\Hashing\Hasher as BaseHasher;

class Hasher
{
<<<<<<< HEAD
    /**
     * @return void
     */
=======
>>>>>>> d33e3c69 (.)
    public function __construct(
        private readonly BaseHasher $hasher,
    ) {
    }

    public function make(string $value): string
    {
        return $this->hasher->make($value);
    }

    public function check(string $value, string $hashedValue): bool
    {
        return $this->hasher->check($value, $hashedValue);
    }

<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function needsRehash(string $hashedValue): bool
    {
        return $this->hasher->needsRehash($hashedValue);
    }
}
