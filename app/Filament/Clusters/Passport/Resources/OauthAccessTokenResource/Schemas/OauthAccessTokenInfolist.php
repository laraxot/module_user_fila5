<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthAccessTokenResource\Schemas;

use Filament\Infolists\Components\TextEntry;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class OauthAccessTokenInfolist extends XotBaseResourceInfolist
=======

class OauthAccessTokenInfolist
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
