---
title: "Contratto — IsUserAllowedAction"
type: contract
action: "Modules\\User\\Actions\\Socialite\\IsUserAllowedAction"
module: User
status: accepted
updated: 2026-11-26
qmd: "IsUserAllowedAction allowlist domini login socialite email dominio ammesso"
---

# IsUserAllowedAction

Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Sorgente: `app/Actions/Socialite/IsUserAllowedAction.php`.
Primo cancello del ritorno OAuth: chiamata da `ProcessCallbackAction.php:36` (e dal controller `Http/Controllers/Socialite/ProcessCallbackController.php:50`)
prima di cercare o creare qualunque utente. Legge la lista da [GetDomainAllowListAction](get-domain-allow-list-action.md) (`config('socialite.domain_allowlist')`).
Punto di autorizzazione: decide quali account del provider possono entrare.

## Input

- `Laravel\Socialite\Contracts\User $user`: l'utente restituito dal provider; serve solo `getEmail()`.

## Output

- `bool`: `true` se l'accesso è consentito, `false` se il dominio dell'email non è in lista.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SOCIALITE-ALLOWED-INV-1 | Con allowlist vuota ritorna `true` per ogni utente, anche con email nulla: il controllo è disattivato (righe 29-34). | `SOCIALITE-ALLOWED-INV-1` |
| SOCIALITE-ALLOWED-INV-2 | Con allowlist non vuota vale solo il dominio dopo l'ultima `@`, in minuscolo, uguale a una voce della lista; nessun altro valore dell'email conta (righe 38-44). | — (non dimostrato) |
| SOCIALITE-ALLOWED-INV-3 | Con allowlist non vuota e email nulla lancia `InvalidArgumentException` (`Assert::notNull`, riga 36): il rifiuto è un'eccezione, non `false`. | — (non dimostrato) |

Il test esistente (`tests/Unit/Actions/IsUserAllowedActionTest.php`, «returns true for allowed email domain») imposta `socialite.domain_allowlist = []`:
dimostra INV-1, non il ramo con una lista.

## Effetti collaterali

- Nessuno: sola lettura della configurazione (`GetDomainAllowListAction`). Non scrive, non emette eventi, non usa cache.
  L'evento `UserNotAllowed` lo emette il chiamante quando riceve `false`.

## Errori

- `Webmozart\Assert\InvalidArgumentException` con email nulla e allowlist non vuota (INV-3).

## Non fa

- Non verifica che il provider abbia dichiarato l'email verificata.
- Non controlla `socialite.registration`, ruoli o `deleted_at`: sono passi successivi di [ProcessCallbackAction](process-callback-action.md) e [LoginUserAction](login-user-action.md).
- Non normalizza le voci della lista: `config/socialite.php:9` chiede minuscolo, nessun codice lo impone.

## Limiti noti

- Limite noto: `config/socialite.php:11` ha `'domain_allowlist' => []` e `:14` ha `'registration' => true`. Con questi valori di serie **qualunque account** del provider
  configurato può accedere e, se nuovo, registrarsi. Nessuna sovrascrittura in `config/local/fixcity/` (cercata con `rg`). Se è voluto per un front office pubblico va deciso e scritto; se no, serve una lista.
- Il confronto è esatto: `comune.example.it` non ammette `mail.comune.example.it`. Una voce con maiuscole non combacia mai (il dominio dell'email è abbassato, la voce no).
