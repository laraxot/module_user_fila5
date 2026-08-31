<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Component;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * LoginWidget: Widget di login conforme alle regole Windsurf/Xot.
 * - Estende XotBaseWidget
 * - Usa solo componenti Filament importati
 * - Validazione e sicurezza integrate
 * - Facilmente estendibile (2FA, captcha, login social).
 *
 * @property array<string, mixed>|null $data
 */
class LoginWidget extends XotBaseSchemaWidget
{
    /**
     * @var view-string
     */
    protected string $view;

    public function __construct()
    {
        /** @var view-string $view */
        $view = 'pub_theme::filament.widgets.auth.login';
        $this->view = $view;

        parent::__construct();
    }

    /**
     * Inizializza il widget quando viene montato.
     */
    public function mount(): void
    {
        $this->form->fill();
    }

    /**
     * Get the form schema for the login form.
     *
     * @return array<int, Component>
     */
    public function getFormSchema(): array
    {
        return [
            TextInput::make('email')
                ->email()
                ->required()
                ->autofocus(),
            TextInput::make('password')
                ->password()
                ->required()
                ->revealable(),
            Toggle::make('remember')->visible(false),
        ];
    }

    /**
     * Get the form fill data.
     *
     * @return array<string, mixed>
     */
    public function getFormFill(): array
    {
        return [
            'email' => old('email'),
            'remember' => true,
        ];
    }

    /**
     * Handle login form submission.
     */
    public function save(): void
    {
        try {
            $data = $this->form->getState();

            // Cast esplicito per type safety PHPStan
            $remember = (bool) ($data['remember'] ?? false);
            $attempt_data = Arr::only($data, ['email', 'password']);

            if (! Auth::attempt($attempt_data, $remember)) {
                throw ValidationException::withMessages(['email' => [__('user::messages.failed')]]);
            }

            session()->regenerate();

            Notification::make()
                ->title(__('user::messages.login_success'))
                ->success()
                ->send();

            $this->redirect(route('home'));
        } catch (ValidationException $e) {
            Notification::make()
                ->title(__('user::messages.validation_error'))
                ->body($e->getMessage())
                ->danger()
                ->send();

            $this->form->fill();
            $this->form->saveRelationships();
            // $this->form->callAfter();

            // `ValidationException::errors()` è dichiarato `array` senza generics, quindi i
            // valori sono davvero `mixed`: la normalizzazione serve. Va però costruita, non
            // annotata — l'`@var` inline che c'era prima descriveva la variabile *prima*
            // della riassegnazione, quindi non vincolava niente, e `array_map()` con una
            // callable-stringa degradava comunque il tipo ad `array`.
            foreach ($e->errors() as $field => $messages) {
                $texts = [];
                foreach (is_array($messages) ? $messages : [$messages] as $message) {
                    $texts[] = SafeStringCastAction::cast($message);
                }

                $this->addError(SafeStringCastAction::cast($field), implode(' ', $texts));
            }
        } catch (\Exception $e) {
            report($e);

            Notification::make()
                ->title(__('user::messages.login_error'))
                ->body(__('user::messages.login_error'))
                ->danger()
                ->send();

            $this->form->fill();
            $this->form->saveRelationships();
            // $this->form->callAfter();

            $this->addError('email', __('user::messages.login_error'));
        }
    }

    /**
     * Get the form model.
     */
    protected function getFormModel(): ?Model
    {
        return null;
    }
}
