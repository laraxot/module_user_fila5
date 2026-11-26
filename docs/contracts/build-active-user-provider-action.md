---
title: "Contratto — BuildActiveUserProviderAction"
type: contract
action: "Modules\\User\\Actions\\Auth\\BuildActiveUserProviderAction"
module: User
status: accepted
created: 2026-11-26
updated: 2026-11-26
tags: [contract, action, autenticazione, account-cancellato, sec-05]
---

# BuildActiveUserProviderAction

Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Perché è fatta così: [ADR 0004](../adr/0004-deleted-accounts-are-filtered-by-auth-provider.md)
(0003 è la stessa decisione, superata da 0004). Sorgente: `app/Actions/Auth/BuildActiveUserProviderAction.php`.
Registrata da `UserServiceProvider::registerActiveUserProvider()` (`app/Providers/UserServiceProvider.php`, funzione che installa il driver `eloquent`)
al posto del driver di serie: è il punto che tiene fuori dal sistema gli account cancellati dal titolare. Punto di autorizzazione.

## Input

- `Illuminate\Contracts\Hashing\Hasher $hasher`.
- `string $model`: classe del modello autenticabile (`auth.providers.*.model`).

## Output

- Un `Illuminate\Auth\EloquentUserProvider` con una query di filtro (`withQuery`, riga 40): per i modelli `Modules\Xot\Contracts\UserContract` che hanno la
  colonna `deleted_at` aggiunge `whereNull(<tabella>.deleted_at)`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| USER-PROVIDER-INV-1 | Un utente con `deleted_at` valorizzato non è mai restituito da `retrieveById`, `retrieveByCredentials` né `retrieveByToken`: non entra con credenziali, sessione già aperta o cookie «ricordami» (righe 42-44). | `USER-PROVIDER-INV-1` |
| USER-PROVIDER-INV-2 | Il filtro si applica solo se il modello è `UserContract` **e** ha la colonna `deleted_at` (`ModelHasColumnAction`): una tabella legacy senza la colonna non produce un `where` su colonna inesistente (righe 40-45). | `USER-PROVIDER-INV-2` |
| USER-PROVIDER-INV-3 | Il driver `eloquent` dei provider (per esempio `users`) risolve a questo provider: `Auth::createUserProvider('users')` ha la callback di filtro valorizzata. | `USER-PROVIDER-INV-3` |
| USER-PROVIDER-INV-4 | Il filtro vale anche per il grant password di Passport e per `POST /api/user/login`: nessun token a un account cancellato. | `USER-PROVIDER-INV-4` (tre test: login web, login API con 401 e nessun token, `findForPassport`) |

Tutti i test stanno in `tests/Feature/Auth/DeletedAccountAccessTest.php` e richiedono un database di test migrato (colonna `deleted_at` di `users`).

## Effetti collaterali

- Nessuno alla costruzione: non scrive e non legge dal database.
- Ogni query del provider (login, sessione, ricordami) porta la condizione `deleted_at IS NULL`; la verifica della colonna (`ModelHasColumnAction`) può leggere lo schema.

## Errori

- Nessuno proprio. Il `UserServiceProvider` fa `Assert::stringNotEmpty` sul nome del modello (`auth.providers.*.model` deve essere una stringa non vuota).

## Non fa

- Non cancella né revoca nulla: i token e il remember token si chiudono con [RevokeUserAccessAction](revoke-user-access-action.md).
- Non usa `SoftDeletes` né uno scope globale: `User::query()` direttamente vede anche gli account cancellati (voluto: back office e purga differita).
- Non protegge un provider custom o un driver diverso da `eloquent`: chi lo definisce aggira il filtro.
- Non decide se un account possa essere cancellato né chi lo cancella.

## Limiti noti

- Limite noto: la garanzia dipende dalla registrazione del driver in `register()` (non in `boot()`, per non lasciare guard già in cache col provider di serie).
  Chi risolve una guard prima di `UserServiceProvider::register()` ottiene il provider di serie finché `forgetGuards()` non l'ha ricreata.
