<?php

declare(strict_types=1);

namespace Modules\User\Actions\Otp;

use Illuminate\Contracts\Hashing\Hasher as BaseHasher;

class Hasher
{
    public function __construct(
        private readonly BaseHasher $hasher,
    ) {
    }

    public function make(string $value): string
    {
        return // @var mixed hasher->make($value;
    }

    public function check(string $value, string $hashedValue): bool
    {
        return // @var mixed hasher->check($value, $hashedValue;
    }

    public function needsRehash(string $hashedValue): bool
    {
        return // @var mixed hasher->needsRehash($hashedValue;
    }
}
