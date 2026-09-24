<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthPersonalAccessClientResource\Schemas;

<<<<<<< HEAD
use Filament\Forms\Components\Select;
=======
use Filament\Forms\Components\TextInput;
>>>>>>> 350420cb (Check & fix styling)
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class OauthPersonalAccessClientForm extends XotBaseResourceForm
{
    /**
<<<<<<< HEAD
     * @return array<string, Component>
     */
    #[\Override]
    public function getFormSchema(): array
    {
        return [
            'oauth_personal_access_client' => Section::make('OAuth Personal Access Client Information')
                ->schema([
                    Select::make('client_id')
                        ->label('Client')
                        ->relationship('client', 'name')
                        ->required()
                        ->searchable()
                        ->helperText('Associated OAuth client'),
                ])
                ->columns(2),
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
