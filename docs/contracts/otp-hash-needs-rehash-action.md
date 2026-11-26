---
title: "OtpHashNeedsRehashAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Otp\\OtpHashNeedsRehashAction"
qmd: "OtpHashNeedsRehashAction hash OTP needsRehash ricalcolo algoritmo"
---

# OtpHashNeedsRehashAction

Dice se un hash OTP va ricalcolato con l'algoritmo corrente. Codice: `app/Actions/Otp/OtpHashNeedsRehashAction.php:10-21`.

## Input

- `string $hashedValue`: l'hash salvato (`execute`, riga 18).

## Output

- `bool`: esito di `needsRehash()` dell'hasher iniettato (riga 20).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| OTP-REHASH-INV-1 | Il risultato è esattamente `needsRehash()` dell'hasher Illuminate. Prova nel codice: riga 20. Test esistente senza group: `tests/Unit/Actions/Otp/OtpHashActionsTest.php` (riferimento alla classe). | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- Nessuna gestione esplicita.

## Non fa

- Non riscrive l'hash: chi riceve `true` deve chiamare `HashOtpValueAction`.
