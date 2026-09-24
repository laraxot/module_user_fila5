<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantUserResource\Pages;

use Modules\User\Filament\Resources\TenantUserResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
use Modules\User\Filament\Resources\TenantUserResource\Schemas\TenantUserInfolist;

/**
 * Class ViewTenantUser.
 */
class ViewTenantUser extends XotBaseViewRecord
{
    protected static string $resource = TenantUserResource::class;

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(TenantUserInfolist::class)->getInfolistSchema();
    }
}
