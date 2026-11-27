---
title: "Contratto — SendOtpByUserAction"
type: contract
<<<<<<< .merge_file_JWEShM
action: "Modules\User\Actions\Otp\SendOtpByUserAction"
tags: [contract, action, otp, mail]
created: 2026-11-24
updated: 2026-11-24
=======
action: "Modules\\User\\Actions\\Otp\\SendOtpByUserAction"
module: User
status: accepted
created: 2026-11-26
updated: 2026-11-26
tags: [contract, action, otp, password, email, credenziali]
>>>>>>> .merge_file_sg2riZ
---

# SendOtpByUserAction

<<<<<<< .merge_file_JWEShM
Sorgente: `app/Actions/Otp/SendOtpByUserAction.php`.

## Input

- `UserContract $user`: destinatario; dipendenze iniettate `PasswordData` (scadenza), `Str`, `Otp\Hasher`.
=======
Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Sorgente: `app/Actions/Otp/SendOtpByUserAction.php`.
Unico chiamante: l'azione di tabella Filament `app/Filament/Resources/UserResource/Actions/SendOtpAction.php:24` (richiede conferma nel modale).
**Sostituisce la password dell'utente**: è un'operazione sulle credenziali, da usare solo dietro l'autorizzazione della risorsa Filament.

## Input

- `Modules\Xot\Contracts\UserContract $user`: l'utente che riceve la password temporanea.
- Dipendenze del costruttore: `PasswordData` (`otp_expiration_minutes`, default 5), `Str`, `Modules\User\Actions\Otp\Hasher`.
>>>>>>> .merge_file_sg2riZ

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
<<<<<<< .merge_file_JWEShM
| USER-OTP-SEND-INV-1 | La password temporanea (12 caratteri casuali) si salva solo come hash; in chiaro esiste solo nella notifica. | — |
| USER-OTP-SEND-INV-2 | `is_otp = true` e `password_expires_at = now + PasswordData::otp_expiration_minutes`. | — |
| USER-OTP-SEND-INV-3 | La notifica `Notifications\Auth\Otp` parte on-demand verso `$user->email`. | — |

Provate da `tests/Unit/Actions/Otp/SendOtpByUserActionTest.php`, che richiede un database di test migrato: il group si
aggiunge quando il test gira verde.

## Effetti collaterali

- `update()` dell'utente: **sostituisce la password** corrente con l'OTP.
- Notifica mail (`Notification::route('mail', ...)`), in coda o sincrona secondo la notifica.
- Notifica Filament di successo nella sessione corrente.

## Errori

- Errori del database o del mailer si propagano; nessun rollback: se la mail fallisce, la password è già cambiata.

## Non fa

- Non verifica l'OTP (`VerifyOtpHashAction`) né forza il cambio password al login successivo (lo fa chi legge `is_otp`).
- Non limita la frequenza degli invii: chi la espone in una pagina deve frenarla.
=======
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
>>>>>>> .merge_file_sg2riZ
