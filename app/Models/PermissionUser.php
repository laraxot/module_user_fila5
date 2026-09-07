<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Modules\Xot\Contracts\ProfileContract;
use Modules\User\Database\Factories\PermissionUserFactory;
use Illuminate\Database\Eloquent\Builder;
=======
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> 2024e2e7 (.)

/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
<<<<<<< HEAD
 * @method static PermissionUserFactory factory($count = null, $state = [])
 * @method static Builder<static>|PermissionUser newModelQuery()
 * @method static Builder<static>|PermissionUser newQuery()
 * @method static Builder<static>|PermissionUser query()
 * @mixin IdeHelperPermissionUser
 * @mixin \Eloquent
 */
class PermissionUser extends ModelHasPermission
{
}
=======
 *
 * @method static Builder<static>|PermissionUser newModelQuery()
 * @method static Builder<static>|PermissionUser newQuery()
 * @method static Builder<static>|PermissionUser query()
 *
 * @property ProfileContract|null $deleter
 *
 * @method static \Modules\User\Database\Factories\PermissionUserFactory factory($count = null, $state = [])
 *
 * @mixin \Eloquent
 */
class PermissionUser extends ModelHasPermission {}
>>>>>>> 2024e2e7 (.)
