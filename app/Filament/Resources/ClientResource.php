<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> 2024e2e7 (.)
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> f589f9b2 (.)
use Laravel\Passport\Client;
use Laravel\Passport\Passport;
use Modules\User\Filament\Resources\ClientResource\Pages\CreateClient;
use Modules\User\Filament\Resources\ClientResource\Pages\EditClient;
use Modules\User\Filament\Resources\ClientResource\Pages\ListClients;
use Modules\User\Filament\Resources\ClientResource\Pages\ViewClient;
use Modules\Xot\Filament\Forms\Components\XotBaseSelect;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Webmozart\Assert\Assert;

class ClientResource extends XotBaseResource
{
    protected static string $resource = ClientResource::class;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f589f9b2 (.)
    // use HasResourceFormComponents;

    /**
     * ⚠️ IMPORTANTE: NavigationIcon è gestito automaticamente da NavigationLabelTrait
     * tramite il file di traduzione (navigation.icon).
     * NON definire $navigationIcon qui!
     *
     * Get the form schema for the resource (XotBaseResource pattern).
     *
     * @return array<string, Field>
     */
    public static function getFormSchema(): array
    {
        $components = [
            'name' => TextInput::make('name')
                ->unique('clients', 'name')
                ->required()
                ->maxLength(255),
            'user_id' => XotBaseSelect::make('user_id')
                ->relationship('user', 'name')
                ->searchable()
                ->required(),
        ];

        /*
         * merge getResourceFormComponents if enabled
         */
        if (static::isResourceFormComponentsEnabled()) {
            $additionalComponents = static::getResourceFormComponents();
            /** @var array<string, Field> $additionalComponents */
            /** @var array<string, Field> $components */
            $components = array_merge($components, $additionalComponents);
        }

<<<<<<< HEAD
        /* @var array<string, \Filament\Forms\Components\Field> $components */
        return $components;
    }
=======
>>>>>>> 2024e2e7 (.)
=======
        /* @var array<string, Field> $components */
        return $components;
    }
>>>>>>> f589f9b2 (.)

    /**
     * Get the model class for the resource from Passport.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @return class-string<\Illuminate\Database\Eloquent\Model>
     */
    /**
     * @return class-string<\Illuminate\Database\Eloquent\Model>
=======
=======
>>>>>>> f589f9b2 (.)
     * @return class-string<Model>
     */
    /**
     * @return class-string<Model>
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     */
    public static function getModel(): string
    {
        $model = Passport::clientModel();
        if (! class_exists($model)) {
            return Client::class;
        }

<<<<<<< HEAD
<<<<<<< HEAD
        Assert::subclassOf($model, \Illuminate\Database\Eloquent\Model::class);

        /* @var class-string<\Illuminate\Database\Eloquent\Model> $model */
=======
        Assert::subclassOf($model, Model::class);

        /* @var class-string<Model> $model */
>>>>>>> 2024e2e7 (.)
=======
        Assert::subclassOf($model, Model::class);

        /* @var class-string<Model> $model */
>>>>>>> f589f9b2 (.)
        return $model;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListClients::route('/'),
            'view' => ViewClient::route('/{record}'),
            'edit' => EditClient::route('/{record}/edit'),
            'create' => CreateClient::route('/create'),
        ];
    }

    /**
     * Check if resource form components are enabled.
     */
    protected static function isResourceFormComponentsEnabled(): bool
    {
        return false;
    }

    /**
     * Get resource form components.
<<<<<<< HEAD
<<<<<<< HEAD
=======
     *
     * @return array<int, never>
>>>>>>> 2024e2e7 (.)
=======
     *
     * @return array<int, never>
>>>>>>> f589f9b2 (.)
     */
    protected static function getResourceFormComponents(): array
    {
        return [];
    }
}
