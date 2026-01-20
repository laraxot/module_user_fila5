<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\User\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Passport\PersonalAccessTokenResult;
use Laravel\Passport\Token;
use Laravel\Passport\TransientToken;

/**
<<<<<<< HEAD
=======
 * @propery \Laravel\Passport\Token|\Laravel\Passport\TransientToken|null $accessToken;
 *
>>>>>>> f548be94 (.)
 * @phpstan-require-extends Model
 */
interface PassportHasApiTokensContract
{
    /**
     * Get all of the user's registered OAuth clients.
<<<<<<< HEAD
     *
     * @return HasMany<Model, Model>
=======
>>>>>>> f548be94 (.)
     */
    public function clients(): HasMany;

    /**
     * Get all of the access tokens for the user.
<<<<<<< HEAD
     *
     * @return HasMany<Model, Model>
=======
>>>>>>> f548be94 (.)
     */
    public function tokens(): HasMany;

    /**
     * Get the current access token being used by the user.
     */
    public function token(): Token|TransientToken|null;

    /**
     * Determine if the current API token has a given scope.
     */
    public function tokenCan(string $scope): bool;

    /**
     * Create a new personal access token for the user.
<<<<<<< HEAD
     *
     * @param array<int, string> $scopes
     *
     * @return PersonalAccessTokenResult<Token>
=======
>>>>>>> f548be94 (.)
     */
    public function createToken(string $name, array $scopes = []): PersonalAccessTokenResult;

    /**
     * Set the current access token for the user.
<<<<<<< HEAD
     */
    public function withAccessToken(Token|TransientToken|null $accessToken): static;
=======
     *
     * @return $this
     */
    public function withAccessToken(Token|TransientToken $accessToken);
>>>>>>> f548be94 (.)
}
