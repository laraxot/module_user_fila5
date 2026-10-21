<?php

declare(strict_types=1);
/**
 * @see https://github.com/rappasoft/laravel-authentication-log/blob/main/src/Listeners/FailedLoginListener.php
 */

namespace Modules\User\Listeners;

use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Modules\User\Actions\Auth\RecordAuthenticationLogAction;
use Modules\User\Contracts\HasAuthentications;
use Modules\User\Contracts\UserContract;

class FailedLoginListener
{
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     */
    public function handle(Failed $event): void
    {
<<<<<<< .merge_file_ntjKY0
        if ($event->user instanceof BaseUser) {
            $ip = $this->request->ip();
            $userAgent = $this->request->userAgent();
            // $location = optional(geoip()->getLocation($ip))->toArray();
            $location = [];

            $event
                ->user
                ->authentications()
                ->create([
                    'ip_address' => $ip,
                    'user_agent' => $userAgent,
                    'login_at' => now(),
                    'login_successful' => false,
                    'location' => $location,
                ]);

            // Notifiche disabilitate: per riattivarle catturare il risultato di create() in $log e passarlo a FailedLogin.
            // if (config('authentication-log.notifications.failed-login.enabled')) {
            //    $failedLogin = config('authentication-log.notifications.failed-login.template') ?? FailedLogin::class;
            //    $event->user->notify(new $failedLogin($log));
            // }
=======
        // Identità = UserContract; capability log = HasAuthentications (non l'astratta interna).
        if (! $event->user instanceof UserContract || ! $event->user instanceof HasAuthentications) {
            return;
>>>>>>> .merge_file_K9G7l9
        }

        app(RecordAuthenticationLogAction::class)->execute($event->user, [
            'ip_address' => $this->request->ip(),
            'user_agent' => $this->request->userAgent(),
            'login_at' => now(),
            'login_successful' => false,
            'location' => [],
        ]);
    }
}
