<?php

declare(strict_types=1);
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite/blob/main/routes/web.php
 */
use Illuminate\Support\Facades\Route;

Route::namespace('Socialite')
    ->group(static function (): void {
        // Admin routes
        Route::get(
            '/auth/login/{provider}',
            'RedirectToProviderController',
        )->name('oauth.redirect');

        Route::get(
            '/auth/login/{provider}/callback',
            'ProcessCallbackController',
        )->name('oauth.callback');
    });
