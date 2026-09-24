<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Socialite\Resources\SocialiteUserResource\Schemas;

<<<<<<< HEAD
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
=======
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class SocialiteUserForm extends XotBaseResourceForm
{
    /**
<<<<<<< HEAD
     * Get the form schema for the resource.
     *
     * @return array<string, Select|TextInput>
     */
    #[\Override]
    public function getFormSchema(): array
    {
        return [
            'user_id' => Select::make('user_id')
                ->relationship('user', 'name')
                ->searchable()
                ->required(),
            'provider' => Select::make('provider')
                ->options([
                    'google' => 'Google',
                    'facebook' => 'Facebook',
                    'github' => 'GitHub',
                    'twitter' => 'Twitter',
                    'linkedin' => 'LinkedIn',
                    'apple' => 'Apple',
                    // Add other providers as needed
                ])
                ->searchable()
                ->required(),
            'provider_id' => TextInput::make('provider_id')
                ->required()
                ->maxLength(255),
            'provider_token' => TextInput::make('provider_token')
                ->maxLength(255)
                ->password(),
            'provider_refresh_token' => TextInput::make('provider_refresh_token')
                ->maxLength(255)
                ->password(),
            'provider_avatar' => TextInput::make('provider_avatar')
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
