# 2026-09-16 — Second Brain: Modularizzazione Utente (User)

## ✅ Obiettivo
Ottimizzare il modulo User per:
- Ridurre ridondanza tra widget/form
- Riutilizzare componenti base (base form, base widget)
- Migliorare UX/UI con pattern coerenti
- Seguire principi Bmad (disciplina, tracciabilità)

## 🔍 Analisi Attuale

### Problemi Identificati:
1. **Ridondanza nei widget**: 
   - `LoginWidget`, `RegisterWidget`, `ProfileWidget` ripetono logiche per email, first_name, last_name
   - Form duplicati con regole di validazione simili

2. **Assenza di base comune**:
   - Mancanza di un `BaseUserForm` per gestire campi comuni
   - Widget duplicati con logica duplicata

3. **Pattern incoerente**:
   - Mix di Livewire e Filament senza standardizzazione
   - Widget senza form (solo display) vs widget con form

4. **Ridondanza UI/UX**:
   - Form non coerenti (es. password vs password_confirmation)
   - Mancanza di pattern standard per campi comuni

## 🛠️ Soluzione Proposta con Bmad

### 1. Creare BaseUserForm (Modulo User)
**File:** `laravel/Modules/User/app/Filament/Resources/Schemas/BaseUserForm.php`

```php
<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\Schemas;

<<<<<<< .merge_file_wdVM6T
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * Base condivisa per i widget di autenticazione del modulo User.
 *
 * Il comportamento comune (schema, stato, validazione e accessibilità) è
 * centralizzato in XotBaseSchemaWidget e nella Form class specifica del widget.
 * Le sottoclassi devono limitarsi all'orchestrazione dell'azione di dominio.
 */
abstract class BaseAuthWidget extends XotBaseSchemaWidget
{
=======
use Filament\Forms\Components\Component;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class BaseUserForm extends XotBaseResourceForm
{
    public function getFormSchema(): array
    {
        return [
            // Campi comuni per tutti i widget auth
            'email' => TextInput::make('email')
                ->required()
                ->email()
                ->autocomplete('email')
                ->extraInputAttributes(['class' => 'fo-auth-input']),
                
            'first_name' => TextInput::make('first_name')
                ->required()
                ->string()
                ->minLength(2)
                ->maxLength(255)
                ->autocomplete('given-name')
                ->extraInputAttributes(['class' => 'fo-auth-input']),
                
            'last_name' => TextInput::make('last_name')
                ->required()
                ->string()
                ->minLength(2)
                ->maxLength(255)
                ->autocomplete('family-name')
                ->extraInputAttributes(['class' => 'fo-auth-input']),
                
            'password' => TextInput::make('password')
                ->password()
                ->required()
                ->minLength(8)
                ->maxLength(255)
                ->extraInputAttributes(['class' => 'fo-auth-input']),
                
            'remember' => Checkbox::make('remember')
                ->label(__('user::login.fields.remember.label'))
                ->extraInputAttributes(['class' => 'fo-auth-checkbox']),
        ];
    }
>>>>>>> .merge_file_Amumyx
}
```

### 2. Creare Widget Base per Auth
**File:** `laravel/Modules/User/app/Filament/Widgets/Auth/BaseAuthWidget.php`

```php
<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use Filament\Schemas\Schema;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

abstract class BaseAuthWidget extends XotBaseSchemaWidget
{
    protected string $moduleName;
    
    public function __construct(string $moduleName = '')
    {
        $this->module_name = $module_name;
        parent::mount();
    }
    
    public function getFormSchema(): array
    {
        return $this->baseUserForm()->formSchema();
    }
    
    protected function baseUserForm(): ?string
    {
        return \Modules\User\Filament\Widgets\Auth\Schemas\UserForm::class;
    }
}