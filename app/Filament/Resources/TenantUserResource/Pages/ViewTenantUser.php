<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantUserResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
=======
use Modules\User\Filament\Resources\TenantUserResource;
>>>>>>> 2024e2e7 (.)
=======
use Modules\User\Filament\Resources\TenantUserResource;
>>>>>>> f589f9b2 (.)
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

/**
 * Class ViewTenantUser.
 */
class ViewTenantUser extends XotBaseViewRecord
{
<<<<<<< HEAD
<<<<<<< HEAD
    protected static string $resource = \Modules\User\Filament\Resources\TenantUserResource::class;

    /**
     * @return array<string, Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return [
            'tenant_user' => Section::make()->schema([
                'id' => TextEntry::make('id'),
                'tenant' => TextEntry::make('tenant.name'),
                'user' => TextEntry::make('user.name'),
                'role' => TextEntry::make('role'),
                'created_at' => TextEntry::make('created_at')->dateTime(),
                'updated_at' => TextEntry::make('updated_at')->dateTime(),
            ]),
        ];
    }
=======
    protected static string $resource = TenantUserResource::class;
>>>>>>> 2024e2e7 (.)
=======
    protected static string $resource = TenantUserResource::class;
>>>>>>> f589f9b2 (.)
}
