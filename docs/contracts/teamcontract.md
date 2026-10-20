---
title: "TeamContract"
type: concept
tags: [teamcontract, teams, nullability]
created: 2026-07-14
updated: 2026-10-20
qmd: "teamcontract nullability personalTeam belongsToTeam hasteams"
issues: []
discussions: []
related:
  - ./hasteamsandusercontract.md
  - ../team-contract-usage-reasoning.md
  - ../scopo.md
  - ../00-INDEX.md
status: active
---

# TeamContract

Contratto del team come **unità organizzativa** (appartenenza, owner, inviti, permessi di team). L'implementazione tipica è `Models\Team`; i trait utente tipizzano sul contratto, non sulla classe concreta.

Indice: [../00-INDEX.md](../00-INDEX.md) · perché: [../team-contract-usage-reasoning.md](../team-contract-usage-reasoning.md) · scopo modulo: [../scopo.md](../scopo.md).

## Perché `?TeamContract` (nullability)

Nel prodotto un utente **può non avere** team personale o corrente:

| API (trait `HasTeams`) | Firma | Perché nullable |
|---|---|---|
| `personalTeam()` | `?TeamContract` | nessun `ownedTeams` con `personal_team = true` |
| `belongsToTeam(?TeamContract $team)` | accetta `null` → `false` | chiamate con team assente non devono TypeError |
| `ownsTeam(?TeamContract $team)` | idem | stesso motivo |

`switchTeam(TeamContract $team)` resta **non-null**: cambiare team richiede un team reale.

I test devono tipizzare di conseguenza: passare un `TeamContract` (fixture/mock), oppure asserire `null` / usare `instanceof` prima di accedere a `->id`. Passare un `int` a `belongsToTeam` o accedere a `$personalTeam->id` senza guard viola il contratto di business, non solo PHPStan.

Nota: `HasTeamsContract` storicamente dichiara `belongsToTeam(TeamContract)` non-null; il trait vivo usa `?TeamContract`. Allineare il contratto all'implementazione, non i test a una firma obsoleta.

## Metodi (superficie)

### Utenti

- `users(): BelongsToMany` — membri
- `owner(): BelongsTo` — proprietario
- `hasUser(UserContract $user): bool`
- `addUser` / `removeUser`
- `allUsers()` / `members()`
- `hasUserWithEmail(string $email): bool`

### Permessi

- `getPermissionsFor(UserContract $user): array<string, bool>`
- `userHasPermission(UserContract $user, string $permission): bool`

### Inviti e lifecycle

- `teamInvitations(): HasMany`
- `purge(): void`
- `fresh($with = []): ?static`

## Vincoli

- Estende `ModelContract`; `@phpstan-require-extends Model`
- Dependency inversion: `HasTeams` dipende dal contratto → [team-contract-usage-reasoning.md](../team-contract-usage-reasoning.md)

## Collegamenti

- [hasteamsandusercontract.md](./hasteamsandusercontract.md)
- [stories/phpstan-test-wave-user-b.story.md](../stories/phpstan-test-wave-user-b.story.md)
