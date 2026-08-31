<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;

/**
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 *
 * @method static Builder<static>|Feature newModelQuery()
 * @method static Builder<static>|Feature newQuery()
 * @method static Builder<static>|Feature query()
 *
 * @property int $id
 * @property string $name
 * @property string $scope
 * @property string $value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 *
 * @method static Builder<static>|Feature whereCreatedAt($value)
 * @method static Builder<static>|Feature whereDeletedAt($value)
 * @method static Builder<static>|Feature whereId($value)
 * @method static Builder<static>|Feature whereName($value)
 * @method static Builder<static>|Feature whereScope($value)
 * @method static Builder<static>|Feature whereUpdatedAt($value)
 * @method static Builder<static>|Feature whereValue($value)
 *
 * @mixin \Eloquent
 */
class Feature extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'id',
        'name',
        'scope',
        'value',
    ];
}
