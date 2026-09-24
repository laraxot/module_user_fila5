<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

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
<<<<<<< HEAD
use Modules\User\Rules\CheckOtpExpiredRule;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
=======
use Modules\User\Models\User;
use Modules\User\Rules\CheckOtpExpiredRule;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Filament\Traits\TransTrait;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
>>>>>>> 350420cb (Check & fix styling)

/**
 * Widget for handling expired password reset.
 *
 * @property Schema                    $form
 * @property string|null               $current_password
 * @property string|null               $password
 * @property string|null               $passwordConfirmation
 * @property array<string, mixed>|null $data
 */
<<<<<<< HEAD
class PasswordExpiredWidget extends XotBaseSchemaWidget
{
=======
class PasswordExpiredWidget extends XotBaseWidget
{
    // XotBaseWidget already implements HasForms and uses InteractsWithForms
    use TransTrait;

>>>>>>> 350420cb (Check & fix styling)
    public ?string $current_password = '';

    public ?string $password = '';

    public ?string $passwordConfirmation = '';

<<<<<<< HEAD
    /** @var array<string, mixed>|null */
    public ?array $data = [];

=======
>>>>>>> 350420cb (Check & fix styling)
    /**
     * The view for this widget.
     */
    protected string $view = 'user::filament.widgets.password-expired';

    protected static bool $shouldRegisterNavigation = false;

    /**
     * Get the form schema for password reset.
     *
     * @return array<int, Component>
     */
<<<<<<< HEAD
=======
    #[\Override]
>>>>>>> 350420cb (Check & fix styling)
    public function getFormSchema(): array
    {
        $schema = [
            $this->getCurrentPasswordFormComponent(),
            ...PasswordData::make()->getPasswordFormComponents('password'),
        ];

        // Ensure list type for PHPStan Level 10
<<<<<<< HEAD
        /* @var array<int, Component> $schema */
=======
        /* @var array<int, Component> $result */
>>>>>>> 350420cb (Check & fix styling)
        return array_values($schema);
    }

    /**
     * Get the reset password form action.
     */
    public function getResetPasswordFormAction(): Action
    {
        return Action::make('resetPassword')->submit('resetPassword');
    }

    /**
     * Check if the widget should display a logo.
     */
    public function hasLogo(): bool
    {
        return false;
    }

    /**
     * Reset the user's password.
     */
    public function resetPassword(): ?PasswordResetResponse
    {
        $this->validate();

        $user = Auth::user();
        if (! $user || ! ($user instanceof Model)) {
            $this->addError('current_password', __('user::auth.user_not_found'));

            return null;
        }

        // Cast e verifica esistenza dei dati del form
        $data = $this->data ?? [];
        $currentPassword = SafeStringCastAction::cast($data['current_password'] ?? '');
        $newPassword = SafeStringCastAction::cast($data['password'] ?? '');

        if (empty($currentPassword) || empty($newPassword)) {
            $this->addError('current_password', __('user::auth.password_fields_required'));

            return null;
        }

        $userPassword = SafeStringCastAction::cast($user->getAttribute('password'));
        // Cast esplicito di mixed a string per PHPStan
        $userPasswordString = $userPassword;

        if (! Hash::check($currentPassword, $userPasswordString)) {
            $this->addError('current_password', __('user::auth.password_current_incorrect'));

            return null;
        }

        $user->setAttribute('password', Hash::make($newPassword));
        $user->save();

        return new PasswordResetResponse();
    }

    /**
     * Get the current password form component.
     */
    protected function getCurrentPasswordFormComponent(): Component
    {
        $authUser = Filament::auth()->user();

<<<<<<< HEAD
        if ($authUser instanceof UserContract) {
=======
        if ($authUser instanceof User) {
>>>>>>> 350420cb (Check & fix styling)
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
=======
    #[\Override]
>>>>>>> 350420cb (Check & fix styling)
    protected function getFormActions(): array
    {
        return [
            $this->getResetPasswordFormAction(),
        ];
    }
}
