<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantUserResource\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Illuminate\Contracts\Support\Htmlable;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class TenantUserInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<string, Component|Htmlable|string>
     *
<<<<<<< HEAD
     * Campi basati sul Model TenantUser.php -> id, tenant, user
=======
     * Campi basati sul Model TenantUser.php -> id, uuid, tenant_id, user_id
>>>>>>> laraxot/dev
     */
    public static function getInfolistSchema(): array
    {
        return [
            'id' => TextEntry::make('id'),
<<<<<<< HEAD
            'tenant' => TextEntry::make('tenant.name'),
            'user' => TextEntry::make('user.name'),
=======
            'uuid' => TextEntry::make('uuid'),
            'tenant_id' => TextEntry::make('tenant_id'),
            'user_id' => TextEntry::make('user_id'),
>>>>>>> laraxot/dev
            'created_at' => TextEntry::make('created_at')
                ->dateTime(),
            'updated_at' => TextEntry::make('updated_at')
                ->dateTime(),
        ];
    }
}
