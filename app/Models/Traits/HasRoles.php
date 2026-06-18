<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\User\Models\Role;
use Spatie\Permission\Traits\HasRoles as SpatieHasRoles;

trait HasRoles
{
    use SpatieHasRoles;

    /**
     * A user may have multiple roles.
     *
     * @return BelongsToMany<Role, $this>
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToManyX(Role::class, 'model_has_roles', 'model_id', 'role_id')->where(
            'model_type',
            self::class,
        );
    }
}
