<?php

declare(strict_types=1);

/**
 * @see https://github.com/rappasoft/laravel-authentication-log/blob/main/src/Models/AuthenticationLog.php
 */

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;

/**
 * @property-read Model $authenticatable
 * @property string|null $authenticatable_type
 * @property int|string|null $authenticatable_id
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property Carbon|null $login_at
 * @property bool|null $login_successful
 * @property Carbon|null $logout_at
 * @property bool|null $cleared_by_user
 * @property array<string, mixed>|null $location
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 *
 * @method static Builder<static>|AuthenticationLog newModelQuery()
 * @method static Builder<static>|AuthenticationLog newQuery()
 * @method static Builder<static>|AuthenticationLog query()
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static Builder<static>|AuthenticationLog whereAuthenticatableId($value)
 * @method static Builder<static>|AuthenticationLog whereAuthenticatableType($value)
 * @method static Builder<static>|AuthenticationLog whereClearedByUser($value)
 * @method static Builder<static>|AuthenticationLog whereCreatedAt($value)
 * @method static Builder<static>|AuthenticationLog whereCreatedBy($value)
 * @method static Builder<static>|AuthenticationLog whereId($value)
 * @method static Builder<static>|AuthenticationLog whereIpAddress($value)
 * @method static Builder<static>|AuthenticationLog whereLocation($value)
 * @method static Builder<static>|AuthenticationLog whereLoginAt($value)
 * @method static Builder<static>|AuthenticationLog whereLoginSuccessful($value)
 * @method static Builder<static>|AuthenticationLog whereLogoutAt($value)
 * @method static Builder<static>|AuthenticationLog whereUpdatedAt($value)
 * @method static Builder<static>|AuthenticationLog whereUpdatedBy($value)
 * @method static Builder<static>|AuthenticationLog whereUserAgent($value)
 *
 * @mixin \Eloquent
 */
class AuthenticationLog extends BaseModel
{
    // public $timestamps = false;

    // protected $table = 'authentication_log';

    protected $fillable = [
        'ip_address',
        'user_agent',
        'login_at',
        'login_successful',
        'logout_at',
        'cleared_by_user',
        'location',
    ];

    // public function __construct(array $attributes = [])
    // {
    // if (! isset($this->connection)) {
    //    $this->setConnection(config('authentication-log.db_connection'));
    // }

    //    parent::__construct($attributes);
    // }

    // public function getTable()
    // {
    //    return config('authentication-log.table_name', parent::getTable());
    // }

    /**
     * @return MorphTo<Model, $this>
     */
    public function authenticatable(): MorphTo
    {
        return $this->morphTo();
    }

    /** @return array<string, string> */
    #[\Override]
    protected function casts(): array
    {
        return [
            'cleared_by_user' => 'boolean',
            'location' => 'array',
            'login_successful' => 'boolean',
            'login_at' => 'datetime',
            'logout_at' => 'datetime',
        ];
    }
}
