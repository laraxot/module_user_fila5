---
title: "Niente testi fissi nelle Blade del modulo User (multilingua it/en/de/es)"
type: story
status: implemented
module: User
updated: 2026-10-30
tags: [i18n, blade, multilingua]
---

# Niente testi fissi nelle Blade del modulo User

## Scopo

Il sito risponde in italiano, inglese, tedesco e spagnolo: un testo scritto dentro una Blade esce uguale in ogni lingua. Il `fallback_locale` e' `it`, quindi una chiave mancante in `en`/`de`/`es` non da' errore e mostra l'italiano.

## Regola operativa

- Ogni testo visibile passa da `{{ __('user::contesto.collezione.chiave.tipo') }}`: cinque elementi, dove `contesto` e' il nome del file lingua e `tipo` il genere di testo (`label`, `title`, `description`, `placeholder`, `tooltip`, `helper_text`, `message`, `aria_label`, `alt`; [regola 008](../../../../../docs/wiki/rules/008-translation-5-level-protocol.md)). Mai la frase come chiave: nessun file la traduce, e il traduttore ignora `['default' => ...]`.
- La stringa va in `Modules/User/lang/{it,en,de,es}/<contesto>.php`, con le stesse chiavi e gli stessi `:parametri` nelle quattro lingue. `it` e' l'originale; `en`, `de`, `es` sono traduzioni vere. Se l'originale era inglese (Breeze, Jetstream), `en` lo conserva e `it` e' la traduzione.
- Vale anche per `aria-label`, `placeholder`, `title`, `alt` e, in PHP, per `->label()`, `->placeholder()`, `->tooltip()`, `->heading()`, `->description()`.
- Frasi con variabili: segnaposto `:param` e `trans_choice` per i plurali; il markup resta nella Blade e la frase si spezza solo dove serve.
- Link a pagine CMS: niente `href="/it/..."`, niente `url('/...')`, niente nomi di rotta inventati per pagina. Si usa la rotta generica della shell Folio, `route('container0.view', ['container0' => 'area-personale', 'slug0' => 'notifiche'])`: il prefisso lingua lo aggiunge Folio. L'indice ha un nome diverso per tema (`container0` in Two e Meetup, `container0.index` in Sixteen e TwentyOne): una vista di modulo condivisa tra temi usa `view` oppure riceve l'URL dal chiamante. I nomi Folio veri (`home`, `login`, `logout`) restano validi.
- Non sono errori: marchi e nomi propri, sigle, numeri, valori che arrivano dal modello o dal CMS.

## Cosa e' stato fatto

- Rilevatore `bashscripts/tools/i18n/find-hardcoded-blade-text.py` sul modulo: da 286 occorrenze in 53 file a 88 in 29 file (stesso strumento, commit di partenza contro stato attuale).
- 51 Blade convertite: navigazione e menu profilo, widget di login e logout, conferma di uscita, mail e notifiche, invito al team, area personale, registrazione, modifica profilo.
- File lingua completi nelle quattro lingue: `area_personale`, `auth_pages`, `blocks`, `common`, `layout`, `logout_confirm`, `mail_message`, `notification_email`, `pages`, `profile_edit`, `register_page`, `team_invitation_email`. Le sette collezioni scritte in questa passata portano 51 chiavi per lingua (`profile_edit` ne ha 12 in piu').
- Completamento di de/es sulle chiavi preesistenti usate dalle Blade: 115 in `de`, 123 in `es`. In `de/auth` la voce `login.register` e' tornata un array con `text`, come in `it`/`en`.
- Controllo statico sulle 68 Blade di User, Employee e TechPlanner: 311 chiavi usate, nessuna mancante in `it`, `en`, `de`, `es`.
- Sorgenti inglesi (navigazione, menu profilo, invito al team, notifiche, mail): `en` e' l'originale, `it` e' la traduzione. La voce di logout e' una chiave comune, `user::common.actions.logout.label`.

## Residui dichiarati (88 occorrenze)

| Categoria | N |
|---|---:|
| Starter kit demo non instradato (pagine di esempio, benvenuto, notifica toast) | 56 |
| Direttive Blade, marchi, segnaposto e frammenti di espressione: falsi positivi | 26 |
| Scaffold nWidart non instradato (indice e layout master) | 3 |
| Link a pagine legali con prefisso lingua fisso (nessuna rotta affidabile) | 3 |

Testi in PHP: circa 54 chiamate `->label()`, `->placeholder()`, `->tooltip()`, `->heading()`, `->description()` con testo fisso (conteggio euristico), non toccate.

## Limiti

- Nessuna verifica a video: le pagine richiedono il login e non sono state aperte; chiavi e compilazione sono controllate in modo statico.
- Una parte delle chiavi usate dalle Blade (circa 137 usi) e' nata con tre o quattro elementi invece di cinque: funziona in tutte le lingue ma non e' stata rinominata.
- I file `it` e `en` di `auth` hanno commenti e strutture miste e non sono stati riscritti.
- Verifica del 2026-10-30: PHPStan sui moduli senza errori, compilazione Blade dei file convertiti senza errori, nessuna chiave usata dalla campagna manca in `it`, `en`, `de`, `es`.

## Riferimenti

Metodo e regola completa: [story del tema Two](../../../../Themes/Two/docs/stories/blade-i18n-no-hardcoded-text.story.md); protocollo a cinque elementi: [regola 008](../../../../../docs/wiki/rules/008-translation-5-level-protocol.md). Il dettaglio per file e' nel repo privato di audit.

## Seguito: forma delle chiavi

Le chiavi a 2-3 segmenti create da questa campagna sono state in parte portate a `ns::file.collezione.chiave.tipo`: **116 chiavi spostate** in questo proprietario (stesso testo, tutte le lingue, usi riscritti, nessun uso della vecchia chiave rimasto). La frase sui «tre o quattro elementi» qui sopra descrive lo stato precedente: le chiavi rimaste a 3-4 elementi non sono state verificate una per una; la misura assoluta, lo strumento e i residui sono in [la story di Lang](../../../Lang/docs/stories/translation-key-shape-rekey.story.md).
