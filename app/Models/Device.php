<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;
use Modules\User\Database\Factories\DeviceFactory;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;

/**
 * Device model representing a user's device in the system.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @property-read DeviceUser|null $pivot
 * @property-read EloquentCollection<int, User> $users
 * @property-read int|null $users_count
 *
 * @method static \Modules\User\Database\Factories\DeviceFactory factory($count = null, $state = [])
 * @method static Builder<static>|Device newModelQuery()
 * @method static Builder<static>|Device newQuery()
 * @method static Builder<static>|Device query()
 *
 * @property string $id
 * @property string|null $uuid
 * @property string|null $mobile_id
 * @property array<array-key, mixed>|null $languages
 * @property string|null $device
 * @property string|null $platform
 * @property string|null $browser
 * @property string|null $version
 * @property bool|null $is_robot
 * @property string|null $robot
 * @property bool|null $is_desktop
 * @property bool|null $is_mobile
 * @property bool|null $is_tablet
 * @property bool|null $is_phone
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static Builder<static>|Device whereBrowser($value)
 * @method static Builder<static>|Device whereCreatedAt($value)
 * @method static Builder<static>|Device whereCreatedBy($value)
 * @method static Builder<static>|Device whereDevice($value)
 * @method static Builder<static>|Device whereId($value)
 * @method static Builder<static>|Device whereIsDesktop($value)
 * @method static Builder<static>|Device whereIsMobile($value)
 * @method static Builder<static>|Device whereIsPhone($value)
 * @method static Builder<static>|Device whereIsRobot($value)
 * @method static Builder<static>|Device whereIsTablet($value)
 * @method static Builder<static>|Device whereLanguages($value)
 * @method static Builder<static>|Device whereMobileId($value)
 * @method static Builder<static>|Device wherePlatform($value)
 * @method static Builder<static>|Device whereRobot($value)
 * @method static Builder<static>|Device whereUpdatedAt($value)
 * @method static Builder<static>|Device whereUpdatedBy($value)
 * @method static Builder<static>|Device whereUuid($value)
 * @method static Builder<static>|Device whereVersion($value)
 *
 * @mixin \Eloquent
 */
class Device extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'id',
        'uuid',
        'mobile_id',
        'languages',
        'device',
        'platform',
        'browser',
        'version',
        'is_robot',
        'robot',
        'is_desktop',
        'is_mobile',
        'is_tablet',
        'is_phone',
    ];

    /**
     * Create a new factory instance for the model, typed for static analysis.
     */
    protected static function newFactory(): DeviceFactory
    {
        return DeviceFactory::new();
    }

    /**
     * @return BelongsToMany<Model&UserContract, $this, Pivot, 'pivot'>
     */
    public function users(): BelongsToMany
    {
        $userClass = XotData::make()->getUserClass();

        /** @var BelongsToMany<Model&UserContract, $this, Pivot, 'pivot'> $relation */
        $relation = $this->belongsToManyX($userClass);

        return $relation;
    }

    /**
     * Define the attribute casting for the model.
     *
     * @return array<string, string>
     */
    #[\Override]
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'languages' => 'array',
            'is_robot' => 'boolean',
            'is_desktop' => 'boolean',
            'is_mobile' => 'boolean',
            'is_tablet' => 'boolean',
            'is_phone' => 'boolean',
        ];
    }
}
