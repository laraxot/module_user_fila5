---
<<<<<<< HEAD
title: "User Module Documentation"
type: documentation
tags: [module, documentation]
created: 2026-06-05
updated: 2026-07-27
---

# Modulo User - Documentazione Completa

## Overview

Il modulo **User** gestisce l'autenticazione, l'autorizzazione e la gestione utenti completa nel sistema [PROJECT_NAME] platform.

## Funzionalità Principali

### Autenticazione
- Login multi-tenant
- Gestione sessioni sicure
- Two-factor authentication (opzionale)

### Autorizzazione
- RBAC (Role-Based Access Control) via Spatie Permission
- Teams e Tenant isolation
- Policy Filament integrate

### Modelli

```php
// User base model
Modules\User\Models\User extends BaseModel

// Team management
Modules\User\Models\Team

// Tenant isolation
Modules\User\Models\Tenant
```

## Trait Disponibili

| Trait | Scopo | Requisiti |
|-------|-------|-----------|
| `HasTeams` | Gestione team multipli | `HasRoles` |
| `HasTenants` | Multi-tenancy Filament | `HasRoles` |
| `HasAuthenticationLogTrait` | Logging autenticazioni | - |

## Collegamenti

- [Documentazione Root](../../../docs/USER_MODULE.md)
- [Regole Trait](./traits.md)
- [Filament Resources](./filament/)

## Backlinks

- [Xot Base](../Xot/docs/)
- [Tenant Module](../Tenant/docs/)
- [UI Components](../UI/docs/)

## Architectural Rules — Violations Fixed

### Module Directory Structure Standard
In compliance with the [Global Rule](../../../docs/wiki/rules/module-root-php-folders-forbidden.md), all root-level capitalized directories (`Actions/`, `Application/`, `Database/`, `Events/`, `Listeners/`) have been moved into `app/` or renamed to lowercase `database/`.
- **app/**: Home for all PHP functional code (mapped via PSR-4).
- **database/**: Strictly lowercase for migrations/factories/seeders.

### PHPStan Memory Management
Per evitare crash dei parallel workers su analisi massive, usare sempre:
`php -d memory_limit=-1 ./vendor/bin/phpstan analyse [target] --memory-limit=-1`

### Profiles migration governance (workorder)

**Owner schema = WorkOrder** (`main_module`), non User:

- [profile-schema-ownership.md](../WorkOrder/docs/profile-schema-ownership.md)
- [wiki/concepts/profile-migration-uuid-contract.md](./wiki/concepts/profile-migration-uuid-contract.md)
- Migrazione canonica: `WorkOrder/database/migrations/2026_07_27_111500_create_profiles_table.php`
- Duplicati User archiviati in `database/migrations/_bak/*.merged`

### Spatie Permission — `table_names` intoccabile

- `laravel/config/permission.php` → nomi pivot **singolari** (`model_has_role`, …)
- Vietato modificare `table_names` o hardcodare nomi tabella in migrazioni/modelli
- [wiki/concepts/spatie-permission-table-names.md](./wiki/concepts/spatie-permission-table-names.md)
- [wiki/concepts/spatie-permission-migration-no-table-name.md](./wiki/concepts/spatie-permission-migration-no-table-name.md)

### No Log calls in production code
`Log::info()`, `Log::debug()`, `Log::error()` are forbidden in Actions, Models, Services, and Widgets.
Found and removed from `RegisterWidget`. Laravel logs unhandled exceptions automatically.
See: [no-log-in-production.md](./no-log-in-production.md)

### Git merge conflicts in migrations
46 migration files in `database/migrations/` had unresolved conflict markers .
These break PHP syntax and halt PHPStan entirely. All were resolved.
Rule: never commit files with conflict markers. Fix immediately when found.

## Requisiti

- PHP 8.3+
- Laravel 11/12
- Spatie Laravel Permission
- Filament v5


## Standard Rules & Workflow

- [[BMAD Method](../../../../docs/wiki/concepts/bmad-method.md)]
- [[Context Engineering](../../../../docs/wiki/concepts/context-engineering.md)]
- [[LLM Wiki Governance](../../../../docs/wiki/concepts/llm-wiki-governance.md)]

## Documentation

- [On-Demand Pattern](./on-demand-pattern.md) — Pattern per caricamento efficiente
- [QMD Setup](./qmd-setup.md) — Configurazione ricerca locale
- [Performance](./performance-optimization.md) — Metriche e best practice
- [Project Structure](./project-structure.md) — Directory layout

---

<!-- Merged from readme.md, which collided with this file on case-insensitive filesystems. -->

---
title: "User Module - Authentication & Authorization"
type: concept
tags: [readme]
created: 2026-07-14
updated: 2026-07-14
qmd: "readme user module - authentication & authorization"
issues: ["https://github.com/provtv/<nome repository>/issues/124"]
discussions: ["https://github.com/provtv/<nome repository>/discussions/1"]
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

# User Module - Authentication & Authorization

**Last Update**: 2025-12-05
**Status**: ✅ Production Ready
**PHPStan Level**: 10
**Maintainers**: Laraxot Team

---

## 📋 Table of Contents

- [Business Overview](#-business-overview)
- [Architecture](#-architecture)
- [Core Components](#-core-components)
- [Quick Start](#-quick-start)
- [Development Guide](#-development-guide)
- [Security](#-security)
- [API & Integration](#-api--integration)
- [Testing](#-testing)
- [Documentation Index](#-documentation-index)

---

## 🏆 PHPStan Level 10 Compliance

**Status**: ✅ **0 Errori** (10 → 0)
**Data Achievement**: Dicembre 15, 2025
**Approccio**: Fix, Don't Ignore

### Metriche Achievement
- **Errori Iniziali**: 10
- **Errori Finali**: 0
- **File Modificati**: 1
- **Pattern Applicati**: Collection covariance fix

### Scoperta Tecnica: Collection Covariance

**Problema**: PHPStan strict covariance checking per Collection generics
**File**: IsProfileTrait.php - metodo `getMobileDeviceTokens()`

#### Fix Applicato
```php
// PRIMA
/**
 * @return Collection<int|string, string>
 */
public function getMobileDeviceTokens(): Collection
{
    $tokens = $this->mobileDeviceUsers()
        ->pluck('token')
        ->filter(static fn (mixed $value): bool => is_string($value) && '' !== $value)
        ->map(static fn (mixed $value): string => (string) $value);
    /* @var Collection<int|string, string> $tokens */
    return $tokens;
}

// DOPO
/**
 * @return Collection<int|string, non-empty-string>
 */
public function getMobileDeviceTokens(): Collection
{
    $tokens = $this->mobileDeviceUsers()
        ->pluck('token')
        ->filter(static fn (mixed $value): bool => is_string($value) && '' !== $value)
        ->map(static fn (mixed $value): string => (string) $value);
    /** @var Collection<int|string, non-empty-string> $tokens */
    return $tokens;
}
```

### Spiegazione Tecnica

**Root Cause**: Dopo `filter()` che rimuove stringhe vuote, PHPStan inferisce `non-empty-string`

**Covarianza**: `Collection<T>` è covariante in `T`, quindi:
- `Collection<int|string, non-empty-string>` **NON È** `Collection<int|string, string>`
- Ritornare `non-empty-string` quando dichiarato `string` viola covarianza

**Soluzione**: Allineare il return type PHPDoc al tipo inferito dopo il filter

### Lessons Learned
1. **Collection Generics**: PHPStan traccia precisamente i tipi attraverso operazioni Collection
2. **Covariance Matters**: Tipi dichiarati devono matchare esattamente i tipi inferiti
3. **Filter Narrows Types**: `filter()` che rimuove valori falsy produce `non-empty-string`
4. **PHPDoc Precision**: Usare `non-empty-string` quando appropriato, non solo `string`

### Documentazione Correlata
- [PHPStan Level 10 Success](../../../docs/phpstan-level-10-success.md) - Achievement generale progetto
- [Xot PHPStan Patterns](../../Xot/docs/phpstan-patterns-dec-2025.md) - Pattern comuni

---

## 🎯 Business Overview

### Purpose
The **User Module** provides comprehensive user management, authentication, and authorization infrastructure for the Laraxot PTVX ecosystem. It implements:
- **Multi-Authentication**: Support for multiple authentication methods (credentials, OAuth, SSO)
- **Role-Based Access Control**: Advanced permission system using Spatie Laravel Permission
- **Multi-Tenancy**: Complete tenant isolation and management
- **Team Collaboration**: Team-based user organization
- **Profile Management**: Flexible user profile system
- **Security Auditing**: Authentication logging and security monitoring

### Key Features
- **Flexible User Model**: BaseUser with Single Table Inheritance (STI) support
- **Advanced Permissions**: Granular role and permission management
- **OAuth Integration**: Social login (Google, Facebook, GitHub, etc.)
- **SSO Support**: Single Sign-On provider integration
- **Device Management**: Track and manage user devices
- **Authentication Logging**: Complete audit trail of login attempts
- **Password Security**: Advanced password policies and reset flows
- **Multi-Tenancy**: Tenant isolation with user-tenant associations

### Target Users
- **System Administrators**: Manage users, roles, and permissions
- **Application Users**: End users accessing the application
- **Team Managers**: Manage team members and collaborations
- **Tenant Administrators**: Manage tenant-specific users and settings
- **Security Officers**: Monitor authentication and security events

---

## 🏗️ Architecture

### Module Dependencies

```
User Module
├── Xot Module (Foundation) - REQUIRED
│   ├── XotBaseModel (Model foundation)
│   ├── XotBaseResource (Filament resources)
│   └── Core patterns and traits
├── Activity Module (Recommended)
│   └── User activity tracking
├── Lang Module (Recommended)
│   └── Translation and localization
└── Tenant Module (Optional)
    └── Enhanced multi-tenancy features
```

### Technology Stack
- **Laravel**: 12.x
- **Filament**: 4.x (for admin UI)
- **Spatie Laravel Permission**: 6.x
- **Laravel Sanctum**: API authentication
- **Laravel Socialite**: OAuth providers
- **PHP**: 8.3+
- **PHPStan**: Level 10

### Directory Structure

```
User/
├── app/
│   ├── Actions/              # Business actions
│   │   ├── Auth/             # Authentication actions
│   │   ├── User/             # User management actions
│   │   └── Team/             # Team management actions
│   ├── Events/               # Domain events
│   │   ├── UserCreated.php
│   │   ├── UserLoggedIn.php
│   │   └── PermissionGranted.php
│   ├── Filament/             # Filament resources
│   │   ├── Resources/        # User, Role, Team, Tenant resources
│   │   ├── Pages/            # Custom pages (EditProfile, etc.)
│   │   └── Widgets/          # User stats, security alerts
│   ├── Models/               # Eloquent models
│   │   ├── User.php          # Main user model
│   │   ├── BaseUser.php      # Base user class
│   │   ├── Profile.php       # User profile
│   │   ├── Role.php          # User roles
│   │   ├── Permission.php    # Permissions
│   │   ├── Team.php          # Teams
│   │   ├── Tenant.php        # Tenants
│   │   ├── Device.php        # User devices
│   │   └── AuthenticationLog.php  # Login audit
│   ├── Policies/             # Authorization policies
│   ├── Providers/            # Service providers
│   └── Services/             # Business logic services
│       ├── AuthService.php
│       ├── PermissionService.php
│       └── TenantService.php
├── database/
│   ├── migrations/           # Database migrations
│   └── seeders/              # Database seeders
├── docs/                     # Documentation
└── tests/                    # Tests
    ├── Feature/              # Feature tests
    └── Unit/                 # Unit tests
```

---

## 🔧 Core Components

### Models

#### User / BaseUser
**Purpose**: Core user model with authentication and authorization

**Key Features**:
- Single Table Inheritance (STI) support for different user types
- Integration with Spatie Laravel Permission
- Multi-tenancy support
- Team membership
- Device tracking
- OAuth connections

**Relationships**:
```php
// Core relationships
- hasOne(Profile::class)
- belongsToMany(Team::class)
- belongsToMany(Tenant::class)
- belongsToMany(Role::class)
- hasMany(Permission::class)
- hasMany(Device::class)
- hasMany(AuthenticationLog::class)
- hasMany(SocialProvider::class)
```

**Key Methods**:
```php
// Authorization
$user->hasRole('admin');
$user->can('edit-posts');
$user->givePermissionTo('edit-posts');

// Teams
$user->teams;
$user->currentTeam;
$user->switchTeam($team);

// Tenants
$user->tenant;
$user->switchTenant($tenant);

// Devices
$user->devices;
$user->revokeDevice($deviceId);
```

#### Profile / BaseProfile
**Purpose**: Extended user information and preferences

**Key Features**:
- Flexible schema using schemaless attributes
- Avatar management
- Preferences storage
- Localization settings

**Relationships**:
```php
- belongsTo(User::class)
- belongsToMany(Team::class)
```

#### Role
**Purpose**: User role definition with permissions

**Key Features**:
- Hierarchical roles support
- Permission association
- Scope management

**Relationships**:
```php
- belongsToMany(User::class)
- belongsToMany(Permission::class)
```

#### Permission
**Purpose**: Granular permission definition

**Key Features**:
- Action-based permissions
- Resource-based permissions
- Permission groups

**Relationships**:
```php
- belongsToMany(Role::class)
- belongsToMany(User::class) // Direct permissions
```

#### Team / BaseTeam
**Purpose**: Team collaboration and grouping

**Key Features**:
- Team ownership
- Member management
- Team invitations
- Role assignment within teams

**Relationships**:
```php
- belongsTo(User::class, 'user_id') // Team owner
- belongsToMany(User::class)
- hasMany(TeamInvitation::class)
```

#### Tenant / BaseTenant
**Purpose**: Multi-tenancy isolation

**Key Features**:
- Data isolation per tenant
- Tenant-specific configurations
- User-tenant associations

**Relationships**:
```php
- belongsToMany(User::class)
- hasMany(Team::class)
```

#### AuthenticationLog
**Purpose**: Security audit trail of login attempts

**Key Features**:
- Login success/failure tracking
- Device fingerprinting
- IP address logging
- User agent tracking

**Relationships**:
```php
- belongsTo(User::class)
```

#### Device / DeviceUser
**Purpose**: User device management and tracking

**Key Features**:
- Device registration
- Device verification
- Push notification support
- Device revocation

**Relationships**:
```php
- belongsToMany(User::class)
- belongsToMany(Profile::class)
```

### Filament Resources

#### UserResource
**Purpose**: Complete CRUD interface for user management

**Features**:
- User creation and editing
- Role and permission assignment
- Profile management
- Password management
- Team membership management
- Account status management

**Permissions Required**:
- `view_user`: View user list
- `create_user`: Create new users
- `edit_user`: Edit existing users
- `delete_user`: Delete users

#### RoleResource
**Purpose**: Role management interface

**Features**:
- Role creation and editing
- Permission assignment
- User assignment to roles
- Role hierarchy management

#### PermissionResource
**Purpose**: Permission management interface

**Features**:
- Permission creation
- Permission grouping
- Role assignment

#### TeamResource
**Purpose**: Team management interface

**Features**:
- Team creation and editing
- Member management
- Team invitations
- Team permissions

#### TenantResource
**Purpose**: Tenant management interface

**Features**:
- Tenant creation and configuration
- User assignment to tenants
- Tenant isolation settings

### Widgets & Pages

#### LoginWidget
**Purpose**: Multi-method login form

**Features**:
- Username/password login
- Social login buttons
- Remember me functionality
- Password reset link

#### UserStatsWidget
**Purpose**: Dashboard statistics for users

**Features**:
- Total users count
- New users this week/month
- Active users
- User growth charts

#### SecurityAlertsWidget
**Purpose**: Security monitoring dashboard

**Features**:
- Failed login attempts
- Suspicious activities
- Account lockouts
- Recent authentication logs

#### EditProfile Page
**Purpose**: User profile editing interface

**Features**:
- Personal information editing
- Avatar upload
- Password change
- Notification preferences
- Two-factor authentication setup

#### PasswordResetConfirmWidget
**Purpose**: Password reset confirmation flow

**Features**:
- Token validation
- New password setting
- Auto-login after reset
- Email confirmation

### Services

#### AuthService
**Purpose**: Authentication business logic

**Key Methods**:
```php
// Login operations
AuthService::login($credentials);
AuthService::loginViaOAuth($provider, $user);
AuthService::loginViaSso($token);

// Logout
AuthService::logout();

// Password operations
AuthService::resetPassword($email);
AuthService::changePassword($user, $newPassword);
```

#### PermissionService
**Purpose**: Permission management logic

**Key Methods**:
```php
// Role operations
PermissionService::assignRole($user, $role);
PermissionService::removeRole($user, $role);

// Permission operations
PermissionService::grantPermission($user, $permission);
PermissionService::revokePermission($user, $permission);

// Check permissions
PermissionService::userCan($user, $permission);
```

#### TenantService
**Purpose**: Multi-tenancy management

**Key Methods**:
```php
// Tenant operations
TenantService::createTenant($data);
TenantService::assignUserToTenant($user, $tenant);
TenantService::switchTenant($user, $tenant);

// Tenant context
TenantService::getCurrentTenant();
TenantService::setTenant($tenant);
```

---

## 🚀 Quick Start

### Prerequisites
1. Xot Module (foundation) - **REQUIRED**
2. Laravel Sanctum installed and configured
3. Spatie Laravel Permission installed
4. Database configured

### Installation

```bash
# 1. Ensure Xot module is installed and working
php artisan module:list

# 2. Run User module migrations
php artisan migrate --path=Modules/User/database/migrations

# 3. Seed default roles and permissions
php artisan db:seed --class=UserSeeder

# 4. Publish configuration (optional)
php artisan vendor:publish --tag=user-config

# 5. Clear caches
php artisan config:clear
php artisan cache:clear
```

### Configuration

```php
// config/user.php (after publishing)
return [
    // User model configuration
    'user_model' => \Modules\User\Models\User::class,

    // Profile configuration
    'profile_model' => \Modules\User\Models\Profile::class,

    // Authentication configuration
    'auth' => [
        'guards' => [
            'web' => 'web',
            'api' => 'sanctum',
        ],
        'password_reset_timeout' => 60, // minutes
        'max_login_attempts' => 5,
        'lockout_duration' => 15, // minutes
    ],

    // OAuth providers
    'oauth_providers' => [
        'google' => true,
        'facebook' => false,
        'github' => true,
    ],

    // Multi-tenancy
    'tenancy' => [
        'enabled' => true,
        'automatic_switching' => true,
    ],

    // Teams
    'teams' => [
        'enabled' => true,
        'invitations_enabled' => true,
    ],
];
```

### First Steps - Creating Users

#### Via Filament Admin Panel
1. Navigate to Users resource in Filament
2. Click "New User"
3. Fill in user details
4. Assign roles and permissions
5. Save

#### Via Code
```php
use Modules\Xot\Contracts\UserContract;

// Create a user
$user = User::create([
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'password' => Hash::make('password'),
]);

// Assign role
$user->assignRole('admin');

// Grant direct permission
$user->givePermissionTo('edit-posts');
```

#### Via Seeder
```php
// Create default admin user
php artisan db:seed --class=UserSeeder
```

---

## 💻 Development Guide

### Creating Custom User Types (STI)

```php
namespace Modules\YourModule\Models;

use Modules\User\Models\BaseUser;

class Doctor extends BaseUser
{
    protected static string $type = 'doctor';

    // Doctor-specific methods
    public function specializations()
    {
        return $this->hasMany(Specialization::class);
    }
}
```

### Custom Authentication

```php
namespace Modules\YourModule\Actions\Auth;

use Modules\User\Services\AuthService;

class CustomLoginAction
{
    public function execute(array $credentials): bool
    {
        // Custom authentication logic
        if ($this->validateCustomCredentials($credentials)) {
            return AuthService::login($credentials);
        }

        return false;
    }
}
```

### Permission Checking

```php
// In controllers
if ($user->can('edit-posts')) {
    // Allow editing
}

// In Blade
@can('edit-posts')
    <!-- Edit form -->
@endcan

// In Filament resources
public static function canViewAny(): bool
{
    return auth()->user()->can('view_users');
}

// In policies
public function update(User $user, Post $post): bool
{
    return $user->hasRole('admin') || $user->id === $post->user_id;
}
```

### Working with Teams

```php
// Create a team
$team = Team::create([
    'name' => 'Engineering Team',
    'user_id' => auth()->id(), // Team owner
]);

// Add members
$team->users()->attach($userId, [
    'role' => 'member',
]);

// Switch user's current team
$user->switchTeam($team);

// Check team membership
if ($user->belongsToTeam($team)) {
    // User is team member
}
```

### Working with Tenants

```php
// Create a tenant
$tenant = Tenant::create([
    'name' => 'Acme Corp',
    'domain' => 'acme',
]);

// Assign user to tenant
$tenant->users()->attach($userId);

// Switch user's tenant
$user->switchTenant($tenant);

// Scoped queries (automatic with tenancy enabled)
Post::all(); // Only returns posts from current tenant
```

### Code Standards
- **PHPStan Level**: 10
- **Security**: Follow OWASP best practices
- **Password Hashing**: Always use bcrypt/argon2
- **Authorization**: Always check permissions before actions
- **Validation**: Strict input validation required

### Best Practices

1. **Always Hash Passwords**
```php
// ✅ Correct
$user->password = Hash::make($password);

// ❌ Wrong
$user->password = $password;
```

2. **Use Policies for Authorization**
```php
// ✅ Correct
Gate::authorize('update', $post);

// ❌ Wrong
if ($user->id === $post->user_id) {
    // Direct check
}
```

3. **Validate User Input**
```php
// ✅ Correct
$validated = $request->validate([
    'email' => 'required|email|unique:users',
    'password' => 'required|min:8|confirmed',
]);

// ❌ Wrong
$user->email = $request->input('email');
```

4. **Log Security Events**
```php
// Always log authentication attempts
AuthenticationLog::create([
    'user_id' => $user->id,
    'ip_address' => $request->ip(),
    'success' => true,
]);
```

---

## 🔒 Security

### Password Policies
- Minimum length: 8 characters
- Complexity requirements configurable
- Password history tracking
- Periodic password expiration (optional)

### Authentication Security
- Rate limiting on login attempts
- Account lockout after failed attempts
- IP-based restrictions (optional)
- Two-factor authentication support
- Session management

### Authorization Security
- Role-based access control (RBAC)
- Permission-based access control
- Policy-based authorization
- Middleware protection
- API token management

### Audit & Monitoring
- Authentication log tracking
- Permission change logging
- User activity tracking (via Activity module)
- Security alert notifications

### Best Security Practices

```php
// 1. Always validate and sanitize input
$email = filter_var($request->email, FILTER_VALIDATE_EMAIL);

// 2. Use prepared statements (Eloquent does this automatically)
User::where('email', $email)->first();

// 3. Protect against mass assignment
protected $fillable = ['name', 'email']; // Explicitly list fillable fields

// 4. Use HTTPS in production
// Force HTTPS in middleware or app configuration

// 5. Implement CSRF protection (Laravel includes this)
@csrf // In forms

// 6. Implement rate limiting
Route::middleware('throttle:10,1')->group(function () {
    // Routes
});
```

---

## 🔗 API & Integration

### Authentication API

#### Login
```http
POST /api/login
Content-Type: application/json

{
    "email": "user@example.com",
    "password": "password"
}

Response:
{
    "token": "sanctum-token-here",
    "user": { ... }
}
```

#### OAuth Login
```http
GET /auth/google/redirect
GET /auth/google/callback

Response:
{
    "token": "sanctum-token-here",
    "user": { ... }
}
```

#### Logout
```http
POST /api/logout
Authorization: Bearer {token}

Response:
{
    "message": "Logged out successfully"
}
```

### User Management API

#### Get Current User
```http
GET /api/user
Authorization: Bearer {token}

Response:
{
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com",
    "roles": ["admin"],
    "permissions": ["edit-posts"]
}
```

#### Update Profile
```http
PUT /api/user/profile
Authorization: Bearer {token}
Content-Type: application/json

{
    "name": "John Updated",
    "avatar": "data:image/..."
}
```

### Events

The User module fires the following events:

- `UserCreated`: When a new user is created
- `UserUpdated`: When user details are updated
- `UserDeleted`: When a user is deleted
- `UserLoggedIn`: When user successfully logs in
- `UserLoggedOut`: When user logs out
- `PermissionGranted`: When permission is granted to user
- `PermissionRevoked`: When permission is revoked
- `RoleAssigned`: When role is assigned to user
- `RoleRemoved`: When role is removed from user

```php
// Listen to events
Event::listen(UserLoggedIn::class, function ($event) {
    Log::info('User logged in', ['user_id' => $event->user->id]);
});
```

---

## 🧪 Testing

### Test Coverage
- **Target**: 90%+
- **Current**: ~88%
- **Critical Components**: 95%+

### Running Tests

```bash
# All User module tests
./vendor/bin/pest Modules/User

# Authentication tests
./vendor/bin/pest Modules/User/tests/Feature/AuthenticationTest.php

# Permission tests
./vendor/bin/pest Modules/User/tests/Feature/PermissionTest.php

# With coverage
./vendor/bin/pest Modules/User --coverage --min=90
```

### Test Examples

#### Authentication Test
```php
test('user can login with valid credentials', function () {
    $user = User::factory()->create([
        'password' => Hash::make('password'),
    ]);

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response->assertRedirect('/dashboard');
    $this->assertAuthenticatedAs($user);
});
```

#### Permission Test
```php
test('user with permission can perform action', function () {
    $user = User::factory()->create();
    $user->givePermissionTo('edit-posts');

    $this->actingAs($user);

    expect($user->can('edit-posts'))->toBeTrue();
});
```

#### Team Test
```php
test('user can switch teams', function () {
    $user = User::factory()->create();
    $team1 = Team::factory()->create();
    $team2 = Team::factory()->create();

    $user->teams()->attach([$team1->id, $team2->id]);
    $user->switchTeam($team2);

    expect($user->currentTeam->id)->toBe($team2->id);
});
```

---

## 📚 Documentation Index

### Architecture
- [User Model Architecture](./architecture/user-model.md) - User model design
- [Permission System](./architecture/permission-system.md) - RBAC architecture
- [Multi-Tenancy](./architecture/multi-tenancy.md) - Tenant isolation
- [Team System](./architecture/teams.md) - Team collaboration

### Authentication
- [Authentication Flow](./auth/authentication-flow.md) - Login/logout process
- [OAuth Integration](./auth/oauth.md) - Social login setup
- [SSO Integration](./auth/sso.md) - Single Sign-On
- [Two-Factor Auth](./auth/2fa.md) - 2FA implementation

### Authorization
- [Roles & Permissions](./authorization/roles-permissions.md) - RBAC guide
- [Policies](./authorization/policies.md) - Policy-based authorization
- [Permission Checking](./authorization/checking.md) - How to check permissions

### Development
- [Creating User Types](./development/user-types.md) - STI implementation
- [Custom Authentication](./development/custom-auth.md) - Custom auth methods
- [API Integration](./development/api.md) - API usage guide

### Security
- [Security Best Practices](./security/best-practices.md) - Security guidelines
- [Password Policies](./security/passwords.md) - Password requirements
- [Audit Logging](./security/audit-log.md) - Security audit trail

### Troubleshooting
- [Common Issues](./troubleshooting/common-issues.md) - Frequently encountered problems
- [Login Component Troubleshooting](./troubleshooting-login-component.md) - Login widget issues
- [FAQ](./troubleshooting/faq.md) - Frequently asked questions

---

## 🔄 Recent Updates

### v2.5.0 - 2025-12-05
- **Added**: Laravel 12 compatibility
- **Added**: Filament 4 support
- **Fixed**: Merge conflicts in EditProfile and PasswordResetConfirmWidget
- **Improved**: PHPStan Level 10 compliance

### v2.4.0 - 2025-11-04
- **Added**: Device management features
- **Added**: Enhanced authentication logging
- **Fixed**: File locking pattern implementation
- **Improved**: Security alert widgets

See [changelog.md](./CHANGELOG.md) for full history.

---

## 🗺️ Roadmap

### Next Release (v2.6.0)
- [ ] Enhanced two-factor authentication
- [ ] Biometric authentication support
- [ ] Advanced session management
- [ ] WebAuthn integration

### Future Plans
- Passwordless authentication
- Magic link login
- Social login enhancements
- Advanced audit reporting

See [ROADMAP.md](./roadmap.md) for details.

---

## 📖 Related Documentation

### Internal Modules
- [Xot Module](../Xot/docs/README.md) - Core foundation
- [Activity Module](../Activity/docs/README.md) - Activity tracking
- [Lang Module](../Lang/docs/README.md) - Translations
- [Tenant Module](../Tenant/docs/README.md) - Enhanced tenancy

### Project Documentation
- [CLAUDE.md](../../../CLAUDE.md) - Project architecture
- [Security Guidelines](../../../docs/security.md)

### External Resources
- [Laravel Authentication](https://laravel.com/docs/12.x/authentication)
- [Laravel Authorization](https://laravel.com/docs/12.x/authorization)
- [Spatie Permission](https://spatie.be/docs/laravel-permission)
- [Laravel Sanctum](https://laravel.com/docs/12.x/sanctum)
- [Filament Authentication](https://filamentphp.com/docs/4.x/panels/users)

---

**Module**: User (Authentication & Authorization)
**Version**: 2.5.0
**Framework**: Laravel 12 + Filament 4
**PHPStan**: Level 10 ✅
**Test Coverage**: 88%+ ✅
**Security**: OWASP Compliant ✅


---

## Contenuto assorbito da `readme.md`

# User Module - Authentication & Authorization

**Last Update**: 2025-12-05
**Status**: ✅ Production Ready
**PHPStan Level**: 10
**Maintainers**: Laraxot Team

---

## 📋 Table of Contents

- [Business Overview](#-business-overview)
- [Architecture](#-architecture)
- [Core Components](#-core-components)
- [Quick Start](#-quick-start)
- [Development Guide](#-development-guide)
- [Security](#-security)
- [API & Integration](#-api--integration)
- [Testing](#-testing)
- [Documentation Index](#-documentation-index)

---

## 🏆 PHPStan Level 10 Compliance

**Status**: ✅ **0 Errori** (10 → 0)
**Data Achievement**: Dicembre 15, 2025
**Approccio**: Fix, Don't Ignore

### Metriche Achievement
- **Errori Iniziali**: 10
- **Errori Finali**: 0
- **File Modificati**: 1
- **Pattern Applicati**: Collection covariance fix

### Scoperta Tecnica: Collection Covariance

**Problema**: PHPStan strict covariance checking per Collection generics
**File**: IsProfileTrait.php - metodo `getMobileDeviceTokens()`

#### Fix Applicato
```php
// PRIMA
/**
 * @return Collection<int|string, string>
 */
public function getMobileDeviceTokens(): Collection
{
    $tokens = $this->mobileDeviceUsers()
        ->pluck('token')
        ->filter(static fn (mixed $value): bool => is_string($value) && '' !== $value)
        ->map(static fn (mixed $value): string => (string) $value);
    /* @var Collection<int|string, string> $tokens */
    return $tokens;
}

// DOPO
/**
 * @return Collection<int|string, non-empty-string>
 */
public function getMobileDeviceTokens(): Collection
{
    $tokens = $this->mobileDeviceUsers()
        ->pluck('token')
        ->filter(static fn (mixed $value): bool => is_string($value) && '' !== $value)
        ->map(static fn (mixed $value): string => (string) $value);
    /** @var Collection<int|string, non-empty-string> $tokens */
    return $tokens;
}
```

### Spiegazione Tecnica

**Root Cause**: Dopo `filter()` che rimuove stringhe vuote, PHPStan inferisce `non-empty-string`

**Covarianza**: `Collection<T>` è covariante in `T`, quindi:
- `Collection<int|string, non-empty-string>` **NON È** `Collection<int|string, string>`
- Ritornare `non-empty-string` quando dichiarato `string` viola covarianza

**Soluzione**: Allineare il return type PHPDoc al tipo inferito dopo il filter

### Lessons Learned
1. **Collection Generics**: PHPStan traccia precisamente i tipi attraverso operazioni Collection
2. **Covariance Matters**: Tipi dichiarati devono matchare esattamente i tipi inferiti
3. **Filter Narrows Types**: `filter()` che rimuove valori falsy produce `non-empty-string`
4. **PHPDoc Precision**: Usare `non-empty-string` quando appropriato, non solo `string`

### Documentazione Correlata
- [PHPStan Level 10 Success](../../../docs/phpstan-level-10-success.md) - Achievement generale progetto
- [Xot PHPStan Patterns](../../Xot/docs/phpstan-patterns-dec-2025.md) - Pattern comuni

---

## 🎯 Business Overview

### Purpose
The **User Module** provides comprehensive user management, authentication, and authorization infrastructure for the Laraxot PTVX ecosystem. It implements:
- **Multi-Authentication**: Support for multiple authentication methods (credentials, OAuth, SSO)
- **Role-Based Access Control**: Advanced permission system using Spatie Laravel Permission
- **Multi-Tenancy**: Complete tenant isolation and management
- **Team Collaboration**: Team-based user organization
- **Profile Management**: Flexible user profile system
- **Security Auditing**: Authentication logging and security monitoring

### Key Features
- **Flexible User Model**: BaseUser with Single Table Inheritance (STI) support
- **Advanced Permissions**: Granular role and permission management
- **OAuth Integration**: Social login (Google, Facebook, GitHub, etc.)
- **SSO Support**: Single Sign-On provider integration
- **Device Management**: Track and manage user devices
- **Authentication Logging**: Complete audit trail of login attempts
- **Password Security**: Advanced password policies and reset flows
- **Multi-Tenancy**: Tenant isolation with user-tenant associations

### Target Users
- **System Administrators**: Manage users, roles, and permissions
- **Application Users**: End users accessing the application
- **Team Managers**: Manage team members and collaborations
- **Tenant Administrators**: Manage tenant-specific users and settings
- **Security Officers**: Monitor authentication and security events

---

## 🏗️ Architecture

### Module Dependencies

```
User Module
├── Xot Module (Foundation) - REQUIRED
│   ├── XotBaseModel (Model foundation)
│   ├── XotBaseResource (Filament resources)
│   └── Core patterns and traits
├── Activity Module (Recommended)
│   └── User activity tracking
├── Lang Module (Recommended)
│   └── Translation and localization
└── Tenant Module (Optional)
    └── Enhanced multi-tenancy features
```

### Technology Stack
- **Laravel**: 12.x
- **Filament**: 4.x (for admin UI)
- **Spatie Laravel Permission**: 6.x
- **Laravel Sanctum**: API authentication
- **Laravel Socialite**: OAuth providers
- **PHP**: 8.3+
- **PHPStan**: Level 10

### Directory Structure

```
User/
├── app/
│   ├── Actions/              # Business actions
│   │   ├── Auth/             # Authentication actions
│   │   ├── User/             # User management actions
│   │   └── Team/             # Team management actions
│   ├── Events/               # Domain events
│   │   ├── UserCreated.php
│   │   ├── UserLoggedIn.php
│   │   └── PermissionGranted.php
│   ├── Filament/             # Filament resources
│   │   ├── Resources/        # User, Role, Team, Tenant resources
│   │   ├── Pages/            # Custom pages (EditProfile, etc.)
│   │   └── Widgets/          # User stats, security alerts
│   ├── Models/               # Eloquent models
│   │   ├── User.php          # Main user model
│   │   ├── BaseUser.php      # Base user class
│   │   ├── Profile.php       # User profile
│   │   ├── Role.php          # User roles
│   │   ├── Permission.php    # Permissions
│   │   ├── Team.php          # Teams
│   │   ├── Tenant.php        # Tenants
│   │   ├── Device.php        # User devices
│   │   └── AuthenticationLog.php  # Login audit
│   ├── Policies/             # Authorization policies
│   ├── Providers/            # Service providers
│   └── Services/             # Business logic services
│       ├── AuthService.php
│       ├── PermissionService.php
│       └── TenantService.php
├── database/
│   ├── migrations/           # Database migrations
│   └── seeders/              # Database seeders
├── docs/                     # Documentation
└── tests/                    # Tests
    ├── Feature/              # Feature tests
    └── Unit/                 # Unit tests
```

---

## 🔧 Core Components

### Models

#### User / BaseUser
**Purpose**: Core user model with authentication and authorization

**Key Features**:
- Single Table Inheritance (STI) support for different user types
- Integration with Spatie Laravel Permission
- Multi-tenancy support
- Team membership
- Device tracking
- OAuth connections

**Relationships**:
```php
// Core relationships
- hasOne(Profile::class)
- belongsToMany(Team::class)
- belongsToMany(Tenant::class)
- belongsToMany(Role::class)
- hasMany(Permission::class)
- hasMany(Device::class)
- hasMany(AuthenticationLog::class)
- hasMany(SocialProvider::class)
```

**Key Methods**:
```php
// Authorization
$user->hasRole('admin');
$user->can('edit-posts');
$user->givePermissionTo('edit-posts');

// Teams
$user->teams;
$user->currentTeam;
$user->switchTeam($team);

// Tenants
$user->tenant;
$user->switchTenant($tenant);

// Devices
$user->devices;
$user->revokeDevice($deviceId);
```

#### Profile / BaseProfile
**Purpose**: Extended user information and preferences

**Key Features**:
- Flexible schema using schemaless attributes
- Avatar management
- Preferences storage
- Localization settings

**Relationships**:
```php
- belongsTo(User::class)
- belongsToMany(Team::class)
```

#### Role
**Purpose**: User role definition with permissions

**Key Features**:
- Hierarchical roles support
- Permission association
- Scope management

**Relationships**:
```php
- belongsToMany(User::class)
- belongsToMany(Permission::class)
```

#### Permission
**Purpose**: Granular permission definition

**Key Features**:
- Action-based permissions
- Resource-based permissions
- Permission groups

**Relationships**:
```php
- belongsToMany(Role::class)
- belongsToMany(User::class) // Direct permissions
```

#### Team / BaseTeam
**Purpose**: Team collaboration and grouping

**Key Features**:
- Team ownership
- Member management
- Team invitations
- Role assignment within teams

**Relationships**:
```php
- belongsTo(User::class, 'user_id') // Team owner
- belongsToMany(User::class)
- hasMany(TeamInvitation::class)
```

#### Tenant / BaseTenant
**Purpose**: Multi-tenancy isolation

**Key Features**:
- Data isolation per tenant
- Tenant-specific configurations
- User-tenant associations

**Relationships**:
```php
- belongsToMany(User::class)
- hasMany(Team::class)
```

#### AuthenticationLog
**Purpose**: Security audit trail of login attempts

**Key Features**:
- Login success/failure tracking
- Device fingerprinting
- IP address logging
- User agent tracking

**Relationships**:
```php
- belongsTo(User::class)
```

#### Device / DeviceUser
**Purpose**: User device management and tracking

**Key Features**:
- Device registration
- Device verification
- Push notification support
- Device revocation

**Relationships**:
```php
- belongsToMany(User::class)
- belongsToMany(Profile::class)
```

### Filament Resources

#### UserResource
**Purpose**: Complete CRUD interface for user management

**Features**:
- User creation and editing
- Role and permission assignment
- Profile management
- Password management
- Team membership management
- Account status management

**Permissions Required**:
- `view_user`: View user list
- `create_user`: Create new users
- `edit_user`: Edit existing users
- `delete_user`: Delete users

#### RoleResource
**Purpose**: Role management interface

**Features**:
- Role creation and editing
- Permission assignment
- User assignment to roles
- Role hierarchy management

#### PermissionResource
**Purpose**: Permission management interface

**Features**:
- Permission creation
- Permission grouping
- Role assignment

#### TeamResource
**Purpose**: Team management interface

**Features**:
- Team creation and editing
- Member management
- Team invitations
- Team permissions

#### TenantResource
**Purpose**: Tenant management interface

**Features**:
- Tenant creation and configuration
- User assignment to tenants
- Tenant isolation settings

### Widgets & Pages

#### LoginWidget
**Purpose**: Multi-method login form

**Features**:
- Username/password login
- Social login buttons
- Remember me functionality
- Password reset link

#### UserStatsWidget
**Purpose**: Dashboard statistics for users

**Features**:
- Total users count
- New users this week/month
- Active users
- User growth charts

#### SecurityAlertsWidget
**Purpose**: Security monitoring dashboard

**Features**:
- Failed login attempts
- Suspicious activities
- Account lockouts
- Recent authentication logs

#### EditProfile Page
**Purpose**: User profile editing interface

**Features**:
- Personal information editing
- Avatar upload
- Password change
- Notification preferences
- Two-factor authentication setup

#### PasswordResetConfirmWidget
**Purpose**: Password reset confirmation flow

**Features**:
- Token validation
- New password setting
- Auto-login after reset
- Email confirmation

### Services

#### AuthService
**Purpose**: Authentication business logic

**Key Methods**:
```php
// Login operations
AuthService::login($credentials);
AuthService::loginViaOAuth($provider, $user);
AuthService::loginViaSso($token);

// Logout
AuthService::logout();

// Password operations
AuthService::resetPassword($email);
AuthService::changePassword($user, $newPassword);
```

#### PermissionService
**Purpose**: Permission management logic

**Key Methods**:
```php
// Role operations
PermissionService::assignRole($user, $role);
PermissionService::removeRole($user, $role);

// Permission operations
PermissionService::grantPermission($user, $permission);
PermissionService::revokePermission($user, $permission);

// Check permissions
PermissionService::userCan($user, $permission);
```

#### TenantService
**Purpose**: Multi-tenancy management

**Key Methods**:
```php
// Tenant operations
TenantService::createTenant($data);
TenantService::assignUserToTenant($user, $tenant);
TenantService::switchTenant($user, $tenant);

// Tenant context
TenantService::getCurrentTenant();
TenantService::setTenant($tenant);
```

---

## 🚀 Quick Start

### Prerequisites
1. Xot Module (foundation) - **REQUIRED**
2. Laravel Sanctum installed and configured
3. Spatie Laravel Permission installed
4. Database configured

### Installation

```bash
# 1. Ensure Xot module is installed and working
php artisan module:list

# 2. Run User module migrations
php artisan migrate --path=Modules/User/database/migrations

# 3. Seed default roles and permissions
php artisan db:seed --class=UserSeeder

# 4. Publish configuration (optional)
php artisan vendor:publish --tag=user-config

# 5. Clear caches
php artisan config:clear
php artisan cache:clear
```

### Configuration

```php
// config/user.php (after publishing)
return [
    // User model configuration
    'user_model' => \Modules\User\Models\User::class,

    // Profile configuration
    'profile_model' => \Modules\User\Models\Profile::class,

    // Authentication configuration
    'auth' => [
        'guards' => [
            'web' => 'web',
            'api' => 'sanctum',
        ],
        'password_reset_timeout' => 60, // minutes
        'max_login_attempts' => 5,
        'lockout_duration' => 15, // minutes
    ],

    // OAuth providers
    'oauth_providers' => [
        'google' => true,
        'facebook' => false,
        'github' => true,
    ],

    // Multi-tenancy
    'tenancy' => [
        'enabled' => true,
        'automatic_switching' => true,
    ],

    // Teams
    'teams' => [
        'enabled' => true,
        'invitations_enabled' => true,
    ],
];
```

### First Steps - Creating Users

#### Via Filament Admin Panel
1. Navigate to Users resource in Filament
2. Click "New User"
3. Fill in user details
4. Assign roles and permissions
5. Save

#### Via Code
```php
use Modules\Xot\Contracts\UserContract;

// Create a user
$user = User::create([
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'password' => Hash::make('password'),
]);

// Assign role
$user->assignRole('admin');

// Grant direct permission
$user->givePermissionTo('edit-posts');
```

#### Via Seeder
```php
// Create default admin user
php artisan db:seed --class=UserSeeder
```

---

## 💻 Development Guide

### Creating Custom User Types (STI)

```php
namespace Modules\YourModule\Models;

use Modules\User\Models\BaseUser;

class Doctor extends BaseUser
{
    protected static string $type = 'doctor';

    // Doctor-specific methods
    public function specializations()
    {
        return $this->hasMany(Specialization::class);
    }
}
```

### Custom Authentication

```php
namespace Modules\YourModule\Actions\Auth;

use Modules\User\Services\AuthService;

class CustomLoginAction
{
    public function execute(array $credentials): bool
    {
        // Custom authentication logic
        if ($this->validateCustomCredentials($credentials)) {
            return AuthService::login($credentials);
        }

        return false;
    }
}
```

### Permission Checking

```php
// In controllers
if ($user->can('edit-posts')) {
    // Allow editing
}

// In Blade
@can('edit-posts')
    <!-- Edit form -->
@endcan

// In Filament resources
public static function canViewAny(): bool
{
    return auth()->user()->can('view_users');
}

// In policies
public function update(User $user, Post $post): bool
{
    return $user->hasRole('admin') || $user->id === $post->user_id;
}
```

### Working with Teams

```php
// Create a team
$team = Team::create([
    'name' => 'Engineering Team',
    'user_id' => auth()->id(), // Team owner
]);

// Add members
$team->users()->attach($userId, [
    'role' => 'member',
]);

// Switch user's current team
$user->switchTeam($team);

// Check team membership
if ($user->belongsToTeam($team)) {
    // User is team member
}
```

### Working with Tenants

```php
// Create a tenant
$tenant = Tenant::create([
    'name' => 'Acme Corp',
    'domain' => 'acme',
]);

// Assign user to tenant
$tenant->users()->attach($userId);

// Switch user's tenant
$user->switchTenant($tenant);

// Scoped queries (automatic with tenancy enabled)
Post::all(); // Only returns posts from current tenant
```

### Code Standards
- **PHPStan Level**: 10
- **Security**: Follow OWASP best practices
- **Password Hashing**: Always use bcrypt/argon2
- **Authorization**: Always check permissions before actions
- **Validation**: Strict input validation required

### Best Practices

1. **Always Hash Passwords**
```php
// ✅ Correct
$user->password = Hash::make($password);

// ❌ Wrong
$user->password = $password;
```

2. **Use Policies for Authorization**
```php
// ✅ Correct
Gate::authorize('update', $post);

// ❌ Wrong
if ($user->id === $post->user_id) {
    // Direct check
}
```

3. **Validate User Input**
```php
// ✅ Correct
$validated = $request->validate([
    'email' => 'required|email|unique:users',
    'password' => 'required|min:8|confirmed',
]);

// ❌ Wrong
$user->email = $request->input('email');
```

4. **Log Security Events**
```php
// Always log authentication attempts
AuthenticationLog::create([
    'user_id' => $user->id,
    'ip_address' => $request->ip(),
    'success' => true,
]);
```

---

## 🔒 Security

### Password Policies
- Minimum length: 8 characters
- Complexity requirements configurable
- Password history tracking
- Periodic password expiration (optional)

### Authentication Security
- Rate limiting on login attempts
- Account lockout after failed attempts
- IP-based restrictions (optional)
- Two-factor authentication support
- Session management

### Authorization Security
- Role-based access control (RBAC)
- Permission-based access control
- Policy-based authorization
- Middleware protection
- API token management

### Audit & Monitoring
- Authentication log tracking
- Permission change logging
- User activity tracking (via Activity module)
- Security alert notifications

### Best Security Practices

```php
// 1. Always validate and sanitize input
$email = filter_var($request->email, FILTER_VALIDATE_EMAIL);

// 2. Use prepared statements (Eloquent does this automatically)
User::where('email', $email)->first();

// 3. Protect against mass assignment
protected $fillable = ['name', 'email']; // Explicitly list fillable fields

// 4. Use HTTPS in production
// Force HTTPS in middleware or app configuration

// 5. Implement CSRF protection (Laravel includes this)
@csrf // In forms

// 6. Implement rate limiting
Route::middleware('throttle:10,1')->group(function () {
    // Routes
});
```

---

## 🔗 API & Integration

### Authentication API

#### Login
```http
POST /api/login
Content-Type: application/json

{
    "email": "user@example.com",
    "password": "password"
}

Response:
{
    "token": "sanctum-token-here",
    "user": { ... }
}
```

#### OAuth Login
```http
GET /auth/google/redirect
GET /auth/google/callback

Response:
{
    "token": "sanctum-token-here",
    "user": { ... }
}
```

#### Logout
```http
POST /api/logout
Authorization: Bearer {token}

Response:
{
    "message": "Logged out successfully"
}
```

### User Management API

#### Get Current User
```http
GET /api/user
Authorization: Bearer {token}

Response:
{
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com",
    "roles": ["admin"],
    "permissions": ["edit-posts"]
}
```

#### Update Profile
```http
PUT /api/user/profile
Authorization: Bearer {token}
Content-Type: application/json

{
    "name": "John Updated",
    "avatar": "data:image/..."
}
```

### Events

The User module fires the following events:

- `UserCreated`: When a new user is created
- `UserUpdated`: When user details are updated
- `UserDeleted`: When a user is deleted
- `UserLoggedIn`: When user successfully logs in
- `UserLoggedOut`: When user logs out
- `PermissionGranted`: When permission is granted to user
- `PermissionRevoked`: When permission is revoked
- `RoleAssigned`: When role is assigned to user
- `RoleRemoved`: When role is removed from user

```php
// Listen to events
Event::listen(UserLoggedIn::class, function ($event) {
    Log::info('User logged in', ['user_id' => $event->user->id]);
});
```

---

## 🧪 Testing

### Test Coverage
- **Target**: 90%+
- **Current**: ~88%
- **Critical Components**: 95%+

### Running Tests

```bash
# All User module tests
./vendor/bin/pest Modules/User

# Authentication tests
./vendor/bin/pest Modules/User/tests/Feature/AuthenticationTest.php

# Permission tests
./vendor/bin/pest Modules/User/tests/Feature/PermissionTest.php

# With coverage
./vendor/bin/pest Modules/User --coverage --min=90
```

### Test Examples

#### Authentication Test
```php
test('user can login with valid credentials', function () {
    $user = User::factory()->create([
        'password' => Hash::make('password'),
    ]);

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response->assertRedirect('/dashboard');
    $this->assertAuthenticatedAs($user);
});
```

#### Permission Test
```php
test('user with permission can perform action', function () {
    $user = User::factory()->create();
    $user->givePermissionTo('edit-posts');

    $this->actingAs($user);

    expect($user->can('edit-posts'))->toBeTrue();
});
```

#### Team Test
```php
test('user can switch teams', function () {
    $user = User::factory()->create();
    $team1 = Team::factory()->create();
    $team2 = Team::factory()->create();

    $user->teams()->attach([$team1->id, $team2->id]);
    $user->switchTeam($team2);

    expect($user->currentTeam->id)->toBe($team2->id);
});
```

---

## 📚 Documentation Index

### Architecture
- [User Model Architecture](./architecture/user-model.md) - User model design
- [Permission System](./architecture/permission-system.md) - RBAC architecture
- [Multi-Tenancy](./architecture/multi-tenancy.md) - Tenant isolation
- [Team System](./architecture/teams.md) - Team collaboration

### Authentication
- [Authentication Flow](./auth/authentication-flow.md) - Login/logout process
- [OAuth Integration](./auth/oauth.md) - Social login setup
- [SSO Integration](./auth/sso.md) - Single Sign-On
- [Two-Factor Auth](./auth/2fa.md) - 2FA implementation

### Authorization
- [Roles & Permissions](./authorization/roles-permissions.md) - RBAC guide
- [Policies](./authorization/policies.md) - Policy-based authorization
- [Permission Checking](./authorization/checking.md) - How to check permissions

### Development
- [Creating User Types](./development/user-types.md) - STI implementation
- [Custom Authentication](./development/custom-auth.md) - Custom auth methods
- [API Integration](./development/api.md) - API usage guide

### Security
- [Security Best Practices](./security/best-practices.md) - Security guidelines
- [Password Policies](./security/passwords.md) - Password requirements
- [Audit Logging](./security/audit-log.md) - Security audit trail

### Troubleshooting
- [Common Issues](./troubleshooting/common-issues.md) - Frequently encountered problems
- [Login Component Troubleshooting](./troubleshooting-login-component.md) - Login widget issues
- [FAQ](./troubleshooting/faq.md) - Frequently asked questions

---

## 🔄 Recent Updates

### v2.5.0 - 2025-12-05
- **Added**: Laravel 12 compatibility
- **Added**: Filament 4 support
- **Fixed**: Merge conflicts in EditProfile and PasswordResetConfirmWidget
- **Improved**: PHPStan Level 10 compliance

### v2.4.0 - 2025-11-04
- **Added**: Device management features
- **Added**: Enhanced authentication logging
- **Fixed**: File locking pattern implementation
- **Improved**: Security alert widgets

See [CHANGELOG.md](./CHANGELOG.md) for full history.

---

## 🗺️ Roadmap

### Next Release (v2.6.0)
- [ ] Enhanced two-factor authentication
- [ ] Biometric authentication support
- [ ] Advanced session management
- [ ] WebAuthn integration

### Future Plans
- Passwordless authentication
- Magic link login
- Social login enhancements
- Advanced audit reporting

See [ROADMAP.md](./roadmap.md) for details.

---

## 📖 Related Documentation

### Internal Modules
- [Xot Module](../Xot/docs/README.md) - Core foundation
- [Activity Module](../Activity/docs/README.md) - Activity tracking
- [Lang Module](../Lang/docs/README.md) - Translations
- [Tenant Module](../Tenant/docs/README.md) - Enhanced tenancy

### Project Documentation
- [CLAUDE.md](../../../CLAUDE.md) - Project architecture
- [Security Guidelines](../../../docs/security.md)

### External Resources
- [Laravel Authentication](https://laravel.com/docs/12.x/authentication)
- [Laravel Authorization](https://laravel.com/docs/12.x/authorization)
- [Spatie Permission](https://spatie.be/docs/laravel-permission)
- [Laravel Sanctum](https://laravel.com/docs/12.x/sanctum)
- [Filament Authentication](https://filamentphp.com/docs/4.x/panels/users)

---

**Module**: User (Authentication & Authorization)
**Version**: 2.5.0
**Framework**: Laravel 12 + Filament 4
**PHPStan**: Level 10 ✅
**Test Coverage**: 88%+ ✅
**Security**: OWASP Compliant ✅
=======
title: "User — BMAD Documentation Index"
type: note
tags: [bmad, user, identity, index]
created: 2026-09-26
updated: 2026-09-28
qmd: "User bmad indice documentazione identita auth passport socialite team tenant"
module: User
related:
  - ./architecture.md
  - ./brainstorming.md
  - ./epics/module-roadmap.md
  - ./quick-reference.md
  - ./setup-guide.md
  - ../../../Xot/docs/bmad-method.md
---

# User — BMAD Method Integration

<<<<<<< .merge_file_H9JAK5
<<<<<<< .merge_file_BZEUvl
> **SUMMARY**: indice dei documenti BMAD del modulo User (identità: autenticazione, ruoli Spatie, team, tenant, Passport OAuth2, Socialite/SSO, widget Filament), con l'inventario reale di `app/` (679 file PHP) e `tests/` (187 file PHP) verificato sul repository.
=======
=======
>>>>>>> .merge_file_l4u4Kz
## Campagna vigente — solo Filament widget

**Chrome convertito (2026-09-21): i 3 hook del provider sono FQCN; restano Cluster C (10.4) e residui.** GitHub: [issue #100](https://github.com/laraxot/module_user_fila5/issues/100) · [discussion #101](https://github.com/laraxot/module_user_fila5/discussions/101).

Inventario + perché/urgenza (canone dopo riconciliazione agenti): [livewire-inventory.md](./livewire-inventory.md).
Mappa hook provider: [livewire-widget-admin-panel-provider.md](./livewire-widget-admin-panel-provider.md).

Stub/puntatori (non SSoT): `livewire-widget-{conversion,decision-log,epics}.md`, `advantages-filament-widgets-over-livewire.md`, `livewire-widget-consolidation-*.md`, story `10.1.socialite-buttons-widget`, `11.1.team-change-widget`.

### Pacchetto campagna (14 Livewire)

| Artefatto | Path |
|-----------|------|
| Costituzione campagna | [livewire-widget-project-context.md](./livewire-widget-project-context.md) |
| Brief campagna | [livewire-widget-product-brief.md](./livewire-widget-product-brief.md) |
| PRD campagna | [livewire-widget-prd.md](./livewire-widget-prd.md) |
| Architecture campagna | [livewire-widget-architecture.md](./livewire-widget-architecture.md) |
| Tech spec campagna | [livewire-widget-tech-spec.md](./livewire-widget-tech-spec.md) |
| UX campagna | [livewire-widget-ux.md](./livewire-widget-ux.md) |
| Brainstorm campagna | [livewire-widget-brainstorming.md](./livewire-widget-brainstorming.md) |
| Inventario | [livewire-inventory.md](./livewire-inventory.md) |
| Mappa hook provider | [livewire-widget-admin-panel-provider.md](./livewire-widget-admin-panel-provider.md) |
| Vantaggi widget-only (modulo) | [advantages-filament-only.md](./advantages-filament-only.md) |
| Decisioni | [decision-log.md](./decision-log.md) |
| Mappa epic | [epics.md](./epics.md) |

### Epic 9 — SuperAdmin (sottoinsieme, Quick Flow)

| Artefatto | Path |
|-----------|------|
| Costituzione slice | [project-context.md](./project-context.md) |
| Brief / PRD / arch / UX / spec | [product-brief.md](./product-brief.md) · [prd.md](./prd.md) · [architecture.md](./architecture.md) · [ux-design.md](./ux-design.md) · [tech-spec.md](./tech-spec.md) |
| 9.1–9.4 | [9.1](../stories/9.1.super-admin-widget.story.md) · [9.2](../stories/9.2.admin-panel-provider-hook.story.md) · [9.3](../stories/9.3.remove-livewire-superadmin.story.md) · [9.4](../stories/9.4.super-admin-widget-tests.story.md) |

Handoff SuperAdmin: 9.1 → 9.2 → 9.3; 9.4 dopo 9.2.

### Epic 10 — resto inventario

| Story | Path |
|-------|------|
| 10.1 team | [10.1.team-change-widget.story.md](../stories/10.1.team-change-widget.story.md) |
| 10.2 social | [10.2.socialite-buttons-widget.story.md](../stories/10.2.socialite-buttons-widget.story.md) |
| 10.3 auth HTTP | [10.3.retire-auth-livewire-twins.story.md](../stories/10.3.retire-auth-livewire-twins.story.md) |
| 10.4 profilo/Gdpr | [10.4.retire-gdpr-profile-livewire.story.md](../stories/10.4.retire-gdpr-profile-livewire.story.md) |

Handoff provider: 9.2 → 10.1 → 10.2. 10.3 può parallellizzare sui file auth.

## Campagna aggiuntiva — module-excellence (Epic 12-14)

**Scope whole-module (non solo widget)**: documentazione, qualità codice/test,
completezza dominio (permessi, team/tenant, OAuth). Additiva alla campagna
sopra — nessuna story qui tocca `AdminPanelProvider` o i widget Epic 9/10.
Aperta 2026-09-22, sola documentazione (nessuna implementazione).

| Artefatto | Path |
|-----------|------|
| Brief campagna | [module-excellence-product-brief.md](./module-excellence-product-brief.md) |
| PRD campagna | [module-excellence-prd.md](./module-excellence-prd.md) |
| Architecture campagna | [module-excellence-architecture.md](./module-excellence-architecture.md) |
| Brainstorm campagna (5 fork paralleli) | [module-excellence-brainstorming.md](./module-excellence-brainstorming.md) |
| Epic 12 Docs hygiene, 13 Code quality/test, 14 Completezza dominio | [epics.md](./epics.md) (sezione in coda) |
| Decisioni | [decision-log.md](./decision-log.md) (entry 2026-09-22) |

| Epic | Story | Path |
|------|-------|------|
| 12 Docs hygiene | 12.1–12.7 | [docs/stories/](../stories/) prefisso `12.` |
| 13 Code quality/test | 13.1–13.9 | [docs/stories/](../stories/) prefisso `13.` |
| 14 Completezza dominio | 14.1–14.8 | [docs/stories/](../stories/) prefisso `14.` |

## Campagna gemella — perfection (Epic 11, 15-19)

**Stesso scope whole-module**, prodotta in parallelo (fork/sessione
concorrente non coordinata con la campagna sopra — vedi
[decision-log.md](./decision-log.md) entry "Riconciliazione numerazione con
campagna module-excellence" e
[perfection-decision-log.md](./perfection-decision-log.md) sul lato
`perfection`). Numerazione riconciliata: Epic 12-14 restano di
`module-excellence` (sopra); `perfection` usa Epic 11 (sicurezza, priorità
massima, unica con story file individuali già scritte) e 15-19 (qualità
codice/architettura, performance, test, schema/migrazioni, bonifica docs).

| Artefatto | Path |
|-----------|------|
| Brainstorm/PRD/architecture/decision-log | prefisso `perfection-*` in questa cartella |
| Epic 11, 15-19 | [perfection-epics.md](./perfection-epics.md) |
| Story Epic 11 (complete) | [docs/stories/](../stories/) prefisso `11.` (dash-separated) |

<<<<<<< .merge_file_H9JAK5
>>>>>>> .merge_file_ZoAy3E
=======
>>>>>>> .merge_file_l4u4Kz

## Scopo BMAD per User

`module.json` dichiara: *"Gestione utenti, autenticazione, autorizzazioni e ruoli del sistema"* (alias `user`, keyword `auth`, `users`, `roles`, `permissions`, `authentication`). È il modulo identità da cui dipendono Activity, Notify, Tenant, Lang, Performance e UI.

## Indice documenti BMAD

### Canonici

- [architecture.md](architecture.md) — mappa reale del modulo e indice degli shard
- [brainstorming.md](brainstorming.md) — decisioni e indice degli shard
- [epics/module-roadmap.md](epics/module-roadmap.md) — roadmap epic A–D
- [epics/epic-1-identity-core.md](epics/epic-1-identity-core.md) — Epic 1: superficie pubblica, social auth, Passport
- [quick-reference.md](quick-reference.md) — comandi rapidi del workflow
- [setup-guide.md](setup-guide.md) — setup e verifica minima

### Planning

- [product-brief.md](product-brief.md) · [prd.md](prd.md) · [project-context.md](project-context.md) · [tech-spec.md](tech-spec.md) · [ux-design.md](ux-design.md) · [decision-log.md](decision-log.md)

### Shard

- [architecture/module-boundary.md](architecture/module-boundary.md) — confini e gate
- [brainstorming/module-opportunities.md](brainstorming/module-opportunities.md) — domande ad alto valore e rischi
- [deep-recon-user.md](deep-recon-user.md) · [user-architecture-gap-analysis.md](user-architecture-gap-analysis.md)
- [filament-ux-architecture.md](filament-ux-architecture.md) · [filament-ux-brainstorming.md](filament-ux-brainstorming.md)
- [module-excellence-architecture.md](module-excellence-architecture.md) · [module-excellence-brainstorming.md](module-excellence-brainstorming.md) · [module-excellence-prd.md](module-excellence-prd.md) · [module-excellence-product-brief.md](module-excellence-product-brief.md)
- [perfection-architecture.md](perfection-architecture.md) · [perfection-brainstorming.md](perfection-brainstorming.md) · [perfection-decision-log.md](perfection-decision-log.md) · [perfection-epics.md](perfection-epics.md) · [perfection-plan.md](perfection-plan.md) · [perfection-prd.md](perfection-prd.md)
- [advantages-filament-only.md](advantages-filament-only.md) · [advantages-filament-widgets-over-livewire.md](advantages-filament-widgets-over-livewire.md)
- [phpstan-user-contract-fix.md](phpstan-user-contract-fix.md)
- [epics.md](epics.md)

### Conversione widget Livewire → Filament

- [livewire-widget-product-brief.md](livewire-widget-product-brief.md) · [livewire-widget-project-context.md](livewire-widget-project-context.md) · [livewire-widget-prd.md](livewire-widget-prd.md) · [livewire-widget-ux.md](livewire-widget-ux.md) · [livewire-widget-architecture.md](livewire-widget-architecture.md) · [livewire-widget-conversion.md](livewire-widget-conversion.md) · [livewire-widget-decision-log.md](livewire-widget-decision-log.md) · [livewire-widget-epics.md](livewire-widget-epics.md) · [livewire-widget-tech-spec.md](livewire-widget-tech-spec.md) · [livewire-widget-brainstorming.md](livewire-widget-brainstorming.md) · [livewire-inventory.md](livewire-inventory.md)
- Consolidamento: [livewire-widget-consolidation-brief.md](livewire-widget-consolidation-brief.md) · [livewire-widget-consolidation-prd.md](livewire-widget-consolidation-prd.md) · [livewire-widget-consolidation-architecture.md](livewire-widget-consolidation-architecture.md) · [livewire-widget-consolidation-inventory.md](livewire-widget-consolidation-inventory.md) · [livewire-widget-consolidation-benefits.md](livewire-widget-consolidation-benefits.md) · [livewire-widget-consolidation-decision-log.md](livewire-widget-consolidation-decision-log.md) · [livewire-widget-consolidation-epics.md](livewire-widget-consolidation-epics.md) · [livewire-widget-consolidation-sprint-plan.md](livewire-widget-consolidation-sprint-plan.md) · [livewire-widget-consolidation-readiness.md](livewire-widget-consolidation-readiness.md) · [livewire-widget-consolidation-story-superadmin.md](livewire-widget-consolidation-story-superadmin.md)
- SuperAdmin: [tech-spec-superadmin-widget.md](tech-spec-superadmin-widget.md)
- Admin panel: [livewire-widget-admin-panel-provider.md](livewire-widget-admin-panel-provider.md)

### Correzioni e note operative

- [english-login-translation-parity.md](english-login-translation-parity.md) · [guest-login-italian-translation.md](guest-login-italian-translation.md) · [register-mobile-form-width.md](register-mobile-form-width.md)

### Stories

- [stories/module-bmad-audit-20260928.story.md](stories/module-bmad-audit-20260928.story.md)
- [stories/livewire-residual-conversion-cluster-c.story.md](stories/livewire-residual-conversion-cluster-c.story.md)
- [stories/committed-conflict-markers-20261006.story.md](stories/committed-conflict-markers-20261006.story.md)
- [stories/uppercase-application-dir.story.md](stories/uppercase-application-dir.story.md)
- [stories/continuazione-domani.story.md](stories/continuazione-domani.story.md)

## Inventario verificato

| Area | Path | Contenuto |
|------|------|-----------|
| Provider | `app/Providers/` | `UserServiceProvider`, `RouteServiceProvider`, `EventServiceProvider`, `PassportServiceProvider`, `SocialiteServiceProvider`, `Filament/AdminPanelProvider`, `Traits/HasPassportConfiguration` |
| Modelli | `app/Models/` | 50 file `.php` (User, Profile, Team, TeamUser, Tenant, TenantUser, Role, Permission, Device, Extra, Feature, SocialiteUser, SocialProvider, SsoProvider, Oauth*, …) + `Models/Traits/` con 14 trait |
| Resource Filament | `app/Filament/Resources/` | 26 Resource (`UserResource`, `TeamResource`, `RoleResource`, `PermissionResource`, `TenantResource`, `ProfileResource`, `DeviceResource`, `ClientResource`, `Oauth*Resource`, `SocialProviderResource`, `SsoProviderResource`, …) |
| Cluster | `app/Filament/Clusters/` | `Appearance`, `Passport`, `Socialite` |
| Widget | `app/Filament/Widgets/` | `Auth/*` (Login, Register, ResetPassword, …), `Profile/SuperAdminWidget`, `Profile/DeleteAccountWidget`, `Team/TeamChangeWidget`, `RecentLoginsWidget`, `UsersChartWidget`, `NotificationsCenterWidget` |
| Action | `app/Actions/` | 59 Action in `Socialite/` (22), `Passport/` (9), `User/` (4), `Shield/` (8), `Otp/` (5), più `Team/`, `Notification/`, `Activity/`, `Authentication/` |
| Contratti | `app/Contracts/` | 24 contratti attivi (`UserContract`, `TeamContract`, `TenantContract`, `HasTeamsContract`, `TwoFactorAuthenticatableContract`, `HasShieldPermissions`, …) |
| Eventi | `app/Events/` | 27 eventi (Login, Registered, Team*, TwoFactor*, SocialiteUserConnected, …) |
| HTTP | `app/Http/` | controller `Api/`, `Auth/`, `Socialite/`, Livewire `Auth/`, `Profile/`, `Socialite/`, `Team/`, middleware ruolo/tipo/password |
| Console | `app/Console/Commands/` | 16 comandi (AssignRole, AssignTeam, AssignTenant, SuperAdmin, ChangeType, PassportInstall, …) |
| Config | `config/` | `config.php`, `passport.php`, `password.php`, `services.php`, `socialite.php`, `social-providers.php` |
| Traduzioni | `resources/lang/{it,en,es,fr,hi,zh}/` | 16 file per lingua (auth, profile, registration, password-data, tenant, device, client, …) |
| Database | `database/` | `migrations/` (+ `_bak`, `_legacy`), `factories/`, 43 seeder |
| Test | `tests/` | 187 file PHP (Unit, Feature, Fixtures, Support, Traits) |

## Workflow BMAD (fasi)

1. **Analysis** — `project-context.md`, `deep-recon-user.md`, `user-architecture-gap-analysis.md`.
2. **Planning** — `prd.md`, `product-brief.md`, `quick-reference.md`.
3. **Solutioning** — `architecture.md` (mappa reale), `tech-spec.md`, `epics/module-roadmap.md`, `epics/epic-1-identity-core.md`.
4. **Implementation** — ogni story in `stories/`, con lock su `bashscripts/lock/lock.sh` ed esito in `docs/sprint-status.yaml`.

### Refactoring provider Socialite

Il pacchetto BMAD completo per separare il bootstrap Socialite dal provider
generale User è in [socialite-provider-boundary-architecture.md](socialite-provider-boundary-architecture.md),
con PRD, brief, decision log e story correlati.

## Vedi Anche

- [Metodo BMAD in Laraxot](../../../Xot/docs/bmad-method.md)
- [quick-reference](quick-reference.md)
- [setup-guide](setup-guide.md)
<<<<<<< .merge_file_BZEUvl
=======
- [BMAD Workflow Catalog](../bmad-workflow-catalog.md)
- [livewire-to-filament-widget-migration.md](../livewire-to-filament-widget-migration.md)
- [filament_errors.md](../filament_errors.md)

---

*User · BMAD Method · data 2026-05-27*
<<<<<<< .merge_file_H9JAK5
>>>>>>> .merge_file_ZoAy3E
=======
>>>>>>> .merge_file_l4u4Kz
>>>>>>> laraxot/dev
