<?php

declare(strict_types=1);

/**
 * ----------------------------------------------------------------.
 * EX XotBasePolicy.
 */

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
use Exception;
=======
>>>>>>> 2024e2e7 (.)
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Str;
use Modules\User\Models\Permission;
use Modules\Xot\Contracts\UserContract;

// use Modules\Xot\Datas\XotData;

abstract class UserPermissionBasePolicy
{
    use HandlesAuthorization;

<<<<<<< HEAD
    public function before(UserContract $user, string $ability): null|bool
=======
    public function before(UserContract $user, string $ability): ?bool
>>>>>>> 2024e2e7 (.)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }

        $class_name = class_basename(static::class);
        $permission_name = Str::of($class_name)
            ->before('Policy')
            ->lower()
<<<<<<< HEAD
            ->append('.' . $ability)
=======
            ->append('.'.$ability)
>>>>>>> 2024e2e7 (.)
            ->toString();

        try {
            Permission::firstOrCreate(['name' => $permission_name]);
<<<<<<< HEAD
        } catch (Exception $e) {
=======
        } catch (\Exception $e) {
>>>>>>> 2024e2e7 (.)
            // dddx($e);
        }
        if ($user->hasPermissionTo($permission_name)) {
            return true;
        }

        return null;
    }
}
