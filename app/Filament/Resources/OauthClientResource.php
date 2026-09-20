<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

<<<<<<< HEAD
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Passport\Client;
use Modules\Xot\Filament\Resources\XotBaseResource;
=======
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\Client;
use Laravel\Passport\Passport;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Webmozart\Assert\Assert;
>>>>>>> laraxot/dev

/**
 * OAuth Client Resource.
 *
 * ⚠️ IMPORTANTE: Estende XotBaseResource, MAI Filament\Resources\Resource
 * direttamente! Segue il pattern DRY: solo getFormSchema() necessario,
 * table() e metodi table* gestiti automaticamente.
 */
class OauthClientResource extends XotBaseResource
{
<<<<<<< HEAD
    protected static ?string $model = Client::class;

    /**
<<<<<<< HEAD
     * Schema del form per la risorsa.
     *
     * @return array<string, Field>
     */
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(255),
            'user_id' => Select::make('user_id')
                ->relationship('user', 'name')
                ->searchable(),
            'redirect' => TextInput::make('redirect')
                ->maxLength(2000),
            'secret' => TextInput::make('secret')
                ->password()
                ->maxLength(100),
            'provider' => Select::make('provider')
                ->options([
                    'users' => 'Users',
                ]),
            'personal_access_client' => TextInput::make('personal_access_client')
                ->numeric(),
            'password_client' => TextInput::make('password_client')
                ->numeric(),
        ];
    }

    /**
=======
>>>>>>> 2024e2e7 (.)
=======
    /**
     * Get the model class for the resource from Passport.
     *
     * Segue lo stesso pattern di ClientResource::getModel(): risolve il
     * model custom del progetto (Modules\User\Models\OauthClient,
     * connessione 'user') via Passport::clientModel(), invece di
     * puntare al model Passport vanilla che non ha le colonne
     * grant_types/redirect_uris/owner_id/owner_type.
     *
     * @return class-string<Model>
     */
    public static function getModel(): string
    {
        $model = Passport::clientModel();
        if (! class_exists($model)) {
            return Client::class;
        }

        Assert::subclassOf($model, Model::class);

        /* @var class-string<Model> $model */
        return $model;
    }

    /**
>>>>>>> laraxot/dev
     * Configure the model query.
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['user']);
    }
}
