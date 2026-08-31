<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Models\Traits\HasXotFactory;
use Modules\Xot\Models\Traits\RelationX;
use Modules\Xot\Traits\Updater;
use Spatie\Permission\Models\Role as SpatieRole;
use Webmozart\Assert\Assert;

/**
 * Modules\User\Models\Role.
 *
 * @property-read Profile|null $creator
 * @property-read PermissionRole|null $pivot
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Team|null $team
 * @property-read Profile|null $updater
 * @property-read Collection<int, User> $users
 * @property-read int|null $users_count
 *
 * @method static \Modules\User\Database\Factories\RoleFactory factory($count = null, $state = [])
 * @method static Builder<static>|Role newModelQuery()
 * @method static Builder<static>|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role permission($permissions, bool $without = false)
 * @method static Builder<static>|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role withoutPermission($permissions)
 *
 * @property int $id
 * @property int|null $team_id
 * @property string $name
 * @property string $guard_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $display_name
 * @property string|null $description
 *
 * @method static Builder<static>|Role whereCreatedAt($value)
 * @method static Builder<static>|Role whereCreatedBy($value)
 * @method static Builder<static>|Role whereDescription($value)
 * @method static Builder<static>|Role whereDisplayName($value)
 * @method static Builder<static>|Role whereGuardName($value)
 * @method static Builder<static>|Role whereId($value)
 * @method static Builder<static>|Role whereName($value)
 * @method static Builder<static>|Role whereTeamId($value)
 * @method static Builder<static>|Role whereUpdatedAt($value)
 * @method static Builder<static>|Role whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class Role extends SpatieRole
{
    use HasXotFactory;
    use RelationX;
    use Updater;

    // use HasUuids;

    final public const int ROLE_ADMINISTRATOR = 1;

    final public const int ROLE_OWNER = 2;

    final public const int ROLE_USER = 3;

    protected $connection = 'user';

    protected $keyType = 'int';

    /** @var list<string> */
    protected $fillable = [
        'name',
        'guard_name',
        'display_name',
        'description',
        'team_id',
        'created_by',
        'updated_by',
    ];

    public function getTable(): string
    {
        Assert::string($table = config('permission.table_names.roles'));

        return $table;
    }

    /**
     * @return BelongsTo<Model, $this>
     */
    public function team(): BelongsTo
    {
        $xotData = XotData::make();
        /** @var class-string<Model> */
        $teamClass = $xotData->getTeamClass();

        return $this->belongsTo($teamClass);
    }

    /**
     * @return BelongsToMany<Permission, $this, Pivot, 'pivot'>
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToManyX(Permission::class);
    }

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'id' => 'int',
            'name' => 'string',
            'guard_name' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
