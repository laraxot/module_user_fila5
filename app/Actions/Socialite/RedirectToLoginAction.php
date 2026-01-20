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
=======
    /**
     * Execute the action.
     */
>>>>>>> f548be94 (.)
    public function execute(string $message): RedirectResponse
    {
        // Assert::string($route_name = config('filament-socialite.login_page_route', 'filament.admin.auth.login'));
        // Route [filament.auth.login] not defined.
<<<<<<< HEAD
        $routeName = 'login';
        $translated = __('user::'.$message);
        if (is_array($translated)) {
            $translated = $translated['text'] ?? $message;
        }
        Assert::string($translated);
        Notification::make()
            ->title($translated)
=======
        $route_name = 'login';
        Assert::string($message = __('user::' . $message));
        Notification::make()
            ->title($message)
>>>>>>> f548be94 (.)
            ->danger()
            ->persistent()
            ->send();

        // Redirect back to the login route with an error message attached
        return redirect()
<<<<<<< HEAD
            ->route($routeName)
            ->withErrors([
                'email' => [$translated],
=======
            ->route($route_name)
            ->withErrors([
                'email' => [
                    __($message),
                ],
>>>>>>> f548be94 (.)
            ]);
    }
}
