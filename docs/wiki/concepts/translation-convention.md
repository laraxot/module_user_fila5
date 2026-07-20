---
title: "Translation Convention - User Module"
type: concept
tags: [concepts, convention, translation, user, wiki]
created: 2026-07-20
updated: 2026-07-20
qmd: "Translation Convention - User Module concept concepts convention translation user wiki user module documentation"
issues:
  - "https://github.com/laraxot/module_user_fila5/issues/23"
discussions:
  - "https://github.com/laraxot/module_user_fila5/discussions/24"
related:
  - INDEX.md
  - ai-harness-user-discipline.md
  - baseuser-hierarchy.md
  - code-redundancy-user.md
  - context-mode-user-discipline.md
  - context-overflow-prevention.md
---

# Translation Convention - User Module

## Regola
Tutte le traduzioni seguono la convenzione a 5 elementi:
```
__('<namespace>::<context>.<collection>.<key>.<type>')
```

## Struttura
| Elemento | Descrizione | Esempio |
|----------|-------------|---------|
| namespace | modulo/componente | `user`, `pub_theme`, `gdpr` |
| context | area funzionale | `auth`, `login`, `register` |
| collection | raggruppamento logico | `login`, `fields`, `actions` |
| key | chiave specifica | `title`, `submit`, `welcome_back` |
| type | tipo metadato | `text`, `label`, `key`, `description`, `context`, `placeholder` |

## Esempio corretto
```php
__('user::auth.login.title.label')
__('user::auth.login.welcome_back.text')
__('user::auth.login.submit.text')
```

## Esempio sbagliato
```php
__('user::auth.login.title')  // mancano key e type
__('user::auth.login.logging_in')  // mancano key e type
```

## File di riferimento
- `laravel/Modules/User/lang/it/auth.php` — file principale per le traduzioni di autenticazione
- `laravel/Modules/User/lang/it/login.php` — file secondario per widget login
- `laravel/Modules/User/lang/it/login-widget.php` — file per widget Filament login
