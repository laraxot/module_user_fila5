<?php

declare(strict_types=1);

namespace Modules\User\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\OtherDeviceLogout;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\User\Actions\Authentication\GetAuthenticationLogQueryForAuthenticatableAction;
<<<<<<< HEAD
=======
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
>>>>>>> f548be94 (.)
=======
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
=======
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Modules\User\Actions\Authentication\GetAuthenticationLogQueryForAuthenticatableAction;
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
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
=======
=======
>>>>>>> 87273113 (.)
        if ($event->user && $event->user instanceof HasAuthentications) {
            $user = $event->user;
            $ip = $this->request->ip();

            $userAgent = $this->request->userAgent();
            $authenticationLog = $user->authentications()->whereIpAddress($ip)->whereUserAgent($userAgent)->first();

            if (!$authenticationLog) {
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
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
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
                $authenticationLog = new AuthenticationLog([
                    'ip_address' => $ip,
                    'user_agent' => $userAgent,
                ]);
            }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
            $logQuery
                ->where('login_successful', true)
                ->whereNull('logout_at')
                ->where('id', '!=', $authenticationLog->getKey())
                ->update([
                    'cleared_by_user' => true,
                    'logout_at' => now(),
                ]);
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
            foreach ($user->authentications()->whereLoginSuccessful(true)->whereNull('logout_at')->get() as $log) {
                if ($log->getKey() !== $authenticationLog->getKey()) {
                    $log->update([
                        'cleared_by_user' => true,
                        'logout_at' => now(),
                    ]);
                }
            }
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
            $logQuery
                ->where('login_successful', true)
                ->whereNull('logout_at')
                ->where('id', '!=', $authenticationLog->getKey())
                ->update([
                    'cleared_by_user' => true,
                    'logout_at' => now(),
                ]);
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
        }
    }

    /**
     * Handle the event.
     */
    public function handleLogin(Login $event): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if (! config('authentication-log.notify_other_devices', false)) {
=======
        if (!config('authentication-log.notify_other_devices', false)) {
>>>>>>> f548be94 (.)
=======
        if (!config('authentication-log.notify_other_devices', false)) {
=======
        if (! config('authentication-log.notify_other_devices', false)) {
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
        if (! config('authentication-log.notify_other_devices', false)) {
>>>>>>> laraxot/dev
            return;
        }

        $newIP = $this->request->ip();
        $newUserAgent = $this->request->userAgent();

        $user = $event->user;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
        if (! $user instanceof Model || ! $user instanceof HasAuthentications) {
            return;
        }

        $loginQuery = app(GetAuthenticationLogQueryForAuthenticatableAction::class)->execute($user);

        $loginQuery
            ->orderByDesc('login_at')
            ->where(function (Builder $query) use ($newIP, $newUserAgent): void {
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
        if (!$user || !($user instanceof HasAuthentications)) {
            return;
        }

        $logs = $user
            ->authentications()
            ->orderByDesc('login_at')
            ->where(function ($query) use ($newIP, $newUserAgent) {
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
        if (! $user instanceof Model || ! $user instanceof HasAuthentications) {
            return;
        }

        $loginQuery = app(GetAuthenticationLogQueryForAuthenticatableAction::class)->execute($user);

        $loginQuery
            ->orderByDesc('login_at')
            ->where(function (Builder $query) use ($newIP, $newUserAgent): void {
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
                $query->where('ip_address', '!=', $newIP)->orWhere('user_agent', '!=', $newUserAgent);
            })
            ->where('login_successful', true)
            ->get();
    }
}
