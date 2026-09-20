<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Override;
use Exception;
>>>>>>> f548be94 (.)
=======
use Override;
use Exception;
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;
use Modules\Xot\Filament\Widgets\XotBaseChartWidget;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
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
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
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
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
    protected function getData(): array
    {
        // Debug: Verifica se i filtri sono disponibili
        $filters = $this->getFilters();

        // Accesso sicuro ai filtri della pagina con fallback appropriati
        $startDate = null;
        $endDate = null;

        // Verifica se i filtri sono disponibili e validi
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if (is_array($filters) && ! empty($filters)) {
            $startDate = self::parseFilterDate($filters['startDate'] ?? null);
            $endDate = self::parseFilterDate($filters['endDate'] ?? null);
=======
=======
>>>>>>> 87273113 (.)
        if (is_array($filters) && !empty($filters)) {
            /** @phpstan-ignore-next-line */
            $startDate = !empty($filters['startDate']) ? Carbon::parse($filters['startDate']) : null;
            /** @phpstan-ignore-next-line */
            $endDate = !empty($filters['endDate']) ? Carbon::parse($filters['endDate']) : null;
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
        if (is_array($filters) && ! empty($filters)) {
            $startDate = self::parseFilterDate($filters['startDate'] ?? null);
            $endDate = self::parseFilterDate($filters['endDate'] ?? null);
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
        if (is_array($filters) && ! empty($filters)) {
            $startDate = self::parseFilterDate($filters['startDate'] ?? null);
            $endDate = self::parseFilterDate($filters['endDate'] ?? null);
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
<<<<<<< HEAD
                        'label' => self::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
                        'data' => $data->map(fn (mixed $value) => $value instanceof TrendValue
=======
                        'label' => static::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
                        'data' => $data->map(fn(mixed $value) => ($value instanceof TrendValue)
>>>>>>> f548be94 (.)
=======
                        'label' => static::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
                        'data' => $data->map(fn(mixed $value) => ($value instanceof TrendValue)
=======
                        'label' => self::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
                        'data' => $data->map(fn (mixed $value) => $value instanceof TrendValue
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
                        'label' => self::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
                        'data' => $data->map(fn (mixed $value) => $value instanceof TrendValue
>>>>>>> laraxot/dev
                            ? $value->aggregate
                            : 0),
                        'backgroundColor' => 'rgba(59, 130, 246, 0.5)',
                        'borderColor' => 'rgb(59, 130, 246)',
                        'borderWidth' => 2,
                        'tension' => 0.4,
                    ],
                ],
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
                'labels' => $data->map(fn (mixed $value) => $value instanceof TrendValue
                    ? \Carbon\Carbon::parse($value->date)->format('d/m')
                    : ''),
            ];
        } catch (\Exception $e) {
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
                'labels' => $data->map(fn(mixed $value) => ($value instanceof TrendValue)
                    ? \Carbon\Carbon::parse($value->date)->format('d/m')
                    : ''),
            ];
        } catch (Exception $e) {
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
                'labels' => $data->map(fn (mixed $value) => $value instanceof TrendValue
                    ? \Carbon\Carbon::parse($value->date)->format('d/m')
                    : ''),
            ];
        } catch (\Exception $e) {
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
            // Fallback appropriato senza logging inutile
            return [
                'datasets' => [
                    [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                        'label' => self::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
=======
                        'label' => static::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
>>>>>>> f548be94 (.)
=======
                        'label' => static::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
=======
                        'label' => self::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
                        'label' => self::transClass($this->model, 'widgets.user_type_registrations_chart.label'),
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> f548be94 (.)
=======
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
    #[\Override]
>>>>>>> laraxot/dev
    protected function getType(): string
    {
        return 'line';
    }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev

    private static function parseFilterDate(mixed $value): ?Carbon
    {
        if (! is_string($value) && ! is_int($value) && ! is_float($value)) {
            return null;
        }

        return Carbon::parse($value);
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f548be94 (.)
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
}
