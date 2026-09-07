<?php

declare(strict_types=1);

/**
 * @see Jeffgreco13\FilamentBreezy\Pages
 * @see https://www.filamentcomponents.com/blog/how-to-create-a-custom-profile-page-with-filamentphp
 */

namespace Modules\User\Filament\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Exception;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\EditProfile;
use Filament\Pages\Page;
=======
=======
>>>>>>> f589f9b2 (.)
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Filament\Support\Exceptions\Halt;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Validation\Rules\Password;
use Modules\User\Datas\PasswordData;

/**
 * @property \Filament\Schemas\Schema $form
 * @property \Filament\Schemas\Schema $editProfileForm
 * @property \Filament\Schemas\Schema $editPasswordForm
 */
class MyProfilePage extends Page implements HasForms
{
    // class MyProfilePage extends EditProfile
    use InteractsWithForms;

    public null|array $profileData = [];

    public null|array $passwordData = [];

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';
=======
=======
>>>>>>> f589f9b2 (.)
use Modules\User\Datas\PasswordData;
use Modules\Xot\Filament\Pages\XotBasePage;

/**
 * @property Schema $form
 * @property Schema $editProfileForm
 * @property Schema $editPasswordForm
 */
class MyProfilePage extends XotBasePage implements HasSchemas
{
    use InteractsWithSchemas;

    /** @var array<string, mixed>|null */
    public ?array $profileData = [];

    /** @var array<string, mixed>|null */
    public ?array $passwordData = [];
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

    protected string $view = 'user::filament.pages.my-profile';

    protected static bool $shouldRegisterNavigation = false;

    // public static function getSlug(): string
    // {
    //     return filament('filament-breezy')->slug();
    // }

<<<<<<< HEAD
<<<<<<< HEAD
    public static function getNavigationLabel(): string
    {
        return __('user::profile.profile');
    }

=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    public function mount(): void
    {
        $this->fillForms();
    }

    public function editProfileForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profile Information')
                    ->aside()
                    ->description('Update your account\'s profile information and email address.')
                    ->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true),
                    ]),
            ])
            ->model($this->getUser())
            ->statePath('profileData');
    }

    public function editPasswordForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Update Password')
                    ->aside()
                    ->description('Ensure your account is using long, random password to stay secure.')
                    ->schema([
<<<<<<< HEAD
<<<<<<< HEAD
                        TextInput::make('Current password')
                            ->password()
                            ->required()
                            ->currentPassword(),
                        PasswordData::make()
                            ->getPasswordFormComponent('new_password')
                            ->dehydrateStateUsing(fn (string $value): string => Hash::make($value))
                            ->live(debounce: 500),
                        // ->same('passwordConfirmation')
=======
=======
>>>>>>> f589f9b2 (.)
                        TextInput::make('current_password')
                            ->password()
                            ->required()
                            ->currentPassword()
                            ->validationMessages([
                                'current_password' => 'current_password',
                            ]),
                        PasswordData::make()
                            ->getPasswordFormComponent('new_password')
                            ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                            ->live(debounce: 500),
                        // ->same('password_confirmation')
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
                        /*
                         * Forms\Components\TextInput::make('password')
                         * ->password()
                         * ->required()
                         * ->rule(Password::default())
                         * ->autocomplete('new-password')
                         * ->dehydrateStateUsing(fn ($state): string => Hash::make($state))
                         * ->live(debounce: 500)
<<<<<<< HEAD
<<<<<<< HEAD
                         * ->same('passwordConfirmation'),
                         */
                        TextInput::make('passwordConfirmation')
=======
                         * ->same('password_confirmation'),
                         */
                        TextInput::make('password_confirmation')
>>>>>>> 2024e2e7 (.)
=======
                         * ->same('password_confirmation'),
                         */
                        TextInput::make('password_confirmation')
>>>>>>> f589f9b2 (.)
                            ->password()
                            ->required()
                            ->dehydrated(false)
                            ->same('new_password'),
                    ]),
            ])
            ->model($this->getUser())
            ->statePath('passwordData');
    }

    public function getUser(): Authenticatable&Model
    {
        $user = Filament::auth()->user();

<<<<<<< HEAD
<<<<<<< HEAD
        if (!($user instanceof Model)) {
            throw new Exception(
                'The authenticated user object must be an Eloquent model to allow the profile page to update it.',
            );
=======
        if (! $user instanceof Model) {
            throw new \Exception('The authenticated user object must be an Eloquent model to allow the profile page to update it.');
>>>>>>> 2024e2e7 (.)
=======
        if (! $user instanceof Model) {
            throw new \Exception('The authenticated user object must be an Eloquent model to allow the profile page to update it.');
>>>>>>> f589f9b2 (.)
        }

        return $user;
    }

    public function getTitle(): string
    {
        return __('user::profile.my_profile');
    }

    public function getHeading(): string
    {
        return __('user::profile.my_profile');
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function getSubheading(): null|string
    {
        return __('user::profile.subheading') ?? null;
=======
    public function getSubheading(): ?string
    {
        return __('user::profile.subheading');
>>>>>>> 2024e2e7 (.)
=======
    public function getSubheading(): ?string
    {
        return __('user::profile.subheading');
>>>>>>> f589f9b2 (.)
    }

    // public static function shouldRegisterNavigation(): bool
    // {
    //     return filament('filament-breezy')->shouldRegisterNavigation('myProfile');
    // }

    // public static function getNavigationGroup(): ?string
    // {
    //     return filament('filament-breezy')->getNavigationGroup('myProfile');
    // }

    // public function getRegisteredMyProfileComponents(): array
    // {
    //     return filament('filament-breezy')->getRegisteredMyProfileComponents();
    // }
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name')->autofocus()->required(),
            TextInput::make('email')->required(),
        ];

        // Nota: i seguenti commenti sono stati rimossi perché non sono applicabili al metodo getFormSchema()
        // ->statePath('data')
        // ->model(auth()->user());
    }

    public function updateProfile(): void
    {
        try {
            $data = $this->editProfileForm->getState();

            $this->handleRecordUpdate($this->getUser(), $data);
        } catch (Halt $exception) {
            return;
        }

        $this->sendSuccessNotification();
    }

    public function updatePassword(): void
    {
        try {
            $data = $this->editPasswordForm->getState();

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> f589f9b2 (.)
            if (isset($data['new_password'])) {
                $data['password'] = $data['new_password'];
                unset($data['new_password']);
            }

            if (isset($data['password_confirmation'])) {
                unset($data['password_confirmation']);
            }

<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            $this->handleRecordUpdate($this->getUser(), $data);
        } catch (Halt $exception) {
            return;
        }

        if (request()->hasSession() && array_key_exists('password', $data)) {
            request()
                ->session()
                ->put([
<<<<<<< HEAD
<<<<<<< HEAD
                    'password_hash_' . Filament::getAuthGuard() => $data['password'],
=======
                    'password_hash_'.Filament::getAuthGuard() => $data['password'],
>>>>>>> 2024e2e7 (.)
=======
                    'password_hash_'.Filament::getAuthGuard() => $data['password'],
>>>>>>> f589f9b2 (.)
                ]);
        }

        $this->editPasswordForm->fill();

        $this->sendSuccessNotification();
    }

    protected function getForms(): array
    {
        return [
            'editProfileForm',
            'editPasswordForm',
        ];
    }

    protected function fillForms(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
        /** @var array<string, mixed> $data */
>>>>>>> 2024e2e7 (.)
=======
        /** @var array<string, mixed> $data */
>>>>>>> f589f9b2 (.)
        $data = $this->getUser()->attributesToArray();

        $this->editProfileForm->fill($data);
        $this->editPasswordForm->fill();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('Update')->color('primary')->submit('Update'),
        ];
    }

    /*
     * public function update()
     * {
     * auth()->user()->update(
     * $this->form->getState()
     * );
     *
     * Notification::make()
     * ->title('Profile updated!')
     * ->success()
     * ->send();
     * }
     */

<<<<<<< HEAD
<<<<<<< HEAD
=======
    /**
     * @return array<Action>
     */
>>>>>>> 2024e2e7 (.)
=======
    /**
     * @return array<Action>
     */
>>>>>>> f589f9b2 (.)
    protected function getUpdateProfileFormActions(): array
    {
        return [
            Action::make('updateProfileAction')->submit('editProfileForm'),
        ];
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
    /**
     * @return array<Action>
     */
>>>>>>> 2024e2e7 (.)
=======
    /**
     * @return array<Action>
     */
>>>>>>> f589f9b2 (.)
    protected function getUpdatePasswordFormActions(): array
    {
        return [
            Action::make('updatePasswordAction')->submit('editPasswordForm'),
        ];
    }

    // ...

<<<<<<< HEAD
<<<<<<< HEAD
=======
    /**
     * @param array<string, mixed> $data
     */
>>>>>>> 2024e2e7 (.)
=======
    /**
     * @param array<string, mixed> $data
     */
>>>>>>> f589f9b2 (.)
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);

        return $record;
    }

    private function sendSuccessNotification(): void
    {
        Notification::make()
            ->success()
            ->title(__('filament-panels::pages/auth/edit-profile.notifications.saved.title'))
            ->send();
    }
}
