<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
<<<<<<< HEAD
// use Laravel\Passport\AccessToken as PassportAccessToken;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\UserContract;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Passport\Token as PassportToken;
=======
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Laravel\Passport\Token as PassportToken;
use Modules\User\Traits\ResolvesPassportTokenUserRelation;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

/**
 * Modules\User\Models\OauthAccessToken.
 *
<<<<<<< HEAD
<<<<<<< HEAD
 * @property string $id
 * @property string|null $user_id
 * @property string $client_id
 * @property string|null $name
 * @property array|null $scopes
 * @property bool $revoked
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $expires_at
 * @property OauthClient|null $client
 * @property UserContract|null $user
=======
=======
>>>>>>> f589f9b2 (.)
 * @property string            $id
 * @property string|null       $user_id
 * @property string            $client_id
 * @property string|null       $name
 * @property list<string>|null $scopes
 * @property bool              $revoked
 * @property Carbon|null       $created_at
 * @property Carbon|null       $updated_at
 * @property Carbon|null       $expires_at
 * @property OauthClient|null  $client
 * @property User|null         $user
 *
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
 * @method static Builder|OauthAccessToken newModelQuery()
 * @method static Builder|OauthAccessToken newQuery()
 * @method static Builder|OauthAccessToken query()
 * @method static Builder|OauthAccessToken whereClientId($value)
 * @method static Builder|OauthAccessToken whereCreatedAt($value)
 * @method static Builder|OauthAccessToken whereExpiresAt($value)
 * @method static Builder|OauthAccessToken whereId($value)
 * @method static Builder|OauthAccessToken whereName($value)
 * @method static Builder|OauthAccessToken whereRevoked($value)
 * @method static Builder|OauthAccessToken whereScopes($value)
 * @method static Builder|OauthAccessToken whereUpdatedAt($value)
 * @method static Builder|OauthAccessToken whereUserId($value)
<<<<<<< HEAD
<<<<<<< HEAD
 * @property OauthRefreshToken|null $refreshToken
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder<static>|OauthAccessToken whereCreatedBy($value)
 * @method static Builder<static>|OauthAccessToken whereDeletedAt($value)
 * @method static Builder<static>|OauthAccessToken whereDeletedBy($value)
 * @method static Builder<static>|OauthAccessToken whereUpdatedBy($value)
 * @mixin IdeHelperOauthAccessToken
=======
=======
>>>>>>> f589f9b2 (.)
 *
 * @property OauthRefreshToken|null $refreshToken
 * @property string|null            $updated_by
 * @property string|null            $created_by
 * @property string|null            $deleted_at
 * @property string|null            $deleted_by
 *
 * @method static Builder<static>|OauthAccessToken                               whereCreatedBy($value)
 * @method static Builder<static>|OauthAccessToken                               whereDeletedAt($value)
 * @method static Builder<static>|OauthAccessToken                               whereDeletedBy($value)
 * @method static Builder<static>|OauthAccessToken                               whereUpdatedBy($value)
 * @method static static                                                         create(array<string, mixed> $attributes = [])
 * @method static static                                                         firstOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static static                                                         updateOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAccessToken existsIn(array<int, string> $haystack)
 *
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
 * @mixin \Eloquent
 */
class OauthAccessToken extends PassportToken
{
<<<<<<< HEAD
<<<<<<< HEAD
    /** @var string */
    protected $connection = 'user';

    // protected $fillable = ['id', 'user_id', 'client_id', 'name', 'scopes', 'revoked', 'expires_at'];
=======
    use ResolvesPassportTokenUserRelation;

    protected $connection = 'user';
>>>>>>> 2024e2e7 (.)
=======
    use ResolvesPassportTokenUserRelation;

    protected $connection = 'user';
>>>>>>> f589f9b2 (.)
}
