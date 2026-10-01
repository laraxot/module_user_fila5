<<<<<<< HEAD
# User Module Architecture (BMAD)

**Status**: ✅ Finalized
**Last Update**: 2026-09-21
**Scope**: Module User architecture documentation for perfection

## 🏗️ System Overview

The User module is the **identity foundation** for the entire PTVX ecosystem. It provides authentication, authorization, user management, teams, and multi-tenancy through a well-layered architecture.

## 📐 Architectural Layers

### Layer 1: Models (Data Foundation)
**Location**: `app/Models/`

**Core Models**:
- `BaseUser` → `User`: STI-based user with authentication and authorization
- `Profile`: Extended user profile with schemaless attributes
- `Team`: Team collaboration with hierarchical permissions
- `Tenant`: Multi-tenancy isolation
- `Role`/`Permission`: RBAC via Spatie Permission
- `AuthenticationLog`: Security audit trail
- `Device`: User device tracking
- `SocialProvider`: OAuth/Social login integration
- `SsoProvider`: SSO integration

**Pattern**: Eloquent models with global scopes for tenant/team isolation, UUID primary keys, timestamp auditing.

### Layer 2: Actions (Business Logic)
**Location**: `app/Actions/`

**Action Categories**:
```
app/Actions/
├── Authentication/     # Login, logout, two-factor
├── Authorization/      # Role/permission assignment
├── UserManagement/     # Create, update, delete, activate
├── TeamManagement/     # Team membership, invitations
├── Socialite/          # OAuth flows
├── Passport/           # OAuth2 client management
├── Otp/               # One-time password logic
└── Shield/            # Filament Shield configuration
```

**Pattern**: All business logic implemented as Queueable Actions with `->execute()` method, following Xot conventions.

### Layer 3: Traits (Reusable Behaviors)
**Location**: `app/Models/Traits/`

**Trait Hierarchy**:
```
HasAuthenticationLogTrait → Authentication event tracking
HasDevices → Device management
HasSocialite → OAuth integration
HasSpatiePermission → Role/permission handling
HasTeams → Team management
HasTenants → Multi-tenancy
HasPasswordExpiry → Password lifecycle
HasModules → Module access control
```

**Pattern**: Traits compose complex behaviors without inheritance coupling.

### Layer 4: Filament Resources (Admin UI)
**Location**: `app/Filament/Resources/`

**Resource Structure**:
```
app/Filament/Resources/
├── UserResource         # Main user CRUD
├── TeamResource         # Team management
├── RoleResource         # Role configuration
├── PermissionResource   # Permission setup
├── TenantResource       # Tenant management
├── AuthenticationLogResource  # Security audit
├── DeviceResource       # Device management
└── ...                  # Supporting resources
```

**Pattern**: Each resource extends `XotBaseResource` with consistent patterns for listing, creating, editing, and viewing records.

### Layer 5: Widgets & Pages (UI Components)
**Location**: `app/Filament/Widgets/` and `app/Filament/Pages/`

**Widget Types**:
- **Auth Widgets**: Login, Register, ForgotPassword, PasswordReset
- **Profile Widgets**: EditUser, Profile, SuperAdmin
- **Dashboard Widgets**: UsersChart, SecurityAlerts, LoginWidget
- **Team Widgets**: TeamChange

**Page Types**:
- **Auth Pages**: Login, Register, PasswordExpired, EditProfile
- **Admin Pages**: Dashboard, SocialiteProviderSettings
- **Tenancy Pages**: RegisterTeam, RegisterTenant, EditTeamProfile, EditTenantProfile

**Pattern**: Widgets extend `XotBaseWidget` with consistent form handling and event listening.

## 🔗 Dependency Graph

```
User Module
├── Depends On:
│   ├── Xot (BaseModel, BaseResource, traits)
│   ├── Spatie Permission (RBAC)
│   ├── Laravel Passport (OAuth2)
│   ├── Filament v5 (Admin UI)
│   └── Socialiteproviders (OAuth providers)
│
├── Consumed By:
│   ├── Activity (User activity tracking)
│   ├── Notify (Notifications)
│   ├── Tenant (Enhanced tenancy)
│   ├── Lang (Translations)
│   ├── Performance (User metrics)
│   └── UI (Interface components)
│
└── Used By: 16+ modules (Activity, Notify, Tenant, Lang, etc.)
```

## 📊 Data Flow Architecture

### User Lifecycle
```
Registration → Validation → User Creation → Profile Creation
                                              → Default Role Assignment
                                              → Welcome Email
                                              → Activity Log
```

### Authentication Flow
```
Login Request → Validation → Credential Check → 2FA Challenge (if enabled)
                                              → Session Creation
                                              → Authentication Log
                                              → Token Generation
```

### Team/Hierarchy Flow
```
Team Creation → Owner Assignment → Member Invitation
                                    → Role Assignment
                                    → Permission Inheritance
                                    → Activity Tracking
```

## 🔒 Security Architecture

### Authentication Layers
1. **Primary**: Username/password with bcrypt
2. **Secondary**: OAuth/Social login (Google, Facebook, GitHub, Microsoft)
3. **Tertiary**: SSO integration via SAML/OAuth
4. **Quaternary**: 2FA (TOTP) for enhanced security

### Authorization Matrix
```
Role-Based Access Control (RBAC)
├── Super Admin → Full system access
├── Admin → Module administration
├── HR Manager → User management within scope
└── User → Basic profile access

Team-Based Permissions
├── Team Owner → Full team control
├── Team Admin → Team member management
└── Team Member → Limited team access

Tenant Isolation
├── Tenant Admin → Full tenant management
├── Tenant User → Limited tenant access
└── Cross-Tenant → Controlled by super-admin policies
```

### Security Features
- **Rate Limiting**: Login attempt throttling
- **Account Lockout**: After repeated failed attempts
- **Session Management**: Secure session handling with device tracking
- **Token Expiration**: Automatic token revocation
- **Audit Logging**: Complete authentication trail
- **Password Policies**: Configurable expiration and complexity

## ⚙️ Configuration Architecture

### Core Configuration Files
- `config/user.php`: Module-level settings
- `config/passport.php`: OAuth2 configuration
- `config/socialite.php`: OAuth provider settings
- `config/social-providers.php`: Provider-specific settings
- `config/password.php`: Password reset settings

### Environment Variables
- `USER_AUTH_TIMEOUT`: Authentication timeout
- `USER_2FA_ENABLED`: Two-factor authentication toggle
- `USER_TEAM_LIMIT`: Maximum teams per user
- `USER_TENANT_MODE`: Isolation level (none/soft/hard)

## 🎨 UI/UX Architecture

### Filament Panel Integration
- **Main Panel**: `Modules\User\Providers\Filament\AdminPanelProvider`
- **Navigation**: Automatic discovery of resources, pages, widgets
- **Theming**: Consistent branding and layout
- **Responsive**: Mobile-first design patterns

### Widget Architecture
```php
class FirmaValutatoreWidget extends XotBaseWidget
{
    public ?string $valutatore_id = '';
    public ?string $anno = '';
    public ?array $filters = null;

    // Visibility controlled by filters
    public function visible(): bool
    {
        return $this->filters['valutatore_id'] !== null;
    }
}
```

## 🔄 Integration Patterns

### API Integration
- **Sanctum Tokens**: For external API authentication
- **Passport Clients**: For OAuth2 server-side integration
- **Socialite**: For social login flows
- **SSO Providers**: For enterprise SSO

### Event-Driven Architecture
```php
// Domain Events
UserCreated, UserLoggedIn, UserLoggedOut,
RoleAssigned, PermissionRevoked, TeamCreated,
TenantAssigned, DeviceRegistered, PasswordChanged

// Event Listeners
ActivityLogger, NotificationSender, AuditLogger,
TokenRevoker, SessionCleaner
```

## 📈 Scalability Patterns

### Database Scaling
- **Connection Isolation**: Separate 'user' connection
- **Read Replicas**: Distributed read queries
- **Sharding**: Future multi-database support
- **Caching**: Redis-based caching layers

### Performance Optimization
- **Lazy Loading**: Deferred relationship loading
- **Eager Loading**: Strategic preloading for lists
- **Query Optimization**: Composite indexes and selective columns
- **Pagination**: Efficient large dataset handling

## 🎯 Architectural Principles

1. **Separation of Concerns**: Clear boundaries between layers
2. **Composition over Inheritance**: Trait-based behavior composition
3. **Convention over Configuration**: Consistent patterns across module
4. **Security by Default**: Secure defaults and explicit overrides
5. **Performance by Design**: Optimized from the start
6. **Extensibility First**: Designed for growth and modification
7. **Testability**: Architecture supports comprehensive testing
8. **Documentation-driven**: Self-documenting code and clear patterns

---

*Architecture documentation based on BMAD methodology*  
*Last verified: 2026-09-21*
=======
---
title: "User — Architettura"
type: architecture
tags: [bmad, user, architecture, identity, auth]
created: 2026-09-26
updated: 2026-09-28
qmd: "User architettura mappa reale modelli trait resource action passport socialite team tenant"
module: User
related:
  - ./architecture/module-boundary.md
  - ./brainstorming.md
  - ./README.md
  - ./deep-recon-user.md
  - ./user-architecture-gap-analysis.md
---

# User Module Architecture (BMAD)

> **SUMMARY**: mappa reale del modulo identità User (679 file PHP in `app/`, 187 in `tests/`): 50 modelli + 14 trait in `app/Models`, 26 Resource Filament nei cluster `Appearance`/`Passport`/`Socialite`, 59 Action, 24 contratti, 27 eventi, 5 provider, 6 config, 16 chiavi di traduzione per lingua. Le sezioni finali conservano la descrizione a strati del 2026-09-21 con l'elenco delle imprecisioni corrette.

## Indice degli shard

- [architecture/module-boundary.md](architecture/module-boundary.md) — confini e gate
- [deep-recon-user.md](deep-recon-user.md) — ricognizione estesa
- [user-architecture-gap-analysis.md](user-architecture-gap-analysis.md) — gap analysis
- [filament-ux-architecture.md](filament-ux-architecture.md) — architettura UX Filament
- [module-excellence-architecture.md](module-excellence-architecture.md) — eccellenza del modulo
- [perfection-architecture.md](perfection-architecture.md) — rifinitura
- [livewire-widget-architecture.md](livewire-widget-architecture.md) e [livewire-widget-consolidation-architecture.md](livewire-widget-consolidation-architecture.md) — architettura widget

## Namespace e provider

Root `Modules\User`, alias `user`. Provider dichiarati in `module.json`: `UserServiceProvider`, `Providers\Filament\AdminPanelProvider` (estende `XotBasePanelProvider`), `PassportServiceProvider`, `SocialiteServiceProvider`; presenti inoltre `RouteServiceProvider` e `EventServiceProvider`. `app/Providers/Traits/HasPassportConfiguration.php` contiene la configurazione Passport condivisa. File non attivi: `FilamentServiceProvider.fila2`, `UserPanelProvider.boh`.

## Modelli e trait

- `app/Models/`: `User`, `BaseUser`, `Profile`, `BaseProfile`, `Team`, `BaseTeam`, `TeamUser`, `BaseTeamUser`, `Membership`, `TeamInvitation`, `TeamPermission`, `Tenant`, `BaseTenant`, `TenantUser`, `Role`, `Permission`, `ModelHasRole`, `ModelHasPermission`, `RoleHasPermission`, `PermissionRole`, `PermissionUser`, `ModelRole`, `Device`, `DeviceUser`, `DeviceProfile`, `Extra`, `Feature`, `Notification`, `PasswordReset`, `PersonalAccessToken`, `SocialiteUser`, `SocialProvider`, `SsoProvider`, `OauthClient`, `OauthAccessToken`, `OauthAuthCode`, `OauthRefreshToken`, `OauthDeviceCode`, `OauthPersonalAccessClient`, `OauthToken`, `BaseModel`, `BaseUuidModel`, `BasePivot`, `BaseMorphPivot`, `BaseInteractsWithTenant`, `BaseInteractsWithExtra`, `BaseIsTenant`.
- `app/Models/Traits/` (14): `HasAuthenticationLogTrait`, `HasDevices`, `HasModules`, `HasPasswordExpiry`, `HasRoles`, `HasSocialite`, `HasSpatiePermission`, `HasTeams`, `HasTeamsMembershipAdministration`, `HasTenants`, `InteractsWithTenant`, `IsTenant`, `IsProfileTrait`, `BaseUserUniqueNameAttribute`.
- File congelati: `BaseModel.php.backup-20251015-092511`, `HasRelations.php.old`, `Membership.Jetstream`, `Team.Jetstream`, `TeamInvitation.Jetstream`, `OauthAccessToken.php.old`.

## Resource Filament

`app/Filament/Resources/` contiene 26 Resource: `UserResource`, `BaseUserResource`, `ProfileResource`, `BaseProfileResource`, `TeamResource`, `TeamUserResource`, `TeamPermissionResource`, `TeamInvitationResource`, `TenantResource`, `TenantUserResource`, `RoleResource`, `PermissionResource`, `FeatureResource`, `DeviceResource`, `ClientResource`, `PersonalAccessTokenResource`, `AuthenticationLogResource`, `PasswordResetResource`, `SocialProviderResource`, `SocialiteUserResource`, `SsoProviderResource`, `OauthClientResource`, `OauthAccessTokenResource`, `OauthAuthCodeResource`, `OauthRefreshTokenResource`, `OauthDeviceCodeResource`, `OauthPersonalAccessClientResource`.

Cluster: `app/Filament/Clusters/Appearance` (aspetto del profilo), `Clusters/Passport` (dashboard e 6 Resource OAuth con Schemas/Tables/Pages), `Clusters/Socialite` (SocialProvider, SsoProvider, SocialiteUser).

Pagine: `Filament/Pages/Dashboard.php`, `MyProfilePage.php`, `Password.php`, `SocialiteProviderSettingsPage.php`, `Pages/Auth/{Login,Register,PasswordExpired,EditProfile}.php`, `Pages/Tenancy/{RegisterTeam,RegisterTenant,EditTeamProfile,EditTenantProfile}.php`.

Azioni Filament: `ChangePasswordAction`, `AlwaysAskPasswordConfirmationAction`, `Header/AttachRoleAction`, `Header/ChangePasswordHeaderAction`, `Profile/ChangeProfilePasswordAction`.

## Widget

- `app/Filament/Widgets/Auth/`: `BaseAuthWidget`, `LoginWidget`, `RegisterWidget`, `ForgotPasswordWidget`, `ResetPasswordWidget`, `PasswordResetWidget`, `PasswordResetConfirmWidget`, `SocialLoginWidget`, `AuthLogoutWidget`, `LogoutWidget`, `Schemas/UserForm.php`.
- `app/Filament/Widgets/Profile/`: `SuperAdminWidget`, `DeleteAccountWidget`.
- `app/Filament/Widgets/Team/TeamChangeWidget.php`.
- Root widgets: `EditUserWidget`, `LoginWidget`, `LogoutWidget`, `PasswordExpiredWidget`, `PrivacyPolicyWidget`, `RecentLoginsWidget`, `RegistrationWidget`, `TermsOfServiceWidget`, `UserDropdown`, `UsersChartWidget`, `UserTypeRegistrationsChartWidget`, `NotificationsCenterWidget`.
- File non attivi: `Auth/BaseAuthWidget.php.no`, `LogoutWidget.php.corrected`.

## Action (59)

| Area | Action principali |
|------|-------------------|
| `Socialite/` (22) | `LoginUserAction`, `RegisterOauthUserAction`, `RegisterSocialiteUserAction`, `CreateSocialiteUserAction`, `SetDefaultRolesBySocialiteUserAction`, `IsUserAllowedAction`, `GetProviderButtonsAction`, `GetDomainAllowListAction`, `AnalyzeSocialiteEmailDomainAction`, `ResolveUserNameFieldsFromSocialiteAction`, `ValidateProviderAction`, `LogoutUserAction`, `RedirectToLoginAction` |
| `Passport/` (9) | `CreateClientAction`, `CreateGenericClientAction`, `CreatePasswordClientAction`, `CreatePersonalAccessClientAction`, `RegenerateClientSecretAction`, `RevokeAllUserTokensAction`, `RevokeClientAction`, `RevokeRefreshTokenAction`, `RevokeTokenAction` |
| `Shield/` (8) | `GetPermissionModelAction`, `ShieldUtilsAction`, `ResolveExclusionsConfigurationAction`, `ResolveFilamentUserConfigurationAction`, `ResolvePermissionsConfigurationAction`, `ResolveShieldAuthenticationConfigurationAction`, `ResolveShieldResourceConfigurationAction`, `ResolveSuperAdminConfigurationAction` |
| `Otp/` (5) | `Hasher`, `HashOtpValueAction`, `OtpHashNeedsRehashAction`, `SendOtpByUserAction`, `VerifyOtpHashAction` |
| `User/` (4) | `CreateUserAction`, `UpdateUserAction`, `DeleteUserAction`, `GetNewPasswordAction` |
| Altre aree | `Team/GetUserTeamsOptionAction`, `Notification/IsNotificationSchemaReadableAction`, `Activity/LogRegistrationAction`, `Activity/AuthenticationLogQueryAction`, `Authentication/GetAuthenticationLogQueryForAuthenticatableAction`, `Auth/GetAuthenticationLogQueryAction`, `GetCurrentDeviceAction`, `GetPermissionModelAction` |

Adattatori: `app/Adapters/Otp/Hasher.php`, `app/Adapters/Socialite/EmailDomainAnalyzer.php`, `app/Adapters/Socialite/UserNameFieldsResolver.php`.

## Contratti, eventi, dati

- `app/Contracts/` (24 attivi): `UserContract`, `TeamContract`, `TenantContract`, `TeamInvitationContract`, `HasTeamsContract`, `HasTeamsAndUserContract`, `AddsTeamMembers`, `InvitesTeamMembers`, `RemovesTeamMembers`, `CreatesTeams`, `DeletesTeams`, `UpdatesTeamNames`, `CreatesNewUsers`, `DeletesUsers`, `ResetsUserPasswords`, `UpdatesUserPasswords`, `UpdatesUserProfileInformation`, `HasAuthentications`, `HasDevices`, `HasSocialite`, `HasShieldPermissions`, `HasProfilePhotoContract`, `PassportHasApiTokensContract`, `TwoFactorAuthenticatableContract`, `TwoFactorAuthenticationProvider`, `ModelContract`. File non attivi: `CanComment.php.old`, `UserContract.php.to_xot`, `PassportHasApiTokensContract.php.old`.
- `app/Events/` (27): `Login`, `Registered`, `UserRegistered`, `NewPasswordSet`, `RegistrationNotEnabled`, `UserNotAllowed`, `AddingTeam`, `AddingTeamMember`, `InvitingTeamMember`, `RemovingTeamMember`, `TeamCreated`, `TeamDeleted`, `TeamEvent`, `TeamMemberAdded`, `TeamMemberRemoved`, `TeamMemberUpdated`, `TeamSwitched`, `TeamUpdated`, `TwoFactorAuthenticationChallenged/Confirmed/Disabled/Enabled`, `TwoFactorAuthenticationEvent`, `SocialiteUserConnected`, `RecoveryCodeReplaced`, `RecoveryCodesGenerated`, `InvalidState`.
- `app/Datas/`: `CreateUserData`, `UpdateUserData`, `PasswordData`, `UserContextData`, `DeviceData`, `SuperAdminData`, `SocialiteEmailDomainAnalysisData`, `SocialiteNameFieldsData`, `SocialiteUserAttributesData`, `SocialProviderData`, `PermissionData`, `PermissionCacheData`, `PermissionColumnNamesData`, `PermissionModelsData`, `PermissionTableNamesData`, `FilamentShieldData`, `FilamentUserData`, `ShieldResourceData`.
- Listener: `LoginListener`, `LogoutListener`, `FailedLoginListener`, `OtherDeviceLogoutListener`. Notifiche: `Auth/Otp`, `Auth/ResetPassword`, `Auth/VerifyEmail`.

## HTTP, console, regole

- Controller: `Api/{LoginController,RegisterController,LogoutController,GetLoggedUserController}`, `Auth/{EmailVerificationController,VerifyEmailController,LogoutController}`, `Socialite/{RedirectToProviderController,ProcessCallbackController}`, `UpgradeController`.
- Livewire (chrome in via di consolidamento): `Auth/{Login,Register,Logout,AuthLogout,Verify}`, `Auth/Passwords/{Confirm,Email,Reset}`, `Profile/{SuperAdmin,DeleteAccount}`, `Socialite/Buttons`, `Team/Change`, `PrivacyPolicy`, `TermsOfService`.
- Middleware: `EnsureRegistrationEnabled`, `EnsureUserHasRole`, `EnsureUserHasType`, `PasswordExpiryMiddleware`.
- 16 comandi: `AssignModule`, `AssignRole`, `RemoveRole`, `AssignTeam`, `AssignTenant`, `SetCurrentTeam`, `ChangePassword`, `ChangeType`, `CreateTeam`, `CreateTenant`, `FetchUserApiToken`, `BackfillOauthClientOwner`, `PassportInstall`, `ShowUserList`, `ShowTenantList`, `SuperAdmin`.
- Regola OTP: `app/Rules/CheckOtpExpiredRule.php`.

## Config e traduzioni

`config/config.php`, `passport.php`, `password.php`, `services.php`, `socialite.php`, `social-providers.php` (più `user-filament.fila2` non attivo). Lingue: `it`, `en`, `es`, `fr`, `hi`, `zh`, 16 file ciascuna. Le traduzioni di login e i test di parità sono tracciati in [english-login-translation-parity.md](english-login-translation-parity.md) e [guest-login-italian-translation.md](guest-login-italian-translation.md).

## Test

187 file PHP: `tests/Unit/` (Actions, Adapters, Contracts, Datas, Enums, Events, Filament, Http/Livewire, Models, Traits, Rules, Security, Passport, Mail), `tests/Feature/` (Actions, Auth, Filament, Passport, Team, Tenant, Login/User management), `tests/Fixtures/`, `tests/Support/`, `tests/Traits/`, `tests/Fakes/`.

## Tabella file → responsabilità (sintesi)

| File | Responsabilità |
|------|----------------|
| `app/Providers/UserServiceProvider.php` | bootstrap del modulo identità |
| `app/Providers/Filament/AdminPanelProvider.php` | pannello Filament (estende `XotBasePanelProvider`) |
| `app/Providers/PassportServiceProvider.php` + `Traits/HasPassportConfiguration.php` | registrazione server OAuth2 |
| `app/Providers/SocialiteServiceProvider.php` | registrazione provider social |
| `app/Models/User.php` + `Models/Traits/HasTeams.php` | identità, team corrente, ruoli |
| `app/Contracts/UserContract.php` | contratto pubblico del modello utente |
| `app/Actions/Socialite/LoginUserAction.php` | login social |
| `app/Filament/Widgets/Profile/SuperAdminWidget.php` | toggle super-admin nel chrome |
| `app/Filament/Clusters/Passport/` | Resource OAuth2 |

## Correzioni rispetto alla descrizione del 2026-09-21

- `config/user.php` **non esiste**: la configurazione del modulo è `config/config.php`.
- Il pannello è `Modules\User\Providers\Filament\AdminPanelProvider` (sotto `app/Providers/Filament/`), non `Modules\User\Providers\Filament\AdminPanelProvider` da percorso piatto.
- I trait stanno in `app/Models/Traits/` (14 file), non in una directory `app/Models/Traits/` con i nomi descritti a blocco: `HasModules` e `HasPasswordExpiry` esistono, `HasAuthenticationLogTrait` pure; `HasSpatiePermission` è presente come `HasSpatiePermission.php`.
- Le variabili `USER_AUTH_TIMEOUT`, `USER_2FA_ENABLED`, `USER_TEAM_LIMIT`, `USER_TENANT_MODE` vanno verificate in `.env`/config: non sono documentate in `config/config.php` con questi nomi.
- `Device`, `SocialProvider`, `SsoProvider` esistono come modelli, ma le Resource corrispondenti vivono in `app/Filament/Resources/` e non in cluster dedicati.

## Descrizione a strati (2026-09-21, conservata)

### Layer

1. **Models** — modelli Eloquent con trait per team, tenant, ruoli, device, socialite, scadenza password.
2. **Actions** — logica di business in Action Queueable con `->execute()`, mai Service.
3. **Filament Resources** — adattatori admin che estendono le classi base Xot.
4. **Widgets & Pages** — widget `XotBaseWidget` per auth, profilo, dashboard e team.
5. **Traits** — composizione di comportamenti senza accoppiamento per eredità.

### Dipendenze

- Da: Xot (classi base), Spatie Permission (RBAC), Laravel Passport (OAuth2), Filament v5, Socialite providers.
- Consumato da: Activity, Notify, Tenant, Lang, Performance, UI e altri moduli.

### Flussi

- **Registrazione**: validazione → creazione utente → profilo → ruolo predefinito → email di benvenuto → log attività.
- **Autenticazione**: credenziali → eventuale challenge 2FA → sessione → `AuthenticationLog` → token.
- **Team**: creazione → owner → inviti membri → ruoli → eredità dei permessi.

### Sicurezza

- Autenticazione primaria con password, secondaria social (Google, Facebook, GitHub, Microsoft), terziaria SSO, quaternaria 2FA TOTP.
- RBAC con ruoli Super Admin / Admin / HR Manager / User; permessi per team; isolamento per tenant.
- Rate limiting, blocco account dopo tentativi ripetuti, gestione sessioni con tracciamento device, revoca token, audit trail, scadenza password.

### Principi

Separazione delle responsabilità, composizione su eredità, convenzione su configurazione, sicurezza by default, prestazioni by design, estensibilità, testabilità, documentazione come parte del codice.

## Stato qualità

- PHPStan e Pest non eseguiti in questa campagna: i gate restano quelli del modulo (`laravel/phpstan.neon` su `Modules/`, Pest fuori host `10.100.200.15`).
- Esito delle verifiche e stato delle story: `docs/sprint-status.yaml`.
>>>>>>> laraxot/dev
