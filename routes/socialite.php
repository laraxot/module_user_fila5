<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite/blob/main/routes/web.php
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Datas\XotData;
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

Route::namespace('Socialite')
    ->name('socialite.')
    ->group(static function (): void {
        Route::get(
            '/admin/login/{provider}',
            // 'LoginController@redirectToProvider',
            'RedirectToProviderController',
        )->name('oauth.redirect');
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> f589f9b2 (.)
        // Route pubblica FO cittadini (senza prefisso /admin)
        Route::get(
            '/auth/social/{provider}',
            'RedirectToProviderController',
        )->name('oauth.fo.redirect');
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
        Route::get('/sso/{provider}/callback', 'ProcessCallbackController')->name('oauth.callback');
    });
