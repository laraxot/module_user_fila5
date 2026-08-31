<?php

declare(strict_types=1);

namespace Modules\User\Models\Passport;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User;
use Laravel\Passport\Client as PassportClient;
use Modules\User\Models\OauthAuthCode;
use Modules\User\Models\OauthToken;

/**
 * Custom Passport Client model to fix compatibility issues with Laravel 12.
 *
 * @property-read Collection<int, OauthAuthCode> $authCodes
 * @property-read int|null $auth_codes_count
 * @property-read array<int, string> $grant_types
 * @property-read User $owner
 * @property-read string|null $plain_secret
 * @property-read array<int, string> $redirect_uris
 * @property-write string|null $secret
 * @property-read Collection<int, OauthToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Modules\User\Models\User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client existsIn(array<int, mixed> $haystack)
 * @method static \Laravel\Passport\Database\Factories\ClientFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Client query()
 *
 * @mixin \Eloquent
 */
class Client extends PassportClient
{
    /**
     * Initialize the trait.
     * Overriding to match Laravel 12 HasUuids trait signature (removing : void).
     */
    public function initializeHasUniqueStringIds(): void
    {
        parent::initializeHasUniqueStringIds();
    }
}
