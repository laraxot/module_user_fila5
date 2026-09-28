<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

use Filament\Schemas\Components\Component;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
<<<<<<< HEAD
 * Pulsanti OAuth (Google, Microsoft, GitHub).
 *
 * Panel: route `socialite.oauth.redirect`.
 * FO: `$redirectRoute = 'socialite.oauth.fo.redirect'`.
 */
class SocialLoginWidget extends XotBaseSchemaWidget
{
    protected static bool $isDiscovered = false;

    protected string $view = 'user::filament.widgets.auth.social-login';

    public string $redirectRoute = 'socialite.oauth.redirect';

    /**
=======
 * SocialLoginWidget: Widget riutilizzabile per pulsanti login OAuth (Google, Microsoft).
 *
 * Mostra i pulsanti solo per i provider configurati in config/services.
 * Usabile in login, register e altre pagine auth.
 *
 * Regole Laraxot:
 * - Estende XotBaseSchemaWidget
 * - Traduzioni da user::auth.social
 * - Route: socialite.oauth.redirect
 */
class SocialLoginWidget extends XotBaseSchemaWidget
{
    protected string $view = 'user::filament.widgets.auth.social-login';

    /**
     * Widget senza form: schema vuoto.
     *
>>>>>>> laraxot/dev
     * @return array<string, Component>
     */
    public function getFormSchema(): array
    {
        return [];
    }

    /**
     * @return list<array{driver: string, label: string, icon: string, color: string}>
     */
    public function getProviders(): array
    {
        $providers = [];

        if (config('services.google.client_id')) {
            $providers[] = [
                'driver' => 'google',
                'label' => __('user::auth.login.google.text'),
                'icon' => 'google',
                'color' => '#4285F4',
            ];
        }

        if (config('services.microsoft.client_id')) {
            $providers[] = [
                'driver' => 'microsoft',
                'label' => __('user::auth.login.microsoft.text'),
                'icon' => 'microsoft',
                'color' => '#00A4EF',
            ];
        }

        if (config('services.github.client_id')) {
            $providers[] = [
                'driver' => 'github',
                'label' => __('user::auth.login.github.text'),
                'icon' => 'github',
                'color' => '#24292F',
            ];
        }

        return $providers;
    }

<<<<<<< HEAD
    public function getRedirectUrl(string $driver): string
    {
        return route($this->normalizeRedirectRoute(), ['provider' => $driver]);
    }

    public function redirectToProvider(string $driver): void
    {
        if (! in_array($driver, ['google', 'microsoft', 'github'], true)) {
            return;
        }

        redirect()->to($this->getRedirectUrl($driver));
    }

    private function normalizeRedirectRoute(): string
    {
        return match ($this->redirectRoute) {
            'socialite.oauth.redirect', 'socialite.oauth.fo.redirect' => $this->redirectRoute,
            default => 'socialite.oauth.redirect',
        };
=======
    public function redirectToProvider(string $driver): void
    {
        $driver = match ($driver) {
            'google' => 'google',
            'microsoft' => 'microsoft',
            default => $driver,
        };

        redirect()->to(route('socialite.oauth.redirect', ['provider' => $driver]));
>>>>>>> laraxot/dev
    }
}
