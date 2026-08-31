<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;
use Webmozart\Assert\Assert;

/**
 * Modules\User\Models\ModelHasPermission.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 *
 * @method static \Modules\User\Database\Factories\ModelHasPermissionFactory factory($count = null, $state = [])
 * @method static Builder<static>|ModelHasPermission newModelQuery()
 * @method static Builder<static>|ModelHasPermission newQuery()
 * @method static Builder<static>|ModelHasPermission query()
 *
 * @property string $id
 * @property int $permission_id
 * @property string $model_type
 * @property string $model_id
 * @property int|null $team_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static Builder<static>|ModelHasPermission whereCreatedAt($value)
 * @method static Builder<static>|ModelHasPermission whereCreatedBy($value)
 * @method static Builder<static>|ModelHasPermission whereId($value)
 * @method static Builder<static>|ModelHasPermission whereModelId($value)
 * @method static Builder<static>|ModelHasPermission whereModelType($value)
 * @method static Builder<static>|ModelHasPermission wherePermissionId($value)
 * @method static Builder<static>|ModelHasPermission whereTeamId($value)
 * @method static Builder<static>|ModelHasPermission whereUpdatedAt($value)
 * @method static Builder<static>|ModelHasPermission whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class ModelHasPermission extends BaseMorphPivot
{
    /**
     * @var list<string>
     *
     * @psalm-var list{'permission_id', 'model_type', 'model_id'}
     */
    protected $fillable = ['permission_id', 'model_type', 'model_id'];

    /**
     * Read from config on every call — never hardcode, the value can change
     * at any time via `config('permission.table_names.model_has_permissions')`.
     */
    #[\Override]
    public function getTable(): string
    {
        Assert::string($table = config('permission.table_names.model_has_permissions'));

        return $table;
    }
}
