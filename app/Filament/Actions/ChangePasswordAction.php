<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\User\Filament\Actions;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Modules\User\Datas\PasswordData;
use Modules\Xot\Contracts\UserContract;

class ChangePasswordAction extends Action
=======
=======
>>>>>>> f589f9b2 (.)
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Modules\User\Datas\PasswordData;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Filament\Actions\XotBaseAction;

final class ChangePasswordAction extends XotBaseAction
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->icon('heroicon-o-key')
            ->action(function (UserContract $record, array $data): void {
<<<<<<< HEAD
<<<<<<< HEAD
                $record->update([
                    'password' => Hash::make($data['new_password']),
=======
=======
>>>>>>> f589f9b2 (.)
                $newPassword = is_string($data['new_password'] ?? null) ? $data['new_password'] : '';

                $record->update([
                    'password' => Hash::make($newPassword),
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
                ]);
                Notification::make()
                    ->success()
                    ->title(__('user::notifications.password_changed_successfully.title'))
<<<<<<< HEAD
<<<<<<< HEAD
                    ->body(__('user::notifications.password_changed_successfully.message'));
            })
            ->schema([
                PasswordData::make()->getPasswordFormComponent('new_password'),
                TextInput::make('new_password_confirmation')
                    ->password()
                    ->placeholder(__('user::fields.confirm_password.placeholder'))
                    ->rule('required', static fn($get): bool => (bool) $get('new_password'))
                    ->same('new_password'),
            ]);
    }

    public static function getDefaultName(): null|string
=======
=======
>>>>>>> f589f9b2 (.)
                    ->body(__('user::notifications.password_changed_successfully.message'))
                    ->send();
            })
            ->schema(function (): array {
                return [
                    PasswordData::make()->getPasswordFormComponent('new_password'),
                    TextInput::make('new_password_confirmation')
                        ->password()
                        ->placeholder(__('user::fields.confirm_password.placeholder'))
                        ->rule(
                            'required',
                            /**
                             * @param callable(string): mixed $get
                             */
                            static fn (callable $get): bool => (bool) $get('new_password')
                        )
                        ->same('new_password'),
                ];
            });
    }

    public static function getDefaultName(): string
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    {
        return 'changePassword';
    }
}

/*
 * Action::make('changePassword')
 * ->action(function (UserContract $user, array $data): void {
 * $user->update([
 * 'password' => Hash::make($data['new_password']),
 * ]);
 * Notification::make()->success()->title('Password changed successfully.');
 * })
 * ->form([
 * TextInput::make('new_password')
 * ->password()
 * ->required()
 * ->rule(Password::default()),
 * TextInput::make('new_password_confirmation')
 * ->password()
 * ->rule('required', fn ($get): bool => (bool) $get('new_password'))
 * ->same('new_password'),
 * ])
 * ->icon('heroicon-o-key')
 * // ->visible(fn (User $record): bool => $record->role_id === Role::ROLE_ADMINISTRATOR)
 */
