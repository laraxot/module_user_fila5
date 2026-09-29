---
title: "User — confine Table/Page e traduzioni navigazione"
type: concept
module: User
status: active
created: 2026-09-29
updated: 2026-09-29
tags: [user, filament, tables, dry, kiss, accessibility, translations]
related:
  - "../../bmad/stories/user-filament-boundary-i18n-20260929.story.md"
  - "../../filament-table-architecture.md"
  - "../../../../Themes/Zero/docs/filament-table-architecture.md"
evidence:
  - "Modules/Xot/app/Filament/Resources/XotBaseResource.php::getTableClass"
  - "Modules/Xot/app/Filament/Resources/Tables/XotBaseResourceTable.php"
---

# User — confine Table/Page e traduzioni

## Regola

`Pages/List*.php` non contiene `getTable*`. Colonne, filtri, azioni, bulk action e
layout tabella vivono in `Resources/<Nome>Resource/Tables/<Plurale>Table.php`, che
estende `XotBaseResourceTable`. La pagina conserva solo responsabilità di pagina,
header e widget.

## Riuso User

- `BaseUsersTable` contiene colonne e azioni comuni;
  `UserResource/Tables/UsersTable` aggiunge solo comportamento specifico degli utenti.
- `BaseProfilesTable` è la tabella canonica per il profilo base; i dettagli tecnici
  sono secondari e collassabili per ridurre carico cognitivo.
- Non si crea un nuovo cluster per ogni CRUD: `Passport`, `Socialite` e `Appearance`
  sono confini di dominio; un cluster `Identity` sarebbe ridondante finché non esiste
  un workflow trasversale concreto.

## Traduzioni

Valori user-facing come `label`, `group`, `icon` e `tooltip` non possono contenere
`.navigation` o il nome della chiave. Le chiavi interne come
`user::auth.navigation.name` sono identificatori e non vanno tradotte. Quando si
corregge una lingua si confrontano i file omologhi per evitare regressioni di schema;
non si elimina alcuna chiave esistente.

## Accessibilità

Le azioni solo icona devono avere tooltip tradotto; le colonne principali devono
essere cercabili/ordinabili quando utile; i dettagli tecnici sono toggleable e non
devono sostituire l'informazione primaria.
