<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
>>>>>>> 350420cb (Check & fix styling)
use Laravel\Passport\Client;
use Laravel\Passport\Passport;
use Modules\User\Filament\Resources\ClientResource\Pages\CreateClient;
use Modules\User\Filament\Resources\ClientResource\Pages\EditClient;
use Modules\User\Filament\Resources\ClientResource\Pages\ListClients;
use Modules\User\Filament\Resources\ClientResource\Pages\ViewClient;
<<<<<<< HEAD
=======
use Modules\Xot\Filament\Forms\Components\XotBaseSelect;
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\XotBaseResource;
use Webmozart\Assert\Assert;

class ClientResource extends XotBaseResource
{
    protected static string $resource = ClientResource::class;
    // use HasResourceFormComponents;

    /**
<<<<<<< HEAD
     * Get the model class for the resource from Passport.
     *
     * @return class-string<Model>
     */
    /**
     * @return class-string<Model>
=======
     * ⚠️ IMPORTANTE: NavigationIcon è gestito automaticamente da NavigationLabelTrait
     * tramite il file di traduzione (navigation.icon).
     * NON definire $navigationIcon qui!
     *
     * Get the form schema for the resource (XotBaseResource pattern).
     *
     * @return array<string, Component>
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
            /** @var array<string, Component> $additionalComponents */
            /** @var array<string, Component> $components */
            $components = array_merge($components, $additionalComponents);
        }

        /* @var array<string, Component> $components */
        return $components;
    }

    /**
     * Get the model class for the resource from Passport.
     *
     * @return class-string<\Illuminate\Database\Eloquent\Model>
     */
    /**
     * @return class-string<\Illuminate\Database\Eloquent\Model>
>>>>>>> 350420cb (Check & fix styling)
     */
    public static function getModel(): string
    {
        $model = Passport::clientModel();
        if (! class_exists($model)) {
            return Client::class;
        }

<<<<<<< HEAD
        Assert::subclassOf($model, Model::class);

        /* @var class-string<Model> $model */
=======
        Assert::subclassOf($model, \Illuminate\Database\Eloquent\Model::class);

        /* @var class-string<\Illuminate\Database\Eloquent\Model> $model */
>>>>>>> 350420cb (Check & fix styling)
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
     *
     * @return array<int, never>
     */
=======
     */
    /** @return array<string, Component> */
>>>>>>> 350420cb (Check & fix styling)
    protected static function getResourceFormComponents(): array
    {
        return [];
    }
}
