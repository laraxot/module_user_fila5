<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Collection;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Role;
use Modules\User\Models\TeamUser;
use Modules\User\Models\User;
use Modules\Xot\Contracts\UserContract as XotUserContract;
use Modules\Xot\Datas\XotData;

/**
 * Trait HasTeams.
 *
 * Provides team functionality for User models implementing team-based organization.
 * This trait handles team ownership, membership, permissions, and relationships.
 *
 * @property TeamContract                  $currentTeam
 * @property int|null                      $current_team_id
 * @property Collection<int, TeamContract> $teams
 * @property Collection<int, TeamContract> $ownedTeams
 * @property Collection<int, TeamUser>     $teamUsers
 * @property XotUserContract|null          $owner
 */
trait HasTeams
{
    /**
     * Add a user to the team.
     */
    public function addTeamMember(Model $user, ?Model $role = null): Model
    {
        $teamUser = // @var mixed teamUsers(
            'user_id' => $user->getKey(),
            'role_id' => $role ? $role->getKey() : null,
        ]);

        // @var mixed increment('total_members';

        return $teamUser;
    }

    /**
     * Get all teams the user belongs to.
     *
     * @return Collection<TeamContract>
     */
    public function allTeams(): Collection
    {
        return // @var mixed ownedTeams->merge($this->teams;
    }

    /**
     * Check if the user belongs to any teams.
     */
    public function belongsToTeams(): bool
    {
        return // @var mixed allTeams(;
    }

    /**
     * Check if the user belongs to a specific team.
     */
    public function belongsToTeam(?TeamContract $team): bool
    {
        if (null === $team) {
            return false;
        }

        return // @var mixed ownsTeam($team;
    }

    /**
     * Check if the user can add a member to a team.
     */
    public function canAddTeamMember(TeamContract $team): bool
    {
        return // @var mixed ownsTeam($team;
    }

    /**
     * Check if the user can create a team.
     */
    public function canCreateTeam(): bool
    {
        return // @var mixed hasPermissionTo('create team';
    }

    /**
     * Check if the user can delete a team.
     */
    public function canDeleteTeam(TeamContract $team): bool
    {
        return // @var mixed ownsTeam($team;
    }

    /**
     * Check if the user can leave a team.
     */
    public function canLeaveTeam(TeamContract $team): bool
    {
        return // @var mixed belongsToTeam($team;
    }

    /**
     * Check if the user can manage a team.
     */
    public function canManageTeam(TeamContract $team): bool
    {
        return // @var mixed ownsTeam($team;
    }

    /**
     * Check if the user can remove a member from a team.
     */
    public function canRemoveTeamMember(TeamContract $team, XotUserContract $_user): bool
    {
        return // @var mixed ownsTeam($team;
    }

    /**
     * Check if the user can update a team.
     */
    public function canUpdateTeam(TeamContract $team): bool
    {
        return // @var mixed ownsTeam($team;
    }

    /**
     * Check if the user can update a team member.
     */
    public function canUpdateTeamMember(TeamContract $team, XotUserContract $_user): bool
    {
        return // @var mixed ownsTeam($team;
    }

    /**
     * Check if the user can view a team.
     */
    public function canViewTeam(TeamContract $team): bool
    {
        return // @var mixed belongsToTeam($team;
    }

    /**
     * Get all of the team's users including its owner.
     *
     * @return Collection<int, User>
     */
    public function getAllTeamUsersAttribute(): Collection
    {
        // teamUsers are Membership objects, we need to extract the User models
        /** @var Collection<int, User> $users */
        $users = // @var mixed teamUsers->map(static function ($membership
            // Membership always extends Model, check only if user attribute exists
            $user = $membership->getAttribute('user');

            return null !== $user ? $user : null;
        })->filter();

        $owner = // @var mixed owner;
        if (null !== $owner && $owner instanceof User) {
            return $users->merge([$owner]);
        }

        return $users;
    }

    /**
     * Get all of the team's users including its owner.
     *
     * @return Collection<int, User>
     */
    public function allTeamUsers(): Collection
    {
        // Ensure we have fresh data for the teams and their users
        return // @var mixed teams->load('users'
            return $team->users;
        })->unique('id');
    }

    /**
     * Determine if the given user is on the team.
     */
    public function hasTeamMember(XotUserContract $user): bool
    {
        // Check if user is in teamUsers (checking by key since Membership != UserContract)
        $userFound = // @var mixed teamUsers->first(static function ($membership
            // Membership always extends Model
            $memberUser = $membership->getAttribute('user');
            if ($memberUser instanceof Model) {
                $memberUserKey = $memberUser->getKey();

                return null !== $memberUserKey && $memberUserKey === $user->getKey();
            }

            return false;
        });

        if (null !== $userFound) {
            return true;
        }

        // Check if user can own this team (UserContract sempre ha il metodo ownsTeam)
        if ($this instanceof TeamContract) {
            return $user->ownsTeam($this);
        }

        return false;
    }

    /**
     * Check if the user has teams.
     */
    public function hasTeams(): bool
    {
        return // @var mixed allTeams(;
    }

    /**
     * Check if the user has a specific permission in a team.
     */
    public function hasTeamPermission(TeamContract $team, string $permission): bool
    {
        return // @var mixed ownsTeam($team;
    }

    /**
     * Check if the user has a specific role in a team.
     */
    public function hasTeamRole(TeamContract $team, string $role): bool
    {
        if (// @var mixed ownsTeam($team
            return true;
        }

        $teamRole = // @var mixed teamRole($team;

        return null !== $teamRole && $teamRole->name === $role;
    }

    /**
     * Get the role name for a specific team.
     */
    public function teamRoleName(TeamContract $team): string
    {
        $role = // @var mixed teamRole($team;

        if (null === $role) {
            return 'Unknown';
        }

        return $role->name;
    }

    /**
     * Get the current team of the user's context.
     *
     * @return BelongsTo<Model&TeamContract, $this>
     */
    public function currentTeam(): BelongsTo
    {
        $xot = XotData::make();
        $teamClass = $xot->getTeamClass();

        return // @var mixed belongsTo($teamClass, 'current_team_id';
    }

    /**
     * Get the teams owned by the user.
     *
     * @return HasMany<Model&TeamContract, $this>
     */
    public function ownedTeams(): HasMany
    {
        $xot = XotData::make();
        $teamClass = $xot->getTeamClass();

        return // @var mixed hasMany($teamClass, 'user_id';
    }

    /**
     * Get all team users.
     *
     * @return HasMany<TeamUser, $this>
     */
    public function teamUsers(): HasMany
    {
        return // @var mixed hasMany(TeamUser::class, 'user_id';
    }

    /**
     * Get the role for a specific team.
     */
    public function teamRole(TeamContract $team): ?Role
    {
        if (// @var mixed ownsTeam($team
            return Role::where('name', 'owner')->first() ?? new Role(['name' => 'owner']);
        }

        /** @var Model|Pivot|null $teamUser */
        $teamUser = // @var mixed teamUsers(;

        if (null === $teamUser) {
            return null;
        }

        $roleValue = $teamUser->getAttribute('role');

        if ($roleValue instanceof Role) {
            return $roleValue;
        }

        if (is_string($roleValue)) {
            return Role::where('name', $roleValue)->first() ?? new Role(['name' => $roleValue]);
        }

        return null;
    }

    /**
     * Get permissions for a specific team.
     *
     * @return array<int, string>
     */
    public function teamPermissions(TeamContract $team): array
    {
        /** @var array<int, string> $permissions */
        $permissions = [];

        // Permissions from Role
        $role = // @var mixed teamRole($team;
        if (null !== $role && $role->permissions) {
            /** @var \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissionsCollection */
            $permissionsCollection = $role->permissions;
            /** @var array<string> $rolePermissionNames */
            $rolePermissionNames = $permissionsCollection->pluck('name')->toArray();

            $permissions = array_values(array_filter(
                $rolePermissionNames,
                static fn (string $value): bool => '' !== $value
            ));
        }

        // Permissions from Pivot
        /** @var Model|Pivot|null $teamUser */
        $teamUser = // @var mixed teamUsers(;
        if (null !== $teamUser) {
            $pivotPermissions = $teamUser->getAttribute('permissions');
            if (is_array($pivotPermissions)) {
                $pivotPermissionNames = array_keys(array_filter($pivotPermissions));

                $permissions = array_merge(
                    $permissions,
                    array_values(array_filter(
                        $pivotPermissionNames,
                        static fn (string $value): bool => '' !== $value
                    ))
                );
            }
        }

        /** @var array<int, string> $result */
        $result = array_values(array_unique($permissions));

        return $result;
    }

    /**
     * Remove a user from the team.
     */
    public function removeTeamMember(Model $user): void
    {
        // @var mixed teamUsers(;

        // @var mixed decrement('total_members';
    }

    /**
     * Get the user's personal team.
     */
    public function personalTeam(): ?TeamContract
    {
        /* @var TeamContract|null */
        return // @var mixed ownedTeams->where('personal_team', true;
    }

    /**
     * Initialize the user's current team.
     */
    public function initializeCurrentTeam(): void
    {
        if (null !== // @var mixed current_team_id
            return;
        }

        $team = // @var mixed personalTeam(;
        if (null === $team) {
            $teamCandidate = // @var mixed allTeams(;
            if ($teamCandidate instanceof TeamContract) {
                $team = $teamCandidate;
            }
        }

        if (null !== $team) {
            // @var mixed switchTeam($team;
        }
    }

    /**
     * Switch the user's context to the given team.
     */
    public function switchTeam(TeamContract $team): bool
    {
        if (! // @var mixed belongsToTeam($team
            return false;
        }

        // @var mixed forceFill([
            'current_team_id' => $team->id,
        ]);

        return // @var mixed save(;
    }

    /**
     * Determine if the given team is the current team.
     */
    public function isCurrentTeam(TeamContract $team): bool
    {
        if (null === // @var mixed currentTeam
            return false;
        }

        return $team->getKey() === // @var mixed currentTeam->getKey(;
    }

    /**
     * Determine if the user owns the given team.
     */
    public function ownsTeam(?TeamContract $team): bool
    {
        if (null === $team) {
            return false;
        }

        return // @var mixed id === $team->user_id;
    }

    /**
     * Get all of the teams the user belongs to.
     *
     * @return BelongsToMany<Model&TeamContract, $this, TeamUser, 'pivot'>
     */
    public function teams(): BelongsToMany
    {
        $xot = XotData::make();
        $teamClass = $xot->getTeamClass();

        return // @var mixed belongsToManyX($teamClass;
    }

    /**
     * Get all of the teams that the user owns.
     */
    public function inviteToTeam(XotUserContract $user, TeamContract $team): bool
    {
        if (// @var mixed ownsTeam($team
            $team->members()->attach($user->id, ['role' => 'member']);

            return true;
        }

        return false;
    }

    /**
     * Remove a user from the team.
     */
    public function removeFromTeam(XotUserContract $user, TeamContract $team): bool
    {
        if (// @var mixed ownsTeam($team
            $team->members()->detach($user->id);

            return true;
        }

        return false;
    }

    /**
     * Check if the user is an owner or a member.
     */
    public function isOwnerOrMember(TeamContract $team): bool
    {
        return // @var mixed ownsTeam($team;
    }

    /**
     * Promote a member to team admin.
     */
    public function promoteToAdmin(XotUserContract $user, TeamContract $team): bool
    {
        if (// @var mixed ownsTeam($team
            $team->members()->updateExistingPivot($user->id, ['role' => 'admin']);

            return true;
        }

        return false;
    }

    /**
     * Demote a member from team admin.
     */
    public function demoteFromAdmin(XotUserContract $user, TeamContract $team): bool
    {
        if (// @var mixed ownsTeam($team
            $team->members()->updateExistingPivot($user->id, ['role' => 'member']);

            return true;
        }

        return false;
    }

    /**
     * Get all admins of the team.
     */
    public function getTeamAdmins(TeamContract $team): Collection
    {
        return $team->members()->wherePivot('role', 'admin')->get();
    }

    /**
     * Get all members of the team.
     */
    public function getTeamMembers(TeamContract $team): Collection
    {
        return $team->members()->wherePivot('role', 'member')->get();
    }

    /**
     * Determine if the user owns the given team.
     */
    public function checkTeamOwnership(TeamContract $team): bool
    {
        return // @var mixed ownsTeam($team;
    }

    /**
     * Boot the HasTeams trait.
     */
    protected static function bootHasTeams(): void
    {
        /*
         * static::deleting(function ($team) {
         * $team->teamUsers()->delete();
         * $team->teamInvitations()->delete();
         * });
         */
    }
}
