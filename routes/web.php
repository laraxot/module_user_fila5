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
<<<<<<< HEAD
if (XotData::make()->register_pub_theme) {
    // require 'web_tall.php';
} else {
    Route::get('/login', static fn() => redirect('/admin/login'))->name('login');
=======
=======
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
}

Route::post('/logout', LogoutController::class)->name('logout');

<<<<<<< HEAD
<<<<<<< HEAD
//Route::get('/upgrade', 'UpgradeController');
=======
// Route::get('/upgrade', 'UpgradeController');
>>>>>>> 2024e2e7 (.)
=======
// Route::get('/upgrade', 'UpgradeController');
>>>>>>> f589f9b2 (.)
