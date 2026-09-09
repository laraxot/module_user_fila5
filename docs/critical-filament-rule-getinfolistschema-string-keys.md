---
title: "Critical Filament Rule: getInfolistSchema String Keys"
type: rule
tags: [critical, filament, rule, getinfolistschema]
created: 2026-07-14
updated: 2026-07-14
qmd: "critical-filament-rule-getinfolistschema-string-keys critical filament rule: getinfolistschema string keys"
<<<<<<< HEAD
issues: ["https://github.com/provtv/<repo progetto>/issues/124"]
discussions: ["https://github.com/provtv/<repo progetto>/discussions/1"]
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

# Critical Filament Rule: getInfolistSchema String Keys

## The Rule
The `getInfolistSchema()` method must ALWAYS return an array with string keys. This is a fundamental requirement in the Filament + Laraxot architecture.

## Why This Rule Exists
- Filament's schema processing expects named components with string keys
- Component identification and lifecycle management depend on named keys
- Proper rendering and functionality require string-keyed arrays
- The XotBase architecture enforces this pattern for consistency

## Correct Implementation Pattern
```php
protected function getInfolistSchema(): array
{
    return [
        // String keys for sections
        'section_name' => Section::make('Section Title')
            ->schema([
                // String keys for fields within sections
                'field_name' => TextEntry::make('field')
                    ->copyable(),
            ]),
    ];
}
```

## Incorrect Implementation
```php
protected function getInfolistSchema(): array
{
    return [
        // WRONG: No string keys (numeric indices)
        Section::make('Section Title')  // This will cause issues
            ->schema([
                TextEntry::make('field')  // No named key
            ]),
    ];
}
```

## Architecture Context
Nel percorso Resource, lo schema appartiene alla classe dedicata
`Schemas/{Model}Infolist`, che estende `XotBaseResourceInfolist` e implementa
`public function getInfolistSchema(): array`. Le chiavi stringa restano la
convenzione del progetto per identificare i componenti.

Le pagine che estendono `XotBaseViewRecord` non devono dichiarare quel metodo:
`Filament\Resources\Pages\ViewRecord::infolist()` delega alla Resource, che
risolve la classe dedicata tramite `XotBaseResource::getInfolistClass()`.
Un override sulla pagina non modifica lo schema visualizzato.

Esempio verificato nella story [XOT-5.44](../../Xot/docs/stories/5.44.quality-gates-prompt-exec.story.md):
[ViewTeamUser](../app/Filament/Resources/TeamUserResource/Pages/ViewTeamUser.php)
dichiara solo la Resource; i campi visualizzati restano definiti in
[TeamUserInfolist](../app/Filament/Resources/TeamUserResource/Schemas/TeamUserInfolist.php).

## Impact
Following this rule ensures:
- Proper component rendering in Filament views
- Correct functionality of infolist features
- Consistency with Laraxot architectural patterns
- Compatibility with future updates
