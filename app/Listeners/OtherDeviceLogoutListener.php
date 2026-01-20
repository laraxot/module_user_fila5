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
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
>>>>>>> f548be94 (.)
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

            if (!$authenticationLog) {
>>>>>>> f548be94 (.)
                $authenticationLog = new AuthenticationLog([
                    'ip_address' => $ip,
                    'user_agent' => $userAgent,
                ]);
            }

<<<<<<< HEAD
            $logQuery
                ->where('login_successful', true)
                ->whereNull('logout_at')
                ->where('id', '!=', $authenticationLog->getKey())
                ->update([
                    'cleared_by_user' => true,
                    'logout_at' => now(),
                ]);
=======
            foreach ($user->authentications()->whereLoginSuccessful(true)->whereNull('logout_at')->get() as $log) {
                if ($log->getKey() !== $authenticationLog->getKey()) {
                    $log->update([
                        'cleared_by_user' => true,
                        'logout_at' => now(),
                    ]);
                }
            }
>>>>>>> f548be94 (.)
        }
    }

    /**
     * Handle the event.
     */
    public function handleLogin(Login $event): void
    {
<<<<<<< HEAD
        if (! config('authentication-log.notify_other_devices', false)) {
=======
        if (!config('authentication-log.notify_other_devices', false)) {
>>>>>>> f548be94 (.)
            return;
        }

        $newIP = $this->request->ip();
        $newUserAgent = $this->request->userAgent();

        $user = $event->user;
<<<<<<< HEAD
        if (! $user instanceof Model || ! $user instanceof HasAuthentications) {
            return;
        }

        $loginQuery = app(GetAuthenticationLogQueryForAuthenticatableAction::class)->execute($user);

        $loginQuery
            ->orderByDesc('login_at')
            ->where(function (Builder $query) use ($newIP, $newUserAgent): void {
=======
        if (!$user || !($user instanceof HasAuthentications)) {
            return;
        }

        $logs = $user
            ->authentications()
            ->orderByDesc('login_at')
            ->where(function ($query) use ($newIP, $newUserAgent) {
>>>>>>> f548be94 (.)
                $query->where('ip_address', '!=', $newIP)->orWhere('user_agent', '!=', $newUserAgent);
            })
            ->where('login_successful', true)
            ->get();
    }
}
