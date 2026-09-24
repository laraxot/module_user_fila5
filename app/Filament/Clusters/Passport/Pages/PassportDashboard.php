<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Pages;

<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Clusters\Cluster;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\ClientRepository;
use Modules\User\Filament\Clusters\Passport;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Actions\ExecuteArtisanCommandAction;
use Modules\Xot\Filament\Pages\XotBasePage;
use Webmozart\Assert\Assert;

class PassportDashboard extends XotBasePage
{
=======
// User — domain PHP (claude-audit documentation ratio).
// User — domain PHP (claude-audit documentation ratio).
// User — domain PHP (claude-audit documentation ratio).

use Filament\Actions\Action;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Livewire\Attributes\On;
use Modules\User\Filament\Clusters\Passport;
use Modules\Xot\Actions\ExecuteArtisanCommandAction;
use Modules\Xot\Filament\Pages\XotBasePage;

class PassportDashboard extends XotBasePage
{
    protected static ?string $cluster = Passport::class;

    protected string $view = 'user::filament.pages.passport-dashboard';

>>>>>>> 350420cb (Check & fix styling)
    public bool $hasPublicKey = false;

    public bool $hasPrivateKey = false;

<<<<<<< HEAD
    /** @var list<string> */
    public array $output = [];

=======
    /** @var array<int, string> */
    public array $output = [];

    public string $currentCommand = '';

>>>>>>> 350420cb (Check & fix styling)
    public string $status = '';

    public bool $isRunning = false;

<<<<<<< HEAD
    public string $currentCommand = '';

    /**
     * @var class-string<Cluster>
     */
    protected static ?string $cluster = Passport::class;

    protected string $view = 'user::filament.pages.passport-dashboard';

    /**
     * `ExecuteArtisanCommandAction::execute()` è sincrona e bloccante: al suo
     * ritorno il comando è già completato per davvero. Prima leggevamo lo
     * stato finale da un giro di eventi Laravel (`Event::dispatch(...)`)
     * intercettato via `#[On(...)]` — ma `Illuminate\Support\Facades\Event`
     * e il bus di eventi di Livewire sono due sistemi distinti che non si
     * parlano: nessun listener li riceveva mai, quindi sul percorso di
     * successo `isRunning`/`status`/`output` restavano bloccati ai valori
     * impostati qui sopra, a prescindere da quanto il comando reale fosse
     * andato a buon fine. Fix: leggere direttamente il valore di ritorno.
     */
=======
    /** @var array<string, string> */
    protected $listeners = [
        'refresh-component' => '$refresh',
        'artisan-command.started' => 'handleCommandStarted',
        'artisan-command.output' => 'handleCommandOutput',
        'artisan-command.completed' => 'handleCommandCompleted',
        'artisan-command.failed' => 'handleCommandFailed',
        'artisan-command.error' => 'handleCommandError',
    ];

>>>>>>> 350420cb (Check & fix styling)
    public function executeCommand(string $command): void
    {
        $this->reset(['output', 'status']);
        $this->currentCommand = $command;
        $this->isRunning = true;

        try {
<<<<<<< HEAD
            $result = app(ExecuteArtisanCommandAction::class)->execute($command);

            $this->output = $result['output'];
            $this->status = $result['status'];
            $this->isRunning = false;
            $this->checkKeys();

            if ($result['status'] === 'completed') {
                Notification::make()
                    ->title('Command completed successfully')
                    ->success()
                    ->send();
            } else {
                Notification::make()
                    ->title('Command failed')
                    ->body(implode("\n", $result['output']))
                    ->danger()
                    ->send();
            }
        } catch (\Exception $e) {
            $this->status = 'failed';
            $this->isRunning = false;

=======
            app(ExecuteArtisanCommandAction::class)->execute($command);
        } catch (\Exception $e) {
>>>>>>> 350420cb (Check & fix styling)
            Notification::make()
                ->title('Error executing command')
                ->body($e->getMessage())
                ->danger()
                ->send();
<<<<<<< HEAD
        }
    }

=======

            $this->isRunning = false;
        }
    }

    #[On('artisan-command.started')]
    public function handleCommandStarted(string $command): void
    {
        $this->isRunning = true;
    }

    #[On('artisan-command.output')]
    public function handleCommandOutput(string $command, string $output): void
    {
        $this->output[] = $output;
        $this->dispatch('terminal-update');
    }

>>>>>>> 350420cb (Check & fix styling)
    public function mount(): void
    {
        $this->checkKeys();
    }

    public function checkKeys(): void
    {
        $this->hasPublicKey = file_exists(storage_path('oauth-public.key'));
        $this->hasPrivateKey = file_exists(storage_path('oauth-private.key'));
    }

<<<<<<< HEAD
=======
    #[On('artisan-command.completed')]
    public function onCommandCompleted(string $command): void
    {
        if ($this->currentCommand === $command) {
            $this->isRunning = false;
            $this->status = 'completed';
            $this->checkKeys();
        }

        Notification::make()
            ->title('Command completed successfully')
            ->success()
            ->send();
    }

    #[On('artisan-command.failed')]
    public function handleCommandFailed(string $command, string $error): void
    {
        $this->status = 'failed';
        $this->isRunning = false;
        $this->output[] = "[ERROR] {$error}";

        Notification::make()
            ->title('Command failed')
            ->body($error)
            ->danger()
            ->send();
    }

    #[On('artisan-command.error')]
    public function handleCommandError(string $command, string $error): void
    {
        $this->status = 'failed';
        $this->isRunning = false;
        $this->output[] = "[ERROR] {$error}";

        Notification::make()
            ->title('Command error')
            ->body($error)
            ->danger()
            ->send();
    }

    /** @return array<string, mixed> */
>>>>>>> 350420cb (Check & fix styling)
    protected function getViewData(): array
    {
        return [
            'hasPublicKey' => $this->hasPublicKey,
            'hasPrivateKey' => $this->hasPrivateKey,
            'publicKeyLabel' => static::trans('status.public_key'),
            'privateKeyLabel' => static::trans('status.private_key'),
            'presentLabel' => static::trans('status.present'),
            'missingLabel' => static::trans('status.missing'),
        ];
    }

    /**
<<<<<<< HEAD
     * Story user-passport-create-client-credentials-button.md: crea un
     * client OAuth `client_credentials` con credenziali funzionanti,
     * senza SSH. Chiama direttamente ClientRepository (la stessa logica
     * usata da `php artisan passport:client --client`), non un comando
     * shell: il nome del cliente e' un valore dinamico, e interpolarlo
     * dentro una stringa di comando (come fa ExecuteArtisanCommandAction
     * per i comandi fissi della whitelist) sarebbe un rischio di
     * injection. Riservata a super-admin, sia in visibilita' che in
     * esecuzione (AC4).
     *
     * Ripristinata il 2026-09-17 (issue module_user_fila5#98): la prima
     * implementazione (2026-09-03) esisteva solo nella copia "fotografia"
     * del mono-repo, mai realmente confluita nella storia del repository
     * del modulo User — sovrascritta quando quella fotografia e' stata
     * risincronizzata da una fonte piu' recente che non la conteneva.
     */
    protected function newCredentialsAction(): Action
    {
        return Action::make('new_credentials')
            ->label(static::trans('actions.new_credentials.label'))
            ->icon('heroicon-o-plus-circle')
            ->color('primary')
            ->disabled(fn (): bool => $this->isRunning)
            ->visible(fn (): bool => (bool) Auth::user()?->hasRole('super-admin'))
            ->schema([
                TextInput::make('name')
                    ->label(static::trans('fields.client_name.label'))
                    ->required()
                    ->maxLength(255),
            ])
            ->action(function (array $data): void {
                Assert::true((bool) Auth::user()?->hasRole('super-admin'), 'Azione riservata a super-admin.');

                /** @var string $name */
                $name = $data['name'];

                $client = app(ClientRepository::class)->createClientCredentialsGrantClient($name);
                $clientId = SafeStringCastAction::cast($client->getKey());

                Notification::make()
                    ->title(static::trans('messages.credentials_created'))
                    ->body(
                        'Client ID: '.$clientId."\n".
                        'Client Secret: '.$client->plainSecret
                    )
                    ->success()
                    ->persistent()
                    ->send();
            });
    }

    protected function getHeaderActions(): array
    {
        return [
            'new_credentials' => $this->newCredentialsAction(),

            'passport_install' => Action::make('passport_install')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success')
                ->disabled(fn () => $this->isRunning)
                ->requiresConfirmation()
                ->modalDescription(static::trans('actions.install.modal_description'))
                ->action(fn () => $this->executeCommand('passport:install --uuids')),

            'passport_keys' => Action::make('passport_keys')
                ->icon('heroicon-o-key')
                ->color('primary')
                ->disabled(fn () => $this->isRunning)
                ->requiresConfirmation()
                ->action(fn () => $this->executeCommand('passport:keys')),

            'passport_purge' => Action::make('passport_purge')
                ->icon('heroicon-o-trash')
                ->color('warning')
                ->disabled(fn () => $this->isRunning)
                ->requiresConfirmation()
                ->modalDescription(static::trans('actions.purge_tokens.modal_description'))
                ->action(fn () => $this->executeCommand('passport:purge')),

            'passport_hash' => Action::make('passport_hash')
                ->icon('heroicon-o-lock-closed')
                ->color('danger')
                ->disabled(fn () => $this->isRunning)
                ->requiresConfirmation()
                ->modalDescription(static::trans('actions.hash_secrets.modal_description'))
                ->action(fn () => $this->executeCommand('passport:hash')),
=======
     * @return array<int, class-string<\Filament\Widgets\Widget>>
     */
    protected function getHeaderWidgets(): array
    {
        return [
            Passport\Widgets\PassportStatsWidget::class,
        ];
    }

    /** @return array<int, Action> */
    protected function getHeaderActions(): array
    {
        return [
            Action::make('passport_install')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success')
                ->label(static::trans('actions.install.label'))
                ->disabled(fn () => $this->isRunning)
                ->requiresConfirmation()
                ->modalDescription(static::trans('actions.install.modal_description'))
                ->form([
                    Checkbox::make('force')
                        ->label(static::trans('actions.install.force_label'))
                        ->helperText(static::trans('actions.install.force_help'))
                        ->default(false),
                ])
                ->action(function (array $data) {
                    $cmd = 'passport:install --uuids';
                    if (! empty($data['force'])) {
                        $cmd .= ' --force';
                    }
                    $this->executeCommand($cmd);
                }),

            Action::make('passport_keys')
                ->icon('heroicon-o-key')
                ->color('primary')
                ->label(static::trans('actions.keys.label'))
                ->disabled(fn () => $this->isRunning)
                ->requiresConfirmation()
                ->form([
                    Checkbox::make('force')
                        ->label(static::trans('actions.keys.force_label'))
                        ->helperText(static::trans('actions.keys.force_help'))
                        ->default($this->hasPublicKey || $this->hasPrivateKey),
                ])
                ->action(function (array $data) {
                    $cmd = 'passport:keys';
                    if (! empty($data['force'])) {
                        $cmd .= ' --force';
                    }
                    $this->executeCommand($cmd);
                }),

            Action::make('passport_purge')
                ->icon('heroicon-o-trash')
                ->color('warning')
                ->label(static::trans('actions.purge.label'))
                ->disabled(fn () => $this->isRunning)
                ->requiresConfirmation()
                ->modalDescription(static::trans('actions.purge_tokens.modal_description'))
                ->form([
                    Checkbox::make('revoked')
                        ->label(static::trans('actions.purge.revoked_label'))
                        ->helperText(static::trans('actions.purge.revoked_help'))
                        ->default(true),
                    Checkbox::make('expired')
                        ->label(static::trans('actions.purge.expired_label'))
                        ->helperText(static::trans('actions.purge.expired_help'))
                        ->default(true),
                    TextInput::make('hours')
                        ->label(static::trans('actions.purge.hours_label'))
                        ->helperText(static::trans('actions.purge.hours_help'))
                        ->numeric()
                        ->default(168)
                        ->minValue(1)
                        ->maxValue(8760),
                ])
                ->action(function (array $data) {
                    $parts = [];
                    if (! empty($data['revoked'])) {
                        $parts[] = '--revoked';
                    }
                    if (! empty($data['expired'])) {
                        $parts[] = '--expired';
                        $hours = (int) ($data['hours'] ?? 168);
                        $parts[] = '--hours='.$hours;
                    }
                    $cmd = 'passport:purge'.(empty($parts) ? '' : ' '.implode(' ', $parts));
                    $this->executeCommand($cmd);
                }),

            Action::make('passport_hash')
                ->icon('heroicon-o-lock-closed')
                ->color('danger')
                ->label(static::trans('actions.hash.label'))
                ->disabled(fn () => $this->isRunning)
                ->requiresConfirmation()
                ->modalDescription(static::trans('actions.hash_secrets.modal_description'))
                ->form([
                    Checkbox::make('force')
                        ->label(static::trans('actions.hash.force_label'))
                        ->helperText(static::trans('actions.hash.force_help'))
                        ->default(false),
                ])
                ->action(function (array $data) {
                    $cmd = 'passport:hash';
                    if (! empty($data['force'])) {
                        $cmd .= ' --force';
                    }
                    $this->executeCommand($cmd);
                }),
>>>>>>> 350420cb (Check & fix styling)
        ];
    }
}
