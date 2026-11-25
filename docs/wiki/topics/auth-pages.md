---
title: "Topic auth-pages"
type: digest
status: active
qmd: "digest ceiling 100 auth-pages"
---

# Topic auth-pages

Sintesi automatica di 5 documenti (chiave `auth-pages`).

## Implementazione Corretta delle Pagine Auth

_Fonte: `auth-pages-implementation-1-1.md`_

# Implementazione Corretta delle Pagine Auth 

## Collegamenti correlati
- [Documentazione centrale](../../../../docs/README.md)
- [Collegamenti documentazione](../../../docs/collegamenti-documentazione.md)
- [README modulo User](./README.md)
- [Convenzioni Path](./path-conventions.md)
- [Volt Errors](./volt-errors.md)
- [Volt Folio Logout](./volt-folio-logout.md)
- [Volt Logout Action](./volt-logout-action.md)

## Introduzione

Questo documento descrive l'implementazione corretta delle pagine di autenticazione nel tema One di SaluteOra, utilizzando Laravel Folio, Livewire Volt e seguendo le convenzioni del progetto.

## Struttura delle Directory

```
laravel/Themes/One/resources/views/pages/auth/
├── login.blade.php      # Pagina di login
├── register.blade.php   # Pagina di registrazione
├── logout.blade.php     # Pagina di logout
├── [type]/              # Registrazione per tipo utente
│   └── register.blade.php
├── password/            # Gestione password
│   ├── [token].blade.php  # Reset password
│   ├── confirm.blade.php  # Conferma password
│   └── reset.blade.php    # Richiesta reset
├── thank-you.blade.php  # Conferma registrazione

## Implementazione Corretta delle Pagine Auth

_Fonte: `auth-pages-implementation-1.md`_

# Implementazione Corretta delle Pagine Auth

## Collegamenti correlati
- [Documentazione centrale](../../../../docs/README.md)
- [Collegamenti documentazione](../../../../docs/collegamenti-documentazione.md)
- [README modulo User](./README.md)
- [Convenzioni Path](./path-conventions-2.md)
- [Volt Errors](./volt-errors-2.md)
- [Volt Folio Logout](./volt-folio-logout-2.md)
- [Volt Logout Action](./volt-logout-action-2.md)

## Introduzione

Questo documento descrive l'implementazione corretta delle pagine di autenticazione nel tema One di <nome progetto>, utilizzando Laravel Folio, Livewire Volt e seguendo le convenzioni del progetto.

## Struttura delle Directory

```
laravel/Themes/One/resources/views/pages/auth/
├── login.blade.php      # Pagina di login
├── register.blade.php   # Pagina di registrazione
├── logout.blade.php     # Pagina di logout
├── [type]/              # Registrazione per tipo utente
│   └── register.blade.php
├── password/            # Gestione password
│   ├── [token].blade.php  # Reset password
│   ├── confirm.blade.php  # Conferma password
│   └── reset.blade.php    # Richiesta reset
├── thank-you.blade.php  # Conferma registrazione

## Implementazione Corretta delle Pagine Auth

_Fonte: `auth-pages-implementation-2.md`_

# Implementazione Corretta delle Pagine Auth 

## Collegamenti correlati
- [Documentazione centrale](../../../../docs/README.md)
- [Collegamenti documentazione](../../../../docs/collegamenti-documentazione.md)
- [README modulo User](./README.md)
- [Convenzioni Path](./path-conventions-user.md)
- [Volt Errors](./volt-errors.md)
- [Volt Folio Logout](./volt-folio-logout-2.md)
- [Volt Logout Action](./volt-logout-action.md)
- [Documentazione centrale](../../../../docs/README.md)
- [Collegamenti documentazione](../../../docs/collegamenti-documentazione.md)
- [README modulo User](./README.md)
- [Convenzioni Path](./path-conventions.md)
- [Volt Errors](./volt-errors.md)
- [Volt Folio Logout](./volt-folio-logout.md)
- [Volt Logout Action](./volt-logout-action.md)

## Introduzione

Questo documento descrive l'implementazione corretta delle pagine di autenticazione nel tema One di SaluteOra, utilizzando Laravel Folio, Livewire Volt e seguendo le convenzioni del progetto.

## Introduzione

Questo documento descrive l'implementazione corretta delle pagine di autenticazione nel tema One di healthcare_app, utilizzando Laravel Folio, Livewire Volt e seguendo le convenzioni del progetto.

## Struttura delle Directory

```

## Implementazione Corretta delle Pagine Auth

_Fonte: `auth-pages-implementation.md`_

# Implementazione Corretta delle Pagine Auth

## Collegamenti correlati
- [Documentazione centrale](../../../../docs/README.md)
- [Collegamenti documentazione](../../../../docs/collegamenti-documentazione.md)
- [README modulo User](./README.md)
- [Convenzioni Path](./path-conventions-user.md)
- [Volt Errors](./volt-errors.md)
- [Volt Folio Logout](./volt-folio-logout-2.md)
- [Volt Logout Action](./volt-logout-action.md)

## Introduzione

Questo documento descrive l'implementazione corretta delle pagine di autenticazione nel tema One di <nome progetto>, utilizzando Laravel Folio, Livewire Volt e seguendo le convenzioni del progetto.

## Struttura delle Directory

```
laravel/Themes/One/resources/views/pages/auth/
├── login.blade.php      # Pagina di login
├── register.blade.php   # Pagina di registrazione
├── logout.blade.php     # Pagina di logout
├── [type]/              # Registrazione per tipo utente
│   └── register.blade.php
├── password/            # Gestione password
│   ├── [token].blade.php  # Reset password
│   ├── confirm.blade.php  # Conferma password
│   └── reset.blade.php    # Richiesta reset
├── thank-you.blade.php  # Conferma registrazione

## Sorgenti dei testi delle pagine auth

_Fonte: `wiki/concepts/auth-pages-i18n-sources.md`_

# Sorgenti dei testi delle pagine auth

| Elemento | File lang | Chiavi |
| --- | --- | --- |
| Titolo, kicker, aiuto (login) | `auth.php` | `login_page.*` |
| Titolo, aiuto (registrazione) | `auth.php` | `register_page.*` |
| Link "Non hai un account?" | `login.php` | `no_account`, `register_now`, `forgot_password_text`, `reset_it` |
| Bottone e errore di login | `login.php` | `actions.login.label`, `actions.login.error` |
| **Etichette, placeholder, aiuto dei campi** | **`user_form.php`** | `fields.<campo>.{label,placeholder,helper_text,description}` |
| "Hai gia' un account?" | `registration.php` | `already_registered` |

`login_widget.php` NON alimenta le etichette del login: lo schema e' `UserForm`, quindi vale `user_form`.

## Trappole

- L'auto-writer, davanti a una chiave mancante, scrive il **nome del campo come valore**
  (`'label' => 'email'`). Sintomo in pagina: etichette minuscole grezze. Il test
  `tests/Feature/AuthPagesLocalesTest.php` lo intercetta.
- Se manca la chiave in una lingua, Laravel mostra l'italiano (fallback), senza errori.
- Le lingue servite dal selettore sono it, en, de, es.

## Controllo rapido

```bash
cd laravel && ./vendor/bin/pest Modules/User/tests/Feature/AuthPagesLocalesTest.php
```
