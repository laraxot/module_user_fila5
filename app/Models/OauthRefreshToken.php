<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Illuminate\Support\Carbon;
use Laravel\Passport\RefreshToken as PassportRefreshToken;

/**
 * @property-read OauthToken|null $accessToken
=======
use Laravel\Passport\RefreshToken as PassportRefreshToken;

/**
 * @property string                  $id
 * @property string                  $access_token_id
 * @property bool                    $revoked
 * @property \DateTimeInterface|null $expires_at
 * @property OauthToken|null         $accessToken
>>>>>>> laraxot/dev
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken query()
<<<<<<< HEAD
 *
 * @property string $id
 * @property string $access_token_id
 * @property bool $revoked
 * @property Carbon|null $expires_at
 *
=======
>>>>>>> laraxot/dev
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken whereAccessTokenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken whereRevoked($value)
 *
 * @mixin \Eloquent
 */
class OauthRefreshToken extends PassportRefreshToken
{
    protected $connection = 'user';
}
