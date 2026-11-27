---
title: "Contratto — SendOtpByUserAction"
type: contract
action: "Modules\\User\\Actions\\Otp\\SendOtpByUserAction"
module: User
status: accepted
created: 2026-11-26
updated: 2026-11-26
tags: [contract, action, otp, password, email, credenziali]
---

# SendOtpByUserAction

Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Sorgente: `app/Actions/Otp/SendOtpByUserAction.php`.
Unico chiamante: l'azione di tabella Filament `app/Filament/Resources/UserResource/Actions/SendOtpAction.php:24` (richiede conferma nel modale).
**Sostituisce la password dell'utente**: è un'operazione sulle credenziali, da usare solo dietro l'autorizzazione della risorsa Filament.

## Input

- `Modules\Xot\Contracts\UserContract $user`: l'utente che riceve la password temporanea.
- Dipendenze del costruttore: `PasswordData` (`otp_expiration_minutes`, default 5), `Str`, `Modules\User\Actions\Otp\Hasher`.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| USER-OTP-SEND-INV-1 | Dopo l'esecuzione `users.password` è l'**hash** della password temporanea (12 caratteri casuali), `is_otp` è `true` e `password_expires_at` è adesso + `otp_expiration_minutes` (righe 55-83). | `USER-OTP-SEND-INV-1` |
| USER-OTP-SEND-INV-2 | La password temporanea in chiaro non viene salvata: sta solo nella notifica `Otp`, mandata via route mail on-demand all'indirizzo `$user->email` (righe 92-95). | `USER-OTP-SEND-INV-2` |
| USER-OTP-SEND-INV-3 | L'ordine è: aggiornamento dell'utente, poi la mail, poi la notifica Filament di successo; se l'`update` fallisce non parte nessuna mail (righe 44-46). | — (non dimostrato) |

Test: `tests/Unit/Actions/Otp/SendOtpByUserActionTest.php` (database di test e `Notification::fake()`; `Str` e `Hasher` sono finti, il test non prova la casualità della password).
(Il vecchio ID `SEND-OTP-INV-*` di una bozza precedente non è mai stato usato in un test: vale `USER-OTP-SEND-INV-*`.)

## Effetti collaterali

In quest'ordine:

1. `UPDATE users SET password = <hash>, is_otp = 1, password_expires_at = <scadenza>` (`$user->update([...])`, riga 79): scattano gli eventi Eloquent e gli observer del modello utente.
2. Notifica mail on-demand `Modules\User\Notifications\Auth\Otp` all'email dell'utente (`Notification::route('mail', ...)->notify(...)`, riga 94). Se la notifica è in coda dipende dalla classe `Otp`, non da questa Action.
3. Notifica Filament di successo alla sessione del chiamante (`FilamentNotification::make()->success()->send()`, riga 102).

## Errori

- Nessuna eccezione propria. Errori del database, della mail o della sessione risalgono al chiamante.
- Se la mail fallisce dopo l'`UPDATE`, la password è già stata sostituita (nessuna transazione, nessun rollback): l'utente non ha più la vecchia password e non ha ricevuto la nuova.

## Non fa

- Non controlla chi la invoca né se il destinatario è l'utente corrente: l'autorizzazione è del chiamante (policy della risorsa Filament).
- Non limita la frequenza: richiamarla due volte sostituisce di nuovo la password.
- Non verifica né consuma l'OTP: lo fanno `VerifyOtpHashAction`, `HashOtpValueAction`, `OtpHashNeedsRehashAction`.
- Non invalida sessioni, remember token o token Passport esistenti dell'utente.
- Non verifica che `$user->email` sia un indirizzo reale (un utente SPID/CIE ha `@noemail.local`).

## Limiti noti

- Limite noto: nessuna transazione tra `UPDATE` e invio mail (vedi Errori).
- Limite noto: con email segnaposto `@noemail.local` (utenti SPID/CIE, [UpsertUserFromDigitalIdentityAction](upsert-user-from-digital-identity-action.md)) la password viene sostituita e la mail non arriva a nessuno.

## Riconciliazione documentale (2026-11-27)

Questo file aveva un conflitto Git irrisolto. La base è la variante più recente del contratto, con il riferimento a `app/Actions/Otp/SendOtpByUserAction.php` **esistente su `dev`**; la sua semantica, i group Pest citati e gli eventuali effetti non sono stati rieseguiti in questa sessione. Il confronto con il codice e i test resta il gate ECC della story owner. [Tracciamento root #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
