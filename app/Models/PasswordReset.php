<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;

/**
 * Modules\User\Models\PasswordReset.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 *
 * @method static Builder<static>|PasswordReset newModelQuery()
 * @method static Builder<static>|PasswordReset newQuery()
 * @method static Builder<static>|PasswordReset query()
 *
 * @property int $id
 * @property string|null $uuid
 * @property string $email
 * @property string $token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static Builder<static>|PasswordReset whereCreatedAt($value)
 * @method static Builder<static>|PasswordReset whereCreatedBy($value)
 * @method static Builder<static>|PasswordReset whereEmail($value)
 * @method static Builder<static>|PasswordReset whereId($value)
 * @method static Builder<static>|PasswordReset whereToken($value)
 * @method static Builder<static>|PasswordReset whereUpdatedAt($value)
 * @method static Builder<static>|PasswordReset whereUpdatedBy($value)
 * @method static Builder<static>|PasswordReset whereUuid($value)
 *
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
     */
    protected $table = 'password_resets';
}

// end class PasswordReset
