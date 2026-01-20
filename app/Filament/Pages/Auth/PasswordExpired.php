<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Auth;

<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
=======
use Filament\Schemas\Components\Component;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use Modules\Xot\Contracts\UserContract;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\Page;
>>>>>>> f548be94 (.)
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema as DatabaseSchema;
<<<<<<< HEAD
use Modules\User\Datas\PasswordData;
use Modules\User\Events\NewPasswordSet;
use Modules\User\Http\Response\PasswordResetResponse;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Filament\Pages\XotBasePage;
=======
use Illuminate\Validation\Rules\Password as PasswordRule;
use Modules\User\Datas\PasswordData;
use Modules\User\Events\NewPasswordSet;
use Modules\User\Http\Response\PasswordResetResponse;
>>>>>>> f548be94 (.)
use Modules\Xot\Filament\Traits\NavigationPageLabelTrait;
use Webmozart\Assert\Assert;

/**
<<<<<<< HEAD
 * @property Schema $form
 * @property Schema $editProfileForm
 * @property Schema $editPasswordForm
 */
class PasswordExpired extends XotBasePage
=======
 * @property \Filament\Schemas\Schema $form
 * @property \Filament\Schemas\Schema $editProfileForm
 * @property \Filament\Schemas\Schema $editPasswordForm
 */
class PasswordExpired extends Page implements HasForms
>>>>>>> f548be94 (.)
{
    use InteractsWithFormActions;
    use NavigationPageLabelTrait;

<<<<<<< HEAD
=======
    public null|string $current_password = '';

    public null|string $password = '';

    public null|string $passwordConfirmation = '';

    /**
     * @var view-string
     */
>>>>>>> f548be94 (.)
    protected string $view = 'user::filament.auth.pages.password-expired';

    protected static bool $shouldRegisterNavigation = false;

<<<<<<< HEAD
    /**
     * @return array<int, TextInput>
     */
    public function getFormSchema(): array
    {
        return array_values(array_merge(
            $this->getCurrentPasswordFormComponent(),
            PasswordData::make()->getPasswordFormComponents('password'),
        ));
=======
    public function getFormSchema(): array
    {
        return [
            $this->getCurrentPasswordFormComponent(),
            ...PasswordData::make()->getPasswordFormComponents('password'),
        ];
>>>>>>> f548be94 (.)
    }

    public function getResetPasswordFormAction(): Action
    {
        return Action::make('resetPassword')->submit('resetPassword');
    }

    public function hasLogo(): bool
    {
        return false;
    }

<<<<<<< HEAD
    public function resetPassword(): ?PasswordResetResponse
    {
        $pwd = PasswordData::make();
        $data = $this->form->getState();
        Assert::string($currentPassword = Arr::get($data, 'current_password'));
        Assert::string($password = Arr::get($data, 'password'));
        $user = Auth::user();
        if (null === $user) {
=======
    public function resetPassword(): null|PasswordResetResponse
    {
        $pwd = PasswordData::make();
        $data = $this->form->getState();
        Assert::string($current_password = Arr::get($data, 'current_password'));
        Assert::string($password = Arr::get($data, 'password'));
        $user = Auth::user();
        if ($user === null) {
>>>>>>> f548be94 (.)
            return null;
        }

        // check if current password is correct
<<<<<<< HEAD
        if (null === $user->password || ! Hash::check($currentPassword, $user->password)) {
=======
        if ($user->password === null || !Hash::check($current_password, $user->password)) {
>>>>>>> f548be94 (.)
            Notification::make()
                ->title(__('user::otp.notifications.wrong_password.title'))
                ->body(__('user::otp.notifications.wrong_password.body'))
                ->danger()
                ->send();

            return null;
        }

        // check if new password is different from the current password
<<<<<<< HEAD
        if (Hash::check($password, $user->password)) {
=======
        if ($user->password !== null && Hash::check($password, $user->password)) {
>>>>>>> f548be94 (.)
            Notification::make()
                ->title(__('user::otp.notifications.same_password.title'))
                ->body(__('user::otp.notifications.same_password.body'))
                ->danger()
                ->send();

            return null;
        }

        // check if both required columns exist in the database
<<<<<<< HEAD
        if (! DatabaseSchema::hasColumn('users', 'password_expires_at')) {
=======
        if (!DatabaseSchema::hasColumn('users', 'password_expires_at')) {
>>>>>>> f548be94 (.)
            Notification::make()
                ->title(__('user::otp.notifications.column_not_found.title'))
                ->body(__('user::otp.notifications.column_not_found.body', [
                    'column_name' => 'password_expires_at',
                    'password_column_name' => 'password',
                    'table_name' => 'users',
                ]))
                ->danger()
                ->send();

            return null;
        }

        // get password expiry date and time
        $passwordExpiryDateTime = now()->addDays($pwd->expires_in);

        // Verificare che l'utente esistante e che sia un modello Eloquent
<<<<<<< HEAD
        if (! $user instanceof Model) {
            throw new \InvalidArgumentException('L\'utente deve essere un modello Eloquent con il metodo update');
=======
        if (!($user instanceof Model)) {
            throw new InvalidArgumentException('L\'utente deve essere un modello Eloquent con il metodo update');
>>>>>>> f548be94 (.)
        }

        // set password expiry date and time
        $user->update([
            'password_expires_at' => $passwordExpiryDateTime,
            'is_otp' => false,
            'password' => Hash::make($password),
        ]);

        // Verificare che l'utente implementi l'interfaccia UserContract prima di passarlo all'evento
<<<<<<< HEAD
        if (! $user instanceof UserContract) {
            throw new \InvalidArgumentException('L\'utente deve implementare l\'interfaccia UserContract');
=======
        if (!($user instanceof UserContract)) {
            throw new InvalidArgumentException('L\'utente deve implementare l\'interfaccia UserContract');
>>>>>>> f548be94 (.)
        }

        event(new NewPasswordSet($user));

        Notification::make()
            ->title(__('user::otp.notifications.password_reset.success'))
            ->success()
            ->send();

        return new PasswordResetResponse();
    }

<<<<<<< HEAD
    /**
     * @return array<int, TextInput>
     */
    protected function getCurrentPasswordFormComponent(): array
    {
        return [
            TextInput::make('current_password')
                ->password()
                ->revealable()
                ->required()
                ->validationAttribute(static::trans('fields.current_password.validation_attribute')),
        ];
=======
    protected function getCurrentPasswordFormComponent(): Component
    {
        return TextInput::make('current_password')
            ->password()
            ->revealable()
            ->required()
            ->validationAttribute(static::trans('fields.current_password.validation_attribute'));
>>>>>>> f548be94 (.)
    }

    /**
     * @return array<Action|ActionGroup>
     */
    protected function getFormActions(): array
    {
        return [
            $this->getResetPasswordFormAction(),
        ];
    }
}
