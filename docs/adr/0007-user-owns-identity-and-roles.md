---
title: "ADR — User possiede identità, ruoli e team"
type: decision
created: 2026-11-25
status: accepted
module: User
decision-makers: [User module owner]
updated: 2026-11-26
qmd: "user owns identity and roles possiede"
---

# User possiede identità, ruoli e team

## Contesto

Autenticazione, ruoli globali e membership di team sono usati da tutti i moduli ma devono avere un solo owner.

## Driver della decisione

- Evitare controlli identità e permessi duplicati nei temi e nei domini.

## Alternative scartate

- Implementare ruoli direttamente in ogni modulo.
- Confondere appartenenza a un team con privilegio super-admin.

## Decisione

User possiede identità, autenticazione, ruoli, permessi e team; i moduli chiamanti usano policy e contratti User.

## Conseguenze

Le autorizzazioni restano centralizzate e verificabili; ogni dominio deve dichiarare policy e perimetro della risorsa.

## Conferma

- Esistono: `Modules/User/app/Contracts/UserContract.php`, `Modules/User/app/Models/Policies/BaseUserPolicy.php`, `Modules/User/app/Models/Role.php`, `Modules/User/app/Models/TeamUser.php`.
- Uso da parte degli altri moduli: `cd laravel && rg -l 'BaseUserPolicy|UserContract' Modules/*/app`.
- Test esistenti: `Modules/User/tests/Feature/UserAuthenticationTest.php` e `Modules/User/tests/Feature/TeamManagementTest.php`.
- Nessuna conferma automatica oggi che impedisca a un altro modulo di definire ruoli propri o di equiparare un team al super-admin: resta revisione del codice.
  Proposta: un test architetturale Pest che vieti `Spatie\Permission\Models\Role` fuori da `Modules/User`.
