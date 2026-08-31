<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
<<<<<<< HEAD
use Modules\TechPlanner\Models\Profile;
=======
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> laraxot/dev
use Webmozart\Assert\Assert;

/**
 * Modules\User\Models\ModelHasRole.
 *
<<<<<<< HEAD
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 *
 * @method static \Modules\User\Database\Factories\ModelRoleFactory factory($count = null, $state = [])
 * @method static Builder<static>|ModelRole newModelQuery()
 * @method static Builder<static>|ModelRole newQuery()
 * @method static Builder<static>|ModelRole query()
 *
 * @property string $id
 * @property int|null $role_id
 * @property string $model_type
 * @property string $model_id
 * @property int|null $team_id
=======
 * @property string      $id
 * @property string      $role_id
 * @property string      $model_type
 * @property string      $model_id
 * @property int|null    $team_id
>>>>>>> laraxot/dev
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
<<<<<<< HEAD
 * @method static Builder<static>|ModelRole whereCreatedAt($value)
 * @method static Builder<static>|ModelRole whereCreatedBy($value)
 * @method static Builder<static>|ModelRole whereId($value)
 * @method static Builder<static>|ModelRole whereModelId($value)
 * @method static Builder<static>|ModelRole whereModelType($value)
 * @method static Builder<static>|ModelRole whereRoleId($value)
 * @method static Builder<static>|ModelRole whereTeamId($value)
 * @method static Builder<static>|ModelRole whereUpdatedAt($value)
 * @method static Builder<static>|ModelRole whereUpdatedBy($value)
=======
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
 *
 * @property string $uuid (DC2Type:guid)
 *
 * @method static Builder|ModelHasRole whereUuid($value)
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 *
 * @method static \Modules\User\Database\Factories\ModelRoleFactory factory($count = null, $state = [])
>>>>>>> laraxot/dev
 *
 * @mixin \Eloquent
 */
class ModelRole extends BaseMorphPivot
{
    #[\Override]
    public function getTable(): string
    {
        Assert::string($table = config('permission.table_names.model_has_roles'));

        return $table;
    }
}
