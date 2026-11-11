<?php

declare(strict_types=1);

namespace Modules\User\Actions\Login;

use Carbon\CarbonImmutable;
use Illuminate\Database\Query\Expression;
use InvalidArgumentException;
use Modules\User\Actions\Login\Concerns\ResolvesLoginLogQuery;

/**
 * Serie storica degli accessi da authentication_logs.
 *
 * Laravel Pulse aggrega al massimo 7 giorni (DatabaseStorage::store()
 * scarta le entry piu' vecchie e trim() purge gli aggregati): per
 * orizzonti superiori la sorgente di verita' resta authentication_logs.
 * Vengono conteggiate tutte le righe con timestamp valorizzato, anche
 * login_successful = false, in parita' con il backfill Pulse e con
 * GetLoginStatsAction ("tutto AuthenticationLog").
 *
 * I bucket sono calcolati sul timestamp UTC della colonna configurata.
 */
final class GetLoginHistoryAction
{
    use ResolvesLoginLogQuery;

    private const MAX_BUCKETS = 5000;

    /**
     * @return array{labels: list<string>, data: list<int>}
     */
    public function execute(
        ?CarbonImmutable $since = null,
        string $granularity = 'day',
    ): array {
        if (! in_array($granularity, ['day', 'month'], true)) {
            throw new InvalidArgumentException(
                "Invalid granularity [{$granularity}]: day|month."
            );
        }

        $column = $this->loginLogColumn();

        $query = $this->authenticationLogQuery();

        if ($since === null) {
            $oldest = (clone $query)->min($column);

            if (! is_string($oldest)) {
                return ['labels' => [], 'data' => []];
            }

            $since = CarbonImmutable::parse($oldest, 'UTC')
                ->startOfDay();
        }

        $end = CarbonImmutable::now('UTC');

        // SUBSTR e' portabile MySQL/SQLite: login_at e' 'Y-m-d H:i:s' UTC.
        $expression = $granularity === 'month'
            ? "SUBSTR({$column}, 1, 7)"
            : "SUBSTR({$column}, 1, 10)";

        $counts = $query
            ->where($column, '>=', $since->toDateTimeString())
            ->where($column, '<=', $end->toDateTimeString())
            ->toBase()
            ->select([
                new Expression("{$expression} AS bucket"),
                new Expression('COUNT(*) AS aggregate'),
            ])
            ->groupBy(new Expression($expression))
            ->orderBy('bucket')
            ->get()
            ->mapWithKeys(
                static fn (\stdClass $row): array => [
                    strval($row->bucket) => intval($row->aggregate),
                ]
            );

        $cursor = $granularity === 'month'
            ? $since->startOfMonth()
            : $since->startOfDay();

        $labels = [];
        $data = [];
        $bucketCount = 0;

        while ($cursor->lessThanOrEqualTo($end)) {
            if (++$bucketCount > self::MAX_BUCKETS) {
                throw new InvalidArgumentException(
                    'History too long for day granularity: use month.'
                );
            }

            $key = $granularity === 'month'
                ? $cursor->format('Y-m')
                : $cursor->format('Y-m-d');

            $labels[] = $granularity === 'month'
                ? $cursor->format('m/Y')
                : $cursor->format('d/m/y');
            $data[] = $counts->get($key, 0);

            $cursor = $granularity === 'month'
                ? $cursor->addMonth()
                : $cursor->addDay();
        }

        return ['labels' => $labels, 'data' => $data];
    }
}
