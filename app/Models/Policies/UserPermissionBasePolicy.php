<?php

declare(strict_types=1);

/**
 * ----------------------------------------------------------------.
 * EX XotBasePolicy.
 */

namespace Modules\User\Models\Policies;

<<<<<<< HEAD
<<<<<<< HEAD
use Exception;
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Str;
use Modules\User\Models\Permission;
use Modules\Xot\Contracts\UserContract;

// use Modules\Xot\Datas\XotData;

abstract class UserPermissionBasePolicy
{
    use HandlesAuthorization;

<<<<<<< HEAD
<<<<<<< HEAD
    public function before(UserContract $user, string $ability): null|bool
=======
    public function before(UserContract $user, string $ability): ?bool
>>>>>>> 2024e2e7 (.)
=======
    public function before(UserContract $user, string $ability): ?bool
>>>>>>> f589f9b2 (.)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }

        $class_name = class_basename(static::class);
        $permission_name = Str::of($class_name)
            ->before('Policy')
            ->lower()
<<<<<<< HEAD
<<<<<<< HEAD
            ->append('.' . $ability)
=======
            ->append('.'.$ability)
>>>>>>> 2024e2e7 (.)
=======
            ->append('.'.$ability)
>>>>>>> f589f9b2 (.)
            ->toString();

        try {
            Permission::firstOrCreate(['name' => $permission_name]);
<<<<<<< HEAD
<<<<<<< HEAD
        } catch (Exception $e) {
=======
        } catch (\Exception $e) {
>>>>>>> 2024e2e7 (.)
=======
        } catch (\Exception $e) {
>>>>>>> f589f9b2 (.)
            // dddx($e);
        }
        if ($user->hasPermissionTo($permission_name)) {
            return true;
        }

        return null;
    }
}
