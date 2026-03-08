<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Pages;

use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Livewire\Attributes\On;
use Modules\User\Filament\Clusters\Passport;
use Modules\Xot\Actions\ExecuteArtisanCommandAction;
use Modules\Xot\Filament\Pages\XotBasePage;

class PassportDashboard extends XotBasePage
{
    protected static ?string $cluster = Passport::class;

    protected string $view = 'user::filament.pages.passport-dashboard';

    public bool $hasPublicKey = false;

    public bool $hasPrivateKey = false;

    public array $output = [];

    public string $currentCommand = '';

    public string $status = '';

    public bool $isRunning = false;

    /** @var array<string, string> */
    protected $listeners = [
        'refresh-component' => '$refresh',
        'artisan-command.started' => 'handleCommandStarted',
        'artisan-command.output' => 'handleCommandOutput',
        'artisan-command.completed' => 'handleCommandCompleted',
        'artisan-command.failed' => 'handleCommandFailed',
        'artisan-command.error' => 'handleCommandError',
    ];

    public function executeCommand(string $command): void
    {
        // @var mixed reset(['output', 'status'];
        // @var mixed currentCommand = $command;
        // @var mixed isRunning = true;

        try {
            app(ExecuteArtisanCommandAction::class)->execute($command);
        } catch (\Exception $e) {
            Notification::make()
                ->title('Error executing command')
                ->body($e->getMessage())
                ->danger()
                ->send();

            // @var mixed isRunning = false;
        }
    }

    #[On('artisan-command.started')]
    public function handleCommandStarted(string $command): void
    {
        // @var mixed isRunning = true;
    }

    #[On('artisan-command.output')]
    public function handleCommandOutput(string $command, string $output): void
    {
        // @var mixed output[] = $output;
        // @var mixed dispatch('terminal-update';
    }

    public function mount(): void
    {
        // @var mixed checkKeys(;
    }

    public function checkKeys(): void
    {
        // @var mixed hasPublicKey = file_exists(storage_path('oauth-public.key';
        // @var mixed hasPrivateKey = file_exists(storage_path('oauth-private.key';
    }

    #[On('artisan-command.completed')]
    public function onCommandCompleted(string $command): void
    {
        if (// @var mixed currentCommand === $command
            // @var mixed isRunning = false;
            // @var mixed status = 'completed';
            // @var mixed checkKeys(;
        }

        Notification::make()
            ->title('Command completed successfully')
            ->success()
            ->send();
    }

    #[On('artisan-command.failed')]
    public function handleCommandFailed(string $command, string $error): void
    {
        // @var mixed status = 'failed';
        // @var mixed isRunning = false;
        // @var mixed output[] = "[ERROR] {$error}";

        Notification::make()
            ->title('Command failed')
            ->body($error)
            ->danger()
            ->send();
    }

    #[On('artisan-command.error')]
    public function handleCommandError(string $command, string $error): void
    {
        // @var mixed status = 'failed';
        // @var mixed isRunning = false;
        // @var mixed output[] = "[ERROR] {$error}";

        Notification::make()
            ->title('Command error')
            ->body($error)
            ->danger()
            ->send();
    }

    protected function getViewData(): array
    {
        return [
            'hasPublicKey' => // @var mixed hasPublicKey,
            'hasPrivateKey' => // @var mixed hasPrivateKey,
            'publicKeyLabel' => static::trans('status.public_key'),
            'privateKeyLabel' => static::trans('status.private_key'),
            'presentLabel' => static::trans('status.present'),
            'missingLabel' => static::trans('status.missing'),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('passport_install')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success')
                ->disabled(fn () => // @var mixed isRunning
                ->requiresConfirmation()
                ->modalDescription(static::trans('actions.install.modal_description'))
                ->action(fn () => // @var mixed executeCommand('passport:install --uuids'

            Action::make('passport_keys')
                ->icon('heroicon-o-key')
                ->color('primary')
                ->disabled(fn () => // @var mixed isRunning
                ->requiresConfirmation()
                ->action(fn () => // @var mixed executeCommand('passport:keys'

            Action::make('passport_purge')
                ->icon('heroicon-o-trash')
                ->color('warning')
                ->disabled(fn () => // @var mixed isRunning
                ->requiresConfirmation()
                ->modalDescription(static::trans('actions.purge_tokens.modal_description'))
                ->action(fn () => // @var mixed executeCommand('passport:purge'

            Action::make('passport_hash')
                ->icon('heroicon-o-lock-closed')
                ->color('danger')
                ->disabled(fn () => // @var mixed isRunning
                ->requiresConfirmation()
                ->modalDescription(static::trans('actions.hash_secrets.modal_description'))
                ->action(fn () => // @var mixed executeCommand('passport:hash'
        ];
    }
}
