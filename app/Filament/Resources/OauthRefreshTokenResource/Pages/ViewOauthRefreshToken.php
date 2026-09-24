<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthRefreshTokenResource\Pages;

<<<<<<< HEAD
use Modules\User\Filament\Resources\OauthRefreshTokenResource;
<<<<<<< .merge_file_wEGfcp
use Modules\User\Filament\Resources\OauthRefreshTokenResource\Schemas\OauthRefreshTokenInfolist;
=======
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Modules\User\Filament\Resources\OauthRefreshTokenResource;
>>>>>>> 350420cb (Check & fix styling)
=======
>>>>>>> .merge_file_pBOMzl
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewOauthRefreshToken extends XotBaseViewRecord
{
    protected static string $resource = OauthRefreshTokenResource::class;
<<<<<<< .merge_file_wEGfcp

    /**
<<<<<<< HEAD
     * @return array<string, \Filament\Schemas\Components\Component>
=======
     * @return array<string, Component>
>>>>>>> 350420cb (Check & fix styling)
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
<<<<<<< HEAD
        return app(OauthRefreshTokenInfolist::class)->getInfolistSchema();
=======
        return [
            'token_information' => Section::make('Token Information')
                ->schema([
                    'token_grid' => Grid::make(2)
                        ->schema([
                            'id' => TextEntry::make('id'),
                            'access_token_id' => TextEntry::make('accessToken.id'),
                        ]),
                ])->columns(1),

            'status' => Section::make('Status')
                ->schema([
                    'status_grid' => Grid::make(2)
                        ->schema([
                            'revoked' => IconEntry::make('revoked')->boolean(),
                        ]),
                ])->columns(1),

            'timestamps' => Section::make('Timestamps')
                ->schema([
                    'timestamps_grid' => Grid::make(2)
                        ->schema([
                            'expires_at' => TextEntry::make('expires_at')
                                ->dateTime(),
                            'created_at' => TextEntry::make('created_at')
                                ->dateTime(),
                        ]),
                ])->columns(1),
        ];
>>>>>>> 350420cb (Check & fix styling)
    }
=======
>>>>>>> .merge_file_pBOMzl
}
