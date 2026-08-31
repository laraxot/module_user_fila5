<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
use Modules\TechPlanner\Models\Profile;
=======
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> laraxot/dev

/**
 * DeviceProfile Model.
 *
 * Represents the relationship between a device and a user profile.
 * Extends the base DeviceUser model to add specific functionality.
 *
<<<<<<< HEAD
 * @property-read Profile|null $creator
 * @property-read Device|null $device
 * @property-read Profile|null $profile
 * @property-read Profile|null $updater
 * @property-read User|null $user
=======
 * @property ProfileContract|null $creator
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
<<<<<<< HEAD
 * @mixin \Eloquent
 */
class DeviceProfile extends DeviceUser {}
=======
 * @property ProfileContract|null $deleter
 *
 * @method static \Modules\User\Database\Factories\DeviceProfileFactory factory($count = null, $state = [])
 *
 * @mixin \Eloquent
 */
class DeviceProfile extends DeviceUser
{
    /**
     * Create a new model instance.
     *
     * @param array<string, mixed> $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
>>>>>>> laraxot/dev
