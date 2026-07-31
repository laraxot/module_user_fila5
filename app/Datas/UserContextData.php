<?php

declare(strict_types=1);

namespace Modules\User\Datas;

<<<<<<< .merge_file_a2xBvF
use Modules\Xot\Actions\Cast\SafeStringCastAction;

=======
<<<<<<< HEAD
=======
use Modules\Xot\Actions\Cast\SafeStringCastAction;

>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_m3HQyB
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
        $rawId = property_exists($userModel, 'id') ? $userModel->id : null;
<<<<<<< .merge_file_a2xBvF
        $userId = $rawId !== null ? SafeStringCastAction::cast($rawId) : null;

        $roles = array_values(array_map(
            static fn (mixed $role): string => SafeStringCastAction::cast($role),
=======
<<<<<<< HEAD
        $userId = null !== $rawId ? (string) $rawId : null;

        $roles = array_values(array_map(
            static fn (mixed $role): string => is_string($role) ? $role : (string) $role,
=======
        $userId = $rawId !== null ? SafeStringCastAction::cast($rawId) : null;

        $roles = array_values(array_map(
            static fn (mixed $role): string => SafeStringCastAction::cast($role),
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_m3HQyB
            is_array($userModel->roles ?? null) ? $userModel->roles : [],
        ));

        $rawEmail = $userModel->email ?? '';
<<<<<<< .merge_file_a2xBvF
        $email = SafeStringCastAction::cast($rawEmail);

        $rawRole = $userModel->role ?? '';
        $isAdmin = ! empty($rawRole) && 'admin' === strtolower(SafeStringCastAction::cast($rawRole));
=======
<<<<<<< HEAD
        $email = is_string($rawEmail) ? $rawEmail : (string) $rawEmail;

        $rawRole = $userModel->role ?? '';
        $isAdmin = ! empty($rawRole) && 'admin' === strtolower(is_string($rawRole) ? $rawRole : (string) $rawRole);
=======
        $email = SafeStringCastAction::cast($rawEmail);

        $rawRole = $userModel->role ?? '';
        $isAdmin = ! empty($rawRole) && 'admin' === strtolower(SafeStringCastAction::cast($rawRole));
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_m3HQyB

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
