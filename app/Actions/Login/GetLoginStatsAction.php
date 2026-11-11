<?php

declare(strict_types=1);

namespace Modules\User\Actions\Login;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use InvalidArgumentException;
use Modules\User\Models\AuthenticationLog;
use Modules\User\Models\User;

final class GetLoginStatsAction
{
    /**
     * Get statistics based on the last login timestamp.
     *
     * Each user is counted once, according to their
     * most recent login_at value.
     *
     * @return array{
     *     total: int,
     *     today: int,
     *     yesterday: int,
     *     last_7_days: int,
     *     last_30_days: int,
     *     previous_7_days: int,
     *     change_percentage: float,
     *     trend: list<int>,
     *     labels: list<string>
     * }
     */
    public function execute(): array
    {
        $modelClass = config(
            'user.login-monitoring.model',
            AuthenticationLog::class,
        );

        if (! is_string($modelClass)
            || ! is_subclass_of($modelClass, Model::class)) {
            throw new InvalidArgumentException(
                'Invalid login monitoring model.'
            );
        }

        $column = config(
            'user.login-monitoring.column',
            'login_at',
        );

        if (! is_string($column)
            || ! preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $column)) {
            throw new InvalidArgumentException(
                'Invalid login monitoring column.'
            );
        }

        $timezone = (string) config(
            'user.login-monitoring.timezone',
            'UTC',
        );

        $now = CarbonImmutable::now($timezone);

        $today = $now->startOfDay();
        $tomorrow = $today->addDay();
        $yesterday = $today->subDay();

        $last7 = $today->subDays(6);
        $previous7 = $last7->subDays(7);
        $last30 = $today->subDays(29);

        /*
         * Convert local date boundaries to UTC.
         * Assumes database timestamps are stored in UTC.
         */
        $utc = static fn (CarbonImmutable $date): string =>
            $date->utc()->format('Y-m-d H:i:s');

        /*
         * Keep Eloquent global scopes, including tenant scopes.
         * Cache is intentionally omitted to avoid cross-tenant
         * leakage and simplify authorization boundaries.
         */
        $model = new $modelClass();

        $query = $model->newQuery()
            ->whereNotNull($column);

        $countBetween = static function (
            CarbonImmutable $start,
            CarbonImmutable $end
        ) use ($query, $column, $utc): int {
            return (clone $query)
                ->where($column, '>=', $utc($start))
                ->where($column, '<', $utc($end))
                ->count();
        };

        $trend = [];
        $labels = [];

        for ($daysAgo = 6; $daysAgo >= 0; $daysAgo--) {
            $start = $today->subDays($daysAgo);
            $end = $start->addDay();

            $trend[] = $countBetween($start, $end);
            $labels[] = $start->format('d/m');
        }

        $last7Count = $countBetween($last7, $tomorrow);

        $previous7Count = $countBetween(
            $previous7,
            $last7,
        );

        $changePercentage = match (true) {
            $previous7Count === 0 && $last7Count === 0 => 0.0,
            $previous7Count === 0 => 100.0,
            default => round(
                (($last7Count - $previous7Count) / $previous7Count) * 100,
                2,
            ),
        };

        return [
            'total' => (clone $query)->count(),

            'today' => $countBetween(
                $today,
                $tomorrow,
            ),

            'yesterday' => $countBetween(
                $yesterday,
                $today,
            ),

            'last_7_days' => $last7Count,

            'last_30_days' => $countBetween(
                $last30,
                $tomorrow,
            ),

            'previous_7_days' => $previous7Count,

            'change_percentage' => $changePercentage,

            'trend' => $trend,

            'labels' => $labels,
        ];
    }
}
