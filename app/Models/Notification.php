<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\DatabaseNotification as BaseNotification;

/**
 * @property Model|\Eloquent $notifiable
=======
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification as BaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Modules\Xot\Models\Traits\HasXotFactory;

/**
 * @property Model|\Eloquent $notifiable
 *
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
 * @method static DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static> get($columns = ['*'])
 * @method static Builder|Notification newModelQuery()
 * @method static Builder|Notification newQuery()
 * @method static Builder|Notification query()
 * @method static Builder|Notification read()
 * @method static Builder|Notification unread()
 * @method static DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static> get($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static> get($columns = ['*'])
<<<<<<< HEAD
<<<<<<< HEAD
 * @mixin IdeHelperNotification
=======
 * @method static \Modules\User\Database\Factories\NotificationFactory factory($count = null, $state = [])
 *
>>>>>>> 2024e2e7 (.)
=======
 * @method static \Modules\User\Database\Factories\NotificationFactory factory($count = null, $state = [])
 *
>>>>>>> f589f9b2 (.)
 * @mixin \Eloquent
 */
class Notification extends BaseNotification
{
<<<<<<< HEAD
<<<<<<< HEAD
    use HasFactory;

    /** @var string */
=======
    use HasXotFactory;

>>>>>>> 2024e2e7 (.)
=======
    use HasXotFactory;

>>>>>>> f589f9b2 (.)
    protected $connection = 'user';

    // protected $fillable = ['id', 'user_id', 'client_id', 'name', 'scopes', 'revoked', 'expires_at'];
}
