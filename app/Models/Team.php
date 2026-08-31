<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;
use Modules\Xot\Models\Traits\HasXotFactory;

/**
 * Class Modules\User\Models\Team.
 *
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
 *
 * @mixin \Eloquent
 */
class Team extends BaseTeam
{
    use HasXotFactory;

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
