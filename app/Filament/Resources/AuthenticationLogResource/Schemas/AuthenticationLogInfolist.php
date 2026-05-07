<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\AuthenticationLogResource\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Illuminate\Contracts\Support\Htmlable;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class AuthenticationLogInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<string, Component|Htmlable|string>
     */
    public static function getInfolistSchema(): array
    {
        return [
            'id' => TextEntry::make('id'),
            'authenticatable_type' => TextEntry::make('authenticatable_type'),
            'authenticatable_id' => TextEntry::make('authenticatable_id'),
            'ip_address' => TextEntry::make('ip_address'),
            'user_agent' => TextEntry::make('user_agent'),
            'login_at' => TextEntry::make('login_at')
                ->dateTime(),
            'login_successful' => IconEntry::make('login_successful')
                ->boolean(),
            'logout_at' => TextEntry::make('logout_at')
                ->dateTime(),
            'cleared_by_user' => IconEntry::make('cleared_by_user')
                ->boolean(),
            'location' => TextEntry::make('location')
                ->badge(),
            'created_at' => TextEntry::make('created_at')
                ->dateTime(),
            'updated_at' => TextEntry::make('updated_at')
                ->dateTime(),
        ];
    }
}
