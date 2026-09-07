<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
use Modules\User\Filament\Resources\SocialProviderResource\Pages\ListSocialProviders;
use Modules\User\Filament\Resources\SocialProviderResource\Pages\CreateSocialProvider;
use Modules\User\Filament\Resources\SocialProviderResource\Pages\ViewSocialProvider;
use Modules\User\Filament\Resources\SocialProviderResource\Pages\EditSocialProvider;
=======
>>>>>>> 2024e2e7 (.)
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
<<<<<<< HEAD
use Modules\User\Filament\Resources\SocialProviderResource\Pages;
=======
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Modules\User\Filament\Resources\SocialProviderResource\Pages\CreateSocialProvider;
use Modules\User\Filament\Resources\SocialProviderResource\Pages\EditSocialProvider;
use Modules\User\Filament\Resources\SocialProviderResource\Pages\ListSocialProviders;
use Modules\User\Filament\Resources\SocialProviderResource\Pages\ViewSocialProvider;
>>>>>>> 2024e2e7 (.)
use Modules\User\Models\SocialProvider;
use Modules\Xot\Filament\Resources\XotBaseResource;

/**
 * @property SocialProvider $record
 *                                  -------
 */
class SocialProviderResource extends XotBaseResource
{
<<<<<<< HEAD
    protected static null|string $model = SocialProvider::class;
=======
    protected static ?string $model = SocialProvider::class;
>>>>>>> 2024e2e7 (.)

    /**
     * @return array<string, Component>
     */
<<<<<<< HEAD
    #[Override]
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->placeholder(static::trans('fields.name.placeholder'))
                ->helperText(static::trans('fields.name.helper_text')),
            'scopes' => KeyValue::make('scopes')
                // ->placeholder(static::trans('fields.scopes.placeholder'))
                ->helperText(static::trans('fields.scopes.helper_text')),
            'client_id' => TextInput::make('client_id')
                ->required()
                ->maxLength(255)
                ->placeholder(static::trans('fields.client_id.placeholder'))
                ->helperText(static::trans('fields.client_id.helper_text')),
            'client_secret' => TextInput::make('client_secret')
                ->required()
                ->maxLength(1024)
                ->placeholder(static::trans('fields.client_secret.placeholder'))
                ->helperText(static::trans('fields.client_secret.helper_text')),
            'redirect' => TextInput::make('redirect')
                ->required()
                ->maxLength(255)
                ->placeholder(static::trans('fields.redirect.placeholder'))
                ->helperText(static::trans('fields.redirect.helper_text')),
            'parameters' => KeyValue::make('parameters')
                // ->placeholder(static::trans('fields.parameters.placeholder'))
                ->helperText(static::trans('fields.parameters.helper_text')),
            'additional_params' => Textarea::make('additional_params'),
            'stateless' => Toggle::make('stateless')->helperText(static::trans('fields.stateless.helper_text')),
            'active' => Toggle::make('active')->helperText(static::trans('fields.active.helper_text')),
            'socialite' => Toggle::make('socialite')->helperText(static::trans('fields.socialite.helper_text')),
            'enabled' => Toggle::make('enabled'),
            'svg' => Textarea::make('svg')
                ->columnSpanFull()
                ->placeholder(static::trans('fields.svg.placeholder'))
                ->helperText(static::trans('fields.svg.helper_text')),
        ];
    }

    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
    public static function getRelations(): array
    {
        return [];
    }

<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
    public static function getPages(): array
    {
        return [
            'index' => ListSocialProviders::route('/'),
            'create' => CreateSocialProvider::route('/create'),
            'view' => ViewSocialProvider::route('/{record}'),
            'edit' => EditSocialProvider::route('/{record}/edit'),
        ];
    }
}
