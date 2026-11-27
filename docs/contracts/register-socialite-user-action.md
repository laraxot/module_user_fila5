---
title: "Contratto — RegisterSocialiteUserAction"
type: contract
action: "Modules\\User\\Actions\\Socialite\\RegisterSocialiteUserAction"
module: User
status: accepted
updated: 2026-11-26
qmd: "RegisterSocialiteUserAction collega utente esistente SSO socialite_users ruoli default evento SocialiteUserConnected"
---

# RegisterSocialiteUserAction

Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Sorgente: `app/Actions/Socialite/RegisterSocialiteUserAction.php`.
Collega un provider OAuth a un utente locale **già esistente** (stessa email). Chiamanti: `ProcessCallbackAction.php:56` (quando trova l'utente per email) e il controller
`Http/Controllers/Socialite/ProcessCallbackController.php:84`. È il passo che trasforma «ha la stessa email» in «può entrare con quel provider»: punto di autorizzazione.

## Input

- `string $provider`: nome del provider.
- `Laravel\Socialite\Contracts\User $oauthUser`: id, nome, email, avatar dal provider.
- `Modules\Xot\Contracts\UserContract $user`: l'utente locale già salvato a cui collegare.

## Output

- `Modules\User\Models\SocialiteUser`: il collegamento appena creato.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SOCIALITE-REGISTER-SU-INV-1 | Crea sempre una nuova riga `socialite_users` per l'utente fornito, con `provider`, `provider_id`, nome, email, avatar del provider (`CreateSocialiteUserAction.php:34-44`, `create`, non `updateOrCreate`; riga 36 di questa Action). | — (non dimostrato) |
| SOCIALITE-REGISTER-SU-INV-2 | I ruoli di default si assegnano **dopo** il collegamento, delegati a [SetDefaultRolesBySocialiteUserAction](set-default-roles-by-socialite-user-action.md), che non fa nulla se l'utente ha già ruoli (righe 42-46). | — (non dimostrato) |
| SOCIALITE-REGISTER-SU-INV-3 | L'evento `SocialiteUserConnected` parte per ultimo, con il collegamento creato (riga 48). | — (non dimostrato: `tests/Unit/Actions/AdditionalActionsTest.php:17-20` istanzia soltanto la classe) |

## Effetti collaterali

In quest'ordine, senza transazione:

1. `INSERT INTO socialite_users` (connessione `user`).
2. Eventuale `assignRole()` sulla tabella pivot dei ruoli.
3. Dispatch sincrono di `Modules\User\Events\SocialiteUserConnected`.

## Errori

- Errori del database o del dispatch risalgono al chiamante. Un errore al passo 2 o 3 lascia il collegamento già inserito (nessun rollback).

## Non fa

- Non apre la sessione: la apre [LoginUserAction](login-user-action.md), che il chiamante invoca subito dopo.
- Non crea né modifica l'utente locale.
- Non controlla che l'email del provider sia verificata, né che `provider` + `provider_id` esistano già.
- Non verifica `deleted_at` dell'utente: lo fa `LoginUserAction` (INV-3 di quel contratto).

## Limiti noti

- Limite noto: nessuna transazione e nessuna unicità controllata dall'Action; un secondo collegamento per lo stesso `provider_id` dipende da un eventuale indice unico del database (non verificato qui).
- Limite noto (rischio di presa di un account): collegare un provider a un utente locale per sola uguaglianza di email è deciso da `ProcessCallbackAction.php:54-57`; vedi il limite in [ProcessCallbackAction](process-callback-action.md).
- `SocialiteUserConnected` parte due volte nel flusso (qui e in `LoginUserAction`).
