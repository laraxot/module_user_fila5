---
title: "User, struttura delle Actions"
type: concept
status: active
created: 2026-11-06
updated: 2026-11-06
module: User
story: collision-rewrite-complete-files
tags: [actions, structure, psr-4, queueable-action, user]
qmd: "user module struttura actions app/Actions namespace Modules User Actions psr-4 composer autoload spatie queueable action execute no services DeleteUserAction ResendEmailVerificationAction"
related:
  - ./actions-path-convention.md
  - ./path-conventions.md
  - ./directory-structure-checklist.md
  - ./module-structure.md
  - ../../best-practices/queueable-actions.md
  - ../../actions-structure.md
  - ../../../../Xot/docs/stories/collision-rewrite-complete-files.story.md
---

# User, struttura delle Actions

Dove vivono le Actions del modulo User, come si chiamano e come si scrivono, in modo che l'autoload PSR-4 le trovi e che la logica di business resti in un posto solo. Una Action e' un caso d'uso: una classe, un metodo `execute()`. Non esistono classi `*Service`.

## Dove stanno

- **Percorso**: `Modules/{Modulo}/app/Actions/`
- **Namespace**: `Modules\{Modulo}\Actions\`

Dentro la cartella le Actions sono raggruppate per area. In User: `Activity`, `Auth`, `Authentication`, `Notification`, `Otp`, `Passport`, `Shield`, `Socialite`, `Team`, `User`, piu' poche Actions trasversali alla radice (`CreateUserAction`, `GetCurrentDeviceAction`, `GetPermissionModelAction`).

Percorsi corretti:

- `Modules/User/app/Actions/User/DeleteUserAction.php`
- `Modules/User/app/Actions/Auth/ResendEmailVerificationAction.php`

Percorsi errati (manca `app/`):

- `Modules/User/Actions/User/DeleteUserAction.php`
- `Modules/User/Actions/DeleteUserAction.php`

## Namespace

Il namespace rispecchia il percorso **senza** il segmento `App`:

```php
// Corretto
namespace Modules\User\Actions\User;

// Errato
namespace Modules\User\App\Actions\User;
```

La ragione e' nel `composer.json` del modulo, che mappa `Modules\User\` sulla cartella `app/`:

```json
"autoload": {
    "psr-4": {
        "Modules\\User\\": "app/",
        "Modules\\User\\Database\\Factories\\": "database/factories/",
        "Modules\\User\\Database\\Seeders\\": "database/seeders/"
    }
}
```

## Come si scrive un'Action

Il progetto usa `spatie/laravel-queueable-action`. Il trait `QueueableAction` aggiunge `onQueue()`: la stessa classe si esegue subito con `execute()` oppure in coda con `->onQueue()->execute(...)`.

```php
<?php

declare(strict_types=1);

namespace Modules\User\Actions\Auth;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\QueueableAction\QueueableAction;

class ResendEmailVerificationAction
{
    use QueueableAction;

    public function execute(MustVerifyEmail $user): bool
    {
        if ($user->hasVerifiedEmail()) {
            return false;
        }

        $user->sendEmailVerificationNotification();

        return true;
    }
}
```

Regole che ne discendono:

1. **Un solo metodo pubblico, `execute()`**, con parametri e ritorno tipizzati. Le dipendenze arrivano dal costruttore (`DeleteUserAction` riceve `Hasher` e `Guard`).
2. **Si tipizza sul contratto, non sul modello concreto**: `UserContract` (come `DeleteUserAction`) o un'interfaccia piu' stretta come `MustVerifyEmail`, mai `Modules\User\Models\User`.
3. **Nessun `*Service`**, ne' in `app/Services` ne' in `Modules/*/Services`: la logica nuova va in una Action. Regola: `bashscripts/ai/wiki/rules/no-services-rule.md`.
4. **Nessuna Action che faccia solo da scorciatoia a una relazione Eloquent**: le relazioni stanno sul modello o su un suo trait; l'Action le usa per eseguire un caso d'uso.
5. Si chiama dal container: `app(DeleteUserAction::class)->execute($user, $password)` (cosi' fa `DeleteAccountWidget`).

## Perche' questa struttura

1. Coerente con la mappatura PSR-4 del `composer.json`.
2. Compatibile con l'autoload di Composer, senza classmap manuali.
3. Uguale in tutti i moduli: chi conosce un modulo trova le Actions negli altri.
4. Facile da navigare: una cartella per area, un file per caso d'uso.
5. Lo stesso codice gira in modo sincrono o asincrono, scegliendolo al momento della chiamata.

## Documenti collegati

- [actions-path-convention.md](./actions-path-convention.md): convenzione dei percorsi, versione di questa cartella.
- [path-conventions.md](./path-conventions.md), [directory-structure-checklist.md](./directory-structure-checklist.md), [module-structure.md](./module-structure.md): struttura generale del modulo.
- [Queueable Actions, buone pratiche](../../best-practices/queueable-actions.md).
- [../../actions-structure.md](../../actions-structure.md): copia in radice dello stesso argomento, con il corpo ripetuto due volte (non toccata qui).

## Cronologia del documento

Questo testo sostituisce `actions-structure-1.md` e la precedente `actions-structure.md`. La seconda conteneva lo stesso corpo scritto due volte, una dopo l'altra, con due segnaposto diversi al posto del nome del progetto (`<main module>`, `<nome progetto>`) e una prima frase che cominciava con una virgola, senza soggetto: sono residui di una sostituzione automatica del nome. L'esempio di percorso corretto `Auth/LoginAction.php` non esiste nel codice ed e' stato sostituito con `Auth/ResendEmailVerificationAction.php`; l'esempio di codice che tipizzava `User` e restituiva `bool` e' stato sostituito con un'Action reale. Il vecchio `actions-structure-1.md` e' ritirato come `.md.old` in questa cartella.
