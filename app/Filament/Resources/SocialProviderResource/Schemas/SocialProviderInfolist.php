<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialProviderResource\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Illuminate\Contracts\Support\Htmlable;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class SocialProviderInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<string, Component|Htmlable|string>
     */
    public static function getInfolistSchema(): array
    {
        return [
            'id' => TextEntry::make('id'),
            'name' => TextEntry::make('name'),
            'scopes' => TextEntry::make('scopes')
                ->badge(),
            'parameters' => TextEntry::make('parameters')
                ->badge(),
            'stateless' => IconEntry::make('stateless')
                ->boolean(),
            'active' => IconEntry::make('active')
                ->boolean(),
            'socialite' => IconEntry::make('socialite')
                ->boolean(),
            'svg' => TextEntry::make('svg')
                ->html(),
            'created_at' => TextEntry::make('created_at')
                ->dateTime(),
            'updated_at' => TextEntry::make('updated_at')
                ->dateTime(),
        ];
    }
}
