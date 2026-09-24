<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Socialite\Resources\SsoProviderResource\Schemas;

<<<<<<< HEAD
use Filament\Forms\Components\Field;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
=======
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class SsoProviderForm extends XotBaseResourceForm
{
    /**
<<<<<<< HEAD
     * @return array<string, Field>
     */
    #[\Override]
    public function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(255),
            'display_name' => TextInput::make('display_name')
                ->required()
                ->maxLength(255),
            'type' => Select::make('type')
                ->options([
                    'saml' => 'SAML',
                    'oidc' => 'OIDC',
                    'oauth' => 'OAuth',
                ])
                ->required(),
            'entity_id' => TextInput::make('entity_id')->maxLength(255),
            'client_id' => TextInput::make('client_id')->maxLength(255),
            'client_secret' => TextInput::make('client_secret')
                ->password()
                ->maxLength(255),
            'redirect_url' => TextInput::make('redirect_url')
                ->url()
                ->maxLength(255),
            'metadata_url' => TextInput::make('metadata_url')
                ->url()
                ->maxLength(255),
            'scopes' => Textarea::make('scopes')->rows(2),
            'settings' => KeyValue::make('settings'),
            'domain_whitelist' => KeyValue::make('domain_whitelist'),
            'role_mapping' => KeyValue::make('role_mapping'),
            'is_active' => Toggle::make('is_active'),
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
