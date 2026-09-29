<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Pages;

use Modules\User\Filament\Resources\BaseProfileResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListProfiles extends XotBaseListRecords
{
    protected static string $resource = BaseProfileResource::class;
<<<<<<< .merge_file_0RJcmC
=======

    // Tabella configurata da BaseProfilesTable::configure(); NON sovrascrivere getTableColumns() (final in XotBaseListRecords).

    /**
     * @return array<string, BaseFilter>
     */
    #[\Override]
    public function getTableFilters(): array
    {
        return [
            'is_active' => TernaryFilter::make('is_active')
                ->placeholder(static::trans('filters.is_active.all'))
                ->trueLabel(static::trans('filters.is_active.active'))
                ->falseLabel(static::trans('filters.is_active.inactive'))
                ->queries(
                    true: static fn (Builder $query) => $query->where('is_active', '=', true),
                    false: static fn (Builder $query) => $query->where('is_active', '=', false),
                ),
        ];
    }
>>>>>>> .merge_file_qwW2bC
}
