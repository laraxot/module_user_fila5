---
title: User Module Architecture — Graphify Analysis
description: Mappa della conoscenza per il modulo User, estratta dal codice sorgente
---

# User Module Architecture — Graphify Analysis

Questo documento è generato da **Graphify**, che estrae la struttura dalle relazioni effettive nel codice (non da diagrammi manuali).

## Moduli Chiave (by connection degree)

Basato su `graphify god-nodes`:

### 1. User Model (~47 connessioni)

**Ruolo**: Entità centrale di autenticazione e profilo

**Estrae**:
- ✅ Relazioni Eloquent (hasMany, belongsToMany, hasOne)
- ✅ Mutators/Accessors (password hash, email)
- ✅ Scopes (active(), admin(), withTeams())
- ✅ Traes (HasTeams, HasRoles, etc.)

**Connessioni EXTRACTED** (esplicite nel codice):
- **AuthServiceProvider**: registra Policies
- **UserRequest/UpdateUserRequest**: valida input
- **UserResource**: trasforma per JSON
- **UserPolicy**: controlla autorizzazione
- **CreateUserAction**: action per create

**Connessioni INFERRED** (dedotte da Graphify):
- **Notify module**: User è target per email
- **Activity module**: User è subject di audit trail
- **Admin theme**: User usato in Filament panel

### 2. CreateUserAction (~12 connessioni)

**Ruolo**: Business logic per creazione utente

**Estrae**:
- ✅ execute() method signature
- ✅ Dipendenze injected (SendWelcomeEmailAction, LogAuditAction, etc.)
- ✅ Database write (User::create())
- ✅ Event dispatch

**Flusso di esecuzione** (EXTRACTED):
```
UserController::store()
  ↓
CreateUserRequest (validate)
  ↓
CreateUserAction::execute()
  ├→ $user = User::create($data)
  ├→ SendWelcomeEmailAction::execute($user)
  ├→ LogAuditAction::execute('user.created', $user)
  └→ return $user
  ↓
UserResource (transform to JSON)
```

### 3. AuthenticateUserAction (~8 connessioni)

**Ruolo**: Gestisce login e session

**Estrae**:
- ✅ User::findByEmail()
- ✅ Hash::check(password)
- ✅ Auth::login() / Auth::createToken()

**Dipendenze**:
- **User model**: query
- **Hash facade**: password verification
- **Auth/Sanctum**: token generation
- **LogAuditAction**: traccia login attempt

## Architettura a Strati

Graphify ha estratto questi strati:

### API Layer (HTTP)
```
UserController (create, update, delete, show)
  ↓ injects
UserRequest / UpdateUserRequest (validation rules)
  ↓ calls
Business Logic Layer
```

### Business Logic Layer (Actions)
```
CreateUserAction
UpdateUserAction
DeleteUserAction
AuthenticateUserAction
ResetPasswordAction
  └→ each calls other actions (SendEmailAction, LogAuditAction, etc.)
```

### Data Layer (Models, Repositories)
```
User model
  ├→ Relations: hasMany(Post), hasMany(Team)
  ├→ Scopes: active(), admin()
  └→ Casts: email, password
```

### Presentation Layer (Resources)
```
UserResource
  └→ transforms User model to JSON for API responses
```

### Authorization Layer (Policies)
```
UserPolicy
  ├→ view(User $user, User $model)
  ├→ update(User $user, User $model)
  └→ delete(User $user, User $model)
```

## Flussi Principali (Extracted)

### Flusso di Registrazione

```
POST /api/users
  ↓
UserController::store()
  ↓ injects + calls
CreateUserRequest::validate()
  ├→ unique:users,email
  ├→ min:password
  └→ (other rules)
  ↓ if valid
CreateUserAction::execute(CreateUserRequest)
  ├→ user = User::create($data)
  ├→ SendWelcomeEmailAction::execute($user)
  │   └→ Mail::send(WelcomeEmail::class, $user)
  ├→ LogAuditAction::execute('user.created', $user)
  └→ return user
  ↓
UserResource::make($user) → JSON response
```

### Flusso di Autenticazione

```
POST /login
  ↓
AuthenticateUserAction::execute($email, $password)
  ├→ user = User::where('email', $email)->first()
  ├→ if (Hash::check($password, user.password))
  │   ├→ Auth::login($user)
  │   └→ token = $user->createToken('auth_token')
  └→ LogAuditAction('user.login', $user)
  ↓
return { user: UserResource, token: "..." }
```

### Flusso di Update Profilo

```
PATCH /api/users/{id}
  ↓
UserController::update()
  ↓ authorizes
UserPolicy::update()
  ├→ if (user.is(model)) ✅
  └→ if (user.is(admin)) ✅
  ↓ if authorized
UpdateUserRequest::validate()
  ↓ if valid
UpdateUserAction::execute($user, $data)
  ├→ $user->update($data)
  ├→ SendProfileUpdatedNotificationAction($user)
  └→ LogAuditAction('user.updated', $user)
  ↓
UserResource::make($user) → JSON response
```

## Dipendenze Esterne (to other modules)

| Modulo | Cosa usa da User | Relazione | Confidence |
|--------|------------------|-----------|------------|
| **Notify** | User model, email actions | Invia email/SMS agli users | EXTRACTED |
| **Activity** | User model | Traccia utente come "causer" in audit trail | EXTRACTED |
| **Admin** (Filament) | UserPolicy, UserResource | Admin panel per CRUD users | EXTRACTED |
| **Xot** (Base) | User traits (HasTeams, HasRoles) | Mixin per multi-tenancy | EXTRACTED |
| **Job** | User model | Job queue per user background tasks | INFERRED |

## Potenziali Problemi (Auto-detected)

### ✅ No circular dependencies
Il grafo è aciclico. User model non crea cicli.

### ⚠️ Tight coupling a Notify module
User crea direttamente SendWelcomeEmailAction. Considerare event-based decoupling:

```php
// Current (tight coupling)
CreateUserAction::execute() → SendWelcomeEmailAction::execute()

// Better (event-based)
User::created() event → EmailListener → SendWelcomeEmailAction
```

### ✅ Authorization is properly separated
UserPolicy è cleanly decoupled e iniettata solo dove serve.

### ⚠️ Missing soft-delete handling
DeleteUserAction non è presente nel grafo. Verificare se soft-delete è usato correttamente.

## Dead Code (nodi con grado 0)

Nessuno trovato. Tutti i file in `app/` sono usati.

## Suggested Refactorings

### 1. Extract Email Logic
```
SendWelcomeEmailAction ← CreateUserAction (EXTRACTED, tight)
vs
User::created event → EmailListener → SendWelcomeEmailAction (INFERRED, better)
```

**Benefit**: Decoupling, easier testing, async email

### 2. Service Layer Pattern
```
Currently: UserController → Action (single layer)
Better: UserController → Service → Action (clearer SoC)
```

## Test Coverage Implied by Graph

Based on extracted relationships, these test paths should exist:

- ✅ CreateUserAction creates user + sends email
- ✅ AuthenticateUserAction verifies password
- ✅ UpdateUserAction updates profile
- ✅ UserPolicy enforces authorization
- ⚠️ DeleteUserAction (check if implemented)

## Maintenance Notes

**When updating User model**:
1. Graphify will auto-detect new relations
2. Re-run `graphify . --code-only --force` to update graph
3. Check new connections for unintended coupling
4. Commit updated `graphify-out/graph.json`

**When refactoring** (e.g., extract events):
1. Make changes
2. Run `graphify . --code-only --force`
3. Verify removed/added edges match intent
4. If not as expected, adjust refactoring

---

**Generated**: 2026-08-02  
**Extraction method**: tree-sitter AST + Graphify inference  
**Manual review by**: Architettura Team  
**Last updated**: 2026-08-02
