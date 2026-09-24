<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Laravel\Passport\Client as PassportClient;

/**
 * @property string                                $id
 * @property string|null                           $name
 * @property string|null                           $secret
 * @property string|null                           $provider
 * @property string|null                           $redirect
 * @property bool                                  $personal_access_client
 * @property bool                                  $password_client
 * @property bool                                  $revoked
 * @property string|null                           $user_id
 * @property User|null                             $user
 * @property Carbon|null                           $created_at
 * @property Carbon|null                           $updated_at
 * @property string|null                           $updated_by
 * @property string|null                           $created_by
 * @property string|null                           $owner_type
 * @property string|null                           $owner_id
 * @property array<int, string>                    $redirect_uris
 * @property array<string, bool>                   $grant_types
 * @property Collection<int, OauthAuthCode>        $authCodes
 * @property int|null                              $auth_codes_count
 * @property \Illuminate\Foundation\Auth\User|null $owner
 * @property string|null                           $plain_secret
 * @property Collection<int, OauthToken>           $tokens
 * @property int|null                              $tokens_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient existsIn(array<int, string> $haystack)
 * @method static \Laravel\Passport\Database\Factories\ClientFactory        factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereGrantTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereOwnerType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient wherePasswordClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient wherePersonalAccessClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereRedirect($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereRedirectUris($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereRevoked($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthClient whereUserId($value)
 *
 * @mixin \Eloquent
 */
class OauthClient extends PassportClient
{
    protected $connection = 'user';
=======
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Laravel\Passport\Client as PassportClient;
use Modules\User\Database\Factories\OauthClientFactory;
use Modules\Xot\Contracts\UserContract;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Traits\HasRoles;

/**
 * OAuth Client wrapper con Authorizable e HasRoles per permessi a livello client.
 *
 * @property string            $id
 * @property string|null       $name
 * @property string|null       $secret
 * @property string|null       $provider
 * @property string|null       $redirect
 * @property bool              $personal_access_client
 * @property bool              $password_client
 * @property bool              $revoked
 * @property string|null       $user_id
 * @property UserContract|null $user
 *
 * @see https://github.com/aurmich/sample_passport/blob/develop/app/Models/Client.php
 */
final class OauthClient extends PassportClient implements AuthorizableContract
{
    use Authorizable;
    /** @use HasFactory<OauthClientFactory> */
    use HasFactory;
    use HasRoles;

    /** @var string */
    protected $connection = 'user';

    /**
     * Guard per Spatie Permission (client API, non web).
     *
     * @var string
     */
    public $guard_name = 'api';

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): OauthClientFactory
    {
        return OauthClientFactory::new();
    }

    /**
     * Determine if the entity has a given ability.
     *
     * @param iterable<string>|string $ability
     * @param array<mixed>            $arguments
     */
    #[\Override]
    public function can($ability, mixed $arguments = []): bool
    {
        if (is_string($ability)) {
            return $this->checkPermission($ability);
        }

        /* @var iterable<string> $ability */
        return $this->hasAnyPermission($ability);
    }

    /**
     * Determine if the entity does not have a given ability.
     *
     * @param iterable<string>|string $ability
     * @param array<mixed>            $arguments
     */
    public function cant($ability, $arguments = []): bool
    {
        return ! $this->can($ability, $arguments);
    }

    /**
     * Determine if the entity does not have a given ability.
     *
     * @param iterable<string>|string $ability
     * @param array<mixed>            $arguments
     */
    public function cannot($ability, $arguments = []): bool
    {
        return $this->cant($ability, $arguments);
    }

    /**
     * Determine if the entity has any of the given abilities.
     *
     * @param iterable<string> $abilities
     * @param array<mixed>     $arguments
     */
    public function canAny($abilities, $arguments = []): bool
    {
        foreach ((array) $abilities as $ability) {
            if ($this->can($ability, $arguments)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if client has any of the given permissions.
     *
     * @param iterable<string> $permissions
     */
    private function hasAnyPermission(iterable $permissions): bool
    {
        foreach ($permissions as $perm) {
            if ($this->checkPermission($perm)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if client has a single permission.
     */
    private function checkPermission(string $permission): bool
    {
        try {
            return $this->hasPermissionTo($permission);
        } catch (PermissionDoesNotExist) {
            return false;
        }
    }
>>>>>>> 350420cb (Check & fix styling)
}
