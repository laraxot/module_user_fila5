<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
<<<<<<< HEAD
use Override;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\User\Database\Factories\DeviceFactory;
=======
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Carbon;
use Modules\User\Database\Factories\DeviceFactory;
use Modules\Xot\Contracts\ProfileContract;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;

/**
 * Device model representing a user's device in the system.
 *
 * @property EloquentCollection<int, Model&UserContract> $users
<<<<<<< HEAD
<<<<<<< HEAD
 * @property int|null $users_count
 * @method static DeviceFactory factory($count = null, $state = [])
=======
 * @property int|null                                    $users_count
 *
>>>>>>> 2024e2e7 (.)
=======
 * @property int|null                                    $users_count
 *
>>>>>>> f589f9b2 (.)
 * @method static Builder|Device newModelQuery()
 * @method static Builder|Device newQuery()
 * @method static Builder|Device query()
 * @method static Builder|Device whereBrowser($value)
 * @method static Builder|Device whereCreatedAt($value)
 * @method static Builder|Device whereCreatedBy($value)
 * @method static Builder|Device whereDevice($value)
 * @method static Builder|Device whereId($value)
 * @method static Builder|Device whereIsDesktop($value)
 * @method static Builder|Device whereIsMobile($value)
 * @method static Builder|Device whereIsPhone($value)
 * @method static Builder|Device whereIsRobot($value)
 * @method static Builder|Device whereIsTablet($value)
 * @method static Builder|Device whereLanguages($value)
 * @method static Builder|Device whereMobileId($value)
 * @method static Builder|Device wherePlatform($value)
 * @method static Builder|Device whereRobot($value)
 * @method static Builder|Device whereUpdatedAt($value)
 * @method static Builder|Device whereUpdatedBy($value)
 * @method static Builder|Device whereVersion($value)
<<<<<<< HEAD
<<<<<<< HEAD
 * @property DeviceUser $pivot
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property string $id
 * @property string|null $mobile_id
 * @property array|null $languages
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
 * @property string|null $uuid
 * @method static Builder<static>|Device whereUuid($value)
 * @mixin IdeHelperDevice
=======
=======
>>>>>>> f589f9b2 (.)
 *
 * @property DeviceUser              $pivot
 * @property ProfileContract|null    $creator
 * @property ProfileContract|null    $updater
 * @property string                  $id
 * @property string|null             $mobile_id
 * @property array<int, string>|null $languages
 * @property string|null             $device
 * @property string|null             $platform
 * @property string|null             $browser
 * @property string|null             $version
 * @property bool|null               $is_robot
 * @property string|null             $robot
 * @property bool|null               $is_desktop
 * @property bool|null               $is_mobile
 * @property bool|null               $is_tablet
 * @property bool|null               $is_phone
 * @property Carbon|null             $created_at
 * @property Carbon|null             $updated_at
 * @property string|null             $updated_by
 * @property string|null             $created_by
 * @property string|null             $uuid
 *
 * @method static Builder<static>|Device whereUuid($value)
 *
 * @property ProfileContract|null $deleter
 *
 * @method static \Modules\User\Database\Factories\DeviceFactory factory($count = null, $state = [])
 *
 * @property string|null $name
 * @property string|null $type
 *
 * @method static Builder<static>|Device whereName($value)
 * @method static Builder<static>|Device whereType($value)
 *
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
     * Define the many-to-many relationship between devices and users.
     *
     * return BelongsToMany<UserContract, Device>
=======
=======
>>>>>>> f589f9b2 (.)
     * Create a new factory instance for the model, typed for static analysis.
     */
    protected static function newFactory(): DeviceFactory
    {
        return DeviceFactory::new();
    }

    /**
     * @return BelongsToMany<Model&UserContract, $this, Pivot, 'pivot'>
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     */
    public function users(): BelongsToMany
    {
        $userClass = XotData::make()->getUserClass();

<<<<<<< HEAD
<<<<<<< HEAD
        return $this->belongsToManyX($userClass);
=======
=======
>>>>>>> f589f9b2 (.)
        /** @var BelongsToMany<Model&UserContract, $this, Pivot, 'pivot'> $relation */
        $relation = $this->belongsToManyX($userClass);

        return $relation;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }

    /**
     * Define the attribute casting for the model.
     *
     * @return array<string, string>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
=======
    #[\Override]
>>>>>>> f589f9b2 (.)
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
