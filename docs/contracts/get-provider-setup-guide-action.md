---
title: "GetProviderSetupGuideAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Socialite\\GetProviderSetupGuideAction"
qmd: "GetProviderSetupGuideAction guida configurazione provider OAuth console redirect localhost Google LAN DCP-271"
---

# GetProviderSetupGuideAction

Prepara i segnaposto del testo di guida `user::auth.provider-setup-guide`: nome del provider, variabili mancanti, console per creare le credenziali, URI da registrare, pagina del back office. Codice: `app/Actions/Socialite/GetProviderSetupGuideAction.php`.

## Input

- `string $provider`, `list<string> $missing` (output di `GetMissingProviderSettingsAction`).

## Output

- `array<string, string>` con le chiavi `provider`, `missing`, `console`, `redirect`, `admin`, `hint`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SOCIALITE-SETUP-GUIDE-INV-1 | Per Google un redirect con IP, senza dominio o non https è sostituito con `http://localhost[:porta]` e `hint` contiene il testo LAN. Prova nel codice: `execute()`, `isAcceptedByGoogle()`. | — (non dimostrato) |
| SOCIALITE-SETUP-GUIDE-INV-2 | `provider` è l'etichetta nota o `ucfirst`; `console` è vuota per i provider sconosciuti. Prova nel codice: `execute()`. | — (non dimostrato) |
| SOCIALITE-SETUP-GUIDE-INV-3 | `admin` è vuoto se la rotta del back office non esiste (`Route::has`). Prova nel codice: `execute()`. | — (non dimostrato) |

## Effetti collaterali

Nessuno sullo stato. Chiama `GetProviderRedirectUriAction`, che cambia temporaneamente la locale.

## Errori

- `InvalidArgumentException`/`AssertionFailedException` se la traduzione non è stringa.

## Non fa

- Non scrive i file di lingua: il testo vive in `Lang`.
- Il dato sul caso LAN di Google è una regola di dominio: se Google cambia la policy, va aggiornata qui.
