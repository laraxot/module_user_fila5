<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Support\Carbon;
use Laravel\Passport\RefreshToken as PassportRefreshToken;

/**
 * @property-read OauthToken|null $accessToken
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken query()
 *
 * @property string $id
 * @property string $access_token_id
 * @property bool $revoked
 * @property Carbon|null $expires_at
 *
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
