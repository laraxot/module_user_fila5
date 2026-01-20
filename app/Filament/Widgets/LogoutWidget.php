<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\View;
use Illuminate\Contracts\Auth\Authenticatable;
=======
use Filament\Schemas\Components\View;
use Filament\Schemas\Components\Component;
use Override;
use RuntimeException;
use Exception;
use Filament\Actions\Action;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
>>>>>>> f548be94 (.)
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
<<<<<<< HEAD
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
=======
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Throwable;
>>>>>>> f548be94 (.)

/**
 * Provides a widget for user logout functionality within Filament admin panels.
 *
 * This widget handles the user logout process including session invalidation,
 * event dispatching, and proper redirection with localization support.
 *
<<<<<<< HEAD
 * @method void                     mount()          Initialize the widget and form state.
 * @method array<string, Component> getFormSchema()  Define the form schema for the logout confirmation.
 * @method void                     logout()         Handle the user logout process.
 * @method array<string, Action>    getFormActions() Define the form actions (logout and cancel buttons).
 * @method array<string, string>    getViewData()    Get additional data to pass to the view.
 *
 * @property array<string, mixed>|null $data         Widget data array managed by XotBaseWidget.
 * @property bool                      $isLoggingOut Flag indicating if logout is in progress.
 */
class LogoutWidget extends XotBaseSchemaWidget
{
    /**
=======
 * @method void mount() Initialize the widget and form state.
 * @method array<string, Component> getFormSchema() Define the form schema for the logout confirmation.
 * @method void logout() Handle the user logout process.
 * @method array<string, Action> getFormActions() Define the form actions (logout and cancel buttons).
 * @method array<string, string> getViewData() Get additional data to pass to the view.
 *
 * @property array<string, mixed>|null $data Widget data array managed by XotBaseWidget.
 * @property bool $isLoggingOut Flag indicating if logout is in progress.
 */
class LogoutWidget extends XotBaseWidget
{
    /**
     * The view that should be used to render the widget.
     *
     * IMPORTANT: When using @livewire() directly in Blade templates,
     * the path should be without the module namespace.
     *
     * @var string
     *
     * @phpstan-ignore property.phpDocType
     */
    protected string $view = 'user::widgets.logout';

    /**
>>>>>>> f548be94 (.)
     * Widget data array.
     *
     * CRITICAL: This property is managed by XotBaseWidget.
     * Do not remove or redeclare it.
     *
     * @var array<string, mixed>|null
     */
<<<<<<< HEAD
    public ?array $data = [];

    /**
     * Indicates if the logout process is in progress.
=======
    public null|array $data = [];

    /**
     * Indicates if the logout process is in progress.
     *
     * @var bool
>>>>>>> f548be94 (.)
     */
    public bool $isLoggingOut = false;

    /**
     * Mount the widget and initialize the form.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> f548be94 (.)
     */
    public function mount(): void
    {
        $this->form->fill();
    }

    /**
     * Get the form schema for the logout confirmation.
     *
     * This method implements the abstract method from XotBaseWidget.
     * Do not override the form() method as it's declared as final.
     *
     * @return array<string, Component>
     */
<<<<<<< HEAD
    public function getFormSchema(): array
    {
        return [
            'message' => View::make('user::filament.widgets.auth.logout-message')->columnSpanFull(),
=======
    #[Override]
    public function getFormSchema(): array
    {
        $view = 'filament.widgets.auth.logout-message';
        //@phpstan-ignore-next-line
        if (!view()->exists($view)) {
            throw new Exception('View ' . $view . ' not found');
        }
        return [
            'message' => View::make($view)->columnSpanFull(),
>>>>>>> f548be94 (.)
        ];
    }

    /**
     * Handle the user logout process.
     *
     * This method performs the following actions:
     * 1. Validates the current user session
     * 2. Dispatches pre-logout events
     * 3. Performs the actual logout
     * 4. Invalidates the session
     * 5. Dispatches post-logout events
     * 6. Logs the operation
     * 7. Handles redirection with proper localization
     *
<<<<<<< HEAD
     * @throws \RuntimeException If the logout process fails
=======
     * @return void
     *
     * @throws RuntimeException If the logout process fails
>>>>>>> f548be94 (.)
     */
    public function logout(): void
    {
        try {
            $this->isLoggingOut = true;

            // Get the authenticated user before logging out
            $user = $this->getAuthenticatedUser();
<<<<<<< HEAD
            if (null === $user) {
                $this->handleNoUserScenario();

=======
            if ($user === null) {
                $this->handleNoUserScenario();
>>>>>>> f548be94 (.)
                return;
            }

            $this->dispatchPreLogoutEvent($user);
            $this->performLogout();
            $this->dispatchPostLogoutEvent();
            $this->logLogoutSuccess($user);
            $this->redirectAfterLogout();
<<<<<<< HEAD
        } catch (\Throwable $e) {
=======
        } catch (Throwable $e) {
>>>>>>> f548be94 (.)
            $this->handleLogoutError($e);
        }
    }

    /**
     * Get the form actions for the widget.
     *
     * @return array<string, Action>
     */
<<<<<<< HEAD
=======
    #[Override]
>>>>>>> f548be94 (.)
    public function getFormActions(): array
    {
        return [
            'logout' => $this->getLogoutAction(),
            'cancel' => $this->getCancelAction(),
        ];
    }

    /**
     * Get the logout action configuration.
<<<<<<< HEAD
=======
     *
     * @return Action
>>>>>>> f548be94 (.)
     */
    protected function getLogoutAction(): Action
    {
        return Action::make('logout')
            ->translateLabel()
            ->color('danger')
            ->size('lg')
            ->extraAttributes(['class' => 'w-full justify-center'])
            ->action($this->logout(...));
    }

    /**
     * Get the cancel action configuration.
<<<<<<< HEAD
=======
     *
     * @return Action
>>>>>>> f548be94 (.)
     */
    protected function getCancelAction(): Action
    {
        return Action::make('cancel')
            ->translateLabel()
            ->color('gray')
            ->size('lg')
            ->extraAttributes(['class' => 'w-full justify-center mt-2'])
            ->url($this->getLocalizedHomeUrl());
    }

    /**
     * Get localized home URL based on current locale.
<<<<<<< HEAD
=======
     *
     * @return string
>>>>>>> f548be94 (.)
     */
    protected function getLocalizedHomeUrl(): string
    {
        $locale = App::getLocale();
<<<<<<< HEAD

        return '/'.ltrim($locale, '/');
=======
        return '/' . ltrim($locale, '/');
>>>>>>> f548be94 (.)
    }

    /**
     * Get the authenticated user instance.
<<<<<<< HEAD
     */
    protected function getAuthenticatedUser(): ?Authenticatable
=======
     *
     * @return Authenticatable|null
     */
    protected function getAuthenticatedUser(): null|Authenticatable
>>>>>>> f548be94 (.)
    {
        return Auth::user();
    }

    /**
     * Handle scenario when no user is authenticated.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> f548be94 (.)
     */
    protected function handleNoUserScenario(): void
    {
        $this->isLoggingOut = false;
        Log::warning('Logout attempted with no authenticated user');
    }

    /**
     * Dispatch pre-logout events.
<<<<<<< HEAD
=======
     *
     * @param Authenticatable $user
     * @return void
>>>>>>> f548be94 (.)
     */
    protected function dispatchPreLogoutEvent(Authenticatable $user): void
    {
        Event::dispatch('auth.logout.attempting', [$user]);
    }

    /**
     * Perform the actual logout operations.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> f548be94 (.)
     */
    protected function performLogout(): void
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
    }

    /**
     * Dispatch post-logout events.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> f548be94 (.)
     */
    protected function dispatchPostLogoutEvent(): void
    {
        Event::dispatch('auth.logout.successful');
    }

    /**
     * Log successful logout operation.
<<<<<<< HEAD
     */
    protected function logLogoutSuccess(Authenticatable $user): void
    {
        Log::debug('User logged out', [
=======
     *
     * @param Authenticatable $user
     * @return void
     */
    protected function logLogoutSuccess(Authenticatable $user): void
    {
        Log::info('User logged out', [
>>>>>>> f548be94 (.)
            'user_id' => $user->getAuthIdentifier(),
            'timestamp' => now()->toDateTimeString(),
        ]);
    }

    /**
     * Handle redirect after successful logout.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> f548be94 (.)
     */
    protected function redirectAfterLogout(): void
    {
        $redirect = redirect($this->getLocalizedHomeUrl())->with('success', __('user::auth.logout_success'));

        $redirect->send();
<<<<<<< HEAD
        exit;
=======
        exit();
>>>>>>> f548be94 (.)
    }

    /**
     * Handle any errors that occur during logout.
     *
<<<<<<< HEAD
     * @throws \RuntimeException
     */
    protected function handleLogoutError(\Throwable $e): void
    {
        Log::error('Logout error: '.$e->getMessage(), [
            'exception' => $e::class,
=======
     * @param Throwable $e
     * @return void
     *
     * @throws RuntimeException
     */
    protected function handleLogoutError(Throwable $e): void
    {
        Log::error('Logout error: ' . $e->getMessage(), [
            'exception' => get_class($e),
>>>>>>> f548be94 (.)
            'trace' => $e->getTraceAsString(),
        ]);

        $this->isLoggingOut = false;
        Session::flash('error', __('user::auth.logout_error'));
    }

    /**
     * Get view data for the widget.
     *
     * @return array{
     *     title: string,
     *     description: string
     * }
     */
    protected function getViewData(): array
    {
        return [
            'title' => __('user::auth.logout_title'),
            'description' => __('user::auth.logout_confirmation'),
        ];
    }
}
