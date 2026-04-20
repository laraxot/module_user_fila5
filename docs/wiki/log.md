# User Wiki Log

## [2026-04-20] bugfix | socialite provider page property type compatibility
- risolto fatal php su `SocialiteProviderSettingsPage` per incompatibilita tipi proprieta con classi base Filament/Xot.
- fix applicati:
  - `$view` da static a non-static
  - `$navigationGroup` tipizzato come `\UnitEnum|string|null`
  - `$navigationIcon` tipizzato come `\BackedEnum|string|null`
- validazione: il comando `php artisan make:filament-user` non va piu in fatal, ora richiede solo input obbligatori.

## [2026-04-20] governance | no label no tooltip in filament
- corretto `SocialiteProviderSettingsPage`: rimossi tutti gli override `->label(...)` sui campi provider.
- corretto `SocialProviderResource`: sostituito `->label(...)` su placeholder con `->hiddenLabel()`.
- aggiunta regola persistente in `concepts/filament-langserviceprovider-governance.md`.

## [2026-04-20] i18n | login page strings moved to user module
- regola applicata: nessuna frase italiana hardcoded nel tema.
- spostate le frasi della pagina login in `User/lang/*/auth.php` sotto `login.page.*`.
- adottata struttura a 5 elementi (`label`, `tooltip`, `placeholder`, `helper_text`, `description`) per ogni nuova chiave.
- `Themes/Sixteen/resources/views/pages/auth/login.blade.php` ora usa solo chiavi `user::auth...`.

## [2026-04-20] socialite | env-first admin guidance
- confermata preferenza operativa: credenziali social in `.env`, non in colonne dedicate utenti.
- aggiornata `SocialProviderResource` con guida visibile in form (passi + comandi cache/config).
- resi non obbligatori in UI i campi `client_id` e `client_secret` per supportare flusso env-first.
- aggiornato tutorial `concepts/socialite-admin-tutorial.md` con `php artisan optimize:clear`.

## [2026-04-20] socialite | governance + setup
- Aggiunta pagina `concepts/socialite-provider-governance.md` con regola: no colonne `google_id/facebook_id` su `users`.
- Aggiunta pagina `concepts/socialite-backoffice-google-setup.md` con procedura backoffice Filament per Google OAuth.
- Collegati i nuovi contenuti all'indice wiki modulo User.

## [2026-04-15] init | wiki bootstrap
- Struttura wiki/log.md inizializzata.
- Layer raw: tutti i file in `docs/` (eccetto `wiki/`).
- Layer wiki: `docs/wiki/` — LLM-maintained, sintesi ad alto riuso.
- Schema: `docs/.schema/WIKI_SCHEMA.md`
- Adozione moduli: `docs/project/llm-wiki-module-adoption.md`

## [2026-04-20] bugfix | profiles.uuid nella migrazione canonica unica
- errore osservato: `table profiles has no column named uuid` durante insert su `Profile`.
- causa: `BaseProfile::booted()` genera `uuid`, ma una installazione aveva schema `profiles` senza colonna corrispondente.
- fix applicato:
  - confermata una sola migrazione autorevole `create_profiles_table`
  - migrazione rinominata a `2026_04_20_173500_create_profiles_table.php` per riesecuzione idempotente
  - regola documentata in `concepts/profile-migration-uuid-contract.md`
