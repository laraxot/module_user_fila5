<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthAccessTokenResource\Schemas;

use Filament\Infolists\Components\TextEntry;
<<<<<<< HEAD

class OauthAccessTokenInfolist
{
    /**
     * @return array<string, TextEntry>
     */
    public function getInfolistSchema(): array
=======
use Filament\Schemas\Components\Component;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class OauthAccessTokenInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<string, Component>
     */
    public static function getInfolistSchema(): array
>>>>>>> f589f9b2 (.)
    {
        return [
            'id' => TextEntry::make('id'),
            'name' => TextEntry::make('name'),
            'created_at' => TextEntry::make('created_at')->dateTime(),
        ];
    }
}
