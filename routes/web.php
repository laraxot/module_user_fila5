<?php

declare(strict_types=1);
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite/blob/main/routes/web.php
 */
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Volt\LogoutAction;

// require 'socialite.php';

// POST + auth: un logout via GET sarebbe esposto a CSRF; gli header usano un form con @csrf.
Route::post('logout', [LogoutAction::class, '__invoke'])->middleware('auth')->name('logout');

// Route::get('/upgrade', 'UpgradeController');
