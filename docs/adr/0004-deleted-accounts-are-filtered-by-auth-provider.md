---
title: "ADR — Gli account cancellati si escludono nel provider di autenticazione"
type: decision
status: accepted
created: 2026-11-24
updated: 2026-11-26
decision-makers: [User module owner]
module: User
qmd: "ADR account cancellato deleted_at provider autenticazione SoftDeletes scope globale SEC-05 UserServiceProvider"
---

# Gli account cancellati si escludono nel provider di autenticazione

## Contesto

La cancellazione dell'account da parte del titolare valorizza soltanto `users.deleted_at` (docblock di `app/Actions/Auth/BuildActiveUserProviderAction.php:16-19`). `BaseUser` non usa `SoftDeletes` e non ha uno scope globale, perché la purga differita e il back office devono continuare a vedere quegli utenti. Come si impedisce a un account cancellato di autenticarsi, in ogni tenant, su login web, API, sessioni già aperte e token?

## Driver della decisione

- Un solo punto attraversato da tutti i percorsi di autenticazione (credenziali, id di sessione, remember token, token Passport).
- Il back office e la purga differita devono poter leggere gli utenti con `deleted_at` valorizzato.
- Nessuna modifica ai file `config/<tenant>/auth.php` di ogni tenant.
- I token già emessi non devono tornare validi se `deleted_at` viene azzerato (ripristino da back office).

## Alternative scartate

- **`SoftDeletes` / scope globale su `BaseUser`**: nasconderebbe gli utenti anche a purga differita e back office (motivo dichiarato nel docblock, righe 17-19).
- **Controllo nei singoli controller o middleware**: ogni percorso (web, Filament, Volt, API, reset password, Passport) andrebbe protetto a parte; basta dimenticarne uno.
- **Solo revoca dei token alla cancellazione**: non copre sessioni web e cookie "ricordami" già emessi; è prevista comunque, in aggiunta, da `RevokeUserAccessAction`.

## Decisione

Scelta: **filtro `deleted_at IS NULL` in un `EloquentUserProvider` dedicato**, perché il provider è l'unico punto attraversato da `retrieveByCredentials`, `retrieveById` e `retrieveByToken`. `UserServiceProvider::registerActiveUserProvider()` sostituisce il driver `eloquent` in `register()` (non in `boot()`, per evitare guard già in cache con il provider di serie) e chiama `forgetGuards()` (`app/Providers/UserServiceProvider.php:157-175`). Il filtro vale solo per modelli `UserContract` con la colonna `deleted_at`. Alla cancellazione si revocano anche token Passport, refresh token e remember token con `RevokeUserAccessAction`.

## Conseguenze

- Buono, perché un solo punto copre tutti i percorsi e ogni tenant, senza toccare le config tenant.
- Buono, perché la lettura degli utenti cancellati resta possibile fuori dall'autenticazione.
- Cattivo, perché la garanzia dipende dalla registrazione del driver: chi definisce un provider custom o un altro driver aggira il filtro.
- Cattivo, perché il docblock cita `Modules\Gdpr\Actions\Account\DeleteAccountAction`, classe non presente nel repository (il modulo Gdpr non esiste in `laravel/Modules/`): chi cancella l'account oggi non è dimostrato da questo repo.

## Conferma

- Test Pest: `cd laravel && vendor/bin/pest --group=USER-PROVIDER-INV-1` (e `-INV-2`, `-INV-3`, `-INV-4`; revoca: `--group=USER-REVOKE-INV-1`, `-INV-2`, `-INV-3`)
  esegue `Modules/User/tests/Feature/Auth/DeletedAccountAccessTest.php`. Copre provider, ricerca per id/credenziali/remember token, login web e API,
  grant password Passport e revoca dei token; i test che creano utenti richiedono un database di test migrato.
- Contract: [build-active-user-provider-action](../contracts/build-active-user-provider-action.md), [revoke-user-access-action](../contracts/revoke-user-access-action.md).
- Non dimostrato oggi: il comportamento con un provider custom o un driver diverso da `eloquent` (aggira il filtro); resta revisione del codice.

## Stato attuale

Verificato il 2026-11-26. La quarta conseguenza («il modulo Gdpr non esiste») non è più vera: `laravel/Modules/Gdpr/app/Actions/Account/DeleteAccountAction.php`
esiste, valorizza `deleted_at` (riga 80) e chiama `RevokeUserAccessAction` (riga 85) nella sua transazione.

Resta un secondo percorso di cancellazione nel modulo User, che non rispetta questa decisione: `Modules/User/app/Actions/User/DeleteUserAction.php` esegue
`$user->delete()` (riga 43, cancellazione fisica, nessuna revoca di token), chiamata da `Http/Livewire/Profile/DeleteAccount.php:49` e
`Filament/Widgets/Profile/DeleteAccountWidget.php:52`. Vedi [delete-user-action](../contracts/delete-user-action.md). Decisione aperta, da prendere con un
umano: unificare i due percorsi o dichiarare quale è quello del front office.
