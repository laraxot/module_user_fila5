<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
<<<<<<< HEAD
use Modules\TechPlanner\Models\Profile;
use Modules\Xot\Models\Traits\HasXotFactory;
=======
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> laraxot/dev

/**
 * Class Modules\User\Models\Team.
 *
<<<<<<< HEAD
 * @property-read Profile|null $creator
 * @property-read TeamUser|null $pivot
 * @property-read Collection<int, User> $members
 * @property-read int|null $members_count
 * @property-read User|null $owner
 * @property-read Collection<int, TeamPermission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection<int, TeamInvitation> $teamInvitations
 * @property-read int|null $team_invitations_count
 * @property-read Collection<int, TeamUser> $teamUsers
 * @property-read int|null $team_users_count
 * @property-read Profile|null $updater
 * @property-read Collection<int, User> $users
 * @property-read int|null $users_count
 *
 * @method static Builder<static>|Team newModelQuery()
 * @method static Builder<static>|Team newQuery()
 * @method static Builder<static>|Team query()
 *
 * @property int $id
 * @property string|null $owner_id
 * @property string|null $uuid
 * @property string|null $user_id
 * @property string $name
 * @property bool $personal_team
 * @property string|null $code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property string|null $slug
 * @property string|null $description
 * @property string|null $avatar_path
 * @property array<array-key, mixed>|null $settings
 *
 * @method static \Modules\User\Database\Factories\TeamFactory factory($count = null, $state = [])
 * @method static Builder<static>|Team whereAvatarPath($value)
 * @method static Builder<static>|Team whereCode($value)
 * @method static Builder<static>|Team whereCreatedAt($value)
 * @method static Builder<static>|Team whereCreatedBy($value)
 * @method static Builder<static>|Team whereDeletedAt($value)
 * @method static Builder<static>|Team whereDeletedBy($value)
 * @method static Builder<static>|Team whereDescription($value)
 * @method static Builder<static>|Team whereId($value)
 * @method static Builder<static>|Team whereName($value)
 * @method static Builder<static>|Team whereOwnerId($value)
 * @method static Builder<static>|Team wherePersonalTeam($value)
 * @method static Builder<static>|Team whereSettings($value)
 * @method static Builder<static>|Team whereSlug($value)
 * @method static Builder<static>|Team whereUpdatedAt($value)
 * @method static Builder<static>|Team whereUpdatedBy($value)
 * @method static Builder<static>|Team whereUserId($value)
 * @method static Builder<static>|Team whereUuid($value)
=======
 * @property string                          $id
 * @property string                          $user_id                (DC2Type:guid)
 * @property string                          $name
 * @property int                             $personal_team
 * @property Carbon|null                     $created_at
 * @property Carbon|null                     $updated_at
 * @property string|null                     $updated_by
 * @property string|null                     $created_by
 * @property Carbon|null                     $deleted_at
 * @property string|null                     $deleted_by
 * @property ProfileContract|null            $creator
 * @property TeamUser                        $pivot
 * @property Collection<int, User>           $members
 * @property int|null                        $members_count
 * @property User|null                       $owner
 * @property Collection<int, TeamInvitation> $teamInvitations
 * @property int|null                        $team_invitations_count
 * @property ProfileContract|null            $updater
 * @property Collection<int, User>           $users
 * @property int|null                        $users_count
 *
 * @method static Builder|Team newModelQuery()
 * @method static Builder|Team newQuery()
 * @method static Builder|Team query()
 * @method static Builder|Team whereCreatedAt($value)
 * @method static Builder|Team whereCreatedBy($value)
 * @method static Builder|Team whereDeletedAt($value)
 * @method static Builder|Team whereDeletedBy($value)
 * @method static Builder|Team whereId($value)
 * @method static Builder|Team whereName($value)
 * @method static Builder|Team wherePersonalTeam($value)
 * @method static Builder|Team whereUpdatedAt($value)
 * @method static Builder|Team whereUpdatedBy($value)
 * @method static Builder|Team whereUserId($value)
 *
 * @property string|null $code
 *
 * @method static Builder|Team whereCode($value)
 *
 * @property string|null $uuid
 *
 * @method static Builder<static>|Team whereUuid($value)
 *
 * @property string|null $owner_id
 *
 * @method static Builder<static>|Team whereOwnerId($value)
 * @method static static               create(array<string, mixed> $attributes = [])
 * @method static static               firstOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 * @method static static               updateOrCreate(array<string, mixed> $attributes, array<string, mixed> $values = [])
 *
 * @property ProfileContract|null $deleter
 *
 * @method static \Modules\User\Database\Factories\TeamFactory factory($count = null, $state = [])
 *
 * @property string|null                     $slug
 * @property string|null                     $description
 * @property string|null                     $avatar_path
 * @property array<array-key, mixed>|null    $settings
 * @property Collection<int, TeamPermission> $permissions
 * @property int|null                        $permissions_count
 * @property Collection<int, TeamUser>       $teamUsers
 * @property int|null                        $team_users_count
 *
 * @method static Builder<static>|Team whereAvatarPath($value)
 * @method static Builder<static>|Team whereDescription($value)
 * @method static Builder<static>|Team whereSettings($value)
 * @method static Builder<static>|Team whereSlug($value)
>>>>>>> laraxot/dev
 *
 * @mixin \Eloquent
 */
class Team extends BaseTeam
{
<<<<<<< HEAD
    use HasXotFactory;

=======
>>>>>>> laraxot/dev
    // use SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'avatar_path',
        'personal_team',
        'settings',
    ];

    /**
     * @return HasMany<TeamPermission, $this>
     */
    public function permissions(): HasMany
    {
        return $this->hasMany(TeamPermission::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'personal_team' => 'boolean',
            'settings' => 'array',
        ];
    }
}
