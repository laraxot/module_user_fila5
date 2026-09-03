<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Pages;

use Filament\Actions\Action;
use Filament\Clusters\Cluster;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\ClientRepository;
use Livewire\Attributes\On;
use Modules\User\Filament\Clusters\Passport;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Actions\ExecuteArtisanCommandAction;
use Modules\Xot\Filament\Pages\XotBasePage;
use Webmozart\Assert\Assert;

class PassportDashboard extends XotBasePage
{
    public bool $hasPublicKey = false;

    public bool $hasPrivateKey = false;

    /** @var list<string> */
    public array $output = [];

    public string $status = '';

    public bool $isRunning = false;

    public string $currentCommand = '';

    /**
     * @var class-string<Cluster>
     */
    protected static ?string $cluster = Passport::class;

    protected string $view = 'user::filament.pages.passport-dashboard';

    public function executeCommand(string $command): void
    {
        $this->reset(['output', 'status']);
        $this->currentCommand = $command;
        $this->isRunning = true;

        try {
            app(ExecuteArtisanCommandAction::class)->execute($command);
        } catch (\Exception $e) {
            Notification::make()
                ->title('Error executing command')
                ->body($e->getMessage())
                ->danger()
                ->send();

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

    public function mount(): void
    {
        $this->checkKeys();
    }

    public function checkKeys(): void
    {
        $this->hasPublicKey = file_exists(storage_path('oauth-public.key'));
        $this->hasPrivateKey = file_exists(storage_path('oauth-private.key'));
    }

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
     * Story user-passport-create-client-credentials-button.md: crea un
     * client OAuth `client_credentials` con credenziali funzionanti,
     * senza SSH. Chiama direttamente ClientRepository (la stessa logica
     * usata da `php artisan passport:client --client`), non un comando
     * shell: il nome del cliente e' un valore dinamico, e interpolarlo
     * dentro una stringa di comando (come fa ExecuteArtisanCommandAction
     * per i comandi fissi della whitelist) sarebbe un rischio di
     * injection. Riservata a super-admin, sia in visibilita' che in
     * esecuzione (AC4).
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
        ];
    }
}
