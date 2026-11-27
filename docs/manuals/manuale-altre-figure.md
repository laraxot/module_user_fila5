---
title: "Manuale per le altre figure — User"
type: user-manual
status: active
qmd: "manuale altre figure user operator auditor support"
---

# Manuale per le altre figure — modulo User

Questa guida descrive il perimetro operativo delle figure che non sono né
utenti finali né amministratori del tenant. Il modulo User fornisce capacità
riusabili; il progetto ospitante decide quali ruoli e permessi assegnare.

## Figure tipiche

| Figura | Responsabilità | Accesso consigliato |
| --- | --- | --- |
| Operatore | Gestisce le risorse assegnate dal progetto | Solo permessi sulle risorse operative |
| Supporto | Assiste gli utenti e verifica gli accessi | Lettura dei dati necessari, senza configurazione |
| Auditor | Consulta eventi e accessi | Permessi di sola lettura su log e report |
| Gestore team | Amministra team e inviti | Risorse Team e Team Invitations |
| Integratore | Configura l'integrazione applicativa | Configurazione OAuth/API strettamente necessaria |

## Principi di autorizzazione

- Applicare il principio del privilegio minimo.
- Preferire permessi granulari a un ruolo globale.
- Separare lettura, modifica, cancellazione e configurazione.
- Verificare policy e guard prima di esporre una risorsa Filament.
- Non usare questo manuale per inventare ruoli: nomi e assegnazioni sono
  responsabilità dell'applicazione che installa il modulo.

## Attività operative

Gli operatori lavorano sulle risorse che il progetto rende disponibili nel
pannello. Supporto e auditor possono usare, quando autorizzati,
**Authentication Logs** e **Dispositivi** per diagnosticare accessi senza
modificare la configurazione. Il gestore team opera su Team, Team
Invitations e utenti del team.

Per la configurazione globale consultare il
[manuale super-admin](./manuale-super-admin.md); per il lavoro quotidiano nel
pannello consultare il [manuale admin](./manuale-admin.md).

## Verifica prima dell'assegnazione

1. Identificare la responsabilità reale della figura.
2. Assegnare soltanto i permessi necessari.
3. Provare lettura e modifica con un account di test non privilegiato.
4. Verificare che policy, team e tenant impediscano l'accesso trasversale.
5. Registrare la decisione nella documentazione del progetto ospitante.

Il modulo non assume un modello organizzativo specifico e non contiene ruoli
dipendenti da un singolo progetto.
