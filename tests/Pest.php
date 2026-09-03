<?php

declare(strict_types=1);

/*
 * Bootstrap Pest — modulo User.
 * Helper globali: tests/Support/helpers.php (composer autoload-dev files).
 * Ogni file Pest dichiara uses(\Modules\User\Tests\TestCase::class).
 */
// Per estendere si usa l'API idiomatica di Pest — pest()->extend(...), in fondo a
// questo file — senza nessuna annotazione di soppressione: con
// pestphp/pest-plugin-phpstan 5.2.0 installato, method.internalClass non viene piu'
// segnalato. Misurato il 2026-08-25 su tutti i bootstrap: 0 errori.
// Se ricomparisse, verificare che il plugin sia ancora caricato da
// phpstan/extension-installer, non reintrodurre il divieto. Story XOT-5.41, ROOT-17.6.
