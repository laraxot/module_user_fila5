<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\User\Database\Factories\RoleFactory;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Models\Traits\HasXotFactory;
use Modules\Xot\Models\Traits\RelationX;
use Modules\Xot\Traits\Updater;
use Spatie\Permission\Models\Role as SpatieRole;
use Webmozart\Assert\Assert;

class Role extends SpatieRole
{
    /** @phpstan-use HasXotFactory<RoleFactory, Role> */
    use HasXotFactory;

    use RelationX;
    use Updater;

    // use HasUuids;

    final public const ROLE_ADMINISTRATOR = 1;

    final public const ROLE_OWNER = 2;

    final public const ROLE_USER = 3;

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
     * @return BelongsToMany<Permission, $this>
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
