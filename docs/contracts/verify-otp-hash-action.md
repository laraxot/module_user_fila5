---
title: "VerifyOtpHashAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Otp\\VerifyOtpHashAction"
qmd: "VerifyOtpHashAction verifica OTP confronto hash check Illuminate"
---

# VerifyOtpHashAction

Verifica che un valore OTP in chiaro corrisponda all'hash salvato. Codice: `app/Actions/Otp/VerifyOtpHashAction.php:10-21`.

## Input

- `string $value`: valore inserito dall'utente.
- `string $hashedValue`: hash salvato (`execute`, riga 18).

## Output

- `bool`: esito di `check()` dell'hasher iniettato (riga 20).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| VERIFY-OTP-INV-1 | Il risultato è esattamente `check()` dell'hasher Illuminate. Prova nel codice: riga 20. Test esistente senza group: `tests/Unit/Actions/Otp/OtpHashActionsTest.php` (riferimento alla classe). | — (non dimostrato) |

## Effetti collaterali

Nessuno.

## Errori

- Nessuna gestione esplicita.

## Non fa

- Non gestisce la scadenza (`password_expires_at`) né i tentativi errati.
