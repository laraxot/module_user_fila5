---
title: "Topic team"
type: digest
status: active
qmd: "digest ceiling 100 team"
---

# Topic team

Sintesi automatica di 4 documenti (chiave `team`).

## Team

_Fonte: `models/models/team.md`_

# Team

Il modello `Team` rappresenta un team nel sistema, implementando l'interfaccia `TeamContract`.

## Proprietà

- `id` - UUID del team
- `name` - Nome del team
- `owner_id` - ID del proprietario del team
- `personal_team` - Flag che indica se è un team personale

## Relazioni

- `owner` - BelongsTo con `User`, rappresenta il proprietario del team
- `users` - BelongsToMany con `User`, rappresenta i membri del team
- `teamPermissions` - HasMany con `TeamPermission`, rappresenta i permessi specifici del team

## Metodi

### Gestione Utenti

- `hasUser(UserContract $user): bool` - Verifica se un utente è membro del team
- `addUser(UserContract $user, string $role = 'member'): void` - Aggiunge un utente al team
- `removeUser(UserContract $user): void` - Rimuove un utente dal team
- `purge(): void` - Rimuove tutti gli utenti dal team

### Gestione Permessi

- `getPermissionsFor(?UserContract $user): array<string, bool>` - Ottiene i permessi di un utente nel team

## team

_Fonte: `models/models-superseded/team.md`_

See canonical documentation: ../../../../../Themes/docs/shared-components/team.md

## team

_Fonte: `models/models_superseded/team.md`_

See canonical documentation: ../../../../../Themes/docs/shared-components/team-Modules.md

## team

_Fonte: `models/team.md`_

See canonical documentation: ../../../../Themes/docs/shared-components/team-Modules.md
