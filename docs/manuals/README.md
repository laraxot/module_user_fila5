---
title: "Manuali utente — modulo User"
type: index
status: active
qmd: "manuali utente admin super admin altre figure indice"
---

# Manuali utente — modulo User

Manuali per figura, in italiano, con screenshot reali dell'istanza di
prova (`assets/`, metadati in `../screenshots.json`). Le pagine pubbliche
del frontoffice finale appartengono al tema ospitante: i manuali qui
documentano le capacità del modulo e le schermate del pannello
`/user/admin`.

| Manuale | Pubblico | Contenuto |
|---|---|---|
| [manuale-utente-frontoffice.md](./manuale-utente-frontoffice.md) | Cittadino / utente finale | Registrazione, accesso, recupero password, verifica email, dispositivi e cronologia accessi lato self-service |
| [manuale-admin.md](./manuale-admin.md) | Amministratore di tenant | Lavoro quotidiano nel pannello: utenti, ruoli, permessi, team, tenant, audit |
| [manuale-super-admin.md](./manuale-super-admin.md) | Super admin / tecnico | Client OAuth/Passport, provider sociali, template mail, allow-list domini, impostazioni di sistema |
| [manuale-altre-figure.md](./manuale-altre-figure.md) | Operatori, lettori, supporto | Cosa vede un utente non admin: profilo, sezioni permesse, propri dispositivi/accessi |
| [manuale-utente.md](./manuale-utente.md) | Riferimento completo | Descrizione campo per campo di ogni schermata del pannello, con difetti noti |

Regole: nomi kebab-case senza date; solo funzionalità verificate nel codice
(`app/`, `routes/`, `docs/contracts/`); gli screenshot provengono solo da
`assets/*.webp` esistenti.
