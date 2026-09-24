---
description:
globs:
alwaysApply: false
---
# Linee guida per l'uso di Spatie Queueable Action

## Introduzione
Utilizzare sempre [spatie/laravel-queueable-action](mdc:https:/github.com/spatie/laravel-queueable-action) per la business logic asincrona e sincrona nei moduli. Non utilizzare mai Service custom.

## Vantaggi
- Uniformità architetturale
- Supporto nativo a queue, chaining, tagging, middleware, backoff
- Costruttore con dependency injection
- Maggiore testabilità e riusabilità

## Esempio base
```php
use Spatie\QueueableAction\QueueableAction;

class ApproveUserAction
{
    use QueueableAction;
    public function execute(User $user): void
    {
        $user->state = 'approved';
        $user->save();
    }
}

// Esecuzione
app(ApproveUserAction::class)->execute($user); // sincrona
app(ApproveUserAction::class)->onQueue()->execute($user); // asincrona
```

## Checklist di implementazione
- [ ] Usare SEMPRE le Actions per la business logic
- [ ] Non creare mai Service custom
- [ ] Usare dependency injection nel costruttore
- [ ] Scrivere test per ogni Action
- [ ] Documentare ogni Action con PHPDoc

## Testing
```php
use Spatie\QueueableAction\Testing\QueueableActionFake;
Queue::fake();
app(ApproveUserAction::class)->onQueue()->execute($user);
QueueableActionFake::assertPushed(ApproveUserAction::class);
```

## `app/Support/` eliminata (2026-07-12)

Il modulo User **non ha più** una cartella `app/Support/`. Tutto quello che vi abitava
(`AuthenticationLogQuery`, `Utils` (filament-shield), `NotificationSchema`,
`Otp/Hasher`, `Socialite/Utils/{EmailDomainAnalyzer,UserNameFieldsResolver}`) è stato
convertito in QueueableAction dentro `app/Actions/`:

| Vecchio (`Support/`) | Nuovo (`Actions/`) |
|---|---|
| `AuthenticationLogQuery::forAuthenticatable()` | `Actions/Authentication/GetAuthenticationLogQueryForAuthenticatableAction` |
| `Utils::getPermissionModel()` (e resto, dead) | `Actions/GetPermissionModelAction` |
| `NotificationSchema::isReadable()` | `Actions/Notification/IsNotificationSchemaReadableAction` |
| `Otp/Hasher` (make/check/needsRehash) | `Actions/Otp/{HashOtpValueAction,VerifyOtpHashAction,OtpHashNeedsRehashAction}` |
| `Socialite/Utils/EmailDomainAnalyzer` | `Actions/Socialite/AnalyzeSocialiteEmailDomainAction` |
| `Socialite/Utils/UserNameFieldsResolver` | `Actions/Socialite/ResolveUserNameFieldsFromSocialiteAction` |

Regola per questo modulo: **nessuna eccezione** — anche gli adapter/wrapper multi-metodo
vanno in `Actions/` con `use QueueableAction` ed `execute()` come entry point primario,
non in `Support/`. Vedi [action-pattern.md](../../../docs/wiki/guidelines/action-pattern.md).

## Collegamenti correlati
- [README User](mdc:readme.md)
- [Best Practices](mdc:best-practices.md)
- [Filament Best Practices](mdc:filament-best-practices.md)
- [Testing](mdc:testing.md)
- [Documentazione centrale](mdc:../../../../../docs/index.md)

