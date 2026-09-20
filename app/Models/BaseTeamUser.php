<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
=======
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Support\Carbon;
>>>>>>> f548be94 (.)
=======
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Support\Carbon;
=======
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
use Parental\HasChildren;

/**
 * Modules\User\Models\TeamUser.
 *
 * @method static Builder|TeamUser newModelQuery()
 * @method static Builder|TeamUser newQuery()
 * @method static Builder|TeamUser query()
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 *
 * @property int         $id
 * @property string      $uuid
=======
 * @property int $id
 * @property string $uuid
>>>>>>> f548be94 (.)
=======
 * @property int $id
 * @property string $uuid
=======
 *
 * @property int         $id
 * @property string      $uuid
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
 *
 * @property int         $id
 * @property string      $uuid
>>>>>>> laraxot/dev
 * @property string|null $team_id
 * @property string|null $user_id
 * @property string|null $role
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $customer_id
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 *
=======
>>>>>>> f548be94 (.)
=======
=======
 *
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
 *
>>>>>>> laraxot/dev
 * @method static Builder|TeamUser whereCreatedAt($value)
 * @method static Builder|TeamUser whereCreatedBy($value)
 * @method static Builder|TeamUser whereCustomerId($value)
 * @method static Builder|TeamUser whereId($value)
 * @method static Builder|TeamUser whereRole($value)
 * @method static Builder|TeamUser whereTeamId($value)
 * @method static Builder|TeamUser whereUpdatedAt($value)
 * @method static Builder|TeamUser whereUpdatedBy($value)
 * @method static Builder|TeamUser whereUserId($value)
 * @method static Builder|TeamUser whereUuid($value)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
 *
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static Builder|TeamUser whereDeletedAt($value)
 * @method static Builder|TeamUser whereDeletedBy($value)
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 * @method static Builder|TeamUser whereDeletedAt($value)
 * @method static Builder|TeamUser whereDeletedBy($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
 *
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static Builder|TeamUser whereDeletedAt($value)
 * @method static Builder|TeamUser whereDeletedBy($value)
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
 * @mixin \Eloquent
 */
abstract class BaseTeamUser extends BasePivot
{
    use HasChildren;

    protected $connection = 'user';
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

    protected $table = 'team_user';
=======
    protected $table = 'team_user';
=======

    protected $table = 'team_user';
>>>>>>> 87273113 (.)
=======

    protected $table = 'team_user';
>>>>>>> laraxot/dev

    /**
     * Relazione con User.
     *
     * @return BelongsTo<Model&UserContract, $this>
     */
    public function user(): BelongsTo
    {
        $userClass = XotData::make()->getUserClass();

        /* @var BelongsTo<Model&UserContract, $this> */
        return $this->belongsTo($userClass);
    }

    /**
     * Relazione con Team.
     *
     * @return BelongsTo<Model&TeamContract, $this>
     */
    public function team(): BelongsTo
    {
        $teamClass = XotData::make()->getTeamClass();

        /* @var BelongsTo<Model&TeamContract, $this> */
        return $this->belongsTo($teamClass);
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
    protected $table = 'team_user';
>>>>>>> f548be94 (.)
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
}
