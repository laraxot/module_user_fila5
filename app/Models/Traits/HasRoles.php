<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\User\Models\Role;
use Spatie\Permission\Traits\HasRoles as SpatieHasRoles;
<<<<<<< HEAD
use Webmozart\Assert\Assert;
=======
>>>>>>> 350420cb (Check & fix styling)

/** @phpstan-ignore trait.unused */
trait HasRoles
{
    use SpatieHasRoles;

    /**
     * A user may have multiple roles.
     *
     * @return BelongsToMany<Role, $this, Pivot, 'pivot'>
     */
    public function roles(): BelongsToMany
    {
<<<<<<< HEAD
        Assert::string($pivotTable = config('permission.table_names.model_has_roles'));

        return $this->belongsToManyX(Role::class, $pivotTable, 'model_id', 'role_id')->where(
=======
        return $this->belongsToManyX(Role::class, 'model_has_roles', 'model_id', 'role_id')->where(
>>>>>>> 350420cb (Check & fix styling)
            'model_type',
            self::class,
        );
    }
}
