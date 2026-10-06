---
title: "User — scopo del modulo e come raggiungerlo meglio"
type: concept
status: active
created: 2026-10-06
tags: [user, purpose, autenticazione, autorizzazione, rbac, tenant, team]
qmd: "user scopo modulo autenticazione autorizzazione rbac spatie permission tenant team multi-tenancy"
updated: 2026-10-06
issues:
  - "https://github.com/provtv/module_user_fila5/issues/"
discussions:
  - "https://github.com/provtv/module_user_fila5/discussions/"
---

# User — perche' esiste

## Lo scopo in una frase

**User centralizza l'autenticazione, l'autorizzazione RBAC e la gestione della multi-tenancy, fornendo modelli e trait condivisi che tutti gli altri moduli usano per identificare chi agisce e in quale contesto.**

## L'evidenza

- `User`, `Team`, `Tenant`: modelli base per identity, gruppi, isolamento
- `HasTeams`, `HasTenants`, `HasAuthenticationLog`: trait di autenticazione e autorizzazione
- 185 file di documentazione per un modulo di fondazione

## Confini — cosa **non** appartiene a User

- La **logica di business** specifica di un dominio: ogni modulo dichiara i suoi permessi
- Le **classi base Filament**: Xot

## Collegamenti

- `docs/wiki/rules/` — convenzioni RBAC
- `docs/bmad/` — decisioni di design
