<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;

/**
 * DeviceProfile Model.
=======
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Builder;

/**
 * DeviceProfile Model
>>>>>>> f548be94 (.)
 *
 * Represents the relationship between a device and a user profile.
 * Extends the base DeviceUser model to add specific functionality.
 *
 * @property ProfileContract|null $creator
 * @property Device|null $device
 * @property ProfileContract|null $profile
 * @property ProfileContract|null $updater
 * @property User|null $user
 * @method static Builder<static>|DeviceProfile newModelQuery()
 * @method static Builder<static>|DeviceProfile newQuery()
 * @method static Builder<static>|DeviceProfile query()
<<<<<<< HEAD
 * @property ProfileContract|null $deleter
 * @method static \Modules\User\Database\Factories\DeviceProfileFactory factory($count = null, $state = [])
=======
 * @mixin IdeHelperDeviceProfile
>>>>>>> f548be94 (.)
 * @mixin \Eloquent
 */
class DeviceProfile extends DeviceUser
{
    /**
     * Create a new model instance.
     *
<<<<<<< HEAD
     * @param  array<string, mixed>  $attributes
=======
     * @param array<string, mixed> $attributes
>>>>>>> f548be94 (.)
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
