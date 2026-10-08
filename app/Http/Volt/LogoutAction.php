<?php

declare(strict_types=1);

namespace Modules\User\Http\Volt;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/*
 * Attribute class Volt\Routing\Attribute\Post does not exist.
 *
 * #[Post('/it/auth/logout', name: 'logout', middleware: ['web', 'auth'])]
 * #[Post('/en/auth/logout', name: 'logout.en', middleware: ['web', 'auth'])]
 */
final class LogoutAction
{
    public function __invoke(?string $lang = null): RedirectResponse
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        // La route `home` non esiste: la home del front office e' /{locale}
        return redirect('/'.($lang ?? app()->getLocale()));
    }
}
