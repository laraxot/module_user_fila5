<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthAuthCodeResource\Pages;

<<<<<<< HEAD
use Modules\User\Filament\Resources\OauthAuthCodeResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
=======
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Modules\User\Filament\Resources\OauthAuthCodeResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
use Modules\Xot\Filament\Schemas\Components\XotBaseSection;
>>>>>>> 350420cb (Check & fix styling)

class ViewOauthAuthCode extends XotBaseViewRecord
{
    protected static string $resource = OauthAuthCodeResource::class;
<<<<<<< .merge_file_nWX6dt

    /**
<<<<<<< HEAD
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(OauthAuthCodeInfolist::class)->getInfolistSchema();
=======
     * @return array<string, Component>
     */
    protected function getInfolistSchema(): array
    {
        return [
            'auth_code' => XotBaseSection::make('OAuth Auth Code')
                ->schema([
                    'id' => TextEntry::make('id'),
                    'user' => TextEntry::make('user.name'),
                    'client' => TextEntry::make('client.name'),
                    'scopes' => TextEntry::make('scopes'),
                    'revoked' => TextEntry::make('revoked'),
                    'expires_at' => TextEntry::make('expires_at'),
                    'created_at' => TextEntry::make('created_at'),
                ]),
        ];
>>>>>>> 350420cb (Check & fix styling)
    }
=======
>>>>>>> .merge_file_KidW8m
}
