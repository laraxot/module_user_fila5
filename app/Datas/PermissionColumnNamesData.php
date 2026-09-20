<?php

declare(strict_types=1);

namespace Modules\User\Datas;

use Spatie\LaravelData\Data;

/**
 * Undocumented class.
 */
class PermissionColumnNamesData extends Data
{
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
    public ?string $role_pivot_key = null;

    // => null, // default 'role_id',
    public ?string $permission_pivot_key = null;
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
    public null|string $role_pivot_key = null;

    // => null, // default 'role_id',
    public null|string $permission_pivot_key = null;
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
    public ?string $role_pivot_key = null;

    // => null, // default 'role_id',
    public ?string $permission_pivot_key = null;
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev

    // => null, // default 'permission_id',
    public string $model_morph_key;

    // => 'model_id',
    public string $team_foreign_key; // => 'team_id',
}
