<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;

/**
 * Authentication Model.
 *
 * Tracks user authentication attempts and sessions.
 *
 * @property-read Model $authenticatable
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 *
 * @method static Builder<static>|Authentication newModelQuery()
 * @method static Builder<static>|Authentication newQuery()
 * @method static Builder<static>|Authentication query()
 *
 * @property int $id
 * @property string $type
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property string|null $location
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static Builder<static>|Authentication whereCreatedAt($value)
 * @method static Builder<static>|Authentication whereCreatedBy($value)
 * @method static Builder<static>|Authentication whereId($value)
 * @method static Builder<static>|Authentication whereIpAddress($value)
 * @method static Builder<static>|Authentication whereLocation($value)
 * @method static Builder<static>|Authentication whereType($value)
 * @method static Builder<static>|Authentication whereUpdatedAt($value)
 * @method static Builder<static>|Authentication whereUpdatedBy($value)
 * @method static Builder<static>|Authentication whereUserAgent($value)
 *
 * @mixin \Eloquent
 */
class Authentication extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'type',
        'ip_address',
        'user_agent',
        'location',
        'login_at',
        'login_successful',
        'logout_at',
        'authenticatable_type',
        'authenticatable_id',
    ];

    /**
     * @return MorphTo<Model, $this>
     */
    public function authenticatable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'login_at' => 'datetime',
            'logout_at' => 'datetime',
            'login_successful' => 'boolean',
        ];
    }
}
