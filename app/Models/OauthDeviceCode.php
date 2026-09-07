<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Laravel\Passport\DeviceCode as PassportDeviceCode;

/**
 * OAuth Device Code model.
 *
 * @property string      $id
 * @property string|null $user_code
 * @property string|null $device_code
 * @property string|null $client_id
 * @property array|null  $scopes
 * @property bool        $revoked
 * @property Carbon|null $expires_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|OauthDeviceCode newModelQuery()
 * @method static Builder|OauthDeviceCode newQuery()
 * @method static Builder|OauthDeviceCode query()
=======
use Laravel\Passport\DeviceCode as PassportDeviceCode;

/**
 * Class OauthDeviceCode.
 *
 * Wrapper for Laravel Passport DeviceCode model.
 *
 * @property bool $revoked
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthDeviceCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthDeviceCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthDeviceCode query()
>>>>>>> 2024e2e7 (.)
 *
 * @mixin \Eloquent
 */
class OauthDeviceCode extends PassportDeviceCode
{
<<<<<<< HEAD
    /** @var string */
    protected $connection = 'user';

    /*
     * protected $fillable = [
     * 'id', 'user_id', 'name', 'secret', 'provider', 'redirect',
     * 'personal_access_client', 'password_client', 'revoked',
     * ];
     */
=======
>>>>>>> 2024e2e7 (.)
}
