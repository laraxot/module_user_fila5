<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\View;
use Filament\Schemas\Components\Component;
use Override;
use RuntimeException;
use Exception;
use Filament\Actions\Action;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
=======
=======
>>>>>>> f589f9b2 (.)
use Filament\Actions\Action;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\View;
use Illuminate\Contracts\Auth\Authenticatable;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Throwable;
=======
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
>>>>>>> 2024e2e7 (.)
=======
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
>>>>>>> f589f9b2 (.)

/**
 * Provides a widget for user logout functionality within Filament admin panels.
 *
 * This widget handles the user logout process including session invalidation,
 * event dispatching, and proper redirection with localization support.
 *
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
=======
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     * Widget data array.
     *
     * CRITICAL: This property is managed by XotBaseWidget.
     * Do not remove or redeclare it.
     *
     * @var array<string, mixed>|null
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public null|array $data = [];

    /**
     * Indicates if the logout process is in progress.
     *
     * @var bool
=======
=======
>>>>>>> f589f9b2 (.)
    public ?array $data = [];

    /**
     * Indicates if the logout process is in progress.
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     */
    public bool $isLoggingOut = false;

    /**
     * Mount the widget and initialize the form.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return void
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
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
=======
=======
>>>>>>> f589f9b2 (.)
    public function getFormSchema(): array
    {
        return [
            'message' => View::make('user::filament.widgets.auth.logout-message')->columnSpanFull(),
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
     * @return void
     *
     * @throws RuntimeException If the logout process fails
=======
     * @throws \RuntimeException If the logout process fails
>>>>>>> 2024e2e7 (.)
=======
     * @throws \RuntimeException If the logout process fails
>>>>>>> f589f9b2 (.)
     */
    public function logout(): void
    {
        try {
            $this->isLoggingOut = true;

            // Get the authenticated user before logging out
            $user = $this->getAuthenticatedUser();
<<<<<<< HEAD
<<<<<<< HEAD
            if ($user === null) {
                $this->handleNoUserScenario();
=======
            if (null === $user) {
                $this->handleNoUserScenario();

>>>>>>> 2024e2e7 (.)
=======
            if (null === $user) {
                $this->handleNoUserScenario();

>>>>>>> f589f9b2 (.)
                return;
            }

            $this->dispatchPreLogoutEvent($user);
            $this->performLogout();
            $this->dispatchPostLogoutEvent();
            $this->logLogoutSuccess($user);
            $this->redirectAfterLogout();
<<<<<<< HEAD
<<<<<<< HEAD
        } catch (Throwable $e) {
=======
        } catch (\Throwable $e) {
>>>>>>> 2024e2e7 (.)
=======
        } catch (\Throwable $e) {
>>>>>>> f589f9b2 (.)
            $this->handleLogoutError($e);
        }
    }

    /**
     * Get the form actions for the widget.
     *
     * @return array<string, Action>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
     *
     * @return Action
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
     *
     * @return Action
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
     *
     * @return string
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     */
    protected function getLocalizedHomeUrl(): string
    {
        $locale = App::getLocale();
<<<<<<< HEAD
<<<<<<< HEAD
        return '/' . ltrim($locale, '/');
=======

        return '/'.ltrim($locale, '/');
>>>>>>> 2024e2e7 (.)
=======

        return '/'.ltrim($locale, '/');
>>>>>>> f589f9b2 (.)
    }

    /**
     * Get the authenticated user instance.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return Authenticatable|null
     */
    protected function getAuthenticatedUser(): null|Authenticatable
=======
     */
    protected function getAuthenticatedUser(): ?Authenticatable
>>>>>>> 2024e2e7 (.)
=======
     */
    protected function getAuthenticatedUser(): ?Authenticatable
>>>>>>> f589f9b2 (.)
    {
        return Auth::user();
    }

    /**
     * Handle scenario when no user is authenticated.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return void
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     */
    protected function handleNoUserScenario(): void
    {
        $this->isLoggingOut = false;
        Log::warning('Logout attempted with no authenticated user');
    }

    /**
     * Dispatch pre-logout events.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @param Authenticatable $user
     * @return void
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     */
    protected function dispatchPreLogoutEvent(Authenticatable $user): void
    {
        Event::dispatch('auth.logout.attempting', [$user]);
    }

    /**
     * Perform the actual logout operations.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return void
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
     *
     * @return void
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     */
    protected function dispatchPostLogoutEvent(): void
    {
        Event::dispatch('auth.logout.successful');
    }

    /**
     * Log successful logout operation.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @param Authenticatable $user
     * @return void
     */
    protected function logLogoutSuccess(Authenticatable $user): void
    {
        Log::info('User logged out', [
=======
=======
>>>>>>> f589f9b2 (.)
     */
    protected function logLogoutSuccess(Authenticatable $user): void
    {
        Log::debug('User logged out', [
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            'user_id' => $user->getAuthIdentifier(),
            'timestamp' => now()->toDateTimeString(),
        ]);
    }

    /**
     * Handle redirect after successful logout.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return void
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     */
    protected function redirectAfterLogout(): void
    {
        $redirect = redirect($this->getLocalizedHomeUrl())->with('success', __('user::auth.logout_success'));

        $redirect->send();
<<<<<<< HEAD
<<<<<<< HEAD
        exit();
=======
        exit;
>>>>>>> 2024e2e7 (.)
=======
        exit;
>>>>>>> f589f9b2 (.)
    }

    /**
     * Handle any errors that occur during logout.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param Throwable $e
     * @return void
     *
     * @throws RuntimeException
     */
    protected function handleLogoutError(Throwable $e): void
    {
        Log::error('Logout error: ' . $e->getMessage(), [
            'exception' => get_class($e),
=======
=======
>>>>>>> f589f9b2 (.)
     * @throws \RuntimeException
     */
    protected function handleLogoutError(\Throwable $e): void
    {
        Log::error('Logout error: '.$e->getMessage(), [
            'exception' => $e::class,
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
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
