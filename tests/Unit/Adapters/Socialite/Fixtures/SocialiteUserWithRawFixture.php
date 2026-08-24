<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Adapters\Socialite\Fixtures;

use Laravel\Socialite\Contracts\User as SocialiteUserContract;

/**
 * Socialite user stub con getRaw() per test adapter (no classi anonime).
 */
final class SocialiteUserWithRawFixture implements SocialiteUserContract
{
    /**
<<<<<<< .merge_file_e7PEH4
     * @param  array<string, mixed>  $raw
=======
     * @param array<string, mixed> $raw
>>>>>>> .merge_file_RqJHM2
     */
    public function __construct(
        private readonly ?string $name,
        private readonly ?string $email,
        private readonly array $raw = [],
<<<<<<< .merge_file_e7PEH4
    ) {}
=======
    ) {
    }
>>>>>>> .merge_file_RqJHM2

    public function getId(): string
    {
        return 'fixture-id';
    }

    public function getNickname(): ?string
    {
        return null;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getAvatar(): ?string
    {
        return null;
    }

    /**
     * @return array<string, mixed>
     */
    public function getRaw(): array
    {
        return $this->raw;
    }
}
