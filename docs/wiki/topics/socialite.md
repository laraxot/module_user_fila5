---
title: "Topic socialite"
type: digest
status: active
qmd: "digest ceiling 100 socialite"
---

# Topic socialite

Sintesi automatica di 3 documenti (chiave `socialite`).

## socialite

_Fonte: `_integration/socialite.md`_

# socialite

<!-- Contenuto migrato da _docs/socialite.txt -->

-------------------------------------------------------------------------------------------------------------
How to customize Laravel filament login page
https://dev.to/mfazail/how-to-customize-laravel-filament-login-page-455n
-------------------------------------------------------------------------------------------------------------

https://github.com/DutchCodingCompany/filament-socialite

## Socialite Cluster Structure

_Fonte: `clusters/socialite.md`_

# Socialite Cluster Structure

This document outlines the structure and organization of the **Socialite** cluster within the **User** module.

## Overview

The `Socialite` cluster groups all resources related to social authentication, following the Laraxot modular architecture principles.

## Structure

```
Modules/User/Filament/Clusters/
├── Socialite.php               # Cluster Definition (extends XotBaseCluster)
└── Socialite/
    └── Resources/
        ├── SocialProviderResource.php
        └── SocialiteUserResource.php
```

## Migration Guide

Resources moved from `Filament/Resources` to `Filament/Clusters/Socialite/Resources`:

- `SocialProviderResource`
- `SocialiteUserResource`

## Namespaces

- **Cluster**: `Modules\User\Filament\Clusters`

## Socialite — risorse esterne

_Fonte: `prompts/socialite.md`_

# Socialite — risorse esterne

> Fonti raccolte durante lo studio dell'argomento. Una fonte vale quando la si
> collega a un punto del codice: leggila, poi trova dove è già applicata.

## Note

- studia
- noi non aggiungiamo colonne tipo google_id o facebook_id alla tabella user, perche' i socialite sono tanti e andiamo a sporcare la tabella user , noi utilizziamo modelli come laravel/Modules/User/app/Models/SocialiteUser.php e laravel/Modules/User/app/Models/SocialProvider.php , percio' prima devi analizzare a fondo il modulo user, documentare la tua analisi dentro la cartella docs dentro il modulo user, aggiornare llm wiki e a sto punto dobbiamo pensare anche come mettere GOOGLE_CLIENT_ID e GOOGLE_CLIENT_SECRET tramite un tutorial da amministrazione , la amministrazione backoffice e' fatto con filament 5 a moduli se hai dubbi ti studi a fondo la struttura, documenti studi, migliori le cartelle docs dentro i moduli e dentro i temi ,le tue rules, le tue memories e le tue skills, per aggiornare utilizza indici con collegamenti bidirezionali relativi , capisci la regola, questa regola devi sempre ricordartela percio' aggiorna tutto quello che puoi per ricordartela sempre poi aggiorna studia e migliora le cartelle docs dentro i moduli e dentro i temi , le tue rules, le tue memories, le tue skills, aggiorna sempre utilizzando indici e ottica dry + kiss, poi aggiorna anche llm wiki, ti ricordo che la tua memoria e' llm wiki, se non ricordi cosa sia cerca in internet e assicurati c
