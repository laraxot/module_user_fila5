<?php

declare(strict_types=1);

/**
 * @see https://github.com/rappasoft/laravel-authentication-log/blob/main/src/Listeners/FailedLoginListener.php
 */

namespace Modules\User\Listeners;

use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Modules\User\Models\BaseUser;
=======
use Modules\User\Contracts\HasAuthentications;
>>>>>>> f548be94 (.)

// use Rappasoft\LaravelAuthenticationLog\Notifications\FailedLogin;
// use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;

class FailedLoginListener
{
    protected Request $request;

<<<<<<< HEAD
=======
    /**
     * @param Request $request
     */
>>>>>>> f548be94 (.)
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     */
    public function handle(Failed $event): void
    {
<<<<<<< HEAD
        if ($event->user instanceof BaseUser) {
=======
        if ($event->user && $event->user instanceof HasAuthentications) {
>>>>>>> f548be94 (.)
            $ip = $this->request->ip();
            $userAgent = $this->request->userAgent();
            // $location = optional(geoip()->getLocation($ip))->toArray();
            $location = [];

<<<<<<< HEAD
            $event
=======
            $log = $event
>>>>>>> f548be94 (.)
                ->user
                ->authentications()
                ->create([
                    'ip_address' => $ip,
                    'user_agent' => $userAgent,
                    'login_at' => now(),
                    'login_successful' => false,
                    'location' => $location,
                ]);

            // if (config('authentication-log.notifications.failed-login.enabled')) {
            //    $failedLogin = config('authentication-log.notifications.failed-login.template') ?? FailedLogin::class;
            //    $event->user->notify(new $failedLogin($log));
            // }
        }
    }
}
