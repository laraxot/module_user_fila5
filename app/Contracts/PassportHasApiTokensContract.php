<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> 350420cb (Check & fix styling)
/**
 * ---.
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 350420cb (Check & fix styling)
namespace Modules\User\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Passport\PersonalAccessTokenResult;
use Laravel\Passport\Token;
use Laravel\Passport\TransientToken;

/**
 * @phpstan-require-extends Model
 */
interface PassportHasApiTokensContract
{
    /**
     * Get all of the user's registered OAuth clients.
     *
<<<<<<< HEAD
     * @return HasMany<Model, Model>
     */
    public function clients(): HasMany;
=======
     * @return HasMany<\Laravel\Passport\Client, $this>
     *
     * @phpstan-ignore generics.notSubtype
     */
    public function clients();
>>>>>>> 350420cb (Check & fix styling)

    /**
     * Get all of the access tokens for the user.
     *
<<<<<<< HEAD
     * @return HasMany<Model, Model>
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
=======
     * @return HasMany<Token, $this>
     *
     * @phpstan-ignore generics.notSubtype
     */
    public function tokens();

    /**
     * Get the current access token being used by the user.
     *
     * @return Token|TransientToken|null
     */
    public function token();

    /**
     * Determine if the current API token has a given scope.
     *
     * @param string $scope
     *
     * @return bool
     */
    public function tokenCan($scope);
>>>>>>> 350420cb (Check & fix styling)

    /**
     * Create a new personal access token for the user.
     *
     * @param array<int, string> $scopes
     *
<<<<<<< HEAD
     * @return PersonalAccessTokenResult<Token>
=======
     * @return PersonalAccessTokenResult<mixed>
>>>>>>> 350420cb (Check & fix styling)
     */
    public function createToken(string $name, array $scopes = []): PersonalAccessTokenResult;

    /**
     * Set the current access token for the user.
     */
    public function withAccessToken(Token|TransientToken|null $accessToken): static;
}
