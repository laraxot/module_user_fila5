<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\View;
use Filament\Schemas\Components\Component;
use Override;
use Exception;
use Filament\Actions\Action;
=======
use Filament\Actions\Action;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\View;
>>>>>>> 2024e2e7 (.)
=======
use Filament\Actions\Action;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\View;
>>>>>>> f589f9b2 (.)
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Widgets\XotBaseWidget;
=======
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
>>>>>>> 2024e2e7 (.)
=======
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
>>>>>>> f589f9b2 (.)

/**
 * Logout widget for user session termination.
 *
 * Handles secure logout process with proper session management,
 * event dispatching, and audit logging following Laraxot
 * architectural patterns and security best practices.
 */
<<<<<<< HEAD
<<<<<<< HEAD
class LogoutWidget extends XotBaseWidget
{
    /**
     * The view for this widget.
     * @phpstan-ignore property.defaultValue
     */
    protected string $view = 'user::widgets.auth.logout-widget';

    /**
     * Mount the widget and initialize the form.
     *
     * @return void
=======
=======
>>>>>>> f589f9b2 (.)
class LogoutWidget extends XotBaseSchemaWidget
{
    /**
     * The view for this widget.
     */
    protected string $view = 'user::filament.widgets.auth.logout';

    /**
     * Mount the widget and initialize the form.
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     */
    public function mount(): void
    {
        $this->form->fill();
    }

    /**
     * Get the form schema for logout interface.
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
            'logout_message' => View::make($view)->columnSpanFull(),
        ];
    }

    /**
     * Get form actions for logout widget.
     *
     * @return array<Action>
     */
    #[Override]
    public function getFormActions(): array
    {
        return [
            $this->getLogoutAction(),
            $this->getCancelAction(),
=======
=======
>>>>>>> f589f9b2 (.)
    public function getFormSchema(): array
    {
        return [
            'logout_message' => View::make('user::filament.widgets.auth.logout-message')->columnSpanFull(),
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
        ];
    }

    /**
     * Handle user logout with proper security and auditing.
     *
     * Implements secure logout process with session invalidation,
     * event dispatching, and comprehensive audit logging.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return void
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     */
    public function logout(): void
    {
        $user = Auth::user();

<<<<<<< HEAD
<<<<<<< HEAD
        if (!$user) {
            Log::warning('Logout attempted with no authenticated user');
=======
        if (! $user) {
            Log::warning('Logout attempted with no authenticated user');

>>>>>>> 2024e2e7 (.)
=======
        if (! $user) {
            Log::warning('Logout attempted with no authenticated user');

>>>>>>> f589f9b2 (.)
            return;
        }

        $this->dispatchPreLogoutEvent($user);
        $this->performLogout();
        $this->dispatchPostLogoutEvent();
        $this->logLogoutSuccess($user);
        $this->redirectAfterLogout();
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Get logout action button configuration.
     *
     * @return Action
=======
=======
>>>>>>> f589f9b2 (.)
     * Get form actions for logout widget.
     *
     * @return array<Action>
     */
    protected function getFormActions(): array
    {
        return [
            $this->getLogoutAction(),
            $this->getCancelAction(),
        ];
    }

    /**
     * Get logout action button configuration.
<<<<<<< HEAD
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
     * Get cancel action button configuration.
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
     * Get localized home URL.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return string
     */
    protected function getLocalizedHomeUrl(): string
    {
        return '/' . App::getLocale();
=======
=======
>>>>>>> f589f9b2 (.)
     */
    protected function getLocalizedHomeUrl(): string
    {
        return '/'.App::getLocale();
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }

    /**
     * Dispatch pre-logout event.
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
     * Perform secure logout process.
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
     * Dispatch post-logout event.
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
     * Log successful logout for audit trail.
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
     * Redirect user after successful logout.
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
        redirect($this->getLocalizedHomeUrl())->with('success', __('user::auth.logout_success'))->send();
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
     * Get view data for the widget.
     *
     * @return array<string, string>
     */
    protected function getViewData(): array
    {
        return [
            'title' => __('user::auth.logout_title'),
            'description' => __('user::auth.logout_confirmation'),
        ];
    }
}
