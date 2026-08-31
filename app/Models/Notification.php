<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification as BaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Modules\Xot\Models\Traits\HasXotFactory;

/**
 * @property-read Model $notifiable
 *
 * @method static DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static \Modules\User\Database\Factories\NotificationFactory factory($count = null, $state = [])
 * @method static DatabaseNotificationCollection<int, static> get($columns = ['*'])
 * @method static Builder<static>|Notification newModelQuery()
 * @method static Builder<static>|Notification newQuery()
 * @method static Builder<static>|Notification query()
 * @method static Builder<static>|Notification read()
 * @method static Builder<static>|Notification unread()
 *
 * @mixin \Eloquent
 */
class Notification extends BaseNotification
{
    use HasXotFactory;

    protected $connection = 'user';

    // protected $fillable = ['id', 'user_id', 'client_id', 'name', 'scopes', 'revoked', 'expires_at'];
}
