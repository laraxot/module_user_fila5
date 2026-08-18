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
<<<<<<< .merge_file_zEBMkI
     * @param  array<int, string>  $roles
=======
     * @param array<int, string> $roles
>>>>>>> .merge_file_5oQ1ZT
     */
    public function __construct(
        public readonly ?string $userId = null,
        public readonly string $email = '',
        public readonly bool $isAdministrator = false,
        public readonly array $roles = [],
<<<<<<< .merge_file_zEBMkI
    ) {}
=======
    ) {
    }
>>>>>>> .merge_file_5oQ1ZT

    public static function fromUserModel(object $userModel): self
    {
        $rawId = property_exists($userModel, 'id') ? $userModel->id : null;
<<<<<<< .merge_file_zEBMkI
        $userId = $rawId !== null ? SafeStringCastAction::cast($rawId) : null;
=======
        $userId = null !== $rawId ? SafeStringCastAction::cast($rawId) : null;
>>>>>>> .merge_file_5oQ1ZT

        $roles = array_values(array_map(
            static fn (mixed $role): string => SafeStringCastAction::cast($role),
            is_array($userModel->roles ?? null) ? $userModel->roles : [],
        ));

        $rawEmail = $userModel->email ?? '';
        $email = SafeStringCastAction::cast($rawEmail);

        $rawRole = $userModel->role ?? '';
<<<<<<< .merge_file_zEBMkI
        $isAdmin = ! empty($rawRole) && strtolower(SafeStringCastAction::cast($rawRole)) === 'admin';
=======
        $isAdmin = ! empty($rawRole) && 'admin' === strtolower(SafeStringCastAction::cast($rawRole));
>>>>>>> .merge_file_5oQ1ZT

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
