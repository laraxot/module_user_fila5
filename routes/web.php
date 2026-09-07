<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite/blob/main/routes/web.php
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\Auth\LogoutController;
use Modules\Xot\Datas\XotData;

require 'socialite.php';

<<<<<<< HEAD
if (XotData::make()->register_pub_theme) {
    // require 'web_tall.php';
} else {
    Route::get('/login', static fn() => redirect('/admin/login'))->name('login');
=======
try {
    if (class_exists(XotData::class)) {
        $xotData = XotData::make();
        if ($xotData->register_pub_theme) {
            // require 'web_tall.php';
        } else {
            Route::get('/login', static fn () => redirect('/admin/login'))->name('login');
        }
    } else {
        Route::get('/login', static fn () => redirect('/admin/login'))->name('login');
    }
} catch (Throwable $e) {
    Route::get('/login', static fn () => redirect('/admin/login'))->name('login');
>>>>>>> 2024e2e7 (.)
}

Route::post('/logout', LogoutController::class)->name('logout');

<<<<<<< HEAD
//Route::get('/upgrade', 'UpgradeController');
=======
// Route::get('/upgrade', 'UpgradeController');
>>>>>>> 2024e2e7 (.)
