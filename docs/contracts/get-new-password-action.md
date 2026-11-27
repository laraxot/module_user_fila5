---
title: "GetNewPasswordAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\User\\GetNewPasswordAction"
qmd: "GetNewPasswordAction nuova password temporanea pronunciabile hash salvataggio utente una sola volta"
---

# GetNewPasswordAction

Genera una nuova password temporanea pronunciabile, ne salva l'hash sull'utente e restituisce il valore in chiaro da comunicare una sola volta. Codice: `app/Actions/User/GetNewPasswordAction.php:14-34`.

## Input

- `UserContract $record`: deve essere un `Model` (riga 24).

## Output

- `string`: la password in chiaro, lunga 12 caratteri (riga 26).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| NEW-PWD-INV-1 | Sul modello è salvato solo l'hash `Hash::make`, mai il valore in chiaro. Prova nel codice: righe 28-30. Test esistente senza group: `tests/Unit/Actions/User/GetNewPasswordActionTest.php` (riferimento alla classe). | — (non dimostrato) |
| NEW-PWD-INV-2 | Il valore restituito è quello generato da `GetPronounceablePasswordAction` (Xot) con lunghezza 12. Prova nel codice: riga 26. Test esistente senza group: come sopra. | — (non dimostrato) |
| NEW-PWD-INV-3 | Un record che non è un `Model` lancia `InvalidArgumentException`. Prova nel codice: riga 24. Test esistente senza group: come sopra. | — (non dimostrato) |

## Effetti collaterali

Un `save()` sul modello (eventi Eloquent inclusi). Nessuna transazione, nessuna notifica, nessuna invalidazione di sessioni.

## Errori

- `InvalidArgumentException` (Webmozart Assert) se il record non è un `Model`.

## Non fa

- Non notifica l'utente: il chiamante deve comunicare la password.
- Non imposta scadenza né `is_otp`.
