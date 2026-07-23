<?php

declare(strict_types=1);

namespace Modules\User\Datas;

use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Spatie\LaravelData\Data;

/**
 * Represents an immutable User Context Value Object.
 * Ensures consistency when passing user data across services and layers.
 */
class UserContextData extends Data
{
    /**
     * @param array<int, string> $roles
     */
    public function __construct(
        public readonly ?string $userId = null,
        public readonly string $email = '',
        public readonly bool $isAdministrator = false,
        public readonly array $roles = [],
    ) {
    }

    public static function fromUserModel(object $userModel): self
    {
        $userId = property_exists($userModel, 'id') ? SafeStringCastAction::cast($userModel->id) : null;

        $roles = array_values(array_map(
            static fn (mixed $role): string => SafeStringCastAction::cast($role),
            is_array($userModel->roles ?? null) ? $userModel->roles : [],
        ));

        return new self(
            userId: $userId,
            email: SafeStringCastAction::cast($userModel->email ?? ''),
            isAdministrator: ! empty($userModel->role) && 'admin' === strtolower(SafeStringCastAction::cast($userModel->role)),
            roles: $roles,
        );
    }

    public function hasRole(string $role): bool
    {
        return in_array(strtolower($role), array_map('strtolower', $this->roles), true);
    }
}
