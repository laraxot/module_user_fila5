---
title: "ADR — la pagina login del front office segue il tema"
type: decision
module: User
decision-makers: [User module owner]
status: accepted
created: 2026-11-21
updated: 2026-11-26
issues: []
qmd: "frontoffice login page ownership pagina front"
---

# La pagina login del front office segue il tema

## Contesto

Il modulo User deve fornire autenticazione riusabile, mentre il front office deve mantenere il contratto visuale del tema attivo.
Un fallback Folio del modulo con una form Volt duplicava la logica, nascondeva Google OAuth e poteva ombreggiare la pagina
Sixteen/Design Comuni. La domanda è quale sia il proprietario della resa e quale sia il fallback sicuro.

## Driver della decisione

- Una sola implementazione deve governare schema, throttling, sessione, OAuth e redirect.
- Il tema attivo deve poter possedere markup, accessibilità e stile senza dipendere da Sixteen.
- Un fallback deve restare disponibile senza riattivare pagine Folio concorrenti.

## Alternative scartate

- Mantenere una seconda form Volt nel modulo: duplicava autenticazione, stile e link OAuth.
- Forzare sempre il markup Sixteen nel modulo: impediva ai temi alternativi di possedere il proprio design.
- Rimuovere il fallback: i progetti senza una pagina login del tema avrebbero perso una pagina funzionante.

## Decisione

La logica di autenticazione resta nel `Modules\\User\\Filament\\Widgets\\Auth\\LoginWidget`.
La pagina front office usa `pub_theme::components.pages.auth-login` quando il tema la espone; il fallback del modulo monta lo stesso
widget senza ricreare una form o un metodo `authenticate` Volt.

## Conseguenze

- La grafica Design Comuni e il pulsante Google seguono il componente del tema.
- Il widget User resta la singola fonte per schema, throttling, sessione e redirect.
- Il fallback generico resta volutamente minimale; i temi possono sostituirlo senza modificare il modulo.

## Conferma

- `Modules/User/tests/Feature/Socialite/OauthLocalizedLoginFlowTest.php` verifica il link Google localizzato nella pagina di login (file esistente).
- `Modules/User/app/Filament/Widgets/Auth/LoginWidget.php`: unico proprietario di schema, throttling, sessione e redirect (conferma per revisione).
- Controllo ripetibile: `rg 'wire:submit="authenticate"' laravel/Modules/User/resources` non deve trovare nulla. Oggi trova `pages/auth/login.blade.php:50`:
  la conferma fallisce (vedi Stato attuale).
- Nessuna conferma automatica oggi della proprietà della pagina; proposta: un test che fallisca se un file sotto `Modules/User/resources/views/pages` contiene `wire:submit="authenticate"`.

## Stato delle viste Folio del modulo

`Modules/User/resources/views/pages/` resta assente intenzionalmente: Folio monta automaticamente quella directory
quando esiste, quindi ripopolarla con vecchi scaffold riattiverebbe pagine concorrenti e potrebbe ombreggiare il tema.
I template storici sono conservati in `resources/views/pages_old/` come riferimento e futuri stub per popolare template
vergini; non sono sorgenti runtime e non devono essere usati come prova che una rotta sia attiva.

Quando uno stub diventerà una pagina reale, la sua proprietà runtime dovrà essere decisa esplicitamente (tema o modulo),
documentata in un ADR/storia del proprietario e verificata con il mount Folio effettivo.

## Stato attuale

Verificato il 2026-11-26. Il codice contraddice la sezione «Stato delle viste Folio del modulo»:

- `Modules/User/resources/views/pages/` esiste ed è popolata (`auth/`, `profile/`, `dashboard/`, `index.blade.php`, …).
- `pages/auth/login.blade.php:50` contiene una form Volt `wire:submit="authenticate"`, cioè la seconda form che la Decisione vieta.
- `tests/Unit/NoCmsPhantomFolioImportsTest.php:13` descrive `resources/views/pages` come «tracciata e popolata»: il test non protegge più l'assenza della cartella.

Nessun ADR successivo sostituisce questa decisione: lo stato `accepted` resta per la parte di proprietà del widget; la parte «cartella assente» è superata dal codice.
Decisione aperta, da prendere con un umano: riallineare il codice (togliere la form Volt) oppure scrivere un nuovo ADR che dichiari il fallback del modulo.
