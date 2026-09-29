<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SsoProviderResource\Pages;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Modules\User\Filament\Resources\SsoProviderResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListSsoProviders extends XotBaseListRecords
{
    protected static string $resource = SsoProviderResource::class;

    // Delegazione a SsoProvidersTable::getTableColumns(), getTableFilters()
}
