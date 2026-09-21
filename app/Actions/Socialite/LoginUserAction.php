<?php

declare(strict_types=1);

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

namespace Modules\User\Actions\Socialite;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Filament\Facades\Filament;
<<<<<<< HEAD
=======
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Events\Dispatcher;
>>>>>>> bc04202a (fix(user): risolti 746 file con marker di conflitto merge mai puliti in HEAD)
use Illuminate\Http\RedirectResponse;
use Modules\User\Events\SocialiteUserConnected;
use Modules\User\Models\SocialiteUser;
use Spatie\QueueableAction\QueueableAction;

class LoginUserAction
{
    use QueueableAction;

    /**
     * Execute the action.
     *
     * @return RedirectResponse
     */
    public function execute(SocialiteUser $socialiteUser): RedirectResponse
    {
        /** @var \Modules\Xot\Contracts\UserContract $user */
        $user = $socialiteUser->user()->firstOrFail();

        event(new SocialiteUserConnected($socialiteUser));

        Filament::auth()->login($user);

        return redirect()->intended('/');
    }
}
