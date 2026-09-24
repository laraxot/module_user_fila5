<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> 350420cb (Check & fix styling)
/**
 * --- Artmin.
 */

<<<<<<< HEAD
namespace Modules\User\Contracts;

=======
declare(strict_types=1);

namespace Modules\User\Contracts;

use Illuminate\Database\Eloquent\Collection;
>>>>>>> 350420cb (Check & fix styling)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
<<<<<<< HEAD
use Illuminate\Support\Collection;
=======
use Illuminate\Support\Carbon;
>>>>>>> 350420cb (Check & fix styling)
use Modules\User\Models\Role;

/**
 * Modules\User\Contracts\HasTeamsContract.
 *
<<<<<<< HEAD
=======
 * @property int                                      $id
 * @property string                                   $name
 * @property string                                   $two_factor_secret
 * @property TeamContract|null                        $currentTeam
 * @property Collection<int, \Laravel\Passport\Token> $tokens
 * @property Carbon|null                              $two_factor_confirmed_at
 * @property int                                      $current_team_id
 *
>>>>>>> 350420cb (Check & fix styling)
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
interface HasTeamsContract
{
<<<<<<< HEAD
=======
    // extends
    // HasApiTokens, //no sanctum ma passport
    // HasProfilePhotoContract,
    // TwoFactorAuthenticatableContract,
    // MustVerifyEmail,
    // CanResetPassword,
    // ModelContract
>>>>>>> 350420cb (Check & fix styling)
    /**
     * Determine if the given team is the current team.
     */
    public function isCurrentTeam(TeamContract $teamContract): bool;

    /**
     * Get the current team of the user's context.
     *
<<<<<<< HEAD
     * @return BelongsTo<Model, Model>
=======
     * @return BelongsTo<Model&TeamContract, Model>
>>>>>>> 350420cb (Check & fix styling)
     */
    public function currentTeam(): BelongsTo;

    /**
     * Switch the user's context to the given team.
     */
    public function switchTeam(TeamContract $teamContract): bool;

    /**
     * Get all of the teams the user owns or belongs to.
     *
<<<<<<< HEAD
     * @return Collection<int, Model>
     */
    public function allTeams(): Collection;
=======
     * @return \Illuminate\Support\Collection<int, Model&TeamContract>
     */
    public function allTeams(): \Illuminate\Support\Collection;
>>>>>>> 350420cb (Check & fix styling)

    /**
     * Get all of the teams the user owns.
     *
<<<<<<< HEAD
     * @return HasMany<Model, Model>
=======
     * @return HasMany<Model&TeamContract, Model>
>>>>>>> 350420cb (Check & fix styling)
     */
    public function ownedTeams(): HasMany;

    /**
     * Get all of the teams the user belongs to.
     *
<<<<<<< HEAD
     * @return BelongsToMany<Model, Model>
=======
     * @return BelongsToMany<Model&TeamContract, Model>
>>>>>>> 350420cb (Check & fix styling)
     */
    public function teams(): BelongsToMany;

    /**
     * Get the user's "personal" team.
     */
    public function personalTeam(): ?TeamContract;

    /**
     * Determine if the user owns the given team.
     */
    public function ownsTeam(TeamContract $teamContract): bool;

    /**
     * Determine if the user belongs to the given team.
     */
    public function belongsToTeam(TeamContract $teamContract): bool;

    /**
     * Get the role that the user has on the team.
     */
    public function teamRole(TeamContract $teamContract): ?Role;

    /**
     * Determine if the user has the given role on the given team.
     */
    public function hasTeamRole(TeamContract $teamContract, string $role): bool;

    /**
     * Get the user's permissions for the given team.
     *
<<<<<<< HEAD
     * @return array<string>
=======
     * @return array<int, string>
>>>>>>> 350420cb (Check & fix styling)
     */
    public function teamPermissions(TeamContract $teamContract): array;

    /**
     * Determine if the user has the given permission on the given team.
     */
    public function hasTeamPermission(TeamContract $teamContract, string $permission): bool;
}
