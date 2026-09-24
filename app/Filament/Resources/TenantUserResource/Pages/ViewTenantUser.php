<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantUserResource\Pages;

<<<<<<< HEAD
use Modules\User\Filament\Resources\TenantUserResource;
use Modules\User\Filament\Resources\TenantUserResource\Schemas\TenantUserInfolist;
=======
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

/**
 * Class ViewTenantUser.
 */
class ViewTenantUser extends XotBaseViewRecord
{
<<<<<<< HEAD
    protected static string $resource = TenantUserResource::class;

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
=======
    protected static string $resource = \Modules\User\Filament\Resources\TenantUserResource::class;

    /**
     * @return array<string, Component>
>>>>>>> 350420cb (Check & fix styling)
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
<<<<<<< HEAD
        return app(TenantUserInfolist::class)->getInfolistSchema();
=======
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
>>>>>>> 350420cb (Check & fix styling)
    }
}
