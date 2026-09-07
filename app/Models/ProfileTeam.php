<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;

/**
 * ProfileTeam Model
=======
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;

/**
 * ProfileTeam Model.
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
 *
 * Represents the relationship between a profile and a team, including the user's role.
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
<<<<<<< HEAD
<<<<<<< HEAD
 * @property string $id
 * @property int $team_id
 * @property string|null $user_id
 * @property string|null $role
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
=======
=======
>>>>>>> f589f9b2 (.)
 * @property string               $id
 * @property int                  $team_id
 * @property string|null          $user_id
 * @property string|null          $role
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $updated_by
 * @property string|null          $created_by
 * @property Carbon|null          $deleted_at
 * @property string|null          $deleted_by
 *
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
 * @method static Builder<static>|ProfileTeam newModelQuery()
 * @method static Builder<static>|ProfileTeam newQuery()
 * @method static Builder<static>|ProfileTeam query()
 * @method static Builder<static>|ProfileTeam whereCreatedAt($value)
 * @method static Builder<static>|ProfileTeam whereCreatedBy($value)
 * @method static Builder<static>|ProfileTeam whereDeletedAt($value)
 * @method static Builder<static>|ProfileTeam whereDeletedBy($value)
 * @method static Builder<static>|ProfileTeam whereId($value)
 * @method static Builder<static>|ProfileTeam whereRole($value)
 * @method static Builder<static>|ProfileTeam whereTeamId($value)
 * @method static Builder<static>|ProfileTeam whereUpdatedAt($value)
 * @method static Builder<static>|ProfileTeam whereUpdatedBy($value)
 * @method static Builder<static>|ProfileTeam whereUserId($value)
<<<<<<< HEAD
<<<<<<< HEAD
 * @mixin IdeHelperProfileTeam
=======
=======
>>>>>>> f589f9b2 (.)
 *
 * @property ProfileContract|null         $deleter
 * @property Team|null                    $team
 * @property User|null                    $user
 * @property string|null                  $profile_id
 * @property array<array-key, mixed>|null $permissions
 *
 * @method static Builder<static>|ProfileTeam                         childrenWith(array<int|string, mixed> $relations)
 * @method static Builder<static>|ProfileTeam                         childrenWithCount(array<int|string, mixed> $relations)
 * @method static \Modules\User\Database\Factories\ProfileTeamFactory factory($count = null, $state = [])
 * @method static Builder<static>|ProfileTeam                         wherePermissions($value)
 * @method static Builder<static>|ProfileTeam                         whereProfileId($value)
 *
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
 * @mixin \Eloquent
 */
class ProfileTeam extends TeamUser
{
    /**
     * The table associated with the model.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @var string
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     */
    protected $table = 'profile_team';
}
