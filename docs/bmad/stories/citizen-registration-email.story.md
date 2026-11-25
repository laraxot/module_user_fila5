---
id: STORY-REGISTRATION-EMAIL-20261007
title: "Registrazione cittadino: UX accessibile e verifica email locale"
status: implemented-runtime-pending
owner: User
created: 2026-10-07
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/572"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/573"
qmd: "citizen registration email story registrazione cittadino"
---
# Registrazione cittadino: UX accessibile e verifica email locale

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.

## Contesto

La registrazione `/it/auth/register` usa il widget User dentro il tema Sixteen.
Le traduzioni arrivano dal LangServiceProvider; la posta locale è già fornita da
Postfix e sendmail.

## Acceptance criteria

- [x] La pagina usa copy italiano senza chiavi grezze.
- [x] Password e conferma restano leggibili in colonna su mobile.
- [x] Errori e suggerimenti sono annunciabili da tecnologie assistive.
- [x] Laravel usa `/usr/sbin/sendmail` tramite Postfix locale.
- [x] `AUTH_MUST_VERIFY_EMAIL=true` abilita l'invio della verifica per utenti
      compatibili con `MustVerifyEmail`.
- [ ] Browser smoke test su HTTPS con database e mail sink disponibili.
- [ ] Test di consegna verso provider esterno dopo la configurazione del relay.

## Vincoli

Nessun controller, service layer o nuova dipendenza. Sixteen cura solo la
presentazione; User cura autenticazione; il relay esterno richiede credenziali
del gestore e non può essere dedotto dall'ambiente locale.

## Evidenza tecnica

`laravel/Modules/User/app/Filament/Widgets/Auth/RegisterWidget.php`,
`laravel/config/auth.php`, `laravel/config/mail.php` e
`laravel/Themes/Sixteen/resources/views/filament/widgets/auth/register.blade.php`.


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
