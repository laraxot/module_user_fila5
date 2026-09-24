<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Component;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Foundation\Auth\User as AuthUser;
use Modules\User\Models\OauthClient;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class ClientsRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'clients';

    protected static ?string $recordTitleAttribute = 'name';

    /**
     * @return array<string, Component>
     */
    #[\Override]
    public function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(255),
        ];
    }

    /**
     * @return array<string, Column>
     */
    #[\Override]
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')
                ->label('Nome'),
            'id' => TextColumn::make('id')
                ->label('Client ID')
                ->copyable()
                ->copyMessage('Client ID copiato')
                ->copyMessageDuration(1500),
            'secret' => TextColumn::make('secret')
                ->label('Client Secret')
                ->formatStateUsing(static fn (): string => 'Mostrato solo alla creazione')
                ->tooltip('Il secret viene cifrato e non è più recuperabile: copia quello in chiaro al momento della creazione.'),
        ];
    }

    /**
     * Issue module_user_fila5#97 (2026-09-15): `detach` (ereditato da
     * `XotBaseRelationManager::getTableActions()`) chiama
     * `$relationship->detach($record)` — metodo che esiste solo su
     * `BelongsToMany` (`Filament\Actions\DetachAction`, letto nel sorgente
     * vendor). `clients()` è una `MorphMany`: cliccare "detach" avrebbe
     * lanciato `Call to undefined method MorphMany::detach()`. Sostituita
     * con un'azione simmetrica ad "associateExistingClient": azzera sia
     * `owner_id`/`owner_type` (letti da questa stessa tab) sia `user_id`
     * (letto da `AssociatePassportClientToUser.php`) — altrimenti un futuro
     * `php artisan user:backfill-oauth-client-owner` ripristinerebbe
     * l'associazione appena rimossa, trovando ancora `user_id` valorizzato.
     *
     * @return array<string, Action>
     */
    #[\Override]
    public function getTableActions(): array
    {
        $actions = parent::getTableActions();
        unset($actions['detach']);

        $actions['dissociateClient'] = Action::make('dissociateClient')
            ->label('Rimuovi associazione')
            ->icon('heroicon-o-link-slash')
            ->color('danger')
            ->iconButton()
            ->requiresConfirmation()
            ->action(function (OauthClient $record): void {
                $record->owner()->dissociate();
                $record->forceFill(['user_id' => null]);
                $record->save();

                Notification::make()
                    ->title('Associazione rimossa.')
                    ->success()
                    ->send();
            });

        return $actions;
    }

    /**
     * @return array<string, Action>
     */
    #[\Override]
    public function getTableHeaderActions(): array
    {
        /** @var array<string, Action> $actions */
        $actions = parent::getTableHeaderActions();

        $actions['associateExistingClient'] = Action::make('associateExistingClient')
            ->label('Associa client esistente')
            ->icon('heroicon-o-link')
            ->schema([
                Select::make('client_id')
                    ->label('Client')
                    ->searchable()
                    ->required()
                    ->getSearchResultsUsing(static function (string $search): array {
                        return OauthClient::query()
                            ->whereNull('owner_id')
                            ->whereNull('owner_type')
                            ->where('name', 'like', "%{$search}%")
                            ->limit(25)
                            ->pluck('name', 'id')
                            ->toArray();
                    })
                    ->getOptionLabelUsing(static function (?string $value): ?string {
                        if (null === $value) {
                            return null;
                        }

                        /** @var OauthClient|null $client */
                        $client = OauthClient::query()->find($value);

                        return $client?->name;
                    }),
            ])
            ->action(function (array $data): void {
                $ownerRecord = $this->getOwnerRecord();

                if (! $ownerRecord instanceof AuthUser) {
                    Notification::make()
                        ->title('Utente non valido per l\'associazione del client.')
                        ->danger()
                        ->send();

                    return;
                }

                /** @var AuthUser $owner */
                $owner = $ownerRecord;
                $clientId = $data['client_id'] ?? null;
                /** @var OauthClient|null $client */
                $client = null !== $clientId ? OauthClient::query()->find($clientId) : null;

                if (null === $client) {
                    Notification::make()
                        ->title('Client non trovato.')
                        ->danger()
                        ->send();

                    return;
                }

                // Issue module_user_fila5#97 (2026-09-15): scrivere solo user_id
                // lasciava owner_id/owner_type vuoti — questa stessa tab legge da
                // clients() (BaseUser::clients(), morphMany su 'owner'), quindi il
                // client appena associato non ricompariva mai in questa lista, e
                // restava bloccato su SurveyController::createContacts (l'endpoint
                // reale usato dagli script clienti), che legge solo $client->owner.
                // owner()->associate() valorizza owner_id/owner_type correttamente;
                // user_id resta impostato per compatibilità con gli altri punti del
                // codice che lo leggono ancora (es. AssociatePassportClientToUser).
                $client->owner()->associate($owner);
                $client->forceFill([
                    'user_id' => $owner->getKey(),
                ]);
                $client->save();

                Notification::make()
                    ->title('Client associato all\'utente.')
                    ->success()
                    ->send();
            });

        return $actions;
    }
}
