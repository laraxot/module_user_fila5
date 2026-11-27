---
title: "ADR — modulo User"
type: index
module: User
tags: [adr, decisioni, user, autenticazione]
created: 2026-11-18
updated: 2026-11-26
owner: User
qmd: "User ADR architecture decision record MADR formato decisioni identità ruoli conferma copertura"
---

# ADR del modulo User

Il **perché** delle scelte di autenticazione e identità: come si riconosce un utente che entra con SPID/CIE, dove si blocca un account cancellato, come si frenano i moduli aperti agli anonimi, perché l'audit degli accessi non può rompere il login, chi possiede la pagina di login del front office e chi possiede identità, ruoli e team.

Leggili prima di toccare `app/Actions/Auth/*`, i widget di login/registrazione o il provider utenti, e prima di «semplificare» un controllo che sembra ridondante. Cosa promettono le singole Action: [contratti](../contracts/README.md).

## Metodo

Un ADR solo per una scelta difficile da invertire, sorprendente o fondata su un trade-off reale. Non è un diario né una spiegazione retroattiva. Una modifica sostanziale crea un nuovo ADR e segna il vecchio `superseded` (con `superseded_by`).
Il nome del file è `NNNN-argomento-in-kebab-case.md`, senza date (la data sta nella frontmatter): lo impone `Modules/Xot/tests/Unit/Docs/AdrFilenamesAreNumberedTest.php`. Intestazioni in italiano, imposte da `PackagesHaveContractsAndAdrTest.php`.
Regola canonica: [action-behavioral-contract](../../../Xot/docs/rules/action-behavioral-contract.md); standard condivisi: [Xot ADR](../../../Xot/docs/adr/README.md); template: [0000-template](0000-template.md).

## Formato

Frontmatter: `title`, `type: decision`, `status` (`proposed`, `accepted`, `superseded`, `deprecated`), `superseded_by` se superato, `created`, `updated`, `module`, `decision-makers`. Sezioni `##` in quest'ordine:

1. `Contesto`: fatti, vincoli e la domanda.
2. `Driver della decisione`.
3. `Alternative scartate`: ogni alternativa seria con il motivo.
4. `Decisione`: cosa si fa e dove sta nel codice.
5. `Conseguenze`: buone e cattive.
6. `Conferma`: come si controlla che il codice rispetti la decisione (test con percorso che esiste, comando eseguibile da `laravel/`, o regola di review). Se non c'è un controllo automatico lo dice: «Nessuna conferma automatica oggi; proposta: …».

Se il codice di oggi contraddice l'ADR si aggiunge `## Stato attuale` con ciò che il codice fa davvero (file e riga); la storia non si riscrive.

## Decisioni

| ADR | Stato | Decisione in una riga | Conferma |
|---|---|---|---|
| [0001](0001-auth-submission-throttle-before-validation.md) | accepted | Registrazione e recupero password contano ogni invio per IP ed email, prima di validare; chiavi hashate. | test con group `USER-AUTH-THROTTLE-INV-1..4`; l'ordine nei widget è solo revisione |
| [0002](0002-authentication-log-never-breaks-login.md) | accepted | Il registro degli accessi sta sulla connessione `user`; tabella o connessione assenti sono un warning, mai un 500. | test source-level, group `USER-AUTHLOG-INV-1`, `-3`; il runtime non è provato |
| [0003](0003-deleted-account-blocked-in-user-provider.md) | superseded da 0004 | L'account cancellato si blocca nel provider utenti, non con `SoftDeletes` (duplicato di 0004). | rinvio a 0004 |
| [0004](0004-deleted-accounts-are-filtered-by-auth-provider.md) | accepted | Filtro `deleted_at IS NULL` in un `EloquentUserProvider` dedicato; revoca di token e remember token alla cancellazione. | test con group `USER-PROVIDER-INV-1..4`, `USER-REVOKE-INV-1..3` (database di test) |
| [0005](0005-digital-identity-upsert-by-fiscal-code.md) | accepted | L'utente SPID/CIE si riconosce dal codice fiscale; l'email solo se verificata; segnaposto `@noemail.local`. | test con group `USER-SPID-UPSERT-INV-1..5` |
| [0006](0006-frontoffice-login-page-ownership.md) | accepted (contraddetto dal codice) | La logica di login resta nel `LoginWidget`; la resa della pagina segue il tema; il fallback del modulo monta lo stesso widget. | `rg 'wire:submit="authenticate"'` oggi trova 1 occorrenza: fallisce |
| [0007](0007-user-owns-identity-and-roles.md) | accepted | User possiede identità, autenticazione, ruoli, permessi e team; gli altri moduli usano policy e contratti User. | revisione; nessun controllo automatico |

## Stato di copertura (misurato il 2026-11-26)

- 7 ADR: 6 `accepted`, 1 `superseded` (0003). Tutti hanno le sei sezioni nell'ordine e `created`/`updated`; l'audit dei documenti non riporta gap su `docs/adr`.
- Conferma con un test Pest esistente: 0001, 0002 (source-level), 0004, 0005. Nessuna conferma automatica: 0007; 0006 ha una conferma che oggi **fallisce**.
- ADR con `## Stato attuale` (il codice dice altro o la decisione è duplicata): 0003, 0004, 0005, 0006.

## Decisioni aperte (servono un umano)

- **0003 e 0004** sono la stessa decisione: scelto 0004 come canonico il 2026-11-26 (reversibile); 0003 è `superseded`.
- **0004**: due percorsi di cancellazione dell'account (`Modules/Gdpr` con `deleted_at` e revoca dei token; `DeleteUserAction` con cancellazione fisica, senza revoca): unificare.
- **0005**: l'account trovato per email verificata con un `fiscal_code` diverso viene sovrascritto (`UpsertUserFromDigitalIdentityAction.php:77`): rifiutare il collegamento?
- **0006**: `Modules/User/resources/views/pages/auth/login.blade.php:50` contiene la form Volt che la decisione vieta: togliere la form o scrivere un nuovo ADR sul fallback.
- Senza ADR e da decidere: login OAuth aperto a ogni account del provider di serie (`config/socialite.php:11,14`, allowlist vuota, registrazione abilitata) e aggancio per sola uguaglianza di email in `ProcessCallbackAction.php:54-57`. Entrambe sono scelte sorprendenti con un trade-off reale.

## Decisioni precedenti (formato libero, archiviate)

Le decisioni precedenti in formato libero sono state eliminate come file stale
(`.deprecated.md.old`) nella bonifica docs del 2026-11-26; la storia resta in git.

## Riferimenti

- Standard ADR condiviso: [Xot ADR](../../../Xot/docs/adr/README.md).
- Policy trasversale su dati sacri e test isolati: [0013-dati-sacri-migrazioni-e-test](../../../Xot/docs/adr/0013-dati-sacri-migrazioni-e-test.md).
- Stato di ciascun ADR: [index.md](index.md).

## Harness minimo: ownership, evidenza e recupero (2026-11-27)

Questo indice appartiene a **module_user_fila5**: ogni decisione su codice, dominio o tema va nell'ADR del package owner; il root registra soltanto i vincoli di composizione. Un ADR richiede una scelta reale con alternative e conseguenze, più una **Conferma** ripetibile (oppure la dichiarazione esplicita che manca). Non creare ADR fittizi per riempire un indice.

- [Confine LaravelDay/harness Xot](https://github.com/laraxot/module_xot_fila5/blob/dev/docs/adr/0042-laravel-day-harness-adoption-boundary.md); [ownership root](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/adr/0001-harness-minimo-e-ownership.md).
- **BMAD**: la story owner-local conserva `scope`, `must_not_change`, `evidence`, `approval_required` nei cambi rischiosi.
- **ECC**: nessun marker di merge; distinguere la prova eseguita dal semplice riferimento a un test; se la conferma non è disponibile segnare `non eseguita`.
- **Second Brain**: QMD/Graphify e `.harness/memory/{facts,lessons}.md` sono puntatori a evidenza datata, non copie degli ADR. [Runbook](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/harness/README.md) · [Rollout #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).

## Documenti del package da riconciliare nell'indice

I seguenti file **esistono nel repository su `dev`** e non erano tutti collegati nel ramo d'indice più recente. Sono preservati come puntatori documentali; il loro stato di approvazione, la copertura e l'eventuale sostituzione con ADR numerati devono essere verificati nell'owner. Nessuna prova di esecuzione è implicita.

- [Freno per IP ed email prima di validare](./auth-submission-throttle-before-validation.md)
- [Il registro degli accessi non rompe mai il login](./authentication-log-never-breaks-login.md)
- [L'account cancellato si blocca nel provider utenti](./deleted-account-blocked-in-user-provider.md)
- [L'utente SPID/CIE si riconosce dal codice fiscale](./digital-identity-upsert-by-fiscal-code.md)
