---
<<<<<<< HEAD
title: "User — provision MySQL locale marco + database <nome progetto>_user"
=======
title: "User — provision MySQL locale marco + database fixcity_user"
>>>>>>> laraxot/dev
type: concept
tags: [user, mysql, local, env, database]
created: 2026-06-12
updated: 2026-06-12
<<<<<<< HEAD
qmd: "User module local mysql marco <nome progetto>_user provision migrate login"
=======
qmd: "User module local mysql marco fixcity_user provision migrate login"
>>>>>>> laraxot/dev
issues:
discussions:
related:
  - "./ai-harness-user-discipline.md"
  - "./baseuser-hierarchy.md"
  - "./code-redundancy-user.md"
  - "./context-mode-user-discipline.md"
  - "./context-overflow-prevention.md"
  - "./filament-langserviceprovider-governance.md"
  - "./filament-widget-linear-crud-model-create.md"
  - "./filament-widget-resource-form-delegation.md"
---

# Connessione `user` e login FO

## Errore tipico

`Access denied for user 'marco'@'localhost'` sulla connessione `user` → credenziali/host MySQL.

<<<<<<< HEAD
`Table '<nome progetto>_user.users' doesn't exist` → migrazioni non eseguite su `--database=user`.
=======
`Table 'fixcity_user.users' doesn't exist` → migrazioni non eseguite su `--database=user`.
>>>>>>> laraxot/dev

## Setup locale (idempotente)

```bash
./bashscripts/tools/provision-local-mysql.sh
cd laravel && php artisan migrate --database=user
./bashscripts/tools/sync-env-testing.sh
```

## Variabili `.env`

<<<<<<< HEAD
| Chiave | Esempio <nome progetto> |
|--------|-----------------|
| `DB_DATABASE_USER` | `<nome progetto>_user` |
| `DB_USERNAME_USER` | `marco` |
| `DB_PASSWORD_USER` | `marco` |

La connessione Laravel `user` è mappata da `config/local/<nome progetto>/database.php` (`user_mariadb` quando `DB_CONNECTION=mariadb`).

## Utente applicativo

Dopo migrate, creare l'utente FO (email da `<nome progetto>_ADMIN_EMAIL`) con password nota per dev — es. via factory/`XotData::getUserClass()`.
=======
| Chiave | Esempio Fixcity |
|--------|-----------------|
| `DB_DATABASE_USER` | `fixcity_user` |
| `DB_USERNAME_USER` | `marco` |
| `DB_PASSWORD_USER` | `marco` |

La connessione Laravel `user` è mappata da `config/local/fixcity/database.php` (`user_mariadb` quando `DB_CONNECTION=mariadb`).

## Utente applicativo

Dopo migrate, creare l'utente FO (email da `FIXCITY_ADMIN_EMAIL`) con password nota per dev — es. via factory/`XotData::getUserClass()`.
>>>>>>> laraxot/dev

## Canon

- [architecture-env-testing-parity.md](../../../../../../docs/wiki/bmad/architecture-env-testing-parity.md)
