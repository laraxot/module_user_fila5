<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Socialite\Resources\SsoProviderResource\Schemas;

use Filament\Infolists\Components\TextEntry;
<<<<<<< HEAD

class SsoProviderInfolist
{
    /**
     * @return array<string, TextEntry>
     */
    public function getInfolistSchema(): array
=======
use Filament\Schemas\Components\Component;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class SsoProviderInfolist extends XotBaseResourceInfolist
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
<<<<<<< HEAD
            'created_at' => TextEntry::make('created_at')->dateTime(),
=======
            'display_name' => TextEntry::make('display_name'),
            'type' => TextEntry::make('type'),
            'entity_id' => TextEntry::make('entity_id'),
            'client_id' => TextEntry::make('client_id'),
            'redirect_url' => TextEntry::make('redirect_url'),
            'metadata_url' => TextEntry::make('metadata_url'),
            'is_active' => TextEntry::make('is_active'),
            'created_at' => TextEntry::make('created_at')->dateTime(),
            'updated_at' => TextEntry::make('updated_at')->dateTime(),
>>>>>>> f589f9b2 (.)
        ];
    }
}
