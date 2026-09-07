<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

// use DutchCodingCompany\FilamentSocialite\FilamentSocialite;
use Filament\Notifications\Notification;
use Illuminate\Http\RedirectResponse;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class RedirectToLoginAction
{
    use QueueableAction;

<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * Execute the action.
     */
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    public function execute(string $message): RedirectResponse
    {
        // Assert::string($route_name = config('filament-socialite.login_page_route', 'filament.admin.auth.login'));
        // Route [filament.auth.login] not defined.
<<<<<<< HEAD
<<<<<<< HEAD
        $route_name = 'login';
        Assert::string($message = __('user::' . $message));
        Notification::make()
            ->title($message)
=======
=======
>>>>>>> f589f9b2 (.)
        $routeName = 'login';
        $translated = __('user::'.$message);
        if (is_array($translated)) {
            $translated = $translated['text'] ?? $message;
        }
        Assert::string($translated);
        Notification::make()
            ->title($translated)
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            ->danger()
            ->persistent()
            ->send();

        // Redirect back to the login route with an error message attached
        return redirect()
<<<<<<< HEAD
<<<<<<< HEAD
            ->route($route_name)
            ->withErrors([
                'email' => [
                    __($message),
                ],
=======
            ->route($routeName)
            ->withErrors([
                'email' => [$translated],
>>>>>>> 2024e2e7 (.)
=======
            ->route($routeName)
            ->withErrors([
                'email' => [$translated],
>>>>>>> f589f9b2 (.)
            ]);
    }
}
