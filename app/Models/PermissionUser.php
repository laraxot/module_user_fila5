<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;

/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @method static Builder<static>|PermissionUser newModelQuery()
 * @method static Builder<static>|PermissionUser newQuery()
 * @method static Builder<static>|PermissionUser query()
 *
 * @property ProfileContract|null $deleter
 *
 * @method static \Modules\User\Database\Factories\PermissionUserFactory factory($count = null, $state = [])
 *
 * @property string $id
 * @property string $permission_id
 * @property string $model_type
 * @property string $model_id
 * @property string|null $team_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static Builder<static>|PermissionUser whereCreatedAt($value)
 * @method static Builder<static>|PermissionUser whereCreatedBy($value)
 * @method static Builder<static>|PermissionUser whereId($value)
 * @method static Builder<static>|PermissionUser whereModelId($value)
 * @method static Builder<static>|PermissionUser whereModelType($value)
 * @method static Builder<static>|PermissionUser wherePermissionId($value)
 * @method static Builder<static>|PermissionUser whereTeamId($value)
 * @method static Builder<static>|PermissionUser whereUpdatedAt($value)
 * @method static Builder<static>|PermissionUser whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class PermissionUser extends ModelHasPermission {}
