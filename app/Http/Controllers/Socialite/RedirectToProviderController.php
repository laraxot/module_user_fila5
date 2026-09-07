<?php

declare(strict_types=1);

/**
 * @see DutchCodingCompany\FilamentSocialite.
 */

namespace Modules\User\Http\Controllers\Socialite;

<<<<<<< HEAD
use Exception;
=======
>>>>>>> 2024e2e7 (.)
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;
use Laravel\Socialite\Facades\Socialite;
use Modules\User\Actions\Socialite\GetProviderScopesAction;
<<<<<<< HEAD
use Modules\User\Actions\Socialite\IsProviderConfiguredAction;
use Modules\User\Actions\Socialite\ValidateProviderAction;
use Modules\User\Exceptions\ProviderNotConfigured;
=======
use Modules\User\Actions\Socialite\ValidateProviderAction;
>>>>>>> 2024e2e7 (.)

class RedirectToProviderController extends Controller
{
    /**
     * Undocumented function.
     */
    public function __invoke(Request $_request, string $provider): RedirectResponse
    {
        // if (! app(IsProviderConfiguredAction::class)->execute($provider)) {
        //    throw ProviderNotConfigured::make($provider);
        // }
        app(ValidateProviderAction::class)->execute($provider);

<<<<<<< HEAD
        $scopes = App(GetProviderScopesAction::class)->execute($provider);
        $socialiteProvider = Socialite::with($provider);
        if (!is_object($socialiteProvider)) {
            throw new Exception('wip');
        }

        if (!method_exists($socialiteProvider, 'scopes')) {
            throw new Exception('wip');
        }

        return $socialiteProvider->scopes($scopes)->redirect();
=======
        $scopes = app(GetProviderScopesAction::class)->execute($provider);
        $socialiteProvider = Socialite::with($provider);
        if (! is_object($socialiteProvider)) {
            throw new \Exception('wip');
        }

        if (! method_exists($socialiteProvider, 'scopes') || ! method_exists($socialiteProvider, 'redirect')) {
            throw new \Exception('scopes/redirect methods not available');
        }

        // PHPStan Level 10: Type guard for socialite provider chaining
        $scopedProvider = $socialiteProvider->scopes($scopes);

        if (! is_object($scopedProvider) || ! method_exists($scopedProvider, 'redirect')) {
            throw new \Exception('scopes() must return object with redirect method');
        }

        $redirectResult = $scopedProvider->redirect();

        if (! $redirectResult instanceof RedirectResponse) {
            throw new \Exception('Expected RedirectResponse from socialite provider');
        }

        return $redirectResult;
>>>>>>> 2024e2e7 (.)
    }
}
