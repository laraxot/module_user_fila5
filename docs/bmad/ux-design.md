---
title: "UX — SuperAdmin user menu"
type: ux-design
module: User
status: approved
related:
  - ./prd.md
  - ./architecture.md
  - ./tech-spec.md
---

# UX design: icona re nel user menu

## Scopo

Un controllo **silenzioso** accanto al menu account Filament. Non un form, non una pagina, non un banner.

## Posizione

Hook `USER_MENU_BEFORE` (Filament `user-menu.blade.php`). Stesso posto di oggi, a sinistra del menu utente, insieme (ma distinto) al team switcher.

## Stati visivi

| Stato profilo | Icona | Rotazione | Tooltip (lang) |
|---------------|-------|-----------|----------------|
| `super-admin` | `fas-chess-king` | 0° | attivo |
| `negate-super-admin` | `fas-chess-king` | 180° | negato |
| nessuno dei due | non renderizzare i bottoni | — | — |

Colori: restano `text-gray-500 dark:text-gray-400`, `h-5 w-5` — chrome Filament, non un CTA primario.

## Interazione

1. Click sull’icona.
2. Ruolo invertito lato server.
3. Redirect 303 sulla stessa URL: l’operatore resta dove era (dashboard, resource, …).
4. Nessun modal di conferma (oggi non c’è; non introdurlo: è un toggle per chi è già privilegiato).

## Accessibilità

`x-filament::icon-button` + tooltip Filament (non attributo `title` HTML nudo se il componente già espone tooltip). Testo del tooltip localizzato, mai "Super Admin" hardcoded.

## Fuori UX di questo slice

Layout login, team switcher, avatar dropdown (`UserDropdown`).
