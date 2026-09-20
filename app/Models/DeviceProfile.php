<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;

/**
 * DeviceProfile Model.
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Builder;

/**
 * DeviceProfile Model
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;

/**
 * DeviceProfile Model.
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
 *
 * Represents the relationship between a device and a user profile.
 * Extends the base DeviceUser model to add specific functionality.
 *
 * @property ProfileContract|null $creator
<<<<<<< HEAD
 * @property Device|null $device
 * @property ProfileContract|null $profile
 * @property ProfileContract|null $updater
 * @property User|null $user
<<<<<<< HEAD
 * @method static Builder<static>|DeviceProfile newModelQuery()
 * @method static Builder<static>|DeviceProfile newQuery()
 * @method static Builder<static>|DeviceProfile query()
<<<<<<< HEAD
 * @property ProfileContract|null $deleter
 * @method static \Modules\User\Database\Factories\DeviceProfileFactory factory($count = null, $state = [])
=======
 * @mixin IdeHelperDeviceProfile
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
=======
 * @property Device|null          $device
 * @property ProfileContract|null $profile
 * @property ProfileContract|null $updater
 * @property User|null            $user
>>>>>>> laraxot/dev
 *
 * @method static Builder<static>|DeviceProfile newModelQuery()
 * @method static Builder<static>|DeviceProfile newQuery()
 * @method static Builder<static>|DeviceProfile query()
 *
 * @property ProfileContract|null $deleter
 *
 * @method static \Modules\User\Database\Factories\DeviceProfileFactory factory($count = null, $state = [])
 *
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
 * @mixin \Eloquent
 */
class DeviceProfile extends DeviceUser
{
    /**
     * Create a new model instance.
     *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $attributes
=======
     * @param array<string, mixed> $attributes
>>>>>>> f548be94 (.)
=======
     * @param array<string, mixed> $attributes
=======
     * @param  array<string, mixed>  $attributes
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
     * @param array<string, mixed> $attributes
>>>>>>> laraxot/dev
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
