<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Laravel\Passport\DeviceCode as PassportDeviceCode;
=======
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Passport\DeviceCode as PassportDeviceCode;
use Laravel\Passport\Passport;
use Modules\Xot\Datas\XotData;
>>>>>>> 350420cb (Check & fix styling)

/**
 * Class OauthDeviceCode.
 *
 * Wrapper for Laravel Passport DeviceCode model.
 *
<<<<<<< HEAD
 * @property bool $revoked
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthDeviceCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthDeviceCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthDeviceCode query()
 *
 * @mixin \Eloquent
 */
<<<<<<< .merge_file_Pu98td
class OauthDeviceCode extends PassportDeviceCode
{
=======
 * @property string|null      $user_id
 * @property string           $client_id
 * @property string           $user_code
 * @property OauthClient|null $client
 * @property User|null        $user
 */
class OauthDeviceCode extends PassportDeviceCode
{
    /** @var string */
    protected $connection = 'user';

    /**
     * Get the client that owns the device code.
     *
     * @return BelongsTo<OauthClient, $this>
     */
    public function client(): BelongsTo
    {
        /** @var class-string<OauthClient> $clientModel */
        $clientModel = Passport::clientModel();

        return $this->belongsTo($clientModel);
    }

    /**
     * Get the user that approved the device code (nullable until approved).
     */
    /** @return BelongsTo<User, $this> */
    public function user(): BelongsTo
    {
        /** @var class-string<User> $userClass */
        $userClass = XotData::make()->getUserClass();

        return $this->belongsTo($userClass, 'user_id');
    }
>>>>>>> 350420cb (Check & fix styling)
}
=======
class OauthDeviceCode extends PassportDeviceCode {}
>>>>>>> .merge_file_ljfIq4
