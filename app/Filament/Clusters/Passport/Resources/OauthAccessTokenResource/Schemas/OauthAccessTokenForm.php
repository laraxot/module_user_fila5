<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthAccessTokenResource\Schemas;

<<<<<<< HEAD
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Grid;
=======
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
>>>>>>> 350420cb (Check & fix styling)
use Filament\Schemas\Components\Section;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class OauthAccessTokenForm extends XotBaseResourceForm
{
    /**
<<<<<<< HEAD
     * @return array<string, Component>
     */
    #[\Override]
    public function getFormSchema(): array
    {
        return [
            'oauth_access_token_info' => Section::make('OAuth Access Token Information')
                ->schema([
                    'grid_1' => Grid::make(2)
                        ->schema([
                            'user_id' => Select::make('user_id')
                                ->relationship('user', 'name')
                                ->searchable(),
                            'client_id' => Select::make('client_id')
                                ->relationship('client', 'name')
                                ->searchable()
                                ->required(),
                        ]),

                    'grid_2' => Grid::make(2)
                        ->schema([
                            'name' => TextInput::make('name')
                                ->maxLength(255),
                            'scopes' => TextInput::make('scopes'),
                        ]),
                ]),
=======
     * @return array<int|string, Component>
     */
    public static function getFormSchema(): array
    {
        return [
            Section::make([
                'name' => TextInput::make('name'),
            ]),
>>>>>>> 350420cb (Check & fix styling)
        ];
    }
}
