<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> 350420cb (Check & fix styling)
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 350420cb (Check & fix styling)
namespace Modules\User\Actions\Socialite;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Filament\Facades\Filament;
<<<<<<< HEAD
use Illuminate\Http\RedirectResponse;
use Modules\User\Events\SocialiteUserConnected;
use Modules\User\Models\SocialiteUser;
use Modules\Xot\Contracts\UserContract;
use Spatie\QueueableAction\QueueableAction;
=======
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Http\RedirectResponse;
use Modules\User\Events\SocialiteUserConnected;
use Modules\User\Models\SocialiteUser;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;
>>>>>>> 350420cb (Check & fix styling)

class LoginUserAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(SocialiteUser $socialiteUser): RedirectResponse
    {
<<<<<<< HEAD
        /** @var UserContract $user */
        $user = $socialiteUser->user()->firstOrFail();

        event(new SocialiteUserConnected($socialiteUser));

        Filament::auth()->login($user);

        return redirect()->intended('/');
=======
        Assert::notNull($user = $socialiteUser->user, '['.__FILE__.']['.__LINE__.']');

        if (! $user instanceof Authenticatable) {
            throw new \LogicException('User instance must implement Authenticatable.');
        }

        // PHPStan: assicuriamoci che l'utente sia Authenticatable per il login
        /** @var Authenticatable $authenticatableUser */
        $authenticatableUser = $user;
        Filament::auth()->login($authenticatableUser);
        session()->regenerate();
        app(Dispatcher::class)->dispatch(new SocialiteUserConnected($socialiteUser));

        return redirect()->intended('/'.app()->getLocale());
>>>>>>> 350420cb (Check & fix styling)
    }
}
