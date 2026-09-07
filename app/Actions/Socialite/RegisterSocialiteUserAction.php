<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 * ---
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
<<<<<<< HEAD
=======
use Illuminate\Contracts\Events\Dispatcher;
>>>>>>> 2024e2e7 (.)
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Modules\User\Events\SocialiteUserConnected;
use Modules\User\Models\SocialiteUser;
use Modules\Xot\Contracts\UserContract;
use Spatie\QueueableAction\QueueableAction;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;

class RegisterSocialiteUserAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $provider, SocialiteUserContract $oauthUser, UserContract $user): SocialiteUser
    {
        // Create a new SocialiteUser instance
        $socialiteUser = app(CreateSocialiteUserAction::class)->execute(
            provider: $provider,
            oauthUser: $oauthUser,
            user: $user,
        );
        // Assign default roles to user, if needed
<<<<<<< HEAD
        app(SetDefaultRolesBySocialiteUserAction::class, [
            'provider' => $provider,
            'userModel' => $user,
        ])->execute(
=======
        app(SetDefaultRolesBySocialiteUserAction::class)->execute(
            provider: $provider,
>>>>>>> 2024e2e7 (.)
            userModel: $user,
            oauthUser: $oauthUser,
        );
        // Dispatch the socialite user connected event
<<<<<<< HEAD
        SocialiteUserConnected::dispatch($socialiteUser);
=======
        app(Dispatcher::class)->dispatch(new SocialiteUserConnected($socialiteUser));
>>>>>>> 2024e2e7 (.)

        // Login the user
        // return app(LoginUserAction::class)->execute($socialiteUser);
        return $socialiteUser;
    }
}
