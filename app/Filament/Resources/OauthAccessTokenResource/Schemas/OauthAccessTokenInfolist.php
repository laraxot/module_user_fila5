<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthAccessTokenResource\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
<<<<<<< HEAD
=======
use Illuminate\Contracts\Support\Htmlable;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class OauthAccessTokenInfolist extends XotBaseResourceInfolist
{
    /**
<<<<<<< HEAD
     * @return array<string, Component>
=======
     * @return array<string, Component|Htmlable|string>
>>>>>>> laraxot/dev
     *
     * Campi basati sul Model OauthAccessToken.php -> id, user_id, client_id, name, scopes, revoked, expires_at
     */
    public function getInfolistSchema(): array
    {
        return [
            'id' => TextEntry::make('id'),
            'user_id' => TextEntry::make('user_id'),
            'client_id' => TextEntry::make('client_id'),
            'name' => TextEntry::make('name'),
            'scopes' => TextEntry::make('scopes'),
            'revoked' => TextEntry::make('revoked')
                ->badge(),
            'expires_at' => TextEntry::make('expires_at')
                ->dateTime(),
            'created_at' => TextEntry::make('created_at')
                ->dateTime(),
            'updated_at' => TextEntry::make('updated_at')
                ->dateTime(),
        ];
    }
}
