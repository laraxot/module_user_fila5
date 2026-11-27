---
title: "Contratto — LoginUserAction"
type: contract
action: "Modules\\User\\Actions\\Socialite\\LoginUserAction"
module: User
status: accepted
updated: 2026-11-26
qmd: "LoginUserAction login SSO Filament auth utente collegato evento SocialiteUserConnected deleted_at redirect"
---

# LoginUserAction

Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Perché l'account cancellato resta chiuso: [ADR 0004](../adr/0004-deleted-accounts-are-filtered-by-auth-provider.md).
Sorgente: `app/Actions/Socialite/LoginUserAction.php`. Chiamanti: `ProcessCallbackAction.php:44` (collegamento già esistente) e `:68` (dopo una registrazione),
più il controller `Http/Controllers/Socialite/ProcessCallbackController.php:66,103`. Apre la sessione autenticata: è il punto di ingresso del login con provider.

## Input

- `Modules\User\Models\SocialiteUser $socialiteUser`: usa la relazione `user` se già caricata (anche `null`), altrimenti la legge dal database (righe 35-37).

## Output

- `Illuminate\Http\RedirectResponse`: `redirect()->intended('/')` se l'utente è autenticato (riga 60); redirect al login con `auth.user-not-allowed` se l'account ha `deleted_at` (riga 53).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SOCIALITE-LOGIN-INV-1 | Senza utente collegato lancia `InvalidArgumentException` e non autentica nessuno (righe 39-41). | `SOCIALITE-LOGIN-INV-1` |
| SOCIALITE-LOGIN-INV-2 | Un utente collegato che non è `Authenticatable` **e** `UserContract` lancia `LogicException` (righe 43-45). | — (non dimostrato: il test esistente è rosso, vedi sotto) |
| SOCIALITE-LOGIN-INV-3 | Un account con `deleted_at` valorizzato non viene autenticato: redirect al login, nessun evento `SocialiteUserConnected`, nessun `login()`. Il valore si legge dagli attributi grezzi (righe 51-54). | `SOCIALITE-LOGIN-INV-3` |
| SOCIALITE-LOGIN-INV-4 | Un account attivo viene autenticato sulla guard Filament e l'evento `SocialiteUserConnected` parte **prima** del `login()` (righe 56-58). | `SOCIALITE-LOGIN-INV-4` |

Test: INV-3 e INV-4 in `tests/Feature/Actions/LoginUserActionTest.php` («refuses a Google login for an account its owner deleted»; «authenticates connected socialite user and dispatches event»);
INV-1 in `tests/Feature/Actions/Socialite/LoginUserActionTest.php` («handles null user assertion gracefully»). Tutti richiedono un database di test migrato.
Il test INV-3 verifica ospite + nessun evento, non la chiave del messaggio di errore.

Test rosso: «throws when related user is not authenticatable» (in entrambi i file) confronta il messaggio con `User instance must implement Authenticatable.` mentre il codice (riga 44) dice
`User instance must implement Authenticatable and UserContract.`: il confronto `assertSame` fallisce. Non porta il group finché non è allineato (backlog test).

## Effetti collaterali

In quest'ordine, nel percorso di successo:

1. Lettura della relazione `user` (una query se non caricata).
2. Evento `SocialiteUserConnected` (dispatch sincrono, riga 56).
3. `Filament::auth()->login($related)`: la sessione viene aperta; nessun `remember` (nessun secondo argomento).
4. Redirect `intended('/')`.

Nel percorso «account cancellato»: solo [RedirectToLoginAction](process-callback-action.md) con la chiave `auth.user-not-allowed` (notifica Filament persistente), nessun evento, nessun login.

## Errori

- `InvalidArgumentException` (INV-1), `LogicException` (INV-2): risalgono al chiamante; nessuna eccezione per account cancellato (è un redirect).

## Non fa

- Non verifica l'allowlist né la registrazione: sono passi precedenti di `ProcessCallbackAction`.
- Non controlla `is_active`, ruoli o email verificata.
- Non applica il freno del login: lo ha solo `LoginWidget` (password).
- Non usa `hasVerifiedEmail()`; un utente creato da OAuth entra con `email_verified_at` null.

## Limiti noti

- Limite noto: il fallback `redirect()->intended('/')` è fisso, senza prefisso lingua.
- Nel flusso di registrazione via [RegisterSocialiteUserAction](register-socialite-user-action.md) `SocialiteUserConnected` parte due volte (nella registrazione e qui): `ProcessCallbackAction.php:56` poi `:68`.
