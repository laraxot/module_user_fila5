<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
=======
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\DatabaseManager;
>>>>>>> 2024e2e7 (.)
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Modules\User\Events\Registered;
use Modules\User\Models\SocialiteUser;
use Spatie\QueueableAction\QueueableAction;

class RegisterOauthUserAction
{
    use QueueableAction;

    public function execute(string $provider, SocialiteUserContract $oauthUser): SocialiteUser
    {
<<<<<<< HEAD
        $socialiteUser = DB::transaction(static function () use ($provider, $oauthUser) {
=======
        /** @var SocialiteUser $socialiteUser */
        $socialiteUser = app(DatabaseManager::class)->transaction(static function () use ($provider, $oauthUser): SocialiteUser {
>>>>>>> 2024e2e7 (.)
            // Create a user
            $user = app(CreateUserAction::class)->execute(
                provider: $provider,
                oauthUser: $oauthUser,
            );

            // Create a new socialite user instance
            return app(CreateSocialiteUserAction::class)->execute(
                provider: $provider,
                oauthUser: $oauthUser,
                user: $user,
            );
        });
        // Dispatch the registered event
<<<<<<< HEAD
        Registered::dispatch($socialiteUser);
=======
        app(Dispatcher::class)->dispatch(new Registered($socialiteUser));
>>>>>>> 2024e2e7 (.)

        // Login the user
        // return app(LoginUserAction::class)->execute($socialiteUser);
        return $socialiteUser;
    }
}
