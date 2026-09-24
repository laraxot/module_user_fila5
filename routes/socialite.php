<?php

<<<<<<< HEAD
declare(strict_types=1);
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite/blob/main/routes/web.php
 */
=======
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite/blob/main/routes/web.php
 */

declare(strict_types=1);

>>>>>>> 350420cb (Check & fix styling)
use Illuminate\Support\Facades\Route;

Route::namespace('Socialite')
    ->name('socialite.')
    ->group(static function (): void {
        Route::get(
            '/admin/login/{provider}',
            // 'LoginController@redirectToProvider',
            'RedirectToProviderController',
        )->name('oauth.redirect');
<<<<<<< HEAD
=======
        // Route pubblica FO cittadini (senza prefisso /admin)
        Route::get(
            '/auth/social/{provider}',
            'RedirectToProviderController',
        )->name('oauth.fo.redirect');
>>>>>>> 350420cb (Check & fix styling)
        Route::get('/sso/{provider}/callback', 'ProcessCallbackController')->name('oauth.callback');
    });
