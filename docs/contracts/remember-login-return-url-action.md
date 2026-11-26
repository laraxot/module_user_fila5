---
title: "RememberLoginReturnUrlAction — contratto"
type: contract
module: User
owner: User
status: accepted
updated: 2026-11-24
action: "Modules\\User\\Actions\\Auth\\RememberLoginReturnUrlAction"
qmd: "RememberLoginReturnUrlAction redirect login url.intended referer stesso host open redirect pagine auth"
---

# RememberLoginReturnUrlAction

Ricorda la pagina che ha mandato l'utente al login, così che `redirectIntended()` lo riporti indietro. Codice: `app/Actions/Auth/RememberLoginReturnUrlAction.php:22-79`.

## Input

- `Request $request`: query `redirect` e header `Referer` (`execute`, riga 26).

## Output

- `void`. Effetto: eventuale scrittura di `url.intended` in sessione.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| REMEMBER-RET-INV-1 | Sono accettati solo URL http/https sullo stesso host della richiesta; `//`, backslash, caratteri di controllo e altri schemi sono rifiutati. Prova nel codice: righe 46-78. Test esistente senza group: `tests/Feature/Auth/AuthFlowRedirectsTest.php` (riferimento alla classe). | — (non dimostrato) |
| REMEMBER-RET-INV-2 | Percorsi che contengono un segmento `auth` non sono mai memorizzati (non si torna al login). Prova nel codice: righe 72-74. Test esistente senza group: come sopra. | — (non dimostrato) |
| REMEMBER-RET-INV-3 | Il parametro `redirect` esplicito prevale e sovrascrive `url.intended` già presente. Prova nel codice: righe 29-34. Test esistente senza group: come sopra. | — (non dimostrato) |
| REMEMBER-RET-INV-4 | Senza `redirect` valido, un `url.intended` già presente non viene sovrascritto dal Referer. Prova nel codice: righe 36-38. Test esistente senza group: come sopra. | — (non dimostrato) |

## Effetti collaterali

Solo scrittura di sessione (`url.intended`). Nessun redirect, nessun database.

## Errori

- Errori di `parse_url` (`UrlException`) sono catturati e trattati come candidato non valido.

## Non fa

- Non esegue il redirect: lo fa `redirectIntended()` del chiamante.
