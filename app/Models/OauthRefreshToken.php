<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Laravel\Passport\RefreshToken as PassportRefreshToken;

/**
 * @property string $id
 * @property string $access_token_id
 * @property bool $revoked
 * @property \DateTimeInterface|null $expires_at
<<<<<<< .merge_file_I22XVm
<<<<<<< HEAD
 * @property OauthToken|null         $accessToken
=======
 * @property OauthToken|null $accessToken
>>>>>>> .merge_file_bTlbPJ
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken whereAccessTokenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthRefreshToken whereRevoked($value)
 *
 * @mixin \Eloquent
 */
class OauthRefreshToken extends PassportRefreshToken
{
=======
 */
class OauthRefreshToken extends PassportRefreshToken
{
    /** @var string */
>>>>>>> 350420cb (Check & fix styling)
    protected $connection = 'user';
}
