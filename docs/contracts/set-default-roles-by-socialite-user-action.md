---
title: "Contratto — SetDefaultRolesBySocialiteUserAction"
type: contract
action: "Modules\\User\\Actions\\Socialite\\SetDefaultRolesBySocialiteUserAction"
module: User
status: accepted
updated: 2026-11-26
qmd: "SetDefaultRolesBySocialiteUserAction ruoli di default socialite dominio email role_names_search first_party client tld"
---

# SetDefaultRolesBySocialiteUserAction

Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Sorgente: `app/Actions/Socialite/SetDefaultRolesBySocialiteUserAction.php`.
**Assegna ruoli (permessi) a un utente** in base al dominio della sua email: è un punto di autorizzazione. Chiamanti: `CreateUserAction.php:56` (nuovo utente OAuth),
`RegisterSocialiteUserAction.php:42` (collegamento di un utente esistente) e `Http/Controllers/Socialite/ProcessCallbackController.php:64`. Il riconoscimento del dominio è di `Actions/Socialite/Utils/EmailDomainAnalyzer.php`.

## Input

- `string $provider`: nome del provider, usato nelle chiavi di configurazione.
- `Modules\Xot\Contracts\UserContract $userModel`: l'utente a cui assegnare i ruoli.
- `Laravel\Socialite\Contracts\User $oauthUser`: fornisce l'email.

Configurazione letta: `services.<provider>.email_domains.first_party.tld` e `.client.tld` (dominio riconosciuto), `.first_party.role_names_search` e `.client.role_names_search` (nomi di ruolo).

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SOCIALITE-DEFAULT-ROLES-INV-1 | Se l'utente ha già almeno un ruolo non cambia nulla: nessun ruolo aggiunto o tolto (righe 42-44). | `SOCIALITE-DEFAULT-ROLES-INV-1` |
| SOCIALITE-DEFAULT-ROLES-INV-2 | Con un dominio che non è né `first_party` né `client` nessun ruolo è assegnato: i permessi si danno a mano (righe 49-51, `EmailDomainAnalyzer::hasUnrecognizedDomain()`). Senza configurazione ogni dominio è non riconosciuto. | `SOCIALITE-DEFAULT-ROLES-INV-2` |
| SOCIALITE-DEFAULT-ROLES-INV-3 | Con dominio riconosciuto i ruoli assegnati sono solo quelli il cui `name` corrisponde con `LIKE` a una voce di `role_names_search` del gruppo (first-party o client) **e** con `guard_name` pari alla guard di default del modello utente (righe 53-64). | — (non dimostrato: il test first-party asserisce `>= 0`, sempre vero) |

Test: `tests/Feature/Actions/Socialite/SetDefaultRolesBySocialiteUserActionTest.php` («assigns no roles when user already has roles» per INV-1; «does nothing for unrecognized domain» per INV-2),
con database di test. «assigns default roles for first party domain» (riga 50) chiude con `assertGreaterThanOrEqual(0, ...)`: non prova INV-3.

## Effetti collaterali

In quest'ordine:

1. Lettura della configurazione `services.<provider>.email_domains.*` e della guard di default (`Spatie\Permission\Guard`).
2. `SELECT COUNT(*)` sui ruoli dell'utente (`roles()->count()`).
3. `SELECT` dei `Role` per `LIKE` + `guard_name` (solo con dominio riconosciuto).
4. `assignRole($rolesToSet)`: inserimenti nella tabella pivot ruoli-utenti (riga 67).

Nessun evento, nessuna notifica, nessuna coda, nessuna transazione.

## Errori

- `InvalidArgumentException` se `$provider` è vuoto (`EmailDomainAnalyzer.php:18`).
- Errori del database risalgono al chiamante.

## Non fa

- Non crea né rimuove ruoli e non toglie ruoli già assegnati.
- Non controlla che l'email sia verificata dal provider: il dominio è dedotto da una stringa non verificata.
- Non distingue maiuscole/minuscole nel dominio (confronto esatto `===` in `EmailDomainAnalyzer.php:57,79`; il dominio non è abbassato).

## Limiti noti

- Limite noto (rischio di privilegi): se un dominio è riconosciuto (`tld` configurato) ma `role_names_search` manca o è vuoto, il `where` annidato non ha condizioni
  (Laravel scarta un gruppo senza clausole: `Illuminate\Database\Query\Builder::addNestedWhereQuery`, `if (count($query->wheres))`), quindi la query seleziona **tutti i ruoli della guard**
  e `assignRole` li dà tutti (compresi i ruoli amministrativi). Con la configurazione assente oggi (nessun `email_domains` in `services`) non si verifica, perché il dominio è non riconosciuto (INV-2).
  Nessun test copre la configurazione vuota. Difetto da decidere con un umano.
- Il pattern `LIKE` non è escapato: `%` e `_` nella configurazione fanno da jolly.
- Il commento alla riga 66 riporta un errore PHPStan aperto su `assignRole()` (si passa una `Collection` dove la firma attende un array).
- Un utente senza ruoli perché li ha persi (non perché nuovo) li riceve di nuovo al prossimo login con provider (INV-1 vale solo se ne ha già).
