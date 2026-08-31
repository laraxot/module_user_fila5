<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\TechPlanner\Models\Profile;

/**
 * DeviceProfile Model.
 *
 * Represents the relationship between a device and a user profile.
 * Extends the base DeviceUser model to add specific functionality.
 *
 * @property-read Profile|null $creator
 * @property-read Device|null $device
 * @property-read Profile|null $profile
 * @property-read Profile|null $updater
 * @property-read User|null $user
 *
 * @method static Builder<static>|DeviceProfile newModelQuery()
 * @method static Builder<static>|DeviceProfile newQuery()
 * @method static Builder<static>|DeviceProfile query()
 *
 * @mixin \Eloquent
 */
class DeviceProfile extends DeviceUser {}
