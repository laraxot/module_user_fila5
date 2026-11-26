---
title: "Contratto — DeleteUserAction"
type: contract
action: "Modules\\User\\Actions\\User\\DeleteUserAction"
module: User
status: accepted
updated: 2026-11-26
qmd: "DeleteUserAction cancellazione utente conferma password logout delete messaggio errore hard delete token"
---

# DeleteUserAction

Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Sorgente: `app/Actions/User/DeleteUserAction.php`.
Cancella **in modo fisico** l'account dell'utente che conferma con la propria password. Chiamanti: `Http/Livewire/Profile/DeleteAccount.php:49` e
`Filament/Widgets/Profile/DeleteAccountWidget.php:52`. Operazione irreversibile su dati personali. Non è il percorso di cancellazione del front office: quello è
`Modules/Gdpr/app/Actions/Account/DeleteAccountAction.php` (marca `deleted_at`, revoca i token con [RevokeUserAccessAction](revoke-user-access-action.md); vedi [ADR 0004](../adr/0004-deleted-accounts-are-filtered-by-auth-provider.md)).

## Input

- `Modules\User\Contracts\UserContract $user`: l'utente da cancellare. Attenzione: è `Modules\User\Contracts\UserContract`, non quello di Xot.
- `string $confirmPassword`: password in chiaro da verificare contro `users.password`.

## Output

- `array{success: bool, message: string}`: `success` falso con messaggio fisso in caso di password errata o di eccezione; vero con `Account deleted successfully`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| DELETE-USER-INV-1 | Con password mancante, non stringa o non corrispondente all'hash ritorna `success = false` e il messaggio `The password you entered is incorrect` (righe 33-39). | `DELETE-USER-INV-1` |
| DELETE-USER-INV-2 | Con password errata l'utente non viene cancellato e la sessione non viene chiusa: `logout()` e `delete()` non sono raggiunti (return alla riga 35 prima della riga 42). | — (non dimostrato: il test controlla solo il valore di ritorno) |
| DELETE-USER-INV-3 | Con password corretta il logout della guard avviene **prima** della cancellazione (righe 42-43). | — (non dimostrato) |
| DELETE-USER-INV-4 | Ogni `\Exception` durante logout o cancellazione è convertita in `success = false` senza rilancio (righe 49-53). | — (non dimostrato) |

Test: `tests/Unit/Actions/User/DeleteUserActionTest.php` («returns failure when password is incorrect») prova INV-1; `tests/Unit/Actions/AdditionalActionsTest.php:49` solo istanzia la classe.

## Effetti collaterali

In quest'ordine:

1. `Hasher::check($confirmPassword, $user->password)` (lettura, nessuna scrittura).
2. `Guard::logout()`: chiude la sessione dell'utente corrente.
3. `$user->delete()`: `DELETE FROM users WHERE id = ?`. I modelli utente non usano `SoftDeletes` (cercato con `rg` in `app/Models/BaseUser.php`, `User.php`, `Traits/`): la riga sparisce, e con essa i dati.

Nessuna transazione, nessun log, nessun evento propri (gli eventi Eloquent `deleting`/`deleted` del modello scattano). **Non revoca** token Passport, refresh token né remember token.

## Errori

- `\Exception` durante logout o cancellazione: assorbita e trasformata nel messaggio fisso `An error occurred while deleting the account` (INV-4). Non è registrata.

## Non fa

- Non controlla che l'utente stia cancellando se stesso: l'`$user` lo decidono i chiamanti.
- Non revoca i token e non gestisce cascate su altri dati (ticket, commenti, log di accesso).
- Non limita i tentativi di password: ogni chiamata prova l'hash.
- Non registra l'errore catturato (nessun `Log::`): una cancellazione fallita è invisibile all'operatore.

## Limiti noti

- Limite noto: i messaggi di ritorno sono stringhe inglesi fisse (righe 37, 47, 52), non chiavi di traduzione.
- Limite noto: `DeleteAccountWidget.php:52` scarta il risultato (`$result` non letto): password errata o errore non danno alcun riscontro all'utente (il Livewire `DeleteAccount.php:49-62` lo mostra).
- Se `delete()` fallisce, il logout è già avvenuto: l'utente resta disconnesso e non cancellato.
- Dopo la cancellazione fisica i token restano in `oauth_access_tokens` fino a una pulizia (non dimostrato qui il comportamento di Passport con un `user_id` inesistente).
