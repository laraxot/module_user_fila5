<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Socialite\Resources\SocialProviderResource\Schemas;

use Filament\Infolists\Components\TextEntry;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class SocialProviderInfolist extends XotBaseResourceInfolist
=======

class SocialProviderInfolist
>>>>>>> laraxot/dev
{
    /**
     * @return array<string, TextEntry>
     */
    public static function getInfolistSchema(): array
    {
        return [
            'id' => TextEntry::make('id'),
            'name' => TextEntry::make('name'),
            'created_at' => TextEntry::make('created_at')->dateTime(),
        ];
    }
}
