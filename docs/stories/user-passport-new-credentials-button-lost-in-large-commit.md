---
id: story-user-passport-new-credentials-button-lost-in-large-commit
slug: story-user-passport-new-credentials-button-lost-in-large-commit
title: "STORY — Il bottone 'Nuove credenziali' della Passport Dashboard è scomparso, cancellato da un commit di un giorno dopo"
description: "Il bottone che genera client OAuth client_credentials dalla UI (story user-passport-create-client-credentials-button.md, module_user_fila5#85), implementato e verificato dal vivo dall'utente il 2026-09-03, non è più presente nella Passport Dashboard oggi. Trovato via git log -S: cancellato dal commit 9d2362d94 (2026-09-04), che si dichiara un refactor del modulo AI ma tocca 7495 file in tutto il repository. Da verificare con il team leader se la cancellazione sia stata accidentale o voluta."
document_type: story
category: bmad
scope: module:User
github_id: module_user_fila5#98
status: ready-for-dev
version: 1.0.0
language: it-IT
ecosystem: Laraxot
priority: high
created_at: '2026-09-15'
updated_at: '2026-09-15'
tags: [bmad, story, user, passport, oauth, admin, git-history, regression]
related:
  - ../../laravel/Modules/User/docs/stories/user-passport-create-client-credentials-button.md
  - ../../laravel/Modules/User/app/Filament/Clusters/Passport/Pages/PassportDashboard.php
  - ../../laravel/Modules/User/tests/Feature/Filament/Clusters/Passport/Pages/PassportDashboardNewCredentialsTest.php
github:
  repository: https://github.com/laraxot/module_user_fila5
  issue: https://github.com/laraxot/module_user_fila5/issues/98
  discussion: https://github.com/laraxot/module_user_fila5/discussions/99
---

# STORY — Il bottone "Nuove credenziali" è scomparso dalla Passport Dashboard

## Contesto

L'utente ha chiesto l'URL della Passport Dashboard per usare il bottone
"Nuove credenziali" (story `user-passport-create-client-credentials-button.md`,
`module_user_fila5#85`, implementato e verificato dal vivo il 2026-09-03).
Aperta la pagina, il bottone non c'era: solo i 4 bottoni originari
(`passport_install`, `passport_keys`, `passport_purge`, `passport_hash`).

## Cosa è successo, verificato nel git log (non un'ipotesi)

```
git log --all -p -S "new_credentials" -- laravel/Modules/User/app/Filament/Clusters/Passport/Pages/PassportDashboard.php
```

**Aggiunto**: commit `78575b2c85fe0f629141630ba17ddf8bd815d236`, 2026-09-03,
autore **Malebestia** (l'utente stesso) — `feat+fix: pulsante Nuove
credenziali Passport, e fix crash/campi persi in
CreateContactsForSurveyAction`. Corrisponde esattamente alla story #85.

**Cancellato**: commit `9d2362d941ffa669c8445c58352b4e3c95811098`,
2026-09-04 (un giorno dopo), autore **Marco Sottana** — titolo:
`refactor(AI): extract nested parsing logic into private methods + improve
type safety`.

Il diff di questo secondo commit rimuove per intero, da
`PassportDashboard.php`:
- il metodo `protected function newCredentialsAction(): Action` (l'intera
  azione: form con il nome del cliente, chiamata a
  `ClientRepository::createClientCredentialsGrantClient()`, notifica con
  `client_id`/`client_secret`)
- la sua registrazione in `getHeaderActions()`
  (`'new_credentials' => $this->newCredentialsAction()`)
- gli `use` diventati inutilizzati (`TextInput`, `Auth`, `ClientRepository`,
  `SafeStringCastAction`, `Assert`)

**Verificato anche**: le chiavi di traduzione (`new_credentials`,
`client_name`, `credentials_created`) non esistono più in
`Modules/User/lang/{it,en}/passport_dashboard.php`.

## Perché è sospetto, non solo "un refactor che ha toccato troppo"

Il commit `9d2362d94` si dichiara un refactor mirato del modulo **AI**
(estrarre metodi privati da `ContextCompressorAction`/`ChatDs4Action`/ecc.).
Ma il suo diff completo (`git show --stat 9d2362d94`) tocca:

```
7495 files changed, 374664 insertions(+), 70212 deletions(-)
```

— file in **ogni** modulo del progetto (AI, Activity, Cms, Job, Lang, Media,
Notify, Tenant, UI, User, Quaeris...), inclusi `.codeclimate.yml`,
`.gitattributes`, `.github/dependabot.yml`, README, docs di decine di
moduli. Questo non è compatibile con un refactor mirato: ha tutta l'aria di
un merge/rebase di una branch lungamente divergente, o di una sincronizzazione
di massa, etichettato per errore col messaggio dell'ultimo lavoro fatto in
locale prima di eseguirlo. **Non è stato verificato se altre funzionalità
oltre a questa siano state perse allo stesso modo da questo stesso commit**
— fuori scope per questa story, ma segnalato come rischio concreto da
valutare a parte.

## Perché nessun test se n'è accorto

`PassportDashboardNewCredentialsTest.php` esiste ancora ed è verde (1
passed, 2 skipped) — ma non protegge da questa regressione:
- L'unico test che gira davvero (`'creates a real client_credentials grant
  client...'`) chiama `ClientRepository::createClientCredentialsGrantClient()`
  **direttamente**, mai tramite `Livewire::test(PassportDashboard::class)`
  — non tocca in nessun modo il bottone/l'azione sulla pagina reale.
- I due test che *avrebbero* rilevato esattamente questa regressione
  (`assertActionHidden('new_credentials')` /
  `assertActionVisible('new_credentials')`) erano già `markTestSkipped()`
  dal 3 settembre, per un problema preesistente e non correlato del DB di
  test (`profiles.uuid` mancante) — il loro corpo reale è commentato, mai
  eseguito. La cancellazione del giorno dopo è quindi passata inosservata
  per costruzione: l'unico controllo automatico capace di accorgersene era
  già disattivato.

## Cosa NON è stato fatto

Nessun ripristino del codice. L'utente vuole prima verificare con il team
leader (o comunque con l'autore del commit `9d2362d94`) se questa
cancellazione sia stata **accidentale** (collaterale a un merge/refactor più
ampio, come suggerisce la scala del commit) o **intenzionale** (una
decisione di rimuovere la feature, mai comunicata/documentata altrove).

## Acceptance Criteria

1. Verificato con il team/l'autore del commit `9d2362d94` se la rimozione
   del bottone "Nuove credenziali" sia stata voluta o accidentale.
2. Se accidentale: il bottone viene ripristinato (in modo forward-only, un
   nuovo commit che re-implementa il codice — mai un revert del commit
   altrui) e riverificato dal vivo come il 2026-09-03.
3. Se intenzionale: la story `user-passport-create-client-credentials-button.md`
   viene aggiornata per riflettere la decisione (stato "superseded"/"non più
   applicabile"), invece di restare apparentemente "review"/completata su
   una feature che non esiste più.
4. I due test skippati in `PassportDashboardNewCredentialsTest.php` vengono
   quantomeno riconsiderati: se il blocco DB (`profiles.uuid`) è ancora
   presente, va segnalato come rischio strutturale (una feature UI intera
   può sparire senza che nessun test se ne accorga).
5. (Opzionale, fuori scope stretto ma segnalato) — valutare se altre
   funzionalità siano state perse dallo stesso commit `9d2362d94`, data la
   sua scala anomala (7495 file).

## Tasks/Subtasks

- [ ] Task 1: condividere questa story con il team leader/l'autore del
      commit per la verifica (AC1).
- [ ] Task 2 (condizionale): ripristinare il codice se la cancellazione
      risulta accidentale (AC2).
- [ ] Task 3 (condizionale): aggiornare `user-passport-create-client-credentials-button.md`
      se la rimozione risulta intenzionale (AC3).
- [ ] Task 4: decidere se e come sbloccare i test skippati (AC4).

## Dev Notes

- Nessun lock preso, nessun file toccato in questa story: solo analisi via
  `git log`/`git show`, lettura del codice attuale e del test esistente.
- Riferimento diretto: [Source: laravel/Modules/User/app/Filament/Clusters/Passport/Pages/PassportDashboard.php]
  (stato attuale, 4 azioni, nessuna `new_credentials`)
- [Source: commit 78575b2c85fe0f629141630ba17ddf8bd815d236] (aggiunta)
- [Source: commit 9d2362d941ffa669c8445c58352b4e3c95811098] (cancellazione)
- [Source: laravel/Modules/User/tests/Feature/Filament/Clusters/Passport/Pages/PassportDashboardNewCredentialsTest.php]
  (perché il test non ha rilevato la regressione)
