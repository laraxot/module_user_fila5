<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

<<<<<<< HEAD
use Override;
use Exception;
=======
>>>>>>> 2024e2e7 (.)
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;
use Modules\Xot\Filament\Widgets\XotBaseChartWidget;

<<<<<<< HEAD
class UserTypeRegistrationsChartWidget extends XotBaseChartWidget
{
    protected null|string $heading = null;
    protected static null|int $sort = 1;
    protected static bool $isLazy = true;

    public string $model;

    #[Override]
    public function getHeading(): null|string
    {
        return static::transClass($this->model, 'widgets.user_type_registrations_chart.heading');
    }

    #[Override]
=======
final class UserTypeRegistrationsChartWidget extends XotBaseChartWidget
{
    /** @var class-string */
    public string $model;

    protected ?string $heading = null;

    protected static ?int $sort = 1;

    protected static bool $isLazy = true;

    #[\Override]
    public function getHeading(): string
    {
        return self::transClass($this->model, 'widgets.user_type_registrations_chart.heading');
    }

    #[\Override]
>>>>>>> 2024e2e7 (.)
    protected function getData(): array
    {
        // Debug: Verifica se i filtri sono disponibili
        $filters = $this->getFilters();

        // Accesso sicuro ai filtri della pagina con fallback appropriati
        $startDate = null;
        $endDate = null;

        // Verifica se i filtri sono disponibili e validi
<<<<<<< HEAD
        if (is_array($filters) && !empty($filters)) {
            /** @phpstan-ignore-next-line */
            $startDate = !empty($filters['startDate']) ? Carbon::parse($filters['startDate']) : null;
            /** @phpstan-ignore-next-line */
            $endDate = !empty($filters['endDate']) ? Carbon::parse($filters['endDate']) : null;
=======
        if (is_array($filters) && ! empty($filters)) {
            $startDate = self::parseFilterDate($filters['startDate'] ?? null);
            $endDate = self::parseFilterDate($filters['endDate'] ?? null);
>>>>>>> 2024e2e7 (.)
        }

        // Fallback ai valori di default se i filtri non sono disponibili
        if (null === $startDate) {
            $startDate = now()->subDays(30);
        }
        if (null === $endDate) {
            $endDate = now();
        }

        try {
            $data = Trend::model($this->model)
                ->between(
                    start: $startDate,
                    end: $endDate,
                )
                ->perDay()
                ->count();

            return [
                'datasets' => [
                    [
<<<<<<< HEAD
                        'label' => static::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
                        'data' => $data->map(fn(mixed $value) => ($value instanceof TrendValue)
=======
                        'label' => self::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
                        'data' => $data->map(fn (mixed $value) => $value instanceof TrendValue
>>>>>>> 2024e2e7 (.)
                            ? $value->aggregate
                            : 0),
                        'backgroundColor' => 'rgba(59, 130, 246, 0.5)',
                        'borderColor' => 'rgb(59, 130, 246)',
                        'borderWidth' => 2,
                        'tension' => 0.4,
                    ],
                ],
<<<<<<< HEAD
                'labels' => $data->map(fn(mixed $value) => ($value instanceof TrendValue)
                    ? \Carbon\Carbon::parse($value->date)->format('d/m')
                    : ''),
            ];
        } catch (Exception $e) {
=======
                'labels' => $data->map(fn (mixed $value) => $value instanceof TrendValue
                    ? \Carbon\Carbon::parse($value->date)->format('d/m')
                    : ''),
            ];
        } catch (\Exception $e) {
>>>>>>> 2024e2e7 (.)
            // Fallback appropriato senza logging inutile
            return [
                'datasets' => [
                    [
<<<<<<< HEAD
                        'label' => static::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
=======
                        'label' => self::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
>>>>>>> 2024e2e7 (.)
                        'data' => [],
                        'backgroundColor' => 'rgba(59, 130, 246, 0.5)',
                        'borderColor' => 'rgb(59, 130, 246)',
                        'borderWidth' => 2,
                        'tension' => 0.4,
                    ],
                ],
                'labels' => [],
            ];
        }
    }

<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
    protected function getType(): string
    {
        return 'line';
    }
<<<<<<< HEAD
=======

    private static function parseFilterDate(mixed $value): ?Carbon
    {
        if (! is_string($value) && ! is_int($value) && ! is_float($value)) {
            return null;
        }

        return Carbon::parse($value);
    }
>>>>>>> 2024e2e7 (.)
}
