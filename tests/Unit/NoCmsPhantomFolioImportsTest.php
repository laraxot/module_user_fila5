<?php

declare(strict_types=1);

use Symfony\Component\Finder\Finder;

/**
 * Il modulo User conserva i vecchi template in `pages_old/` come materiale di
 * riferimento/stub; la directory `pages/` deve restare assente per non
 * registrarli accidentalmente come pagine Folio.
 *
 * @see Modules/User/docs/architecture/auth-blade-structure.md
 * @see Modules/User/docs/adr/frontoffice-login-page-ownership.md
 */
test('user keeps legacy page templates outside the Folio mount', function (): void {
    $viewsPath = dirname(__DIR__, 2).'/resources/views';
    $activePagesPath = $viewsPath.'/pages';
    $legacyPagesPath = $viewsPath.'/pages_old';

    expect($activePagesPath)->not->toBeDirectory();
    expect($legacyPagesPath)->toBeDirectory();

    $files = iterator_to_array(
        Finder::create()
            ->in($legacyPagesPath)
            ->files()
            ->name('*.blade.php'),
    );

    expect($files)->not->toBeEmpty();
});

test('user has no nested phantom pages directory in the active view tree', function (): void {
    $phantomArchive = dirname(__DIR__, 2).'/resources/views/pages/pages';

    expect($phantomArchive)->not->toBeDirectory();
});
