<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\Factory;
=======
>>>>>>> laraxot/dev
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification as BaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Modules\Xot\Models\Traits\HasXotFactory;

/**
<<<<<<< HEAD
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
=======
 * @property Model|\Eloquent $notifiable
 *
 * @method static DatabaseNotificationCollection<int, static>          all($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static>          get($columns = ['*'])
 * @method static Builder|Notification                                 newModelQuery()
 * @method static Builder|Notification                                 newQuery()
 * @method static Builder|Notification                                 query()
 * @method static Builder|Notification                                 read()
 * @method static Builder|Notification                                 unread()
 * @method static DatabaseNotificationCollection<int, static>          all($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static>          get($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static>          all($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static>          get($columns = ['*'])
 * @method static \Modules\User\Database\Factories\NotificationFactory factory($count = null, $state = [])
>>>>>>> laraxot/dev
 *
 * @mixin \Eloquent
 */
class Notification extends BaseNotification
{
<<<<<<< HEAD
=======
    /** @phpstan-use HasXotFactory<\Illuminate\Database\Eloquent\Factories\Factory<static>> */
>>>>>>> laraxot/dev
    use HasXotFactory;

    protected $connection = 'user';

    // protected $fillable = ['id', 'user_id', 'client_id', 'name', 'scopes', 'revoked', 'expires_at'];
}
