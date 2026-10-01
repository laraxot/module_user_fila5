<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantUserResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Modules\User\Filament\Resources\TenantUserResource;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

/**
 * Class ListTenantUsers.
 */
=======
/**
 * Class ListTenantUsers.
 */
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

>>>>>>> laraxot/dev
class ListTenantUsers extends XotBaseListRecords
{
    protected static string $resource = TenantUserResource::class;

    /**
     * @return array<string, Action>
     */
    #[\Override]
    protected function getHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
        ];
    }
}
