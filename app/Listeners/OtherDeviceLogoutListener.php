<?php

declare(strict_types=1);

namespace Modules\User\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\OtherDeviceLogout;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
=======
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\User\Actions\Authentication\GetAuthenticationLogQueryForAuthenticatableAction;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
        if ($event->user && $event->user instanceof HasAuthentications) {
            $user = $event->user;
            $ip = $this->request->ip();

            $userAgent = $this->request->userAgent();
            $authenticationLog = $user->authentications()->whereIpAddress($ip)->whereUserAgent($userAgent)->first();

            if (!$authenticationLog) {
=======
=======
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
                $authenticationLog = new AuthenticationLog([
                    'ip_address' => $ip,
                    'user_agent' => $userAgent,
                ]);
            }

<<<<<<< HEAD
<<<<<<< HEAD
            foreach ($user->authentications()->whereLoginSuccessful(true)->whereNull('logout_at')->get() as $log) {
                if ($log->getKey() !== $authenticationLog->getKey()) {
                    $log->update([
                        'cleared_by_user' => true,
                        'logout_at' => now(),
                    ]);
                }
            }
=======
=======
>>>>>>> f589f9b2 (.)
            $logQuery
                ->where('login_successful', true)
                ->whereNull('logout_at')
                ->where('id', '!=', $authenticationLog->getKey())
                ->update([
                    'cleared_by_user' => true,
                    'logout_at' => now(),
                ]);
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
        }
    }

    /**
     * Handle the event.
     */
    public function handleLogin(Login $event): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        if (!config('authentication-log.notify_other_devices', false)) {
=======
        if (! config('authentication-log.notify_other_devices', false)) {
>>>>>>> 2024e2e7 (.)
=======
        if (! config('authentication-log.notify_other_devices', false)) {
>>>>>>> f589f9b2 (.)
            return;
        }

        $newIP = $this->request->ip();
        $newUserAgent = $this->request->userAgent();

        $user = $event->user;
<<<<<<< HEAD
<<<<<<< HEAD
        if (!$user || !($user instanceof HasAuthentications)) {
            return;
        }

        $logs = $user
            ->authentications()
            ->orderByDesc('login_at')
            ->where(function ($query) use ($newIP, $newUserAgent) {
=======
=======
>>>>>>> f589f9b2 (.)
        if (! $user instanceof Model || ! $user instanceof HasAuthentications) {
            return;
        }

        $loginQuery = app(GetAuthenticationLogQueryForAuthenticatableAction::class)->execute($user);

        $loginQuery
            ->orderByDesc('login_at')
            ->where(function (Builder $query) use ($newIP, $newUserAgent): void {
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
                $query->where('ip_address', '!=', $newIP)->orWhere('user_agent', '!=', $newUserAgent);
            })
            ->where('login_successful', true)
            ->get();
    }
}
