---
title: "Passport/OAuth cluster — documento canonico"
type: concept
status: canonical
tags: [passport, oauth, cluster, socialite, filament, redundancy]
created: 2026-07-14
updated: 2026-09-29
supersedes:
  - "./passport-cluster.md"
  - "./passport-cluster-proposal.md"
  - "./passport-cluster-summary.md"
  - "./passport-cluster-implementation.md"
  - "./passport-cluster-implementationd.md"
  - "./passport-cluster-implementation-needed.md"
  - "./passport-cluster-implementation-status.md"
  - "./passport-cluster-implementation-completed.md"
  - "./passport-cluster-completion.md"
  - "./passport-cluster-completion-status.md"
  - "./passport-cluster-current.md"
  - "./passport-cluster-current-status.md"
  - "./passport-cluster-verification.md"
  - "./passport-cluster-work-completion.md"
  - "./passport-cluster-philosophy.md"
  - "./passport-cluster-inner-debate.md"
  - "./passport-cluster-innerebate.md"
  - "./passport-cluster-litigation.md"
  - "./passport-cluster-namespace.md"
  - "./passport-cluster-namespace-fix.md"
  - "./passport-cluster-resources.md"
  - "./passport-cluster-resources-only-rule.md"
  - "./passport-cluster-resources-pattern.md"
  - "./oauth-cluster.md"
  - "./oauth-cluster-decision-making.md"
  - "./oauth-cluster-error-analysis.md"
  - "./oauth-cluster-implementation.md"
  - "./oauth-cluster-implementation-summary.md"
  - "./oauth-cluster-ision-making.md"
related:
  - "./wiki/redundancy/oauth-dual-resource-trees.md"
  - "./stories/12.4.oauth-dup-resources-ssot.story.md"
  - "./stories/13.2.oauthclientresource-wrong-model.story.md"
  - "./stories/14.4.passport-dashboard-missing-buttons.story.md"
  - "./stories/14.5.oauth-client-user-association-incomplete.story.md"
  - "./bmad/stories/passport-oauth-docs-dedup-20260929.story.md"
---

# Passport/OAuth cluster — documento canonico

Questo documento sostituisce ~29 file quasi-duplicati (`passport-cluster*.md`,
`oauth-cluster*.md`) accumulati in sessioni diverse tra il 2026-07-14 e il
2026-09-28. I vecchi file restano come stub che puntano qui (vedi `supersedes`
sopra). Nessun contenuto sostanziale è stato perso: la sintesi delle decisioni
è nella sezione Storia.

## Decisione architetturale finale

Le risorse Filament OAuth/Passport vivono in un **Filament Cluster dedicato**
(`Modules\User\Filament\Clusters\Passport`), non come risorse sparse in
`app/Filament/Resources/`. Stessa decisione per Socialite
(`Modules\User\Filament\Clusters\Socialite`). Motivazione: organizzazione DRY/KISS
della navigazione admin (le risorse OAuth sono un sotto-dominio coeso di User),
pattern già usato per `Clusters/Appearance` e `Modules/Gdpr/.../Clusters/Profile`.

Regole del cluster (invarianti, confermate nel codice attuale):
- Il cluster estende **sempre** `Modules\Xot\Filament\Clusters\XotBaseCluster`,
  mai `Filament\Clusters\Cluster` direttamente.
- Cluster minimale (KISS): nessuna proprietà oltre a quelle di default.
- Ogni Resource nel cluster dichiara `protected static ?string $cluster = Passport::class;`
  (o `Socialite::class`).
- Nella directory `Clusters/Passport/Resources/` devono stare **solo** risorse
  attinenti a Passport/OAuth (`OauthClientResource`, `OauthAccessTokenResource`,
  `OauthAuthCodeResource`, `OauthRefreshTokenResource`,
  `OauthPersonalAccessClientResource`, `OauthDeviceCodeResource`). Risorse non
  OAuth (User, Team, Role, Permission) restano fuori dal cluster.

## Stato attuale reale (verificato sul codice, 2026-09-29)

Verifica diretta di `laravel/Modules/User/app/Filament/` (non della
documentazione, che in più punti si contraddiceva):

**Cluster Passport: costruito, oltre le aspettative dei doc originali.**
- `app/Filament/Clusters/Passport.php` esiste, estende `XotBaseCluster`, minimale.
- `Clusters/Passport/Resources/` contiene **6** resource complete (non 5 come
  proposto originariamente): `OauthClientResource`, `OauthAccessTokenResource`,
  `OauthAuthCodeResource`, `OauthRefreshTokenResource`,
  `OauthPersonalAccessClientResource`, **`OauthDeviceCodeResource`** (aggiunta
  successiva, mai documentata nei file "cluster*", solo elencata come
  "opzionale" in `passport-cluster-resources-only-rule.md`).
- Ogni resource ha la struttura Filament v4 con sottocartelle
  `Pages/`, `Schemas/` (Form + Infolist), `Tables/` — pattern più moderno di
  quello descritto nei doc originali (che immaginavano solo `Pages/`).
- Il cluster ha anche `Pages/PassportDashboard.php` e
  `Widgets/PassportStatsWidget.php`: funzionalità non presenti in nessuno dei
  vecchi doc "cluster*" (tracciate altrove, vedi story 14.4 e
  `user-passport-create-client-credentials-button.md`).

**Problema aperto, confermato sul disco: dual-resource-tree (SSoT violata).**
Le vecchie risorse standalone **non sono state rimosse**: esistono ancora in
parallelo sia in `app/Filament/Resources/Oauth*Resource.php` (radice) sia in
`app/Filament/Clusters/Passport/Resources/Oauth*Resource.php` (cluster), per
tutte le 5 risorse originarie. Stesso problema per Socialite: `SsoProviderResource`,
`SocialProviderResource`, `SocialiteUserResource` esistono sia in radice sia in
`Clusters/Socialite/Resources/`. Esiste inoltre un terzo albero per i client:
`app/Filament/Resources/ClientResource/` (generico, non-Oauth-prefixed) con
propri `Schemas/OauthClientForm.php` — quindi **fino a 3 copie divergenti**
dello stesso form (`OauthClientForm`), con validazioni diverse
(`unique('clients', 'name')` vs `unique('oauth_clients', 'name')`) — rischio
reale di bug, non solo debito documentale. Questo è esattamente il problema che
`passport-cluster-resources-only-rule.md`, `passport-cluster-verification.md` e
`passport-cluster-work-completion.md` avevano già segnalato (drift rilevato) e
che oggi persiste, tracciato in modo puntuale e aggiornato in:
- `docs/wiki/redundancy/oauth-dual-resource-trees.md` (analisi)
- `docs/stories/12.4.oauth-dup-resources-ssot.story.md` (status: **backlog**, non risolta)

**Conclusione**: il cluster Passport/Socialite è stato implementato (più volte,
in sessioni diverse — da qui la ridondanza documentale), ma il lavoro di
rimozione delle vecchie risorse standalone **non è mai stato completato**. La
fotografia reale oggi è "cluster costruito, cleanup radice non fatto": non
fidarsi delle etichette "✅ COMPLETATO" nei vecchi documenti — si riferivano
solo alla creazione del cluster, non alla deduplicazione.

## Storia essenziale delle decisioni

Nota metodologica: `git log --follow` sui file di questo modulo **non è
attendibile per la cronologia** — la storia visibile in HEAD ha solo 3-4 commit
con messaggio "." del 2026-09-28 (import/squash), che nascondono una storia
reale più lunga (fino al 2026-01-20) recuperabile solo scavando nei commit
parent (`87273113`, `5697a373`, ecc.). Molti file "cluster*" erano già stati
degradati a stub rotti (puntatori a `../../../Themes/docs/shared-components/...`,
**percorso inesistente in tutto il monorepo**) da un tentativo precedente di
"risolvere marker di conflitto" (commit `7b9cba67`, 2026-09-22) che invece di
risolvere i conflitti ha sostituito il contenuto vero con un template generico
sbagliato. Il contenuto reale è stato recuperato da questo agente leggendo le
revisioni precedenti (`5697a373`, 2026-09-07) prima di scrivere questo
documento — nessuna decisione è stata persa.

Sequenza delle decisioni (dal contenuto recuperato, non dalle date fittizie
`created: 2026-07-14` identiche su tutti i file):

1. **Litigation / inner-debate** — dibattito se creare un cluster dedicato.
   Nome inizialmente proposto: `PassportCluster`. Vince l'opzione "cluster
   minimale + spostare le risorse + documentare il pattern" (KISS, no Settings
   page). Nome cluster finale: `Passport` (non `PassportCluster`, non `OAuthApi`).
2. **Proposal / philosophy** — proposta formale, cluster ancora da creare
   ("NUOVO").
3. **Prima implementazione** — cluster creato ma con un bug: classe su una riga
   (`class Passport extends XotBaseCluster {}`) e un file duplicato
   `PassportCluster.php` con proprietà (`navigationGroup`) che causavano errori
   PHPStan. Corretto in `oauth-cluster.md`/`oauth-cluster-error-analysis.md`
   (contenuto identico, file duplicato): rimosso `PassportCluster.php`,
   riformattato `Passport.php` con parentesi su righe separate.
4. **Namespace bug critico** (`passport-cluster-namespace.md` /
   `-namespace-fix.md`, duplicati identici) — le risorse nel cluster erano
   state create con namespace PHP errato che includeva il segmento `app/`
   (`Modules\User\app\Filament\Clusters\...`), causando `PHP Fatal error:
   Cannot declare class`. Root cause: confusione tra path filesystem e mapping
   PSR-4 (`Modules\\User\\": "Modules/User/app/"` — il segmento `app/` va
   rimosso, non tradotto in namespace). Fix: rimuovere `app\` da tutti i
   namespace/use statement.
5. **Ondata di documenti "completato/verificato"** (`implementation`,
   `implementationd`, `implementation-completed`, `completion`,
   `completion-status`, `summary`, `resources`, `resources-pattern`,
   `verification`, `resources-only-rule`) — ripetuti in sessioni diverse,
   ciascuno dichiara PHPStan L10 0 errori e struttura a 20 file (1 cluster + 5
   risorse + 14 pages). Contenuto quasi identico copiato/riscritto più volte.
6. **Drift rilevato** (`passport-cluster-current.md`,
   `passport-cluster-work-completion.md`, `passport-cluster-implementation-needed.md`)
   — sessioni successive trovano lo stato reale **diverso** da quanto
   documentato: directory `Clusters/Passport/Resources/` trovata vuota, oppure
   risorse ancora in `app/Filament/Resources/` con namespace sbagliato o pages
   mancanti. Questi documenti segnalano esplicitamente la contraddizione
   ("va interpretato come pattern target e non come fotografia dello stato
   attuale del filesystem") e propongono remediation: spostare di nuovo le
   risorse nel cluster e **non mantenere una seconda copia** in
   `Filament/Resources`. Questa raccomandazione non è mai stata eseguita fino
   in fondo (vedi stato attuale sopra).

## Problemi noti — stato risolto/aperto

| Problema | Stato | Dove |
|---|---|---|
| Cluster `Passport` mancante/vuoto | ✅ Risolto | Cluster esiste e contiene 6 resource |
| Cluster `Passport` con classe su 1 riga + `PassportCluster.php` duplicato | ✅ Risolto | `Passport.php` attuale ha PHPDoc e formattazione corretta; nessun `PassportCluster.php` sul disco |
| Namespace con segmento `app\` errato | ✅ Risolto | Namespace attuali (`Modules\User\Filament\Clusters\Passport\...`) sono PSR-4 corretti |
| Directory cluster vuota / risorse ancora sparse (drift 2026 gennaio) | ✅ Risolto | Cluster popolato con 6 resource complete di Pages/Schemas/Tables |
| **Doppio albero risorse (radice `Filament/Resources/Oauth*` + `Clusters/Passport/Resources/Oauth*`, stesso per Socialite)** | 🔴 **APERTO** | `docs/wiki/redundancy/oauth-dual-resource-trees.md`, story `12.4.oauth-dup-resources-ssot` (backlog) |
| `OauthClientForm` in 3 copie con validazione divergente (`unique('clients',...)` vs `unique('oauth_clients',...)`) | 🔴 **APERTO** | Story `12.4`, story `13.2.oauthclientresource-wrong-model` |
| `ClientResource` generico (non-Oauth) mai chiarito se va nel cluster | 🔴 **APERTO** (segnalato già in `passport-cluster-completion.md` come nota, mai chiuso) | — |
| Pagine Edit duplicate (`EditOauthAccessToken` vs `EditOauthAccessTokens`) | 🔴 **APERTO** | Story `12.4` |
| `PassportDashboard` / bottoni credenziali mancanti | Vedi story dedicata | `14.4.passport-dashboard-missing-buttons`, `user-passport-create-client-credentials-button.md` |
| Associazione client OAuth ↔ user incompleta | Vedi story dedicata | `14.5.oauth-client-user-association-incomplete` |

## Cosa fare dopo (non eseguito da questo consolidamento documentale)

La remediation del dual-resource-tree è già pianificata nella story
`12.4.oauth-dup-resources-ssot` (status backlog): cancellare le resource/
schema/table/pages duplicate in `app/Filament/Resources/Oauth*` e in
`ClientResource/`, unificare `OauthClientForm` sulla tabella reale
(`oauth_clients`), aggiornare i test che puntano agli FQCN radice. Questo
documento **non** esegue quella remediation (è lavoro sul codice, fuori scope
di un task di consolidamento documentale) — si limita a confermarne la
diagnosi e a smettere di far finta, nei doc, che sia già stata fatta.
