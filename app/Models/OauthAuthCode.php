<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Support\Carbon;
use Laravel\Passport\AuthCode as PassportAuthCode;

/**
 * @property bool $revoked
 * @property-read OauthClient|null $client
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode query()
 *
 * @property string $id
 * @property string|null $user_id
 * @property string|null $client_id
 * @property string|null $scopes
 * @property Carbon|null $expires_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode whereRevoked($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode whereScopes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode whereUserId($value)
 *
 * @mixin \Eloquent
 */
class OauthAuthCode extends PassportAuthCode
{
    protected $connection = 'user';
}
