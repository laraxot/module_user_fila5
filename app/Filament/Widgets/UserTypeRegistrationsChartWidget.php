<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;
use Modules\Xot\Filament\Widgets\XotBaseChartWidget;

<<<<<<< HEAD
final class UserTypeRegistrationsChartWidget extends XotBaseChartWidget
{
    /** @var class-string */
=======
class UserTypeRegistrationsChartWidget extends XotBaseChartWidget
{
>>>>>>> 350420cb (Check & fix styling)
    public string $model;

    protected ?string $heading = null;

    protected static ?int $sort = 1;

    protected static bool $isLazy = true;

    #[\Override]
<<<<<<< HEAD
    public function getHeading(): string
    {
        return self::transClass($this->model, 'widgets.user_type_registrations_chart.heading');
=======
    public function getHeading(): ?string
    {
        return static::transClass($this->model, 'widgets.user_type_registrations_chart.heading');
>>>>>>> 350420cb (Check & fix styling)
    }

    #[\Override]
    protected function getData(): array
    {
        // Debug: Verifica se i filtri sono disponibili
        $filters = $this->getFilters();

        // Accesso sicuro ai filtri della pagina con fallback appropriati
        $startDate = null;
        $endDate = null;

        // Verifica se i filtri sono disponibili e validi
        if (is_array($filters) && ! empty($filters)) {
<<<<<<< HEAD
            $startDate = self::parseFilterDateFromFilters($filters, 'startDate');
            $endDate = self::parseFilterDateFromFilters($filters, 'endDate');
=======
            /** @phpstan-ignore-next-line */
            $startDate = ! empty($filters['startDate']) ? Carbon::parse($filters['startDate']) : null;
            /** @phpstan-ignore-next-line */
            $endDate = ! empty($filters['endDate']) ? Carbon::parse($filters['endDate']) : null;
>>>>>>> 350420cb (Check & fix styling)
        }

        // Fallback ai valori di default se i filtri non sono disponibili
        if ($startDate === null) {
            $startDate = now()->subDays(30);
        }
        if ($endDate === null) {
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
                        'label' => self::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
=======
                        'label' => static::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
>>>>>>> 350420cb (Check & fix styling)
                        'data' => $data->map(fn (mixed $value) => $value instanceof TrendValue
                            ? $value->aggregate
                            : 0),
                        'backgroundColor' => 'rgba(59, 130, 246, 0.5)',
                        'borderColor' => 'rgb(59, 130, 246)',
                        'borderWidth' => 2,
                        'tension' => 0.4,
                    ],
                ],
                'labels' => $data->map(fn (mixed $value) => $value instanceof TrendValue
                    ? \Carbon\Carbon::parse($value->date)->format('d/m')
                    : ''),
            ];
        } catch (\Exception $e) {
            // Fallback appropriato senza logging inutile
            return [
                'datasets' => [
                    [
<<<<<<< HEAD
                        'label' => self::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
=======
                        'label' => static::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
>>>>>>> 350420cb (Check & fix styling)
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

    #[\Override]
    protected function getType(): string
    {
        return 'line';
    }
<<<<<<< HEAD

    /**
     * @param  array<scalar, scalar>  $filters
     */
    private static function parseFilterDateFromFilters(array $filters, string $key): ?Carbon
    {
        if (! array_key_exists($key, $filters)) {
            return null;
        }

        $raw = $filters[$key];
        if (! is_string($raw) && ! is_int($raw)) {
            return null;
        }

        return self::parseFilterDate($raw);
    }

    private static function parseFilterDate(string|int|null $value): ?Carbon
    {
        if ($value === null) {
            return null;
        }

        return Carbon::parse($value);
    }
=======
>>>>>>> 350420cb (Check & fix styling)
}
