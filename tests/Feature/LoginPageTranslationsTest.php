<?php

declare(strict_types=1);

use Illuminate\Support\Arr;

/**
 * Regressione /it/auth/login: chiavi `user::...` mostrate grezze all'utente
 * perche' mancavano nei lang file (login.php svuotato, auth.login_page assente).
 * Legge i file lang direttamente: nessun bootstrap app, nessun DB.
 */
test('le chiavi usate dalla pagina login esistono in italiano', function (string $key): void {
    [$file, $path] = explode('.', str_replace('user::', '', $key), 2);

    $lines = require dirname(__DIR__, 2).'/lang/it/'.$file.'.php';

    expect(Arr::has($lines, $path))->toBeTrue("manca {$key}");
})->with([
    'user::login.no_account',
    'user::login.register_now',
    'user::login.forgot_password_text',
    'user::login.reset_it',
    'user::login.actions.login.label',
    'user::auth.login_page.meta_title',
    'user::auth.login_page.kicker',
    'user::auth.login_page.title',
    'user::auth.login_page.description',
    'user::auth.login_page.support_title',
    'user::auth.login_page.support_item_email',
    'user::auth.login_page.support_item_password',
    'user::auth.login_page.support_item_help',
]);
