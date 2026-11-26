---
title: "HashOtpValueAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Otp\\HashOtpValueAction"
qmd: "HashOtpValueAction hash OTP valore one-time password Illuminate Hasher make"
---

# HashOtpValueAction

Calcola l'hash di un valore OTP con l'hasher Illuminate. Codice: `app/Actions/Otp/HashOtpValueAction.php:10-21`.

## Input

- `string $value`: il valore in chiaro (`execute`, riga 18).

## Output

- `string`: l'hash prodotto da `Hasher::make()` (riga 20).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| HASH-OTP-INV-1 | Il risultato è esattamente `make()` dell'hasher iniettato (contratto Illuminate, non il wrapper `Otp\Hasher`). Prova nel codice: righe 14-20. Test esistente senza group: `tests/Unit/Actions/Otp/OtpHashActionsTest.php` (riferimento alla classe). | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- Nessuna gestione esplicita.

## Non fa

- Non salva né scade il valore.
