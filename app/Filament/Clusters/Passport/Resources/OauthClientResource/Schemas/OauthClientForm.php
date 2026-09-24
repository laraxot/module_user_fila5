<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthClientResource\Schemas;

<<<<<<< HEAD
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
=======
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class OauthClientForm extends XotBaseResourceForm
{
    /**
<<<<<<< HEAD
     * Get the form schema for the resource (XotBaseResource pattern).
     *
     * @return array<string, Field>
     */
    /**
     * @return array<string, Field>
     */
    public function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')
                ->unique('oauth_clients', 'name')
                ->required()
                ->maxLength(255),
            'user_id' => Select::make('user_id')
                ->relationship('user', 'name')
                ->searchable(),
            'redirect' => TextInput::make('redirect')
                ->url()
                ->maxLength(2000),
            'provider' => TextInput::make('provider')
                ->maxLength(255),
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
