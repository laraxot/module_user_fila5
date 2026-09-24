<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Illuminate\Support\Carbon;
use Laravel\Passport\AuthCode as PassportAuthCode;

/**
 * @property string $id
 * @property string $user_id (DC2Type:guid)
 * @property string $client_id
 * @property string|null $scopes
 * @property bool $revoked
 * @property Carbon|null $expires_at
 * @property OauthClient|null $client
=======
use Laravel\Passport\AuthCode as PassportAuthCode;

/**
 * @property string                          $id
 * @property string                          $user_id    (DC2Type:guid)
 * @property string                          $client_id
 * @property string|null                     $scopes
 * @property bool                            $revoked
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @property OauthClient|null                $client
>>>>>>> 350420cb (Check & fix styling)
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthAuthCode query()
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
<<<<<<< HEAD
=======
    /** @var string */
>>>>>>> 350420cb (Check & fix styling)
    protected $connection = 'user';
}
