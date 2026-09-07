<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Support\Carbon;
use Modules\User\Database\Factories\PasswordResetFactory;
=======
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> 2024e2e7 (.)
=======
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> f589f9b2 (.)

/**
 * Modules\User\Models\PasswordReset.
 *
<<<<<<< HEAD
<<<<<<< HEAD
 * @property int $id
 * @property string $email
 * @property string $token
=======
 * @property int         $id
 * @property string      $email
 * @property string      $token
>>>>>>> 2024e2e7 (.)
=======
 * @property int         $id
 * @property string      $email
 * @property string      $token
>>>>>>> f589f9b2 (.)
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $user_id
 * @property string|null $updated_by
 * @property string|null $created_by
<<<<<<< HEAD
<<<<<<< HEAD
 * @method static PasswordResetFactory factory($count = null, $state = [])
=======
 *
>>>>>>> 2024e2e7 (.)
=======
 *
>>>>>>> f589f9b2 (.)
 * @method static Builder|PasswordReset newModelQuery()
 * @method static Builder|PasswordReset newQuery()
 * @method static Builder|PasswordReset query()
 * @method static Builder|PasswordReset whereCreatedAt($value)
 * @method static Builder|PasswordReset whereCreatedBy($value)
 * @method static Builder|PasswordReset whereEmail($value)
 * @method static Builder|PasswordReset whereId($value)
 * @method static Builder|PasswordReset whereToken($value)
 * @method static Builder|PasswordReset whereUpdatedAt($value)
 * @method static Builder|PasswordReset whereUpdatedBy($value)
 * @method static Builder|PasswordReset whereUserId($value)
<<<<<<< HEAD
<<<<<<< HEAD
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property string|null $uuid
 * @method static Builder<static>|PasswordReset whereUuid($value)
 * @mixin IdeHelperPasswordReset
=======
=======
>>>>>>> f589f9b2 (.)
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property string|null          $uuid
 *
 * @method static Builder<static>|PasswordReset whereUuid($value)
 *
 * @property ProfileContract|null $deleter
 *
 * @method static \Modules\User\Database\Factories\PasswordResetFactory factory($count = null, $state = [])
 *
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
 * @mixin \Eloquent
 */
class PasswordReset extends BaseModel
{
    /**
     * @var list<string>
     *
     * @psalm-var list{'email', 'token', 'created_at', 'updated_at', 'created_by', 'updated_by'}
     */
    protected $fillable = ['email', 'token', 'created_at', 'updated_at', 'created_by', 'updated_by'];

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
    protected $table = 'password_resets';
}

// end class PasswordReset
