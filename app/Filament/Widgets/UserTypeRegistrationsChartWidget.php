<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;
use Modules\Xot\Filament\Widgets\XotBaseChartWidget;

final class UserTypeRegistrationsChartWidget extends XotBaseChartWidget
{
<<<<<<< HEAD
<<<<<<< Updated upstream
    public $model;
=======
    /** @var class-string */
    public string $model;
>>>>>>> Stashed changes
=======
    /** @var class-string */
    public string $model;
>>>>>>> a6d956d (Refactor code style for consistency and clarity across multiple files, including parameter annotations and conditional checks. Adjusted formatting in various actions, migrations, and console commands to enhance readability and maintainability.)

    protected ?string $heading = null;

    protected static ?int $sort = 1;

    protected static bool $isLazy = true;

    #[\Override]
    public function getHeading(): string
    {
        return self::transClass($this->model, 'widgets.user_type_registrations_chart.heading');
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
<<<<<<< Updated upstream
            $startDate = ! empty($filters['startDate']) ? Carbon::parse($filters['startDate']) : null;
            $endDate = ! empty($filters['endDate']) ? Carbon::parse($filters['endDate']) : null;
=======
            $startDate = self::parseFilterDate($filters['startDate'] ?? null);
            $endDate = self::parseFilterDate($filters['endDate'] ?? null);
>>>>>>> Stashed changes
=======
            $startDate = self::parseFilterDate($filters['startDate'] ?? null);
            $endDate = self::parseFilterDate($filters['endDate'] ?? null);
>>>>>>> a6d956d (Refactor code style for consistency and clarity across multiple files, including parameter annotations and conditional checks. Adjusted formatting in various actions, migrations, and console commands to enhance readability and maintainability.)
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
                        'label' => self::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
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
                        'label' => self::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
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

    private static function parseFilterDate(mixed $value): ?Carbon
    {
        if (! is_string($value) && ! is_int($value) && ! is_float($value)) {
            return null;
        }

        return Carbon::parse($value);
    }
}
