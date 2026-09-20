<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> f548be94 (.)
=======
use Modules\Xot\Contracts\ProfileContract;
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\User\Contracts\TeamContract;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Contracts\UserContract;
=======
use Modules\User\Database\Factories\TeamInvitationFactory;
>>>>>>> f548be94 (.)
=======
use Modules\User\Database\Factories\TeamInvitationFactory;
=======
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Contracts\UserContract;
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Contracts\UserContract;
>>>>>>> laraxot/dev
use Modules\Xot\Datas\XotData;

/**
 * Modules\User\Models\TeamInvitation.
 *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 * @property int               $id
 * @property string|null       $team_id
 * @property string            $email
 * @property string|null       $role
 * @property Carbon|null       $created_at
 * @property Carbon|null       $updated_at
 * @property Team|null         $team
 * @property TeamContract|null $team
=======
=======
>>>>>>> 87273113 (.)
 * @property int $id
 * @property string|null $team_id
 * @property string $email
 * @property string|null $role
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Team|null $team
 * @property TeamContract|null $team
 * @method static TeamInvitationFactory factory($count = null, $state = [])
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
=======
>>>>>>> laraxot/dev
 * @property int               $id
 * @property string|null       $team_id
 * @property string            $email
 * @property string|null       $role
 * @property Carbon|null       $created_at
 * @property Carbon|null       $updated_at
 * @property Team|null         $team
 * @property TeamContract|null $team
 *
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
 * @method static Builder|TeamInvitation newModelQuery()
 * @method static Builder|TeamInvitation newQuery()
 * @method static Builder|TeamInvitation query()
 * @method static Builder|TeamInvitation whereCreatedAt($value)
 * @method static Builder|TeamInvitation whereEmail($value)
 * @method static Builder|TeamInvitation whereId($value)
 * @method static Builder|TeamInvitation whereRole($value)
 * @method static Builder|TeamInvitation whereTeamId($value)
 * @method static Builder|TeamInvitation whereUpdatedAt($value)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 * @property string      $uuid
=======
 * @property string $uuid
>>>>>>> f548be94 (.)
=======
 * @property string $uuid
=======
 *
 * @property string      $uuid
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
 *
 * @property string      $uuid
>>>>>>> laraxot/dev
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
<<<<<<< HEAD
<<<<<<< HEAD
=======
 *
>>>>>>> 2024e2e7 (.)
=======
 *
>>>>>>> laraxot/dev
 * @method static Builder|TeamInvitation whereCreatedBy($value)
 * @method static Builder|TeamInvitation whereDeletedAt($value)
 * @method static Builder|TeamInvitation whereDeletedBy($value)
 * @method static Builder|TeamInvitation whereUpdatedBy($value)
 * @method static Builder|TeamInvitation whereUuid($value)
<<<<<<< HEAD
<<<<<<< HEAD
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
<<<<<<< HEAD
 * @property ProfileContract|null $deleter
 * @property Carbon|null          $accepted_at
 * @property Carbon|null          $declined_at
 * @property string|null          $user_id
 * @method static \Modules\User\Database\Factories\TeamInvitationFactory factory($count = null, $state = [])
 * @method static Builder<static>|TeamInvitation                         whereAcceptedAt($value)
 * @method static Builder<static>|TeamInvitation                         whereDeclinedAt($value)
 * @method static Builder<static>|TeamInvitation                         whereUserId($value)
=======
 * @mixin IdeHelperTeamInvitation
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
=======
>>>>>>> laraxot/dev
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 * @property Carbon|null          $accepted_at
 * @property Carbon|null          $declined_at
 * @property string|null          $user_id
 *
 * @method static \Modules\User\Database\Factories\TeamInvitationFactory factory($count = null, $state = [])
 * @method static Builder<static>|TeamInvitation                         whereAcceptedAt($value)
 * @method static Builder<static>|TeamInvitation                         whereDeclinedAt($value)
 * @method static Builder<static>|TeamInvitation                         whereUserId($value)
 *
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
 * @mixin \Eloquent
 */
class TeamInvitation extends BaseModel
{
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
    /** @var string */
>>>>>>> f548be94 (.)
=======
    /** @var string */
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
    protected $connection = 'user';

    /** @var list<string> */
    protected $fillable = [
        'email',
        'role',
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
        'accepted_at',
        'declined_at',
        'user_id',
    ];

    /**
     * @return BelongsTo<Model, $this>
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
    ];

    /**
     * Get the team that the invitation belongs to.
     *  BelongsTo<the related model, the current model>
     * -return BelongsTo<TeamContract, TeamInvitation> No TeamContract ..
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
        'accepted_at',
        'declined_at',
        'user_id',
    ];

    /**
     * @return BelongsTo<Model, $this>
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
     */
    public function team(): BelongsTo
    {
        $xotData = XotData::make();
        /** @var class-string<Model> */
        $team_class = $xotData->getTeamClass();

        return $this->belongsTo($team_class);
    }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev

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
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f548be94 (.)
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
}
