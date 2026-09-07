<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
<<<<<<< HEAD
use Override;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
use Illuminate\Database\Eloquent\Builder;
>>>>>>> 2024e2e7 (.)
=======
use Illuminate\Database\Eloquent\Builder;
>>>>>>> f589f9b2 (.)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;

/**
 * Modules\User\Models\DeviceUser.
 *
 * @property Device|null $device
<<<<<<< HEAD
<<<<<<< HEAD
 * @method static Builder|DeviceUser newModelQuery()
 * @method static Builder|DeviceUser newQuery()
 * @method static Builder|DeviceUser query()
 * @property string $id
 * @property string $device_id
 * @property string $user_id
 * @property Carbon|null $login_at
 * @property Carbon|null $logout_at
 * @property string|null $push_notifications_token
 * @property bool|null $push_notifications_enabled
=======
=======
>>>>>>> f589f9b2 (.)
 *
 * @method static Builder|DeviceUser newModelQuery()
 * @method static Builder|DeviceUser newQuery()
 * @method static Builder|DeviceUser query()
 *
 * @property string      $id
 * @property string      $device_id
 * @property string      $user_id
 * @property Carbon|null $login_at
 * @property Carbon|null $logout_at
 * @property string|null $push_notifications_token
 * @property bool|null   $push_notifications_enabled
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
<<<<<<< HEAD
<<<<<<< HEAD
=======
 *
>>>>>>> 2024e2e7 (.)
=======
 *
>>>>>>> f589f9b2 (.)
 * @method static Builder|DeviceUser whereCreatedAt($value)
 * @method static Builder|DeviceUser whereCreatedBy($value)
 * @method static Builder|DeviceUser whereDeviceId($value)
 * @method static Builder|DeviceUser whereId($value)
 * @method static Builder|DeviceUser whereLoginAt($value)
 * @method static Builder|DeviceUser whereLogoutAt($value)
 * @method static Builder|DeviceUser wherePushNotificationsEnabled($value)
 * @method static Builder|DeviceUser wherePushNotificationsToken($value)
 * @method static Builder|DeviceUser whereUpdatedAt($value)
 * @method static Builder|DeviceUser whereUpdatedBy($value)
 * @method static Builder|DeviceUser whereUserId($value)
<<<<<<< HEAD
<<<<<<< HEAD
 * @property ProfileContract|null $profile
 * @property UserContract|null $user
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @mixin IdeHelperDeviceUser
=======
=======
>>>>>>> f589f9b2 (.)
 *
 * @property ProfileContract|null $profile
 * @property UserContract|null    $user
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 *
 * @method static \Modules\User\Database\Factories\DeviceUserFactory factory($count = null, $state = [])
 *
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
 * @mixin \Eloquent
 */
class DeviceUser extends BasePivot
{
<<<<<<< HEAD
<<<<<<< HEAD
    use HasFactory;

=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
     * old_return BelongsTo<Device, DeviceUser>.
=======
     * @return BelongsTo<Device, $this>
>>>>>>> 2024e2e7 (.)
=======
     * @return BelongsTo<Device, $this>
>>>>>>> f589f9b2 (.)
     */
    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class);
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * old_return BelongsTo<Model&UserContract, DeviceUser>.
=======
     * @return BelongsTo<Model, $this>
>>>>>>> 2024e2e7 (.)
=======
     * @return BelongsTo<Model, $this>
>>>>>>> f589f9b2 (.)
     */
    public function user(): BelongsTo
    {
        /** @var class-string<Model> */
        $userClass = XotData::make()->getUserClass();

        return $this->belongsTo($userClass);
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * old_return BelongsTo<Model&ProfileContract, DeviceUser>.
     */
    public function profile(): BelongsTo
    {
        /* @var class-string<Model> */
=======
=======
>>>>>>> f589f9b2 (.)
     * @return BelongsTo<Model, $this>
     */
    public function profile(): BelongsTo
    {
        /** @var class-string<Model> */
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
        $profileClass = XotData::make()->getProfileClass();

        return $this->belongsTo($profileClass, 'user_id', 'user_id');
    }

    /** @return array<string, string> */
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
