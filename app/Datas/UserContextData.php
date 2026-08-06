<?php

declare(strict_types=1);

namespace Modules\User\Datas;

<<<<<<< HEAD
use Modules\Xot\Actions\Cast\SafeStringCastAction;
=======
>>>>>>> laraxot/dev
use Spatie\LaravelData\Data;

/**
 * Represents an immutable User Context Value Object.
 * Ensures consistency when passing user data across services and layers.
 */
class UserContextData extends Data
{
    /**
<<<<<<< HEAD
     * @param  array<int, string>  $roles
=======
     * @param array<int, string> $roles
>>>>>>> laraxot/dev
     */
    public function __construct(
        public readonly ?string $userId = null,
        public readonly string $email = '',
        public readonly bool $isAdministrator = false,
        public readonly array $roles = [],
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/dev

    public static function fromUserModel(object $userModel): self
    {
        $rawId = property_exists($userModel, 'id') ? $userModel->id : null;
<<<<<<< HEAD
        $userId = $rawId !== null ? SafeStringCastAction::cast($rawId) : null;

        $roles = array_values(array_map(
            static fn (mixed $role): string => is_string($role) ? $role : SafeStringCastAction::cast($role),
=======
        $userId = null !== $rawId ? (string) $rawId : null;

        $roles = array_values(array_map(
            static fn (mixed $role): string => is_string($role) ? $role : (string) $role,
>>>>>>> laraxot/dev
            is_array($userModel->roles ?? null) ? $userModel->roles : [],
        ));

        $rawEmail = $userModel->email ?? '';
<<<<<<< HEAD
        $email = is_string($rawEmail) ? $rawEmail : SafeStringCastAction::cast($rawEmail);

        $rawRole = $userModel->role ?? '';
        $isAdmin = ! empty($rawRole) && strtolower(is_string($rawRole) ? $rawRole : SafeStringCastAction::cast($rawRole)) === 'admin';
=======
        $email = is_string($rawEmail) ? $rawEmail : (string) $rawEmail;

        $rawRole = $userModel->role ?? '';
        $isAdmin = ! empty($rawRole) && 'admin' === strtolower(is_string($rawRole) ? $rawRole : (string) $rawRole);
>>>>>>> laraxot/dev

        return new self(
            userId: $userId,
            email: $email,
            isAdministrator: $isAdmin,
            roles: $roles,
        );
    }

    public function hasRole(string $role): bool
    {
        return in_array(strtolower($role), array_map('strtolower', $this->roles), true);
    }
}
