---
id: bmad-phpstan-user-contract-fix
track: bmad-v6.3
module: User
epic: 9
title: "PHPStan 40 errori — analisi BMAD + second brain (HasTeams / Contract)"
status: ready-for-dev
created: 2026-09-21
---

## Analysis (OBSERVE — Second Brain + PHPStan output)

Gruppi dai 40 errori (`vendor/bin/phpstan analyse Modules/`):

| Gruppo | File (primari) | Tipo errore | Connessione UserContract? |
|---|---|---|---|
| A — Contracts / Traits | `User/app/Models/Traits/HasTeams.php` | `method.childReturnType`, `return.type` | **SÌ — serve UserContract vs concrete** |
| B — Widget / Tests pre-esistenti | `DeleteAccountWidget.php`, `TeamChangeWidgetTest.php`, `routes/web_tall.php` | `method.notFound`, `class.notFound`, `offsetAccess` | NO — debito Livewire rimosse |
| C — Altri moduli | `CloudStorage/database/factories/`, `Job/config.php` | generics, fileNotFound | NO — fuori scope |

Nota second brain (`docs/bmad/tech-spec-superadmin-widget.md`): il modulo User deve rispettare `XotBase` e `Contracts/` senza restringere i tipi concreti rispetto ai contratti.

## Thinking (THINK)

`HasTeams.php` restringe `Collection<Model>` del contratto a `Collection<User>` nel trait concreto. Questo è il problema esatto che abbiamo discusso (`User::class` vs `UserContract`). Il fix non è ignorare ma allineare il trait al contratto (o viceversa, ma il contratto è la fonte di verità).

## Connection (CONNECT)

- Related: `lang-autolabelaction-hardening.story.md` (stessa sessione, qualità User)
- Related: `docs/stories/9.4.super-admin-widget-tests.story.md`
- Regola: `no-services-rule.md` — anche i trait devono seguire il contratto

## Planning (PLAN) — Priorità

1. **P0** `HasTeams.php` — allinea return type al contratto `HasTeamsContract`
2. **P1** `DeleteAccountWidget.php` — correggi chiamata a `run()` (probabilmente `execute()` su QueueableAction)
3. **P2** `routes/web_tall.php` — rimuovi riferimenti a Livewire rimosse o aggiungi `class_exists` guard
4. **P3** Test / CloudStorage / Job — fuori sessione attuale

## Implementation (CREATE) — P0

File: `User/app/Models/Traits/HasTeams.php`

Obiettivo: `allTeams()`, `currentTeam()`, `ownedTeams()`, `getAllTeamUsersAttribute()` devono ritornare tipi compatibili con `HasTeamsContract`. Invece di restringere a `User`, usare `Model` o il tipo generico del contratto.

Comando verifica: `vendor/bin/phpstan analyse User/app/Models/Traits/HasTeams.php --level=10`
