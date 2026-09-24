<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantUserResource\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
<<<<<<< HEAD
=======
use Illuminate\Contracts\Support\Htmlable;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class TenantUserInfolist extends XotBaseResourceInfolist
{
    /**
<<<<<<< HEAD
     * @return array<string, Component>
=======
     * @return array<string, Component|Htmlable|string>
>>>>>>> laraxot/dev
     *
     * Campi basati sul Model TenantUser.php -> id, uuid, tenant_id, user_id
     */
    public function getInfolistSchema(): array
    {
        return [
            'id' => TextEntry::make('id'),
            'uuid' => TextEntry::make('uuid'),
            'tenant_id' => TextEntry::make('tenant_id'),
            'user_id' => TextEntry::make('user_id'),
            'created_at' => TextEntry::make('created_at')
                ->dateTime(),
            'updated_at' => TextEntry::make('updated_at')
                ->dateTime(),
        ];
    }
}
