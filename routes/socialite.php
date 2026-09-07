<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite/blob/main/routes/web.php
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use Modules\Xot\Datas\XotData;
=======
>>>>>>> 2024e2e7 (.)

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
>>>>>>> 2024e2e7 (.)
        Route::get('/sso/{provider}/callback', 'ProcessCallbackController')->name('oauth.callback');
    });
