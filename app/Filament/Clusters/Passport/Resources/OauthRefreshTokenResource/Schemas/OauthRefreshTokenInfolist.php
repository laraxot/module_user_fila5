<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthRefreshTokenResource\Schemas;

use Filament\Infolists\Components\TextEntry;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class OauthRefreshTokenInfolist extends XotBaseResourceInfolist
=======

class OauthRefreshTokenInfolist
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
