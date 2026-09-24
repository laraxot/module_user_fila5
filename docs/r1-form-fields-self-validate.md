---
title: "R1 religion — form fields self-validate, widget thin conductor (User module)"
type: religion
tags: [user, filament, widget, religion-r1, code, auth, register, opencode-minimax-m3]
created: 2026-06-05
updated: 2026-07-13
qmd: "r1 religion form fields self validate widget thin conductor user module register login auth opencode minimax"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/264"
  - "https://github.com/laraxot/module_user_fila5/issues/25"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/265"
  - "https://github.com/laraxot/module_user_fila5/discussions/26"
related:
  - ../../Xot/docs/xotbase-schemawidget-pattern.md
  - ../../Themes/Sixteen/docs/r2-ux-register-form-stacked-password.md
  - ../../../docs/chat/register-flow-religions-r1-r6.md
  - ../../../docs/wiki/memories/form-fields-self-validate-religion.md
  - WIDGET-RENDERING-ANALYSIS.md
---

# R1 religion — form fields self-validate, widget thin conductor (User module)

> Modulo: `User` · Autore code: opencode (MiniMax-M3) · Issue tracking: base #264

## La regola

**I campi del form si auto-validano e si auto-deidratano. Il widget è un conduttore sottile (5-10 LOC).**

❌ Vietato nel widget:
- `validateForm()` method
- `Hash::make` / `SafeStringCastAction` / `cast` in `submit()`
- wrapper Action per `Model::create()`
- `'type' => 'standard'` o altri magic values che parental/HasChildren cerca di istanziare

✅ Obbligatorio nella Form class:
- `->dehydrateStateUsing(static fn($s) => Hash::make($s))` sul campo `password`
- `->dehydrated(false)` su `password_confirmation`
- `->rules(['required', 'email', 'confirmed'])` oppure conferma via `password_confirmation` field

✅ Obbligatorio nel widget:
- `formClass() + schemaMethod()` pattern
- `submit()` thin: `$data = $this->form->getState(); $user = $userClass::create($data + defaults); Auth::login($user);`

## Implementazione

### `UserForm` unico (Resource — SSoT)

`laravel/Modules/User/app/Filament/Resources/UserResource/Schemas/UserForm.php`

Metodi FO auth (widget delegano con `formClass()` + `schemaMethod()`):

| Metodo | Widget |
|--------|--------|
| `getLoginFormSchema` | `LoginWidget` |
| `getRegisterFormSchema` | `RegisterWidget` |
| `getForgotPasswordFormSchema` | `ForgotPasswordWidget` |
| `getPasswordResetFormSchema` | `PasswordResetWidget` |
| `getResetPasswordFormSchema` | `ResetPasswordWidget` |
| `getPasswordResetConfirmFormSchema` | `PasswordResetConfirmWidget` |
| `getFormSchema` | `UserResource` (backoffice) |

**Vietato:** `Widgets/Auth/Schemas/UserForm.php` o altre classi `*Form` duplicate sotto `Widgets/`. La logica e una sola: il Resource schema e il contratto del modello User; i widget FO sono solo punti di accesso Livewire.

6 metodi statici FO, esempio register:

```php
public static function getRegisterFormSchema(): array
{
    return [
        'first_name' => TextInput::make('first_name')->required()->autofocus()->extraInputAttributes(['class' => 'fo-auth-input']),
        'last_name' => TextInput::make('last_name')->required()->extraInputAttributes(['class' => 'fo-auth-input']),
        'email' => TextInput::make('email')->required()->email()->unique(User::class, 'email'),
        'password' => TextInput::make('password')
            ->password()->revealable()->required()
            ->dehydrateStateUsing(static fn (?string $state): ?string => null === $state || '' === $state ? null : Hash::make($state))
            ->confirmed()
            ->extraInputAttributes(['class' => 'fo-auth-input fo-auth-input--password']),
        'password_confirmation' => TextInput::make('password_confirmation')
            ->password()->revealable()->required()->dehydrated(false)->same('password'),
    ];
}
```

**Punti chiave R1:**
- `password` → `dehydrateStateUsing(Hash::make(...))` + `dehydrated(true)` → arriva hashed al widget
- `password_confirmation` → `dehydrated(false)` → non arriva, server non lo vede
- NO `Grid(2)` → campi stacked verticali (R2 UX)

### Widget auth

| Widget | schemaMethod | Delega Resource `UserForm` |
|--------|--------------|----------------------------|
| `LoginWidget` | `getLoginFormSchema` | ✅ |
| `RegisterWidget` | `getRegisterFormSchema` | ✅ |
| `ForgotPasswordWidget` | `getForgotPasswordFormSchema` | ✅ |
| `PasswordResetWidget` | `getPasswordResetFormSchema` | ✅ |
| `ResetPasswordWidget` | `getResetPasswordFormSchema` | ✅ |
| `PasswordResetConfirmWidget` | `getPasswordResetConfirmFormSchema` | ✅ (`form()` override per `disabled` su stato UI) |

Import canonico: `Modules\User\Filament\Resources\UserResource\Schemas\UserForm`.

### `RegisterWidget::submit()` thin conductor

```php
public function submit(): void
{
    $data = $this->form->getState(); // GIÀ validato + deidratato (password hashed)
    $userClass = config('filament-companies.user_model', \Modules\User\Models\User::class);
    $user = $userClass::create($data + [
        'name' => trim($data['first_name'].' '.($data['last_name'] ?? '')),
        'email_verified_at' => null,
    ]);
    if (\Schema::hasTable('activity_log')) {
        activity()->causedBy($user)->log('register');
    }
    \Auth::login($user, true);
    session()->regenerate();
    redirect()->intended($this->getRedirectUrl());
}
```

**12 LOC totali** (era 35+ con validateForm + cast + hash + remap).

## Un solo `UserForm` (Resource)

| Path | Scope |
|------|-------|
| `Modules/User/Filament/Resources/UserResource/Schemas/UserForm.php` | **Unico SSoT** — `getFormSchema()` (BO) + `get*FormSchema()` (FO auth) |

**Regola:** i widget FO **delegano** al Resource `UserForm`; non esiste una seconda classe sotto `Widgets/Auth/Schemas/`.

## Dead code rimosso

- `laravel/Modules/User/app/Filament/Widgets/Auth/BaseAuthWidget.php` (mai esteso)
- `laravel/Modules/User/app/Filament/Widgets/Auth/Schemas/UserForm.php` (rimosso — duplicato vietato, SSoT unico in Resource)
- `laravel/Modules/User/app/Filament/Widgets/Auth/Schemas/RegisterUserForm.php` (duplicato)

## Verifica empirica

```bash
$ php -l laravel/Modules/User/app/Filament/Resources/UserResource/Schemas/UserForm.php
No syntax errors detected
$ php -l laravel/Modules/User/app/Filament/Widgets/Auth/RegisterWidget.php
No syntax errors detected
$ cd laravel && composer dump-autoload
Generated optimized autoload files containing 23276 classes
```

## Anti-pattern vietati (R1 religion)

❌ `validateForm()` method nel widget
❌ `$this->form->getState()` → poi `Hash::make` in widget
❌ Wrapper Action su `Model::create()` (es. `app(RegisterUserAction::class)->execute($data)`)
❌ `'type' => 'standard'` o magic values per `parental/HasChildren` (causa `Class "standard" not found`)
❌ Cast manuali in `submit()` (es. `(int) $data['age']`)
❌ Trasformazioni business in widget (es. calcolo `name` da `first_name + last_name`)

## Riferimenti

- Issue base: #264 (`STORY-144: R1 religion code work — XotBaseSchemaWidget base class + 6 auth widgets migrated`)
- Discussion base: #265 (`Filament R1 religion code: XotBaseSchemaWidget + 6 auth widgets — coordinate Codex/STORY-140 docs`)
- Story complementare: STORY-140 (Codex - GPT-5) — https://github.com/laraxot/base_fixcity_fila5/issues/248
- Cross-repo issue modulo: da aprire su `laraxot/module_user_fila5`
- WIDGET-RENDERING-ANALYSIS.md (questo modulo, da aggiornare con nuovo pattern)

---
*opencode (MiniMax-M3) · 2026-06-05*
