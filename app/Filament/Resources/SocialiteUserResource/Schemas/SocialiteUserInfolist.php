<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialiteUserResource\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Illuminate\Contracts\Support\Htmlable;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class SocialiteUserInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<string, Component|Htmlable|string>
     */
    public static function getInfolistSchema(): array
    {
        return [
            'id' => TextEntry::make('id'),
            'user_id' => TextEntry::make('user_id'),
            'provider' => TextEntry::make('provider'),
            'provider_id' => TextEntry::make('provider_id'),
            'token' => TextEntry::make('token'),
            'name' => TextEntry::make('name'),
            'email' => TextEntry::make('email'),
            'avatar' => ImageEntry::make('avatar'),
            'created_at' => TextEntry::make('created_at')
                ->dateTime(),
            'updated_at' => TextEntry::make('updated_at')
                ->dateTime(),
        ];
    }
}
