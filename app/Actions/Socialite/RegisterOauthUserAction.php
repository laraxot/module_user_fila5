<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

<<<<<<< HEAD
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\DatabaseManager;
=======
use Illuminate\Support\Facades\DB;
>>>>>>> f548be94 (.)
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
        /** @var SocialiteUser $socialiteUser */
        $socialiteUser = app(DatabaseManager::class)->transaction(static function () use ($provider, $oauthUser): SocialiteUser {
=======
        $socialiteUser = DB::transaction(static function () use ($provider, $oauthUser) {
>>>>>>> f548be94 (.)
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
        app(Dispatcher::class)->dispatch(new Registered($socialiteUser));
=======
        Registered::dispatch($socialiteUser);
>>>>>>> f548be94 (.)

        // Login the user
        // return app(LoginUserAction::class)->execute($socialiteUser);
        return $socialiteUser;
    }
}
