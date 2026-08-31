<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;

/**
 * Modules\User\Models\TeamInvitation.
 *
 * @property string|null $email
 * @property string|null $role
 * @property int|string|null $user_id
 * @property-read Profile|null $creator
 * @property-read Team|null $team
 * @property-read Profile|null $updater
 *
 * @method static Builder<static>|TeamInvitation newModelQuery()
 * @method static Builder<static>|TeamInvitation newQuery()
 * @method static Builder<static>|TeamInvitation query()
 *
 * @property int $id
 * @property string $uuid
 * @property string|null $team_id
 * @property Carbon|null $accepted_at
 * @property Carbon|null $declined_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static Builder<static>|TeamInvitation whereAcceptedAt($value)
 * @method static Builder<static>|TeamInvitation whereCreatedAt($value)
 * @method static Builder<static>|TeamInvitation whereCreatedBy($value)
 * @method static Builder<static>|TeamInvitation whereDeclinedAt($value)
 * @method static Builder<static>|TeamInvitation whereDeletedAt($value)
 * @method static Builder<static>|TeamInvitation whereDeletedBy($value)
 * @method static Builder<static>|TeamInvitation whereEmail($value)
 * @method static Builder<static>|TeamInvitation whereId($value)
 * @method static Builder<static>|TeamInvitation whereRole($value)
 * @method static Builder<static>|TeamInvitation whereTeamId($value)
 * @method static Builder<static>|TeamInvitation whereUpdatedAt($value)
 * @method static Builder<static>|TeamInvitation whereUpdatedBy($value)
 * @method static Builder<static>|TeamInvitation whereUserId($value)
 * @method static Builder<static>|TeamInvitation whereUuid($value)
 *
 * @mixin \Eloquent
 */
class TeamInvitation extends BaseModel
{
    protected $connection = 'user';

    /** @var list<string> */
    protected $fillable = [
        'email',
        'role',
        'accepted_at',
        'declined_at',
        'user_id',
    ];

    /**
     * @return BelongsTo<Model, $this>
     */
    public function team(): BelongsTo
    {
        $xotData = XotData::make();
        /** @var class-string<Model> */
        $team_class = $xotData->getTeamClass();

        return $this->belongsTo($team_class);
    }

    /**
     * Accept the invitation.
     */
    public function accept(UserContract $user): void
    {
        if ($this->team) {
            $this->team->users()->attach($user->getKey(), ['role' => $this->role]);
        }
        $this->delete();
    }

    /**
     * Decline the invitation.
     */
    public function decline(): void
    {
        $this->delete();
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'accepted_at' => 'datetime',
            'declined_at' => 'datetime',
        ];
    }
}
