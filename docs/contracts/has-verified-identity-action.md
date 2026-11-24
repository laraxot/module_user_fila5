---
title: "HasVerifiedIdentityAction — contratto"
type: contract
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Auth\\HasVerifiedIdentityAction"
qmd: "HasVerifiedIdentityAction identità verificata email confermata SPID CIE auth_method middleware verified PRD-02"
---

# HasVerifiedIdentityAction

Dice se l'identità dell'utente è verificata: email confermata oppure accesso con SPID o CIE (PRD-02). Codice: `app/Actions/Auth/HasVerifiedIdentityAction.php:23-45`.

## Input

- `?Authenticatable $user`: l'utente, anche assente (`execute`, riga 31).

## Output

- `bool`: `false` se l'utente è null (righe 33-35); `true` se non implementa `MustVerifyEmail` o ha già l'email verificata (riga 37); altrimenti `true` solo se l'attributo grezzo `auth_method` è `spid` o `cie` (righe 43-44).

## Invarianti

| ID | Regola | Prova nel codice | Test |
|---|---|---|---|
| `HAS-VERIFIED-INV-1` | Un utente null dà `false`. | righe 33-35 | `tests/Unit/Actions/Auth/HasVerifiedIdentityActionTest.php` (riferimento alla classe) |
| `HAS-VERIFIED-INV-2` | SPID e CIE attestano l'identità senza impostare `email_verified_at`: l'email resta non verificata. | docblock righe 15-18, riga 44 | `tests/Feature/Auth/DigitalIdentityUserUpsertTest.php` (riferimento alla classe) |
| `HAS-VERIFIED-INV-3` | Legge gli attributi grezzi, quindi non lancia su un database non ancora migrato. | righe 41-44 | Test: nessuno. |

## Effetti collaterali

Nessuno: legge solo l'utente e i suoi attributi. Nessuna scrittura, nessun evento.

## Errori

- Nessuna eccezione per utente null: restituisce `false`.

## Non fa

- Non invia email, non modifica l'utente, non concede ruoli o permessi.
- Non rende "verificata" l'email: le mail al cittadino continuano a partire solo verso indirizzi confermati.
