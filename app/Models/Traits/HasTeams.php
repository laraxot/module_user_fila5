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
use Spatie\Permission\Models\Permission;

/**
 * Trait HasTeams.
 *
 * Provides team functionality for User models implementing team-based organization.
 * This trait handles team ownership, membership, permissions, and relationships.
 *
<<<<<<< HEAD
=======
<<<<<<< .merge_file_kLSBpP
>>>>>>> laraxot/dev
 * @property TeamContract                  $currentTeam
 * @property int|null                      $current_team_id
 * @property Collection<int, TeamContract> $membershipTeams
 * @property Collection<int, TeamContract> $ownedTeams
 * @property Collection<int, TeamUser>     $teamUsers
 * @property XotUserContract|null          $owner
<<<<<<< .merge_file_2JpDaI
=======
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
 * @property TeamContract $currentTeam
 * @property int|null $current_team_id
 * @property Collection<int, TeamContract> $membershipTeams
 * @property Collection<int, TeamContract> $ownedTeams
 * @property Collection<int, TeamUser> $teamUsers
 * @property XotUserContract|null $owner
>>>>>>> .merge_file_ZojtcL
=======
 * @property TeamContract                  $currentTeam
 * @property int|null                      $current_team_id
 * @property Collection<int, TeamContract> $membershipTeams
 * @property Collection<int, TeamContract> $ownedTeams
 * @property Collection<int, TeamUser>     $teamUsers
 * @property XotUserContract|null          $owner
<<<<<<< .merge_file_2JpDaI
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DqquNe
>>>>>>> laraxot/dev
>>>>>>> .merge_file_ZojtcL
 */
trait HasTeams
{
    /**
     * Add a user to the team.
     */
    public function addTeamMember(Model $user, ?Model $role = null): Model
    {
        $teamUser = $this->teamUsers()->create([
            'user_id' => $user->getKey(),
            'role_id' => $role ? $role->getKey() : null,
        ]);

        $this->increment('total_members');

        return $teamUser;
    }

    /**
     * Get all teams the user belongs to.
     *
     * @return Collection<int, TeamContract>
     */
    public function allTeams(): Collection
    {
        /** @var Collection<int, TeamContract> $teams */
        $teams = $this->ownedTeams->merge($this->membershipTeams)->sortBy('name');

        return $teams;
    }

    /**
     * Check if the user belongs to any teams.
     */
    public function belongsToTeams(): bool
    {
        return $this->allTeams()->isNotEmpty();
    }

    /**
     * Check if the user belongs to a specific team.
     */
    public function belongsToTeam(?TeamContract $team): bool
    {
<<<<<<< HEAD
        if (null === $team) {
=======
<<<<<<< .merge_file_kLSBpP
        if (null === $team) {
=======
<<<<<<< HEAD
        if ($team === null) {
=======
        if (null === $team) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DqquNe
>>>>>>> laraxot/dev
            return false;
        }

        return $this->ownsTeam($team) || $this->membershipTeams->contains('id', (string) $team->id);
    }

    /**
     * Check if the user can add a member to a team.
     */
    public function canAddTeamMember(TeamContract $team): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'add team member');
    }

    /**
     * Check if the user can create a team.
     */
    public function canCreateTeam(): bool
    {
        return $this->hasPermissionTo('create team'); // @phpstan-ignore method.notFound, return.type
    }

    /**
     * Check if the user can delete a team.
     */
    public function canDeleteTeam(TeamContract $team): bool
    {
        return $this->ownsTeam($team);
    }

    /**
     * Check if the user can leave a team.
     */
    public function canLeaveTeam(TeamContract $team): bool
    {
        return $this->belongsToTeam($team) && ! $this->ownsTeam($team);
    }

    /**
     * Check if the user can manage a team.
     */
    public function canManageTeam(TeamContract $team): bool
    {
        return $this->ownsTeam($team);
    }

    /**
     * Check if the user can remove a member from a team.
     */
    public function canRemoveTeamMember(TeamContract $team, XotUserContract $_user): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'remove team member');
    }

    /**
     * Check if the user can update a team.
     */
    public function canUpdateTeam(TeamContract $team): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'update team');
    }

    /**
     * Check if the user can update a team member.
     */
    public function canUpdateTeamMember(TeamContract $team, XotUserContract $_user): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'update team member');
    }

    /**
     * Check if the user can view a team.
     */
    public function canViewTeam(TeamContract $team): bool
    {
        return $this->belongsToTeam($team) || $this->hasTeamPermission($team, 'view team');
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
        $users = $this->teamUsers->map(static function (TeamUser $membership): ?User {
            // Membership always extends Model, check only if user attribute exists
            return $membership->user;
        })->filter();

        $owner = $this->owner;
<<<<<<< HEAD
        if (null !== $owner && $owner instanceof User) {
=======
<<<<<<< .merge_file_kLSBpP
        if (null !== $owner && $owner instanceof User) {
=======
<<<<<<< HEAD
        if ($owner !== null && $owner instanceof User) {
=======
        if (null !== $owner && $owner instanceof User) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DqquNe
>>>>>>> laraxot/dev
            return $users->merge([$owner]);
        }

        return $users;
    }

    /**
     * Get all of the team's users including its owner.
     *
     * @return Collection<int, User>
     */
    public function allTeamUsers(): Collection // @phpstan-ignore return.type
    {/** @var Collection<int, mixed> $teams */
<<<<<<< HEAD
                                                                                $teams = $this->membershipTeams; // @phpstan-ignore property.nonObject
=======
<<<<<<< .merge_file_kLSBpP
                                                                                    $teams = $this->membershipTeams; // @phpstan-ignore property.nonObject
=======
<<<<<<< HEAD
            $teams = $this->membershipTeams; // @phpstan-ignore property.nonObject
=======
                                                                                    $teams = $this->membershipTeams; // @phpstan-ignore property.nonObject
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DqquNe
>>>>>>> laraxot/dev
        /** @var Collection<int, User> $result */
        $result = $teams->flatMap( // @phpstan-ignore argument.type
            /** @param mixed $team @return array<int,User>|Collection<int,User> */
            static function (mixed $team): array { // @phpstan-ignore return.type
                /** @var array<int,User> $users */
                $users = (array) ($team->users ?? []); // @phpstan-ignore property.nonObject

                return $users;
            })->unique('id');

        return $result;
    }

    /**
     * Determine if the given user is on the team.
     */
    public function hasTeamMember(XotUserContract $user): bool
    {
        // Check if user is in teamUsers (checking by key since Membership != UserContract)
        $userFound = $this->teamUsers->first(static function (TeamUser $membership) use ($user): bool {
            // Membership always extends Model
            $memberUser = $membership->user;
            if ($memberUser instanceof Model) {
                $memberUserKey = $memberUser->getKey();

<<<<<<< HEAD
                return null !== $memberUserKey && $memberUserKey === $user->getKey();
=======
<<<<<<< .merge_file_kLSBpP
                return null !== $memberUserKey && $memberUserKey === $user->getKey();
=======
<<<<<<< HEAD
                return $memberUserKey !== null && $memberUserKey === $user->getKey();
=======
                return null !== $memberUserKey && $memberUserKey === $user->getKey();
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DqquNe
>>>>>>> laraxot/dev
            }

            return false;
        });

<<<<<<< HEAD
        if (null !== $userFound) {
=======
<<<<<<< .merge_file_kLSBpP
        if (null !== $userFound) {
=======
<<<<<<< HEAD
        if ($userFound !== null) {
=======
        if (null !== $userFound) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DqquNe
>>>>>>> laraxot/dev
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
        return $this->allTeams()->isNotEmpty();
    }

    /**
     * Check if the user has a specific permission in a team.
     */
    public function hasTeamPermission(TeamContract $team, string $permission): bool
    {
        return $this->ownsTeam($team) || \in_array($permission, $this->teamPermissions($team), true);
    }

    /**
     * Check if the user has a specific role in a team.
     */
    public function hasTeamRole(TeamContract $team, string $role): bool
    {
        if ($this->ownsTeam($team)) {
            return true;
        }

        $teamRole = $this->teamRole($team);

<<<<<<< HEAD
        return null !== $teamRole && $teamRole->name === $role;
=======
<<<<<<< .merge_file_kLSBpP
        return null !== $teamRole && $teamRole->name === $role;
=======
<<<<<<< HEAD
        return $teamRole !== null && $teamRole->name === $role;
=======
        return null !== $teamRole && $teamRole->name === $role;
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DqquNe
>>>>>>> laraxot/dev
    }

    /**
     * Get the role name for a specific team.
     */
    public function teamRoleName(TeamContract $team): string
    {
        $role = $this->teamRole($team);

<<<<<<< HEAD
        if (null === $role) {
=======
<<<<<<< .merge_file_kLSBpP
        if (null === $role) {
=======
<<<<<<< HEAD
        if ($role === null) {
=======
        if (null === $role) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DqquNe
>>>>>>> laraxot/dev
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

        return $this->belongsTo($teamClass, 'current_team_id');
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

        return $this->hasMany($teamClass, 'user_id');
    }

    /**
     * Get all team users.
     *
     * @return HasMany<TeamUser, $this>
     */
    public function teamUsers(): HasMany
    {
        return $this->hasMany(TeamUser::class, 'user_id');
    }

    /**
     * Get the role for a specific team.
     */
    public function teamRole(TeamContract $team): ?Role
    {
        if ($this->ownsTeam($team)) {
            return Role::where('name', 'owner')->first() ?? new Role(['name' => 'owner']);
        }

        /** @var Model|Pivot|null $teamUser */
        $teamUser = $this->teamUsers()->where('team_id', $team->id)->first();

<<<<<<< HEAD
        if (null === $teamUser) {
=======
<<<<<<< .merge_file_kLSBpP
        if (null === $teamUser) {
=======
<<<<<<< HEAD
        if ($teamUser === null) {
=======
        if (null === $teamUser) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DqquNe
>>>>>>> laraxot/dev
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
        $role = $this->teamRole($team);
<<<<<<< HEAD
        if (null !== $role && $role->permissions) {
=======
<<<<<<< .merge_file_kLSBpP
        if (null !== $role && $role->permissions) {
=======
<<<<<<< HEAD
        if ($role !== null && $role->permissions) {
=======
        if (null !== $role && $role->permissions) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DqquNe
>>>>>>> laraxot/dev
            /** @var \Illuminate\Database\Eloquent\Collection<int, Permission> $permissionsCollection */
            $permissionsCollection = $role->permissions;
            /** @var array<string> $rolePermissionNames */
            $rolePermissionNames = $permissionsCollection->pluck('name')->toArray();

            $permissions = array_values(array_filter(
                $rolePermissionNames,
<<<<<<< HEAD
                static fn (string $value): bool => '' !== $value
=======
<<<<<<< .merge_file_kLSBpP
                static fn (string $value): bool => '' !== $value
=======
<<<<<<< HEAD
                static fn (string $value): bool => $value !== ''
=======
                static fn (string $value): bool => '' !== $value
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DqquNe
>>>>>>> laraxot/dev
            ));
        }

        // Permissions from Pivot
        /** @var Model|Pivot|null $teamUser */
        $teamUser = $this->teamUsers()->where('team_id', (string) $team->id)->first();
<<<<<<< HEAD
        if (null !== $teamUser) {
=======
<<<<<<< .merge_file_kLSBpP
        if (null !== $teamUser) {
=======
<<<<<<< HEAD
        if ($teamUser !== null) {
=======
        if (null !== $teamUser) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DqquNe
>>>>>>> laraxot/dev
            $pivotPermissions = $teamUser->getAttribute('permissions');
            if (is_array($pivotPermissions)) {
                $pivotPermissionNames = array_keys(array_filter($pivotPermissions));

                $permissions = array_merge(
                    $permissions,
                    array_values(array_filter(
                        $pivotPermissionNames,
<<<<<<< HEAD
                        static fn (string $value): bool => '' !== $value
=======
<<<<<<< .merge_file_kLSBpP
                        static fn (string $value): bool => '' !== $value
=======
<<<<<<< HEAD
                        static fn (string $value): bool => $value !== ''
=======
                        static fn (string $value): bool => '' !== $value
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DqquNe
>>>>>>> laraxot/dev
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
        $this->teamUsers()->where('user_id', $user->getKey())->delete();

        $this->decrement('total_members');
    }

    /**
     * Get the user's personal team.
     */
    public function personalTeam(): ?TeamContract
    {
        /* @var TeamContract|null */
        return $this->ownedTeams->where('personal_team', true)->first();
    }

    /**
     * Initialize the user's current team.
     */
    public function initializeCurrentTeam(): void
    {
<<<<<<< HEAD
        if (null !== $this->current_team_id) {
=======
<<<<<<< .merge_file_kLSBpP
        if (null !== $this->current_team_id) {
=======
<<<<<<< HEAD
        if ($this->current_team_id !== null) {
=======
        if (null !== $this->current_team_id) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DqquNe
>>>>>>> laraxot/dev
            return;
        }

        $team = $this->personalTeam();
<<<<<<< HEAD
        if (null === $team) {
=======
<<<<<<< .merge_file_kLSBpP
        if (null === $team) {
=======
<<<<<<< HEAD
        if ($team === null) {
=======
        if (null === $team) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DqquNe
>>>>>>> laraxot/dev
            $teamCandidate = $this->allTeams()->first();
            if ($teamCandidate instanceof TeamContract) {
                $team = $teamCandidate;
            }
        }

<<<<<<< HEAD
        if (null !== $team) {
=======
<<<<<<< .merge_file_kLSBpP
        if (null !== $team) {
=======
<<<<<<< HEAD
        if ($team !== null) {
=======
        if (null !== $team) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DqquNe
>>>>>>> laraxot/dev
            $this->switchTeam($team);
        }
    }

    /**
     * Switch the user's context to the given team.
     */
    public function switchTeam(TeamContract $team): bool
    {
        if (! $this->belongsToTeam($team)) {
            return false;
        }

        $this->forceFill([
            'current_team_id' => $team->id,
        ]);

        return $this->save();
    }

    /**
     * Determine if the given team is the current team.
     */
    public function isCurrentTeam(TeamContract $team): bool
    {
<<<<<<< HEAD
        if (null === $this->currentTeam) {
=======
<<<<<<< .merge_file_kLSBpP
        if (null === $this->currentTeam) {
=======
<<<<<<< HEAD
        if ($this->currentTeam === null) {
=======
        if (null === $this->currentTeam) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DqquNe
>>>>>>> laraxot/dev
            return false;
        }

        return $team->getKey() === $this->currentTeam->getKey();
    }

    /**
     * Determine if the user owns the given team.
     */
    public function ownsTeam(?TeamContract $team): bool
    {
<<<<<<< HEAD
        if (null === $team) {
=======
<<<<<<< .merge_file_kLSBpP
        if (null === $team) {
=======
<<<<<<< HEAD
        if ($team === null) {
=======
        if (null === $team) {
>>>>>>> laraxot/dev
>>>>>>> .merge_file_DqquNe
>>>>>>> laraxot/dev
            return false;
        }

        return $this->id === $team->user_id;
    }

    /**
     * Laraxot team membership (Jetstream-style pivot).
     * Su {@see BaseUser} esposto come {@see membershipTeams()} — {@see HasRoles::teams()} resta Spatie.
     *
     * @return BelongsToMany<Model&TeamContract, Model&static, Pivot, 'pivot'>
     */
    public function teams(): BelongsToMany
    {
        $xot = XotData::make();
        $teamClass = $xot->getTeamClass();

        /** @var BelongsToMany<Model&TeamContract, Model&static, Pivot, 'pivot'> $relation */
        $relation = $this->belongsToManyX($teamClass);

        return $relation;
    }

    /**
     * Get all of the teams that the user owns.
     */
    public function inviteToTeam(XotUserContract $user, TeamContract $team): bool
    {
        if ($this->ownsTeam($team)) {
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
        if ($this->ownsTeam($team)) {
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
        return $this->ownsTeam($team) || $this->belongsToTeam($team);
    }

    /**
     * Promote a member to team admin.
     */
    public function promoteToAdmin(XotUserContract $user, TeamContract $team): bool
    {
        if ($this->ownsTeam($team)) {
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
        if ($this->ownsTeam($team)) {
            $team->members()->updateExistingPivot($user->id, ['role' => 'member']);

            return true;
        }

        return false;
    }

    /**
     * Get all admins of the team.
     *
     * @return Collection<int, Model>
     */
    public function getTeamAdmins(TeamContract $team): Collection
    {
        /** @var Collection<int, Model> $admins */
        $admins = $team->members()->wherePivot('role', 'admin')->get();

        return $admins;
    }

    /**
     * Get all members of the team.
     *
     * @return Collection<int, Model>
     */
    public function getTeamMembers(TeamContract $team): Collection
    {
        /** @var Collection<int, Model> $members */
        $members = $team->members()->wherePivot('role', 'member')->get();

        return $members;
    }

    /**
     * Determine if the user owns the given team.
     */
    public function checkTeamOwnership(TeamContract $team): bool
    {
        return $this->ownsTeam($team);
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
