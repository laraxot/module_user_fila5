---
title: "UX — SuperAdmin user menu"
type: ux-design
module: User
status: approved
related:
  - ./prd.md
  - ./architecture.md
  - ./tech-spec.md
  - ./decision-log.md
---

# UX design: emblema hero nel user menu

## Scopo

Un controllo **silenzioso** accanto al menu account Filament. Non un form, non una pagina, non un banner.

## Posizione

Hook `USER_MENU_BEFORE`. A sinistra del menu utente, distinto dal team switcher.

## Stati visivi

| Stato profilo | Icona Blade Icons | Colore Filament | Tooltip (lang) |
|---------------|-------------------|-----------------|----------------|
| `super-admin` | `user-superadmin` | `warning` | attivo |
| `negate-super-admin` | `user-negate-superadmin` | `danger` | negato |
| nessuno dei due | nessun bottone | — | — |

Le SVG stanno in `resources/svg/` e `XotBaseServiceProvider::registerBladeIcons()` le registra con prefisso `user`. File `superadmin.svg` → `user-superadmin`. Filament 5 le consuma con `x-filament::icon-button` (`icon="user-superadmin"`), non con `@svg('user::…')` e non senza prefisso. Lo stroke vive sul root SVG (`currentColor`), come gli Heroicon: il colore arriva da `fi-color-warning` / `fi-color-danger` del CSS prebuilt.

Vista widget: `user::filament.widgets.profile.super-admin` (convenzione `GetViewByClassAction`, nessun pin `$view`).

Marcatore di test: `data-super-admin-state="active"|"negated"`. `label` e `tooltip` dalla lang.

## Interazione

1. Click sull’icona.
2. Ruolo invertito lato server.
3. Redirect 303 sulla stessa URL.
4. Nessun modal.

## Accessibilità

`x-filament::icon-button` con `label` + `tooltip` dalla lang. Due glifi distinti + colore.

## Fuori UX di questo slice

Layout login, team switcher, avatar dropdown.
