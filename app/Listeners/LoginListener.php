<?php

declare(strict_types=1);

namespace Modules\User\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Actions\GetCurrentDeviceAction;
use Modules\User\Contracts\HasAuthentications;
=======
use Illuminate\Support\Facades\Schema;
use Modules\User\Actions\GetCurrentDeviceAction;
use Modules\User\Models\BaseUser;
>>>>>>> 2024e2e7 (.)
=======
use Illuminate\Support\Facades\Schema;
use Modules\User\Actions\GetCurrentDeviceAction;
use Modules\User\Models\BaseUser;
>>>>>>> f589f9b2 (.)
use Modules\User\Models\DeviceUser;

class LoginListener
{
    public Request $request;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        // Session::flash('login-success', 'Hello ' . $event->user->name . ', welcome back!');
        $device = app(GetCurrentDeviceAction::class)->execute();
        $user = $event->user;
        // $user->devices()->syncWithoutDetaching($device->,['login_at'=>now(),'logout_at'=>null]);
        // $res= $user->devices()->syncWithPivotValues($device->,['login_at'=>now(),'logout_at'=>null]);
        $pivot = DeviceUser::firstOrCreate(['user_id' => $user->getAuthIdentifier(), 'device_id' => $device->id]);
<<<<<<< HEAD
<<<<<<< HEAD
        $pivot->update(['login_at' => now(), 'logout_at' => null]);

        // -----
        if ($user && $user instanceof HasAuthentications) {
            $ip = $this->request->ip();
            $userAgent = $this->request->userAgent();
            //$location = optional(geoip()->getLocation($ip))->toArray();
=======
=======
>>>>>>> f589f9b2 (.)

        $updates = [];
        if (Schema::connection($pivot->getConnectionName())->hasColumn($pivot->getTable(), 'login_at')) {
            $updates['login_at'] = now();
        }
        if (Schema::connection($pivot->getConnectionName())->hasColumn($pivot->getTable(), 'logout_at')) {
            $updates['logout_at'] = null;
        }

        if ([] !== $updates) {
            $pivot->update($updates);
        }

        // -----
        if ($user instanceof BaseUser) {
            $ip = $this->request->ip();
            $userAgent = $this->request->userAgent();
            // $location = optional(geoip()->getLocation($ip))->toArray();
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            $location = [];

            $log = $user->authentications()->create([
                'ip_address' => $ip,
                'user_agent' => $userAgent,
                'login_at' => now(),
                'login_successful' => true,
                'location' => $location,
            ]);
        }
    }
}
