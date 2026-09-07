<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Builder;

/**
 * DeviceProfile Model
=======
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;

/**
 * DeviceProfile Model.
>>>>>>> 2024e2e7 (.)
 *
 * Represents the relationship between a device and a user profile.
 * Extends the base DeviceUser model to add specific functionality.
 *
 * @property ProfileContract|null $creator
 * @property Device|null $device
 * @property ProfileContract|null $profile
 * @property ProfileContract|null $updater
 * @property User|null $user
<<<<<<< HEAD
 * @method static Builder<static>|DeviceProfile newModelQuery()
 * @method static Builder<static>|DeviceProfile newQuery()
 * @method static Builder<static>|DeviceProfile query()
 * @mixin IdeHelperDeviceProfile
=======
 *
 * @method static Builder<static>|DeviceProfile newModelQuery()
 * @method static Builder<static>|DeviceProfile newQuery()
 * @method static Builder<static>|DeviceProfile query()
 *
 * @property ProfileContract|null $deleter
 *
 * @method static \Modules\User\Database\Factories\DeviceProfileFactory factory($count = null, $state = [])
 *
>>>>>>> 2024e2e7 (.)
 * @mixin \Eloquent
 */
class DeviceProfile extends DeviceUser
{
    /**
     * Create a new model instance.
     *
<<<<<<< HEAD
     * @param array<string, mixed> $attributes
=======
     * @param  array<string, mixed>  $attributes
>>>>>>> 2024e2e7 (.)
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
