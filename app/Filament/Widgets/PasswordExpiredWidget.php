<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Schemas\Schema as FilamentForm;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Widgets\Widget;
use Illuminate\Auth\Events\PasswordReset as PasswordResetResponseEvent;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema as DatabaseSchema;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Modules\User\Datas\PasswordData;
use Modules\User\Events\NewPasswordSet;
use Modules\User\Http\Response\PasswordResetResponse;
use Modules\User\Rules\CheckOtpExpiredRule;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Filament\Traits\TransTrait;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Webmozart\Assert\Assert;
=======
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\User\Datas\PasswordData;
use Modules\User\Http\Response\PasswordResetResponse;
use Modules\User\Models\User;
use Modules\User\Rules\CheckOtpExpiredRule;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Filament\Traits\TransTrait;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
>>>>>>> 2024e2e7 (.)

/**
 * Widget for handling expired password reset.
 *
<<<<<<< HEAD
 * @property \Filament\Schemas\Schema $form
 * @property string|null $current_password
 * @property string|null $password
 * @property string|null $passwordConfirmation
 * @property array<string, mixed>|null $data
 */
class PasswordExpiredWidget extends XotBaseWidget implements HasForms
{
    use InteractsWithForms;
    use TransTrait;

    public null|string $current_password = '';
    public null|string $password = '';
    public null|string $passwordConfirmation = '';

    /** @var array<string, mixed>|null */
    public null|array $data = [];

    /**
     * @var view-string
=======
 * @property Schema                    $form
 * @property string|null               $current_password
 * @property string|null               $password
 * @property string|null               $passwordConfirmation
 * @property array<string, mixed>|null $data
 */
class PasswordExpiredWidget extends XotBaseSchemaWidget
{
    // XotBaseWidget already implements HasForms and uses InteractsWithForms
    use TransTrait;

    public ?string $current_password = '';

    public ?string $password = '';

    public ?string $passwordConfirmation = '';

    /** @var array<string, mixed>|null */
    public ?array $data = [];

    /**
     * The view for this widget.
>>>>>>> 2024e2e7 (.)
     */
    protected string $view = 'user::filament.widgets.password-expired';

    protected static bool $shouldRegisterNavigation = false;

    /**
     * Get the form schema for password reset.
     *
<<<<<<< HEAD
     * @return array<int, \Filament\Schemas\Components\Component>
     */
    #[Override]
    public function getFormSchema(): array
    {
        return [
            $this->getCurrentPasswordFormComponent(),
            ...PasswordData::make()->getPasswordFormComponents('password'),
        ];
=======
     * @return array<int, Component>
     */
    public function getFormSchema(): array
    {
        $schema = [
            $this->getCurrentPasswordFormComponent(),
            ...PasswordData::make()->getPasswordFormComponents('password'),
        ];

        // Ensure list type for PHPStan Level 10
        /* @var array<int, Component> $schema */
        return array_values($schema);
>>>>>>> 2024e2e7 (.)
    }

    /**
     * Get the reset password form action.
<<<<<<< HEAD
     *
     * @return Action
=======
>>>>>>> 2024e2e7 (.)
     */
    public function getResetPasswordFormAction(): Action
    {
        return Action::make('resetPassword')->submit('resetPassword');
    }

    /**
     * Check if the widget should display a logo.
<<<<<<< HEAD
     *
     * @return bool
=======
>>>>>>> 2024e2e7 (.)
     */
    public function hasLogo(): bool
    {
        return false;
    }

    /**
     * Reset the user's password.
<<<<<<< HEAD
     *
     * @return PasswordResetResponse|null
     */
    public function resetPassword(): null|PasswordResetResponse
=======
     */
    public function resetPassword(): ?PasswordResetResponse
>>>>>>> 2024e2e7 (.)
    {
        $this->validate();

        $user = Auth::user();
<<<<<<< HEAD
        if (!$user || !($user instanceof Model)) {
            $this->addError('current_password', __('user::auth.user_not_found'));
=======
        if (! $user || ! ($user instanceof Model)) {
            $this->addError('current_password', __('user::auth.user_not_found'));

>>>>>>> 2024e2e7 (.)
            return null;
        }

        // Cast e verifica esistenza dei dati del form
        $data = $this->data ?? [];
        $currentPassword = SafeStringCastAction::cast($data['current_password'] ?? '');
        $newPassword = SafeStringCastAction::cast($data['password'] ?? '');

        if (empty($currentPassword) || empty($newPassword)) {
            $this->addError('current_password', __('user::auth.password_fields_required'));
<<<<<<< HEAD
=======

>>>>>>> 2024e2e7 (.)
            return null;
        }

        $userPassword = SafeStringCastAction::cast($user->getAttribute('password'));
        // Cast esplicito di mixed a string per PHPStan
        $userPasswordString = $userPassword;

<<<<<<< HEAD
        if (!Hash::check($currentPassword, $userPasswordString)) {
            $this->addError('current_password', __('user::auth.password_current_incorrect'));
=======
        if (! Hash::check($currentPassword, $userPasswordString)) {
            $this->addError('current_password', __('user::auth.password_current_incorrect'));

>>>>>>> 2024e2e7 (.)
            return null;
        }

        $user->setAttribute('password', Hash::make($newPassword));
        $user->save();

        return new PasswordResetResponse();
    }

    /**
     * Get the current password form component.
<<<<<<< HEAD
     *
     * @return \Filament\Schemas\Components\Component
=======
>>>>>>> 2024e2e7 (.)
     */
    protected function getCurrentPasswordFormComponent(): Component
    {
        $authUser = Filament::auth()->user();

        if ($authUser instanceof User) {
            return TextInput::make('current_password')
                ->password()
                ->revealable()
                ->required()
                ->rule(new CheckOtpExpiredRule($authUser))
                ->validationAttribute(static::trans('fields.current_password.validation_attribute'));
        }

        // Fallback nel caso l'utente non sia del tipo corretto
        return TextInput::make('current_password')
            ->password()
            ->revealable()
            ->required()
            ->validationAttribute(static::trans('fields.current_password.validation_attribute'));
    }

    /*
     * protected function getPasswordFormComponent(): Component
     * {
     * $validation_messages = __('user::validation');
     *
     * return TextInput::make('password')
     * ->password()
     * // ->revealable(filament()->arePasswordsRevealable())
     * ->revealable()
     * ->required()
     * ->rule(PasswordRule::default())
     * ->same('passwordConfirmation')
     * ->validationMessages($validation_messages)
     * ->validationAttribute(static::trans('fields.password.validation_attribute'));
     * }
     *
     * protected function getPasswordConfirmationFormComponent(): Component
     * {
     * return TextInput::make('passwordConfirmation')
     * ->password()
     * // ->revealable(filament()->arePasswordsRevealable())
     * ->revealable()
     * ->required()
     * ->dehydrated(false);
     * }
     */

    /**
     * Get the form actions.
     *
     * @return array<int, Action|ActionGroup>
     */
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> 2024e2e7 (.)
    protected function getFormActions(): array
    {
        return [
            $this->getResetPasswordFormAction(),
        ];
    }
}
