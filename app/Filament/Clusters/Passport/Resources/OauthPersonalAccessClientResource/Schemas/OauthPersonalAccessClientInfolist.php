<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthPersonalAccessClientResource\Schemas;

use Filament\Infolists\Components\TextEntry;
<<<<<<< HEAD

class OauthPersonalAccessClientInfolist
{
    /**
     * @return array<string, TextEntry>
     */
    public function getInfolistSchema(): array
    {
        return [
            'id' => TextEntry::make('id'),
            'name' => TextEntry::make('name'),
            'created_at' => TextEntry::make('created_at')->dateTime(),
=======
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class OauthPersonalAccessClientInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<string, Component>
     */
    public static function getInfolistSchema(): array
    {
        return [
            'oauth_personal_access_client' => Section::make()->schema([
                'id' => TextEntry::make('id'),
                'client_id' => TextEntry::make('client_id'),
                'created_at' => TextEntry::make('created_at')->dateTime(),
                'updated_at' => TextEntry::make('updated_at')->dateTime(),
            ]),
>>>>>>> f589f9b2 (.)
        ];
    }
}
