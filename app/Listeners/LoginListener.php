<?php

declare(strict_types=1);

namespace Modules\User\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Modules\User\Actions\GetCurrentDeviceAction;
use Modules\User\Models\BaseUser;
use Modules\User\Models\DeviceUser;

final class LoginListener
{
    private Request $request;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

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
            $updates['logout_at'] = null;
        }

        if ([] !== $updates) {
            $pivot->update($updates);
        }
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
    }
}
