<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;
use Modules\Xot\Datas\XotData;

/**
 * Modules\User\Models\DeviceUser.
 *
 * @property string|null $user_id
 * @property string|null $device_id
 * @property-read Profile|null $creator
 * @property-read Device|null $device
 * @property-read Profile|null $profile
 * @property-read Profile|null $updater
 * @property-read User|null $user
 *
 * @method static Builder<static>|DeviceUser newModelQuery()
 * @method static Builder<static>|DeviceUser newQuery()
 * @method static Builder<static>|DeviceUser query()
 *
 * @property string $id
 * @property Carbon|null $login_at
 * @property Carbon|null $logout_at
 * @property string|null $push_notifications_token
 * @property bool|null $push_notifications_enabled
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static Builder<static>|DeviceUser whereCreatedAt($value)
 * @method static Builder<static>|DeviceUser whereCreatedBy($value)
 * @method static Builder<static>|DeviceUser whereDeviceId($value)
 * @method static Builder<static>|DeviceUser whereId($value)
 * @method static Builder<static>|DeviceUser whereLoginAt($value)
 * @method static Builder<static>|DeviceUser whereLogoutAt($value)
 * @method static Builder<static>|DeviceUser wherePushNotificationsEnabled($value)
 * @method static Builder<static>|DeviceUser wherePushNotificationsToken($value)
 * @method static Builder<static>|DeviceUser whereUpdatedAt($value)
 * @method static Builder<static>|DeviceUser whereUpdatedBy($value)
 * @method static Builder<static>|DeviceUser whereUserId($value)
 *
 * @mixin \Eloquent
 */
class DeviceUser extends BasePivot
{
    /** @var list<string> */
    protected $fillable = [
        'id',
        'device_id',
        'user_id',
        'login_at',
        'logout_at',
        'push_notifications_token',
        'push_notifications_enabled',
    ];

    /**
     * @return BelongsTo<Device, $this>
     */
    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class);
    }

    /**
     * @return BelongsTo<Model, $this>
     */
    public function user(): BelongsTo
    {
        /** @var class-string<Model> */
        $userClass = XotData::make()->getUserClass();

        return $this->belongsTo($userClass);
    }

    /**
     * @return BelongsTo<Model, $this>
     */
    public function profile(): BelongsTo
    {
        /** @var class-string<Model> */
        $profileClass = XotData::make()->getProfileClass();

        return $this->belongsTo($profileClass, 'user_id', 'user_id');
    }

    /** @return array<string, string> */
    #[\Override]
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
            'user_id' => 'string',
            'device_id' => 'string',
            // 'id' => 'string',
            // 'locales' => 'array',
            'push_notifications_token' => 'string',
            'push_notifications_enabled' => 'boolean',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'login_at' => 'datetime',
            'logout_at' => 'datetime',
        ];
    }
}
