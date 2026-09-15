---
title: "PHPStan Corrections - OAuth Resources"
type: concept
tags: [phpstan, corrections, oauth, resources]
created: 2026-07-14
updated: 2026-07-14
qmd: "phpstan-corrections-oauth-resources phpstan corrections - oauth resources"
<<<<<<< HEAD
<<<<<<< HEAD
issues: ["https://github.com/provtv/<repo progetto>/issues/124"]
discussions: ["https://github.com/provtv/<repo progetto>/discussions/1"]
=======
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
>>>>>>> laraxot/dev
=======
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
>>>>>>> laraxot/dev
related:
  - "./00-index-1.md"
  - "./00-index.md"
  - "./2fa-guide.md"
  - "./2fa.md"
  - "./accessor-delegation-pattern.md"
  - "./actions-path-convention-1.md"
  - "./actions-path-convention-2.md"
  - "./actions-path-convention.md"
---

# PHPStan Corrections - OAuth Resources

**Data**: 2025-01-22
**Status**: In Progress
**Versione**: 1.0.0

## Correzioni Applicate

### OauthAccessTokenResource.php

<<<<<<< HEAD
<<<<<<< HEAD
#### Correzioni Namespace Filament 5
=======
#### Correzioni Namespace Filament 4
>>>>>>> laraxot/dev
=======
#### Correzioni Namespace Filament 4
>>>>>>> laraxot/dev
- `Forms\Components\Section` → `Schemas\Components\Section`
- `Forms\Components\Grid` → `Schemas\Components\Grid`
- Rimossi tutti i `->label()` hardcoded

#### Correzioni Type Safety
- Tipizzato `$record` come `OauthAccessToken` invece di `mixed`
- Corretto accesso a `$user->exists` con `method_exists()` check
- Tipizzato `$state` in `formatStateUsing` per `Carbon`
- Usato `Safe\json_encode` per sicurezza

### OauthAuthCodeResource.php

<<<<<<< HEAD
<<<<<<< HEAD
#### Correzioni Namespace Filament 5
=======
#### Correzioni Namespace Filament 4
>>>>>>> laraxot/dev
=======
#### Correzioni Namespace Filament 4
>>>>>>> laraxot/dev
- Aggiunti import corretti: `Filament\Actions\*`
- Rimossi tutti i `->label()` hardcoded

#### Correzioni Type Safety
- Tipizzato `$state` in `formatStateUsing` per `Str::limit()`
- Corretto `json_encode` unsafe usage con `Safe\json_encode`

### OauthRefreshTokenResource.php

<<<<<<< HEAD
<<<<<<< HEAD
#### Correzioni Namespace Filament 5
=======
#### Correzioni Namespace Filament 4
>>>>>>> laraxot/dev
=======
#### Correzioni Namespace Filament 4
>>>>>>> laraxot/dev
- `Filament\Tables\Actions\*` → `Filament\Actions\*`
- Rimossi tutti i `->label()` hardcoded
- Rimosso `->helperText()` hardcoded

### OauthClientResource.php

#### Correzione Type di `$navigationIcon`
<<<<<<< HEAD
<<<<<<< HEAD
- Problema: PHP 8.3 richiede che il tipo di `$navigationIcon` nella resource sia compatibile con `Filament\Resources\Resource`, che in Filament 5 usa `BackedEnum|string|null`.
- Correzione prevista: aggiornare la property in `OauthClientResource` per usare il tipo `BackedEnum|string|null`, mantenendo il valore stringa esistente (`'heroicon-o-key'`).
- Motivazione: allineare la firma al contratto Filament 5 e garantire compatibilità futura con possibili enum di icone, senza cambiare la UI.
=======
- Problema: PHP 8.3 richiede che il tipo di `$navigationIcon` nella resource sia compatibile con `Filament\Resources\Resource`, che in Filament 4 usa `BackedEnum|string|null`.
- Correzione prevista: aggiornare la property in `OauthClientResource` per usare il tipo `BackedEnum|string|null`, mantenendo il valore stringa esistente (`'heroicon-o-key'`).
- Motivazione: allineare la firma al contratto Filament 4 e garantire compatibilità futura con possibili enum di icone, senza cambiare la UI.
>>>>>>> laraxot/dev
=======
- Problema: PHP 8.3 richiede che il tipo di `$navigationIcon` nella resource sia compatibile con `Filament\Resources\Resource`, che in Filament 4 usa `BackedEnum|string|null`.
- Correzione prevista: aggiornare la property in `OauthClientResource` per usare il tipo `BackedEnum|string|null`, mantenendo il valore stringa esistente (`'heroicon-o-key'`).
- Motivazione: allineare la firma al contratto Filament 4 e garantire compatibilità futura con possibili enum di icone, senza cambiare la UI.
>>>>>>> laraxot/dev

### ListOauthClients.php

#### Correzioni Type Safety & Firma Metodo
- Problema: `getHeaderActions()` dichiarato come `array<int, ActionInterface>` con ritorno numerico, non compatibile con `XotBaseListRecords::getHeaderActions()`.
- Correzione: usare firma e tipo compatibili con la classe base, restituendo **array associativi con chiavi stringa** e azioni concrete.
- Esempio applicato:

```php
/**
 * @return array<string, \Filament\Actions\Action>
 */
protected function getHeaderActions(): array
{
    return [
        'create' => CreateAction::make(),
    ];
}
```

## 🎯 Pattern Applicati

<<<<<<< HEAD
<<<<<<< HEAD
### Pattern 1: Namespace Filament 5
=======
### Pattern 1: Namespace Filament 4
>>>>>>> laraxot/dev
=======
### Pattern 1: Namespace Filament 4
>>>>>>> laraxot/dev
```php
// ❌ ERRATO - Filament 3
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\DeleteAction;

<<<<<<< HEAD
<<<<<<< HEAD
// ✅ CORRETTO - Filament 5
=======
// ✅ CORRETTO - Filament 4
>>>>>>> laraxot/dev
=======
// ✅ CORRETTO - Filament 4
>>>>>>> laraxot/dev
use Filament\Schemas\Components\Section;
use Filament\Actions\DeleteAction;
```

### Pattern 2: Rimozione Label Hardcoded
```php
// ❌ ERRATO
TextColumn::make('name')->label('Name')

// ✅ CORRETTO
TextColumn::make('name')
```

### Pattern 3: Type Safety per Record
```php
// ❌ ERRATO
->url(function (mixed $record): ?string {
    $user = $record->user;
})

// ✅ CORRETTO
->url(function (mixed $record): ?string {
    if (! $record instanceof OauthAccessToken) {
        return null;
    }
    $user = $record->user;
})
```

## 📚 Riferimenti

<<<<<<< HEAD
<<<<<<< HEAD
- [Filament 5 Migration Guide](../../xot/docs/Filament-5-migration-guide.md)
- [PHPStan Errors Philosophy](./phpstan-errors-philosophy.md)
- [Filament 5 Actions Namespace](./Filament-5-actions-namespace.md)
=======
- [Filament 4 Migration Guide](../../xot/docs/filament-4-migration-guide.md)
- [PHPStan Errors Philosophy](./phpstan-errors-philosophy.md)
- [Filament 4 Actions Namespace](./filament-4-actions-namespace.md)
>>>>>>> laraxot/dev
=======
- [Filament 4 Migration Guide](../../xot/docs/filament-4-migration-guide.md)
- [PHPStan Errors Philosophy](./phpstan-errors-philosophy.md)
- [Filament 4 Actions Namespace](./filament-4-actions-namespace.md)
>>>>>>> laraxot/dev

---

