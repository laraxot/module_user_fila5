---
title: "Topic filament-4"
type: digest
status: active
qmd: "digest ceiling 100 filament-4"
---

# Topic filament-4

Sintesi automatica di 3 documenti (chiave `filament-4`).

## Filament 4: Namespace Actions - Filosofia Laraxot

_Fonte: `filament-4-actions-namespace.md`_

# Filament 4: Namespace Actions - Filosofia Laraxot

**Data Creazione**: 2025-01-22
**Status**: Documentazione Completa
**Versione**: 1.0.0

## 🏛️ Comandamento Sacro: Namespace Filament 4

### Principio Fondamentale

**"In Filament 4, tutte le Actions sono in `Filament\Actions\*`, NON in `Filament\Tables\Actions\*`"**

Questo non è un suggerimento, è un **COMANDAMENTO** della religione Laraxot.

## 🧠 Logica (Logic)

### Perché il Cambiamento

Filament 4 ha unificato il namespace delle Actions per:
1. **Semplicità**: Un solo namespace per tutte le actions
2. **Coerenza**: Actions usabili ovunque (tables, forms, pages)
3. **Manutenibilità**: Codice più pulito e organizzato

### Manifestazione nel Codice

```php
// ✅ CORRETTO - Filament 4
use Filament\Actions\AttachAction;
use Filament\Actions\DetachAction;

## Guida Rendering Widget Filament 4 - Modulo User

_Fonte: `filament-4-widget-rendering-guide.md`_

# Guida Rendering Widget Filament 4 - Modulo User

**Data**: 14 Ottobre 2025  
**Modulo**: User  
**Framework**: Filament 4.x + Laraxot

## 🎯 Obiettivo

Questa guida spiega **PERCHÉ** e **COME** renderizzare correttamente i widget Filament 4 nelle view Blade, con focus sul LoginWidget.

## 📊 Il Problema

### Sintomo
```blade
@livewire(\Modules\User\Filament\Widgets\Auth\LoginWidget::class)
```

Il widget viene caricato ma **il form non appare**.

### Causa Root

Filament 4 ha cambiato l'architettura dei widget rispetto a Filament 3:

1. **Widget ≠ Livewire Component Standalone**: Un widget Filament 4 NON è un semplice componente Livewire
2. **Richiede Wrapper Specifici**: Deve essere wrappato in componenti Filament
3. **Form Rendering Esplicito**: Il form deve essere renderizzato esplicitamente con `{{ $this->form }}`

## ✅ Soluzione Corretta

## Guida Rendering Widget Filament 4 - Modulo User

_Fonte: `filament-4-widget-rendering.md`_

# Guida Rendering Widget Filament 4 - Modulo User

**Modulo**: User  
**Framework**: Filament 4.x + Laraxot

## 🎯 Obiettivo

Questa guida spiega **PERCHÉ** e **COME** renderizzare correttamente i widget Filament 4 nelle view Blade, con focus sul LoginWidget.

## 📊 Il Problema

### Sintomo
```blade
@livewire(\Modules\User\Filament\Widgets\Auth\LoginWidget::class)
```

Il widget viene caricato ma **il form non appare**.

### Causa Root

Filament 4 ha cambiato l'architettura dei widget rispetto a Filament 3:

1. **Widget ≠ Livewire Component Standalone**: Un widget Filament 4 NON è un semplice componente Livewire
2. **Richiede Wrapper Specifici**: Deve essere wrappato in componenti Filament
3. **Form Rendering Esplicito**: Il form deve essere renderizzato esplicitamente con `{{ $this->form }}`

## ✅ Soluzione Corretta

### 1. Struttura Widget PHP
