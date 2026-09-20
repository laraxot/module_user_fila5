<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthRefreshTokenResource\Schemas;

<<<<<<< HEAD
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
=======
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Grid;
>>>>>>> laraxot/dev
use Filament\Schemas\Components\Section;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class OauthRefreshTokenForm extends XotBaseResourceForm
{
    /**
<<<<<<< HEAD
     * @return array<int|string, Component>
     */
<<<<<<< HEAD
    public static function getFormSchema(): array
=======
    public function getFormSchema(): array
>>>>>>> 87273113 (.)
    {
        return [
            Section::make([
                'name' => TextInput::make('name'),
            ]),
=======
     * Get the form schema for the resource.
     *
     * @return array<string, Component>
     */
    #[\Override]
    public function getFormSchema(): array
    {
        return [
            'oauth_refresh_token_info' => Section::make(static::trans('label'))
                ->schema([
                    'grid_1' => Grid::make(2)
                        ->schema([
                            'access_token_id' => Select::make('access_token_id')
                                ->relationship('accessToken', 'id')
                                ->searchable()
                                ->required(),
                            'revoked' => TextInput::make('revoked')
                                ->numeric()
                                ->required(),
                            'expires_at' => DateTimePicker::make('expires_at'),
                        ]),
                ]),
>>>>>>> laraxot/dev
        ];
    }
}
