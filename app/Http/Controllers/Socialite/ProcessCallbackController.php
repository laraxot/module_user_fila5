<?php

declare(strict_types=1);

/**
 * @see DutchCodingCompany\FilamentSocialite.
 */

namespace Modules\User\Http\Controllers\Socialite;

<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
=======
>>>>>>> 2024e2e7 (.)
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
<<<<<<< HEAD
use Modules\User\Actions\Socialite\IsProviderConfiguredAction;
=======
>>>>>>> 2024e2e7 (.)
use Modules\User\Actions\Socialite\IsRegistrationEnabledAction;
use Modules\User\Actions\Socialite\IsUserAllowedAction;
use Modules\User\Actions\Socialite\LoginUserAction;
use Modules\User\Actions\Socialite\RedirectToLoginAction;
use Modules\User\Actions\Socialite\RegisterOauthUserAction;
use Modules\User\Actions\Socialite\RegisterSocialiteUserAction;
use Modules\User\Actions\Socialite\RetrieveOauthUserAction;
use Modules\User\Actions\Socialite\RetrieveSocialiteUserAction;
use Modules\User\Actions\Socialite\SetDefaultRolesBySocialiteUserAction;
use Modules\User\Actions\Socialite\ValidateProviderAction;
use Modules\User\Events\RegistrationNotEnabled;
use Modules\User\Events\UserNotAllowed;
<<<<<<< HEAD
use Modules\User\Exceptions\ProviderNotConfigured;
=======
use Modules\Xot\Contracts\UserContract;
>>>>>>> 2024e2e7 (.)
use Modules\Xot\Datas\XotData;

class ProcessCallbackController extends Controller
{
    /**
     * Undocumented function.
     */
    public function __invoke(Request $_request, string $provider): RedirectResponse
    {
        // See if provider exists
        // if (! app(IsProviderConfiguredAction::class)->execute($provider)) {
        //    throw ProviderNotConfigured::make($provider);
        // }
        app(ValidateProviderAction::class)->execute($provider);

        // Try to retrieve existing user
        $oauthUser = app(RetrieveOauthUserAction::class)->execute($provider);
<<<<<<< HEAD
        if ($oauthUser === null) {
=======
        if (null === $oauthUser) {
>>>>>>> 2024e2e7 (.)
            return app(RedirectToLoginAction::class)->execute('auth.login-failed');
        }

        // Verify if user is allowed
<<<<<<< HEAD
        if (!app(IsUserAllowedAction::class)->execute($oauthUser)) {
=======
        if (! app(IsUserAllowedAction::class)->execute($oauthUser)) {
>>>>>>> 2024e2e7 (.)
            UserNotAllowed::dispatch($oauthUser);

            return app(RedirectToLoginAction::class)->execute('auth.user-not-allowed');
        }

        // Try to find a socialite user
        $socialiteUser = app(RetrieveSocialiteUserAction::class)->execute($provider, $oauthUser);
        if ($socialiteUser) {
            $socialiteUserObj = $socialiteUser->user;
<<<<<<< HEAD
            if ($socialiteUserObj === null || !$socialiteUserObj->canAccessSocialite()) {
                return app(RedirectToLoginAction::class)->execute('auth.user-not-allowed');
            }
            // Associate default roles to the existing "real" user, if needed
            app(SetDefaultRolesBySocialiteUserAction::class, [
                'provider' => $provider,
            ])->execute($socialiteUserObj, $oauthUser);
=======
            if (null === $socialiteUserObj || ! $socialiteUserObj->canAccessSocialite()) {
                return app(RedirectToLoginAction::class)->execute('auth.user-not-allowed');
            }
            // Associate default roles to the existing "real" user, if needed
            app(SetDefaultRolesBySocialiteUserAction::class)->execute($provider, $socialiteUserObj, $oauthUser);
>>>>>>> 2024e2e7 (.)

            return app(LoginUserAction::class)->execute($socialiteUser);
        }

        // See if registration is allowed
<<<<<<< HEAD
        if (!app(IsRegistrationEnabledAction::class)->execute()) {
=======
        if (! app(IsRegistrationEnabledAction::class)->execute()) {
>>>>>>> 2024e2e7 (.)
            RegistrationNotEnabled::dispatch($provider, $oauthUser);

            return app(RedirectToLoginAction::class)->execute('auth.registration-not-enabled');
        }

        $user_class = XotData::make()->getUserClass();
        // See if a user already exists, but not for this socialite provider
        // $user = app()->call($this->socialite->getUserResolver(), ['provider' => $provider, 'oauthUser' => $oauthUser, 'socialite' => $this->socialite]);
        /** @var UserContract|null */
        $user = $user_class::query()->firstWhere(['email' => $oauthUser->getEmail()]);

        // Handle registration
<<<<<<< HEAD
        if ($user !== null) {
=======
        if (null !== $user) {
>>>>>>> 2024e2e7 (.)
            $socialiteUser = app(RegisterSocialiteUserAction::class)->execute($provider, $oauthUser, $user);
        } else {
            $socialiteUser = app(RegisterOauthUserAction::class)->execute($provider, $oauthUser);
        }

        $socialiteUserObj = $socialiteUser->user;
<<<<<<< HEAD
        if ($socialiteUserObj === null || !$socialiteUserObj->canAccessSocialite()) {
=======
        if (null === $socialiteUserObj || ! $socialiteUserObj->canAccessSocialite()) {
>>>>>>> 2024e2e7 (.)
            return app(RedirectToLoginAction::class)->execute('auth.user-not-allowed');
        }

        // Verifichiamo prima se l'utente può accedere al socialite
        /** @var UserContract|null $authUser */
        $authUser = Auth::user();
<<<<<<< HEAD
        if ($authUser !== null && method_exists($authUser, 'canAccessSocialite') && !$authUser->canAccessSocialite()) {
=======
        if (null !== $authUser && method_exists($authUser, 'canAccessSocialite') && ! $authUser->canAccessSocialite()) {
>>>>>>> 2024e2e7 (.)
            return redirect()->route(
                optional(Auth::check()) ? 'filament.user.pages.dashboard' : 'filament.user.auth.login',
            );
        }

        return app(LoginUserAction::class)->execute($socialiteUser);
    }
}
