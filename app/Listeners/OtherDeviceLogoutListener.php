<?php

declare(strict_types=1);

namespace Modules\User\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\OtherDeviceLogout;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\User\Actions\Authentication\GetAuthenticationLogQueryForAuthenticatableAction;
=======
use Illuminate\Http\Request;
>>>>>>> 350420cb (Check & fix styling)
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
<<<<<<< HEAD
        if ($event->user instanceof Model && $event->user instanceof HasAuthentications) {
            $user = $event->user;
            $ip = $this->request->ip();
            $userAgent = $this->request->userAgent();

            $logQuery = app(GetAuthenticationLogQueryForAuthenticatableAction::class)->execute($user);

            $authenticationLog = $logQuery
                ->where('ip_address', $ip)
                ->where('user_agent', $userAgent)
                ->first();

            if (! $authenticationLog instanceof AuthenticationLog) {
=======
        if ($event->user && $event->user instanceof HasAuthentications) {
            $user = $event->user;
            $ip = $this->request->ip();

            $userAgent = $this->request->userAgent();
            $authenticationLog = $user->authentications()->whereIpAddress($ip)->whereUserAgent($userAgent)->first();

            if (! $authenticationLog) {
>>>>>>> 350420cb (Check & fix styling)
                $authenticationLog = new AuthenticationLog([
                    'ip_address' => $ip,
                    'user_agent' => $userAgent,
                ]);
            }

<<<<<<< HEAD
            $logQuery
                ->where('login_successful', true)
=======
            // Performance optimization: Bulk update instead of N+1 individual updates
            // This reduces 50+ queries to a single UPDATE query
            $user->authentications()
                ->whereLoginSuccessful(true)
>>>>>>> 350420cb (Check & fix styling)
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

<<<<<<< HEAD
        $newIP = $this->request->ip();
        $newUserAgent = $this->request->userAgent();

        $user = $event->user;
        if (! $user instanceof Model || ! $user instanceof HasAuthentications) {
            return;
        }

        $loginQuery = app(GetAuthenticationLogQueryForAuthenticatableAction::class)->execute($user);

        $loginQuery
            ->orderByDesc('login_at')
            ->where(function (Builder $query) use ($newIP, $newUserAgent): void {
                $query->where('ip_address', '!=', $newIP)->orWhere('user_agent', '!=', $newUserAgent);
            })
            ->where('login_successful', true)
            ->get();
=======
        $user = $event->user;
        if (! $user || ! ($user instanceof HasAuthentications)) {
            return;
        }

        // ponytail: "notify_other_devices" config gate has no notification implementation yet.
        // Previous code queried the other-device login logs here and discarded the result
        // (dead query, phpmd UnusedLocalVariable). Upgrade path: once a "new device login"
        // Notification class exists, query $user->authentications() filtered by IP/user agent
        // and dispatch it per log entry.
>>>>>>> 350420cb (Check & fix styling)
    }
}
