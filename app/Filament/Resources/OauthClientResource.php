<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\Client;
use Laravel\Passport\Passport;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Webmozart\Assert\Assert;

/**
 * OAuth Client Resource.
 *
 * ⚠️ IMPORTANTE: Estende XotBaseResource, MAI Filament\Resources\Resource
 * direttamente! Segue il pattern DRY: solo getFormSchema() necessario,
 * table() e metodi table* gestiti automaticamente.
 */
class OauthClientResource extends XotBaseResource
{
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
     * Configure the model query.
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['user']);
    }
}
