<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;
use Webmozart\Assert\Assert;

/**
 * Modules\User\Models\ModelHasRole.
 *
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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static Builder<static>|ModelRole whereCreatedAt($value)
 * @method static Builder<static>|ModelRole whereCreatedBy($value)
 * @method static Builder<static>|ModelRole whereId($value)
 * @method static Builder<static>|ModelRole whereModelId($value)
 * @method static Builder<static>|ModelRole whereModelType($value)
 * @method static Builder<static>|ModelRole whereRoleId($value)
 * @method static Builder<static>|ModelRole whereTeamId($value)
 * @method static Builder<static>|ModelRole whereUpdatedAt($value)
 * @method static Builder<static>|ModelRole whereUpdatedBy($value)
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
