---
title: "User — scopo del modulo e come raggiungerlo meglio"
type: concept
status: active
created: 2026-09-02
tags: [user, purpose, identita, autorizzazione, profilo, oauth, team]
qmd: "user scopo modulo identita autorizzazione profilo oauth passport team ruoli permessi contract"
<<<<<<< HEAD
<<<<<<< .merge_file_VEJT2I
=======
<<<<<<< .merge_file_2ochM0
=======
<<<<<<< .merge_file_np4mb0
>>>>>>> .merge_file_r4i4AS
>>>>>>> df2ba808 (.)
updated: 2026-09-02
issues:
  # DA CREARE — `gh` non autenticato: mai numeri inventati.
  # gh issue create --repo provtv/module_user_fila5 --title "<argomento del file>"
  - "https://github.com/provtv/module_user_fila5/issues/"
discussions:
  # DA CREARE — vedi sopra.
  - "https://github.com/provtv/module_user_fila5/discussions/"
<<<<<<< HEAD
=======
<<<<<<< .merge_file_2ochM0
=======
>>>>>>> df2ba808 (.)
=======
updated: 2026-09-22
issues:
  # gh ora autenticato (2026-09-22). Nota: governance provtv vs laraxot
  # ancora aperta, vedi story 14.8. Questi puntano al remote laraxot,
  # coerente con le campagne attive (9.x/10.x/12.x/13.x/14.x).
  - "https://github.com/laraxot/module_user_fila5/issues/110"
discussions:
  - "https://github.com/laraxot/module_user_fila5/discussions/104"
<<<<<<< HEAD
>>>>>>> .merge_file_MBQcl3
=======
>>>>>>> .merge_file_Slxqiy
>>>>>>> .merge_file_r4i4AS
>>>>>>> df2ba808 (.)
---

# User — perche' esiste

## Lo scopo in una frase

**User risponde a tre domande e non ad altre: chi sei, cosa puoi fare, per conto di
chi. Tutto il resto che si sa di una persona appartiene al dominio, non a User.**

## L'evidenza

<<<<<<< HEAD
<<<<<<< .merge_file_VEJT2I
=======
<<<<<<< .merge_file_2ochM0
- 666 file PHP, 57 Action, **20 Widget**: il numero di widget dice che qui l'interfaccia
  conta — login, profilo, gestione team sono superfici che l'utente tocca davvero.
=======
<<<<<<< .merge_file_np4mb0
>>>>>>> df2ba808 (.)
- 666 file PHP, 57 Action, **20 Widget**: il numero di widget dice che qui l'interfaccia
  conta — login, profilo, gestione team sono superfici che l'utente tocca davvero.
=======
- 666 file PHP, 57 Action, **26 Widget** (corretto il 2026-09-22, era stimato 20):
  il numero di widget dice che qui l'interfaccia conta — login, profilo, gestione
  team sono superfici che l'utente tocca davvero.
<<<<<<< HEAD
>>>>>>> .merge_file_MBQcl3
=======
>>>>>>> .merge_file_Slxqiy
>>>>>>> .merge_file_r4i4AS
>>>>>>> df2ba808 (.)
- OAuth completo (`OauthClient`, `OauthAccessToken`, `OauthRefreshToken`,
  `OauthAuthCode`, `OauthPersonalAccessClient`): non solo login web, anche accesso
  programmatico.
- `AuthenticationLog`, `Device`: chi e' entrato, da dove. In una pubblica
  amministrazione non e' un lusso, e' un requisito.
- `Feature` (Pennant): funzionalita' attivabili per utente o per contesto.
- `BaseUser`, `BaseProfile`: classi base, quindi punti di estensione previsti.

## La distinzione che regge tutto: utente ≠ profilo ≠ dipendente

Sono tre cose diverse e confonderle e' l'errore piu' costoso in questo dominio:

| Concetto | Cos'e' | Dove vive |
|---|---|---|
| **User** | credenziali e permessi | User |
| **Profile** | i dati della persona come utente della piattaforma | User |
| **Dipendente** | la persona nell'organico dell'ente, con matricola e storia | Sigma |

Un utente puo' non essere un dipendente (un consulente, un revisore). Un dipendente
puo' non avere un utente. Il collegamento e' una relazione, non un'identita'.

**Corollario operativo verificato:** nei PHPDoc, i riferimenti a creatore/aggiornatore
vanno tipizzati su `Modules\Xot\Contracts\ProfileContract`, **mai** sulla classe
concreta di un modulo verticale. Tipizzare sul concreto lega Xot al dominio e inverte
la dipendenza.

## Come raggiungerlo **meglio**

<<<<<<< HEAD
<<<<<<< .merge_file_VEJT2I
=======
<<<<<<< .merge_file_2ochM0
=======
<<<<<<< .merge_file_np4mb0
>>>>>>> .merge_file_r4i4AS
>>>>>>> df2ba808 (.)
### 1. Il README dichiara cose false, e questa e' la prima cosa da sistemare

Oggi `README.md` mostra badge "Laravel 12", "PHP 8.4+", "PHPStan Level 10" e contiene
il placeholder mai sostituito `<nome progetto>`. La verita' misurata:
Laravel `^13.0`, PHP `^8.3`, PHPStan `level: max` (il progetto vieta esplicitamente di
passare `--level`).

Un badge che mente e' peggio di un badge assente: fa saltare la verifica a chi legge.
<<<<<<< HEAD
=======
<<<<<<< .merge_file_2ochM0
=======
>>>>>>> df2ba808 (.)
=======
### 1. ~~Il README dichiara cose false~~ — RISOLTO il 2026-09-02

**Aggiornamento 2026-09-22:** questa azione era gia' stata completata lo stesso
giorno in cui e' stato scritto questo documento. Il README riporta oggi badge
corretti (Laravel `^13.0`, PHP `^8.3`, Filament `^5.0`, PHPStan `max`/0 errori)
con nota esplicita "misurati il 2026-09-02". Era questo documento a essere
rimasto stale, non il README — verificato con lettura diretta del file, non
per deduzione. Nessuna azione residua qui.
<<<<<<< HEAD
>>>>>>> .merge_file_MBQcl3
=======
>>>>>>> .merge_file_Slxqiy
>>>>>>> .merge_file_r4i4AS
>>>>>>> df2ba808 (.)

### 2. 666 file PHP e un README di 56 righe

E' il rapporto peggiore del progetto fra codice e spiegazione. Chi entra in User non ha
un punto di partenza proporzionato a cio' che trovera'.

**Azione:** oltre a questo documento, una mappa in `docs/index.md` che dica dove
guardare per: login, ruoli e permessi, team, profilo, OAuth, feature flag. Sei voci.

### 3. I permessi vanno documentati come contratto, non dedotti dal seeder

Con Spatie Permission il rischio e' che il vero elenco dei permessi viva solo nel
seeder. Chi deve capire "chi puo' approvare una scheda" finisce a leggere codice.

<<<<<<< HEAD
<<<<<<< .merge_file_VEJT2I
=======
<<<<<<< .merge_file_2ochM0
=======
<<<<<<< .merge_file_np4mb0
>>>>>>> .merge_file_r4i4AS
>>>>>>> df2ba808 (.)
**Azione:** `docs/permissions.md` con la matrice ruolo → permessi → cosa consente in
concreto, e un test che verifichi che i permessi usati nelle Policy esistano davvero.
Un `can('x')` con permesso inesistente **nega in silenzio**: sembra una scelta di
sicurezza, e' un bug.
<<<<<<< HEAD
=======
<<<<<<< .merge_file_2ochM0
=======
>>>>>>> df2ba808 (.)
=======
**Aggiornamento 2026-09-22 — gap confermato, piu' grave del previsto:**
`docs/permissions.md` esiste ma contiene il contenuto di un altro modulo
(dominio Patient/Gdpr "moderazione medici", frontmatter che punta a
`provtv/base_ptv_fila5`) — non e' un file da correggere, e' da riscrivere
da zero (story `12.5`). L'analisi diretta di seeder/policy conferma il
gap in modo indipendente: 33 permessi reali nel seeder, di cui 28 coprono
solo `authentication-log.*`/OAuth e 5 sono residui "doctors" estranei;
**circa 30 classi Policy** (Team, User, Profile, Role, Device, Feature,
SocialProvider, Tenant, TeamInvitation, TeamPermission, Membership...)
non hanno alcun permesso corrispondente. Ogni `can('x')` su queste
risorse nega sempre, in silenzio: e' un bug di sicurezza, non teorico.
Dettaglio e piano: [module-excellence-prd.md#fr-141](./bmad/module-excellence-prd.md),
story [14.1](./stories/14.1.permissions-matrix-silent-deny-gap.story.md)
e [12.5](./stories/12.5.permissions-doc-wrong-module-content.story.md).
<<<<<<< HEAD
>>>>>>> .merge_file_MBQcl3
=======
>>>>>>> .merge_file_Slxqiy
>>>>>>> .merge_file_r4i4AS
>>>>>>> df2ba808 (.)

### 4. Team e multi-tenancy non devono sovrapporsi

`Team` (qui) e `Tenant` (modulo Tenant) sono due meccanismi di separazione. Se
entrambi decidono "cosa vedo", la regola effettiva diventa la loro intersezione — e
nessuno dei due documenti la descrive.

**Azione:** dichiarare qui quale dei due e' il confine dei dati e quale
l'organizzazione interna. Una frase, ma va scritta.

<<<<<<< HEAD
<<<<<<< .merge_file_VEJT2I
=======
<<<<<<< .merge_file_2ochM0
=======
<<<<<<< .merge_file_np4mb0
>>>>>>> .merge_file_r4i4AS
>>>>>>> df2ba808 (.)
### 5. Il log di accesso va usato, non solo scritto

`AuthenticationLog` e `Device` raccolgono dati preziosi che oggi nessuna schermata
interroga.

**Azione:** una vista "accessi anomali" (nuovo dispositivo, orario inusuale). Il dato
c'e' gia': manca la domanda.
<<<<<<< HEAD
=======
<<<<<<< .merge_file_2ochM0
=======
>>>>>>> df2ba808 (.)
=======
### 5. ~~Il log di accesso va usato, non solo scritto~~ — PARZIALE, corretto il 2026-09-22

**Aggiornamento 2026-09-22:** il claim "nessuna schermata interroga" era
stale/falso, verificato per lettura diretta del codice: esistono gia'
`AuthenticationLogResource`, `RecentLoginsWidget` e `DeviceResource`, che
mostrano questi dati in UI. Il gap reale e' piu' stretto di quanto
scritto qui in origine: manca solo l'**euristica di anomalia** (nuovo
dispositivo mai visto, orario inusuale) sopra la UI gia' esistente —
vedi story [14.3](./stories/14.3.auth-log-device-anomaly-view.story.md).
<<<<<<< HEAD
>>>>>>> .merge_file_MBQcl3
=======
>>>>>>> .merge_file_Slxqiy
>>>>>>> .merge_file_r4i4AS
>>>>>>> df2ba808 (.)

## Confini — cosa **non** appartiene a User

- I **dati di servizio** del dipendente (matricola, categoria, struttura): Sigma.
- Le **valutazioni**: moduli di dominio.
- L'**infrastruttura Filament**: Xot.
- Le **notifiche**: Notify. User decide *chi* puo' ricevere, non *come* si spedisce.

## Collegamenti

- `laravel/Modules/Tenant/docs/purpose.md` — l'altro asse di separazione
- `laravel/Modules/Xot/docs/purpose.md` — `ProfileContract` e le classi base
<<<<<<< HEAD
<<<<<<< .merge_file_VEJT2I
=======
<<<<<<< .merge_file_2ochM0
=======
<<<<<<< .merge_file_np4mb0
>>>>>>> df2ba808 (.)
=======
- [docs/bmad/module-excellence-prd.md](./bmad/module-excellence-prd.md) — catalogo
  completo dei gap verso la "perfezione assoluta" (Epic 12/13/14), 2026-09-22
- [docs/bmad/decision-log.md](./bmad/decision-log.md) — entry 2026-09-22 con il
  dettaglio delle correzioni fatte a questo documento
- `docs/scopo.md` — duplicato bilingue di questo file, da unificare
  (story [12.6](./stories/12.6.purpose-scopo-duplicate-and-stale.story.md))
<<<<<<< HEAD
>>>>>>> .merge_file_MBQcl3
=======
>>>>>>> .merge_file_Slxqiy
>>>>>>> .merge_file_r4i4AS
>>>>>>> df2ba808 (.)
