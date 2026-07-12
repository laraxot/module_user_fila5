<?php

declare(strict_types=1);

namespace Modules\User\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\OtherDeviceLogout;
use Illuminate\Http\Request;
use Modules\User\Contracts\HasAuthentications;
use Modules\User\Models\AuthenticationLog;

// use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;

class OtherDeviceLogoutListener
{
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle(OtherDeviceLogout $event): void
    {
        if ($event->user && $event->user instanceof HasAuthentications) {
            $user = $event->user;
            $ip = $this->request->ip();

            $userAgent = $this->request->userAgent();
            $authenticationLog = $user->authentications()->whereIpAddress($ip)->whereUserAgent($userAgent)->first();

            if (! $authenticationLog) {
                $authenticationLog = new AuthenticationLog([
                    'ip_address' => $ip,
                    'user_agent' => $userAgent,
                ]);
            }

            // Performance optimization: Bulk update instead of N+1 individual updates
            // This reduces 50+ queries to a single UPDATE query
            $user->authentications()
                ->whereLoginSuccessful(true)
                ->whereNull('logout_at')
                ->where('id', '!=', $authenticationLog->getKey())
                ->update([
                    'cleared_by_user' => true,
                    'logout_at' => now(),
                ]);
        }
    }

    /**
     * Handle the event.
     */
    public function handleLogin(Login $event): void
    {
        if (! config('authentication-log.notify_other_devices', false)) {
            return;
        }

        $user = $event->user;
        if (! $user || ! ($user instanceof HasAuthentications)) {
            return;
        }

        // ponytail: "notify_other_devices" config gate has no notification implementation yet.
        // Previous code queried the other-device login logs here and discarded the result
        // (dead query, phpmd UnusedLocalVariable). Upgrade path: once a "new device login"
        // Notification class exists, query $user->authentications() filtered by IP/user agent
        // and dispatch it per log entry.
    }
}
