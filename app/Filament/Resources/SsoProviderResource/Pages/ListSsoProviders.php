<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SsoProviderResource\Pages;

use Filament\Tables\Filters\SelectFilter;
use Modules\User\Filament\Resources\SsoProviderResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListSsoProviders extends XotBaseListRecords
{
    protected static string $resource = SsoProviderResource::class;

    #[\Override]
    public function getTableFilters(): array
    {
        return [
            'type' => SelectFilter::make('type')->options([
                'saml' => 'SAML',
                'oidc' => 'OIDC',
                'oauth' => 'OAuth',
            ]),
            'is_active' => SelectFilter::make('is_active')->options([
                true => 'Active',
                false => 'Inactive',
            ]),
        ];
    }
}
