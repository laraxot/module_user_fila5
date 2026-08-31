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

    public static function fromUserModel(object $userModel): self
    {
        // property_exists() è sempre false sugli attributi Eloquent (magic, in $attributes):
        // isset() passa da __isset() e vede l'attributo davvero valorizzato.
        $rawId = $userModel->id ?? null;
        $userId = $rawId !== null ? SafeStringCastAction::cast($rawId) : null;

        $roles = array_values(array_map(
            static fn (mixed $role): string => SafeStringCastAction::cast($role),
            is_array($userModel->roles ?? null) ? $userModel->roles : [],
        ));

        $rawEmail = $userModel->email ?? '';
        $email = SafeStringCastAction::cast($rawEmail);

        $rawRole = $userModel->role ?? '';
        $isAdmin = ! empty($rawRole) && strtolower(SafeStringCastAction::cast($rawRole)) === 'admin';

        return new self(
            userId: $userId,
            email: $email,
            isAdministrator: $isAdmin,
=======
    ) {
    }

    public static function fromUserModel(object $userModel): self
    {
        $userId = property_exists($userModel, 'id') ? (string) $userModel->id : null;

        $roles = array_values(array_map(
            static fn (mixed $role): string => (string) $role,
            is_array($userModel->roles ?? null) ? $userModel->roles : [],
        ));

        return new self(
            userId: $userId,
            email: (string) ($userModel->email ?? ''),
            isAdministrator: ! empty($userModel->role) && 'admin' === strtolower((string) $userModel->role),
>>>>>>> laraxot/dev
            roles: $roles,
        );
    }

    public function hasRole(string $role): bool
    {
        return in_array(strtolower($role), array_map('strtolower', $this->roles), true);
    }
}
