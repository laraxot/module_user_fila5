<?php

declare(strict_types=1);

namespace Modules\User\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Cache;
>>>>>>> 350420cb (Check & fix styling)
use Illuminate\Support\Facades\Schema;
use Modules\User\Actions\GetCurrentDeviceAction;
use Modules\User\Models\BaseUser;
use Modules\User\Models\DeviceUser;

<<<<<<< HEAD
class LoginListener
{
    public Request $request;
=======
final class LoginListener
{
    private Request $request;
>>>>>>> 350420cb (Check & fix styling)

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

<<<<<<< HEAD
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

        $updates = [];
        if (Schema::connection($pivot->getConnectionName())->hasColumn($pivot->getTable(), 'login_at')) {
            $updates['login_at'] = now();
        }
        if (Schema::connection($pivot->getConnectionName())->hasColumn($pivot->getTable(), 'logout_at')) {
=======
    public function handle(Login $event): void
    {
        $device = app(GetCurrentDeviceAction::class)->execute();
        $user = $event->user;
        $pivot = DeviceUser::firstOrCreate([
            'user_id' => $user->getAuthIdentifier(),
            'device_id' => $device->id,
        ]);

        $this->updatePivotLoginColumns($pivot);

        if ($user instanceof BaseUser) {
            $this->logSuccessfulAuthentication($user);
        }
    }

    private function updatePivotLoginColumns(DeviceUser $pivot): void
    {
        $updates = [];
        $connectionName = (string) $pivot->getConnection()->getName();
        $table = $pivot->getTable();

        if ($this->pivotTableHasColumn($connectionName, $table, 'login_at')) {
            $updates['login_at'] = now();
        }
        if ($this->pivotTableHasColumn($connectionName, $table, 'logout_at')) {
>>>>>>> 350420cb (Check & fix styling)
            $updates['logout_at'] = null;
        }

        if ($updates !== []) {
            $pivot->update($updates);
        }
<<<<<<< HEAD

        // -----
        if ($user instanceof BaseUser) {
            $ip = $this->request->ip();
            $userAgent = $this->request->userAgent();
            // $location = optional(geoip()->getLocation($ip))->toArray();
            $location = [];

            $log = $user->authentications()->create([
                'ip_address' => $ip,
                'user_agent' => $userAgent,
                'login_at' => now(),
                'login_successful' => true,
                'location' => $location,
            ]);
        }
=======
    }

    private function logSuccessfulAuthentication(BaseUser $user): void
    {
        $user->authentications()->create([
            'ip_address' => $this->request->ip(),
            'user_agent' => $this->request->userAgent(),
            'login_at' => now(),
            'login_successful' => true,
            'location' => [],
        ]);
    }

    private function pivotTableHasColumn(string $connectionName, string $table, string $column): bool
    {
        $cacheKey = 'schema.'.$connectionName.'.'.$table.'.'.$column;

        return Cache::rememberForever($cacheKey, static function () use ($connectionName, $table, $column): bool {
            return Schema::connection($connectionName)->hasColumn($table, $column);
        });
>>>>>>> 350420cb (Check & fix styling)
    }
}
