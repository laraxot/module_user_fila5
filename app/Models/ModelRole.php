<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
<<<<<<< HEAD
use Webmozart\Assert\Assert;
=======
>>>>>>> 60a2c9a9 (.)

/**
 * Modules\User\Models\ModelHasRole.
 *
 * @property string      $id
 * @property string      $role_id
 * @property string      $model_type
 * @property string      $model_id
 * @property int|null    $team_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
<<<<<<< HEAD
=======
 *
>>>>>>> 60a2c9a9 (.)
 * @method static Builder|ModelHasRole newModelQuery()
 * @method static Builder|ModelHasRole newQuery()
 * @method static Builder|ModelHasRole query()
 * @method static Builder|ModelHasRole whereCreatedAt($value)
 * @method static Builder|ModelHasRole whereCreatedBy($value)
 * @method static Builder|ModelHasRole whereId($value)
 * @method static Builder|ModelHasRole whereModelId($value)
 * @method static Builder|ModelHasRole whereModelType($value)
 * @method static Builder|ModelHasRole whereRoleId($value)
 * @method static Builder|ModelHasRole whereTeamId($value)
 * @method static Builder|ModelHasRole whereUpdatedAt($value)
 * @method static Builder|ModelHasRole whereUpdatedBy($value)
<<<<<<< HEAD
 * @property string $uuid (DC2Type:guid)
 * @method static Builder|ModelHasRole whereUuid($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @method static \Modules\User\Database\Factories\ModelRoleFactory factory($count = null, $state = [])
=======
 *
 * @property string $uuid (DC2Type:guid)
 *
 * @method static Builder|ModelHasRole whereUuid($value)
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @mixin IdeHelperModelHasRole
 *
 * @property ProfileContract|null $deleter
 *
>>>>>>> 60a2c9a9 (.)
 * @mixin \Eloquent
 */
class ModelRole extends BaseMorphPivot
{
<<<<<<< HEAD
    #[\Override]
    public function getTable(): string
    {
        Assert::string($table = config('permission.table_names.model_has_roles'));

        return $table;
    }
=======
    /** @var string */
    protected $table = 'model_has_role';
>>>>>>> 60a2c9a9 (.)
}
