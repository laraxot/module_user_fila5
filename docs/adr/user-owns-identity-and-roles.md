---
status: accepted
module: User
---

# User possiede identità, ruoli e team

## Contesto

Autenticazione, ruoli globali e membership di team sono usati da tutti i moduli ma devono avere un solo owner.

## Driver della decisione

- Evitare controlli identità e permessi duplicati nei temi e nei domini.

## Decisione

User possiede identità, autenticazione, ruoli, permessi e team; i moduli chiamanti usano policy e contratti User.

## Alternative scartate

- Implementare ruoli direttamente in ogni modulo.
- Confondere appartenenza a un team con privilegio super-admin.

## Conseguenze

Le autorizzazioni restano centralizzate e verificabili; ogni dominio deve dichiarare policy e perimetro della risorsa.

## Conferma

Verificare UserContract, BaseUserPolicy, Role, team membership e test di autenticazione.
