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
 * @method static \Modules\User\Database\Factories\ModelHasRoleFactory factory($count = null, $state = [])
 * @method static Builder<static>|ModelHasRole newModelQuery()
 * @method static Builder<static>|ModelHasRole newQuery()
 * @method static Builder<static>|ModelHasRole query()
 *
 * @property string $id
 * @property string|null $role_id
 * @property string $model_type
 * @property string $model_id
 * @property string|null $team_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static Builder<static>|ModelHasRole whereCreatedAt($value)
 * @method static Builder<static>|ModelHasRole whereCreatedBy($value)
 * @method static Builder<static>|ModelHasRole whereId($value)
 * @method static Builder<static>|ModelHasRole whereModelId($value)
 * @method static Builder<static>|ModelHasRole whereModelType($value)
 * @method static Builder<static>|ModelHasRole whereRoleId($value)
 * @method static Builder<static>|ModelHasRole whereTeamId($value)
 * @method static Builder<static>|ModelHasRole whereUpdatedAt($value)
 * @method static Builder<static>|ModelHasRole whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class ModelHasRole extends BaseMorphPivot
{
    /** @var list<string> */
    protected $fillable = [
        'id',
        'role_id',
        'model_type',
        'model_id',
        'team_id',
    ];

    /**
     * Nome tabella da config Spatie — mai `$table` hardcoded (può cambiare per tenant/overlay).
     */
    #[\Override]
    public function getTable(): string
    {
        Assert::string($table = config('permission.table_names.model_has_roles'));

        return $table;
    }

    /** @return array<string, string> */
    #[\Override]
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'role_id' => 'string',
            'model_type' => 'string',
            'model_id' => 'string',
            'team_id' => 'string',

            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
        ];
    }
}
