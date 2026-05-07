<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthClientResource\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Illuminate\Contracts\Support\Htmlable;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class OauthClientInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<string, Component|Htmlable|string>
     */
    public static function getInfolistSchema(): array
    {
        return [
            'id' => TextEntry::make('id'),
            'name' => TextEntry::make('name'),
            'secret' => TextEntry::make('secret'),
            'provider' => TextEntry::make('provider'),
            'redirect' => TextEntry::make('redirect'),
            'personal_access_client' => IconEntry::make('personal_access_client')
                ->boolean(),
            'password_client' => IconEntry::make('password_client')
                ->boolean(),
            'revoked' => IconEntry::make('revoked')
                ->boolean(),
            'user_id' => TextEntry::make('user_id'),
            'created_at' => TextEntry::make('created_at')
                ->dateTime(),
            'updated_at' => TextEntry::make('updated_at')
                ->dateTime(),
        ];
    }
}
