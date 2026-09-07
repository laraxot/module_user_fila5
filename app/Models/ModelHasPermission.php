<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Support\Carbon;
use Modules\User\Database\Factories\ModelHasPermissionFactory;
=======
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
use Webmozart\Assert\Assert;
>>>>>>> 2024e2e7 (.)

/**
 * Modules\User\Models\ModelHasPermission.
 *
<<<<<<< HEAD
 * @property int $id
 * @property int $permission_id
 * @property string $model_type
 * @property string $model_id
 * @method static ModelHasPermissionFactory factory($count = null, $state = [])
=======
 * @property int    $id
 * @property int    $permission_id
 * @property string $model_type
 * @property string $model_id
 *
>>>>>>> 2024e2e7 (.)
 * @method static Builder|ModelHasPermission newModelQuery()
 * @method static Builder|ModelHasPermission newQuery()
 * @method static Builder|ModelHasPermission query()
 * @method static Builder|ModelHasPermission whereId($value)
 * @method static Builder|ModelHasPermission whereModelId($value)
 * @method static Builder|ModelHasPermission whereModelType($value)
 * @method static Builder|ModelHasPermission wherePermissionId($value)
<<<<<<< HEAD
=======
 *
>>>>>>> 2024e2e7 (.)
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
<<<<<<< HEAD
=======
 *
>>>>>>> 2024e2e7 (.)
 * @method static Builder|ModelHasPermission whereCreatedAt($value)
 * @method static Builder|ModelHasPermission whereCreatedBy($value)
 * @method static Builder|ModelHasPermission whereUpdatedAt($value)
 * @method static Builder|ModelHasPermission whereUpdatedBy($value)
<<<<<<< HEAD
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property string|null $team_id
 * @method static Builder|ModelHasPermission whereTeamId($value)
 * @mixin IdeHelperModelHasPermission
=======
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property string|null          $team_id
 *
 * @method static Builder|ModelHasPermission whereTeamId($value)
 *
 * @property ProfileContract|null $deleter
 *
 * @method static \Modules\User\Database\Factories\ModelHasPermissionFactory factory($count = null, $state = [])
 *
>>>>>>> 2024e2e7 (.)
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
<<<<<<< HEAD
=======

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
>>>>>>> 2024e2e7 (.)
}
