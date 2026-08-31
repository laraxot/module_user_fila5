<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Laravel\Passport\Token as PassportToken;
use Modules\User\Traits\ResolvesPassportTokenUserRelation;

/**
 * Modules\User\Models\OauthAccessToken.
 *
 * @property bool $revoked
 * @property int|string|null $user_id
 * @property-read OauthClient|null $client
 * @property-read OauthRefreshToken|null $refreshToken
 * @property-read User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAccessToken existsIn(array<int, mixed> $haystack)
 * @method static Builder<static>|OauthAccessToken newModelQuery()
 * @method static Builder<static>|OauthAccessToken newQuery()
 * @method static Builder<static>|OauthAccessToken query()
 *
 * @property string $id
 * @property string $client_id
 * @property string|null $name
 * @property array<array-key, mixed>|null $scopes
 * @property Carbon|null $expires_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static Builder<static>|OauthAccessToken whereClientId($value)
 * @method static Builder<static>|OauthAccessToken whereCreatedAt($value)
 * @method static Builder<static>|OauthAccessToken whereCreatedBy($value)
 * @method static Builder<static>|OauthAccessToken whereDeletedAt($value)
 * @method static Builder<static>|OauthAccessToken whereDeletedBy($value)
 * @method static Builder<static>|OauthAccessToken whereExpiresAt($value)
 * @method static Builder<static>|OauthAccessToken whereId($value)
 * @method static Builder<static>|OauthAccessToken whereName($value)
 * @method static Builder<static>|OauthAccessToken whereRevoked($value)
 * @method static Builder<static>|OauthAccessToken whereScopes($value)
 * @method static Builder<static>|OauthAccessToken whereUpdatedAt($value)
 * @method static Builder<static>|OauthAccessToken whereUpdatedBy($value)
 * @method static Builder<static>|OauthAccessToken whereUserId($value)
 *
 * @mixin \Eloquent
 */
class OauthAccessToken extends PassportToken
{
    use ResolvesPassportTokenUserRelation;

    protected $connection = 'user';
}
