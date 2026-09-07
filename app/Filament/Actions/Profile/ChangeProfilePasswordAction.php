<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\User\Filament\Actions\Profile;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Actions\Action;
use Modules\Xot\Contracts\UserContract;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Modules\User\Datas\PasswordData;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Datas\XotData;
=======
=======
>>>>>>> f589f9b2 (.)
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Modules\User\Datas\PasswordData;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Actions\XotBaseAction;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

/**
 * ---.
 */
<<<<<<< HEAD
<<<<<<< HEAD
class ChangeProfilePasswordAction extends Action
=======
final class ChangeProfilePasswordAction extends XotBaseAction
>>>>>>> 2024e2e7 (.)
=======
final class ChangeProfilePasswordAction extends XotBaseAction
>>>>>>> f589f9b2 (.)
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->tooltip(__('user::user.actions.change_password'))
            ->icon('heroicon-o-key')
            ->action(static function (ProfileContract $record, array $data): void {
                $user = $record->user;
<<<<<<< HEAD
<<<<<<< HEAD
                $profile_data = Arr::except($record->toArray(), ['id']);
                if ($user === null) {
                    $user_class = XotData::make()->getUserClass();
=======
                $profileData = Arr::except($record->toArray(), ['id']);
                if (null === $user) {
>>>>>>> 2024e2e7 (.)
=======
                $profileData = Arr::except($record->toArray(), ['id']);
                if (null === $user) {
>>>>>>> f589f9b2 (.)
                    /** @var UserContract */
                    $user = XotData::make()->getUserByEmail($record->email);
                }

<<<<<<< HEAD
<<<<<<< HEAD
                if ($user === null) {
                    $user = $record->user()->create($profile_data);
                }
                // @phpstan-ignore argument.type, method.notFound
                $user->profile()->save($record);
                $user->update([
                    'password' => Hash::make($data['new_password']),
                ]);
                Notification::make()->success()->title('Password changed successfully.');
            })
            ->schema([
                /*
                 * TextInput::make('new_password')
                 * ->password()
                 * ->required()
                 * ->rule(Password::default()),
                 */
                PasswordData::make()->getPasswordFormComponent('new_password'),
                TextInput::make('new_password_confirmation')
                    ->password()
                    ->rule('required', static fn($get): bool => (bool) $get('new_password'))
                    ->same('new_password'),
            ]);
    }

    public static function getDefaultName(): null|string
=======
=======
>>>>>>> f589f9b2 (.)
                if (null === $user) {
                    /** @var array<string, mixed> $profileData */
                    $user = $record->user()->create($profileData);
                }

                if ($user instanceof UserContract && $record instanceof Model) {
                    $user->profile()->save($record);
                }

                $newPassword = is_string($data['new_password'] ?? null) ? $data['new_password'] : '';
                /*
                 * @var ProfileContract $record
                 */
                $record->update([
                    'password' => Hash::make($newPassword),
                ]);
                Notification::make()->success()->title('Password changed successfully.')->send();
            })
            ->schema(function (): array {
                return [
                    /*
                     * TextInput::make('new_password')
                     * ->password()
                     * ->required()
                     * ->rule(Password::default()),
                     */
                    PasswordData::make()->getPasswordFormComponent('new_password'),
                    TextInput::make('new_password_confirmation')
                        ->password()
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
