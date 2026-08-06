<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;

/**
 * DeviceProfile Model.
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
 * @mixin \Eloquent
 */
<<<<<<< HEAD
class DeviceProfile extends DeviceUser {}
=======
class DeviceProfile extends DeviceUser
{
}
>>>>>>> laraxot/dev
