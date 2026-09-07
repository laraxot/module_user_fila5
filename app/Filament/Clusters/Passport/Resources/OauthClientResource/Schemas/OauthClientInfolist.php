<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthClientResource\Schemas;

<<<<<<< HEAD
use Filament\Infolists\Components\TextEntry;

class OauthClientInfolist
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
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;
use Modules\Xot\Filament\Schemas\Components\XotBaseSection;

class OauthClientInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<string, Component>
     */
    public static function getInfolistSchema(): array
    {
        return [
            'oauth_info' => XotBaseSection::make('OAuth Client Information')
                ->schema([
                    'name' => TextEntry::make('name'),
                    'user' => TextEntry::make('user.name'),
                    'redirect' => TextEntry::make('redirect'),
                    'provider' => TextEntry::make('provider'),
                    'personal_access_client' => IconEntry::make('personal_access_client')
                        ->boolean(),
                    'password_client' => IconEntry::make('password_client')
                        ->boolean(),
                    'created_at' => TextEntry::make('created_at')
                        ->dateTime(),
                ]),
>>>>>>> f589f9b2 (.)
        ];
    }
}
