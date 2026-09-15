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
 * @property Model|\Eloquent $notifiable
 *
 * <<<<<<< .merge_file_OVmrHF
 *
 * @method static DatabaseNotificationCollection<int, static> all($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static> get($columns = ['*'])
 *                                                                                  =======
 *                                                                                  <<<<<<< .merge_file_BgADkR
 *
 * =======
 * <<<<<<< HEAD
 * =======
 * <<<<<<< HEAD
 *
 * >>>>>>> laraxot/dev
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
 *                                                                                                         <<<<<<< HEAD
 *                                                                                                         =======
 *                                                                                                         =======
 *                                                                                                         >>>>>>> .merge_file_1rAdsF
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
 *                                                                                                         <<<<<<< .merge_file_BgADkR
 * @method static DatabaseNotificationCollection<int, static>          all($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static>          get($columns = ['*'])
 *                                                                                                         >>>>>>> .merge_file_M8qljT
 * @method static Builder|Notification                                 newModelQuery()
 * @method static Builder|Notification                                 newQuery()
 * @method static Builder|Notification                                 query()
 * @method static Builder|Notification                                 read()
 * @method static Builder|Notification                                 unread()
 * @method static DatabaseNotificationCollection<int, static>          all($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static>          get($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static>          all($columns = ['*'])
 * @method static DatabaseNotificationCollection<int, static>          get($columns = ['*'])
 *                                                                                                         <<<<<<< .merge_file_OVmrHF
 *                                                                                                         =======
 *                                                                                                         =======
 *                                                                                                         >>>>>>> laraxot/dev
 *                                                                                                         >>>>>>> .merge_file_1rAdsF
 *                                                                                                         >>>>>>> laraxot/dev
 *                                                                                                         >>>>>>> .merge_file_M8qljT
 * @method static \Modules\User\Database\Factories\NotificationFactory factory($count = null, $state = [])
 *
 * @mixin \Eloquent
 */
class Notification extends BaseNotification
{
    use HasXotFactory;

    protected $connection = 'user';

    // protected $fillable = ['id', 'user_id', 'client_id', 'name', 'scopes', 'revoked', 'expires_at'];
}
