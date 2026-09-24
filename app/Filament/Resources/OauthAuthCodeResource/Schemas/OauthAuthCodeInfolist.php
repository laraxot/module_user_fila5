<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthAuthCodeResource\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
<<<<<<< HEAD
=======
use Illuminate\Contracts\Support\Htmlable;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class OauthAuthCodeInfolist extends XotBaseResourceInfolist
{
    /**
<<<<<<< HEAD
     * @return array<string, Component>
=======
     * @return array<string, Component|Htmlable|string>
>>>>>>> laraxot/dev
     *
     * Campi basati sul Model OauthAuthCode.php -> id, user_id, client_id, scopes, revoked, expires_at
     */
    public function getInfolistSchema(): array
    {
        return [
            'id' => TextEntry::make('id'),
            'user_id' => TextEntry::make('user_id'),
            'client_id' => TextEntry::make('client_id'),
            'scopes' => TextEntry::make('scopes'),
            'revoked' => TextEntry::make('revoked')
                ->badge(),
            'expires_at' => TextEntry::make('expires_at')
                ->dateTime(),
        ];
    }
}
