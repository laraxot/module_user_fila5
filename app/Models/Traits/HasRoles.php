<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

<<<<<<< HEAD
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\User\Models\Role;
use Spatie\Permission\Traits\HasRoles as SpatieHasRoles;

=======
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\User\Models\Role;
use Spatie\Permission\Traits\HasRoles as SpatieHasRoles;
use Webmozart\Assert\Assert;

/** @phpstan-ignore trait.unused */
>>>>>>> 2024e2e7 (.)
trait HasRoles
{
    use SpatieHasRoles;

    /**
     * A user may have multiple roles.
<<<<<<< HEAD
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id', 'role_id')->where(
=======
     *
     * @return BelongsToMany<Role, $this, Pivot, 'pivot'>
     */
    public function roles(): BelongsToMany
    {
        Assert::string($pivotTable = config('permission.table_names.model_has_roles'));

        return $this->belongsToManyX(Role::class, $pivotTable, 'model_id', 'role_id')->where(
>>>>>>> 2024e2e7 (.)
            'model_type',
            self::class,
        );
    }
<<<<<<< HEAD

    /**
     * Determine if the user has the given role.
     *
     * @param string|array|\Spatie\Permission\Contracts\Role|Collection $roles
     */
    public function hasRole($roles, null|string $guard = null): bool
    {
        if (is_string($roles) && str_contains($roles, '|')) {
            $roles = explode('|', $roles);
        }

        if (is_string($roles)) {
            return $this->roles->contains('name', $roles);
        }

        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }

            return false;
        }

        return !is_null($roles) && $this->roles->contains('id', $roles->id);
    }
=======
>>>>>>> 2024e2e7 (.)
}
