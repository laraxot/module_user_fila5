<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\View;
=======
use Filament\Schemas\Components\View;
use Filament\Schemas\Components\Component;
use Override;
use Exception;
use Filament\Actions\Action;
>>>>>>> f548be94 (.)
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
<<<<<<< HEAD
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
=======
use Modules\Xot\Filament\Widgets\XotBaseWidget;
>>>>>>> f548be94 (.)

/**
 * Logout widget for user session termination.
 *
 * Handles secure logout process with proper session management,
 * event dispatching, and audit logging following Laraxot
 * architectural patterns and security best practices.
 */
<<<<<<< HEAD
class LogoutWidget extends XotBaseSchemaWidget
{
    /**
     * The view for this widget.
     */
    protected string $view = 'user::filament.widgets.auth.logout';

    /**
     * Mount the widget and initialize the form.
=======
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
>>>>>>> f548be94 (.)
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
    public function getFormSchema(): array
    {
        return [
            'logout_message' => View::make('user::filament.widgets.auth.logout-message')->columnSpanFull(),
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
>>>>>>> f548be94 (.)
        ];
    }

    /**
     * Handle user logout with proper security and auditing.
     *
     * Implements secure logout process with session invalidation,
     * event dispatching, and comprehensive audit logging.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> f548be94 (.)
     */
    public function logout(): void
    {
        $user = Auth::user();

<<<<<<< HEAD
        if (! $user) {
            Log::warning('Logout attempted with no authenticated user');

=======
        if (!$user) {
            Log::warning('Logout attempted with no authenticated user');
>>>>>>> f548be94 (.)
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
=======
     * Get logout action button configuration.
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
     * Get cancel action button configuration.
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
     * Get localized home URL.
<<<<<<< HEAD
     */
    protected function getLocalizedHomeUrl(): string
    {
        return '/'.App::getLocale();
=======
     *
     * @return string
     */
    protected function getLocalizedHomeUrl(): string
    {
        return '/' . App::getLocale();
>>>>>>> f548be94 (.)
    }

    /**
     * Dispatch pre-logout event.
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
     * Perform secure logout process.
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
     * Dispatch post-logout event.
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
     * Log successful logout for audit trail.
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
     * Redirect user after successful logout.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> f548be94 (.)
     */
    protected function redirectAfterLogout(): void
    {
        redirect($this->getLocalizedHomeUrl())->with('success', __('user::auth.logout_success'))->send();
<<<<<<< HEAD
        exit;
=======
        exit();
>>>>>>> f548be94 (.)
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
