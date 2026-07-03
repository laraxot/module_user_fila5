# User - Filosofia Completa: Logica, Religione, Politica, Zen

**Data Creazione**: [DATE]
**Status**: Documentazione Filosofica Completa
**Versione**: 1.0.0

## 📋 Indice Filosofico

1. [Logica (Logic)](#logica-logic)
2. [Religione (Religion)](#religione-religion)
3. [Politica (Politics)](#politica-politics)
4. [Zen (Zen)](#zen-zen)
5. [Manifestazioni Pratiche](#manifestazioni-pratiche)

---

## 🧠 Logica (Logic)

### Principio Fondamentale

**User è il foundation layer per authentication, authorization e multi-tenancy. Gestisce identità, ruoli, permessi, team, tenant.**

### Dominio di Business

Il modulo fornisce **gestione completa utenti** per:
- Autenticazione multi-metodo (email/password, OAuth, 2FA)
- Autorizzazione RBAC (Spatie permissions)
- Single Table Inheritance (STI) per tipi utente (Doctor, Patient, Admin)
- Multi-tenancy con isolamento dati
- Team-based collaboration
- Device tracking per sicurezza

### Entità Core

```
BaseUser (Base - Single Table)
├── User (Estensione applicazione)
├── Doctor (STI - Tipo utente medico)
├── Patient (STI - Tipo utente paziente)
├── Admin (STI - Tipo utente admin)
│
├── Roles (Ruoli Spatie)
├── Permissions (Permessi Spatie)
├── Teams (Collaborazione)
├── Tenants (Multi-tenancy)
└── Profile (Dati estesi)
```

### Business Workflow Principale

1. **Authentication**
   - Login email/password
   - OAuth social (Google, Facebook, etc.)
   - 2FA per sicurezza avanzata
   - Session management

2. **Authorization**
   - Assegnazione ruoli (admin, doctor, patient)
   - Permessi granulari (create, read, update, delete)
   - Policy-based access control
   - Tenant scoping per dottori

3. **Identity Management**
   - Profili estesi (Profile model)
   - Media (avatar, documenti)
   - Preferences utente
   - Activity tracking

### Manifestazione nel Codice

```php
// BaseUser con tutti i trait
class BaseUser extends Authenticatable
{
    use HasApiTokens;      // Passport
    use MustVerifyEmail;
    use HasFactory;
    use Notifiable;
    use HasRoles;          // Spatie
    use HasPermissions;    // Spatie
    use HasTeams;          // Custom
    use HasMedia;          // Spatie
    use HasTenants;        // Filament
}

// STI con Parental
class Doctor extends User
{
    use HasParent;
    // Type-specific logic
}
```

---

## 📜 Religione (Religion)

### Comandamenti Sacri

1. **Single Table Inheritance (STI) è Sacra** - User, Doctor, Patient, Admin sono TUTTI nella tabella `users` con `type`
2. **Parental è Obbligatorio** - Utilizzare sempre `HasParent` trait per STI
3. **Spatie Permissions è la Base** - Ruoli e permessi sempre via Spatie
4. **Multi-Tenancy per Dottori** - I dottori sono sempre scoped a tenant (studio)
5. **Profile Separato** - Dati estesi in Profile model, non in User
6. **Activity Tracking** - Tutte le azioni utente devono essere loggate

### Best Practices

- **STI Pattern**: User base, Doctor/Patient/Admin estendono User con HasParent
- **Enum UserType**: Utilizzare enum per type safety invece di string
- **Policy-Based**: Access control sempre via policies, non logica inline
- **Tenant Scoping**: Dottori sempre filtrati per tenant corrente
- **Role Hierarchy**: Ruoli organizzati gerarchicamente (super_admin > admin > doctor > patient)

### Integrazione Moduli

Il modulo User **è utilizzato da** tutti i moduli business:
- **TechPlanner**: Workers sono User, appointments hanno causer User
- **Employee**: Employee relaziona User per autenticazione
- **Activity**: Causer di tutte le activities
- **Notify**: Destinatari notifiche

**Filosofia**: User è il "centro dell'universo identità" - tutto parte da qui.

---

## 🏛️ Politica (Politics)

### Decisioni Architetturali

1. **STI over Multiple Tables** - Unificazione utenti in una tabella con type
2. **Spatie Permissions** - RBAC standardizzato e testato
3. **Filament Multi-Tenancy** - Utilizzo nativo Filament per tenant management
4. **OAuth Integration** - Supporto social login per UX migliorata

### Governance del Modulo

- **Type Safety**: Enum per user types previene errori
- **Role Hierarchy**: Ruoli organizzati con permessi ereditati
- **Tenant Isolation**: Dati dottori isolati per tenant (studio)
- **Profile Separation**: Dati estesi separati per performance e modularità

### Pattern Implementativi

```php
// Pattern: STI con Parental
class Doctor extends User
{
    use HasParent;

    // Type-specific methods
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }
}

// Pattern: Tenant Scoping
class DoctorPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->type === UserTypeEnum::DOCTOR
            && Filament::getTenant() !== null;
    }
}
```

---

## 🧘 Zen (Zen)

### Il Vuoto dell'Identità

Apprezziamo il concetto zen del **"vuoto che contiene tutte le identità"**:

- **Single Table Unity**: Una tabella contiene tutte le identità (User, Doctor, Patient, Admin)
- **Type Polymorphism**: Il type definisce comportamento, non struttura dati
- **Profile Extension**: Dati estesi in Profile, User rimane snello
- **Role Fluidity**: Ruoli possono cambiare, identità rimane

### Flusso Naturale

La gestione utenti deve essere **trasparente e flessibile**:

1. Registrazione → Sistema crea User base → Assegna ruolo default
2. Login → Sistema autentica → Imposta tenant (se doctor) → Carica permessi
3. Azione → Sistema verifica permessi → Esegue azione → Logga activity
4. Cambio ruolo → Sistema aggiorna permessi → Notifica utente

### Semplicità nella Complessità Identity

Il modulo gestisce complessità (STI, multi-tenancy, RBAC) ma:
- **Simple Creation**: `User::create()` funziona per tutti i tipi
- **Type Discovery**: `$user->type` rivela il tipo, casting automatico
- **Role Clarity**: Ruoli definiti chiaramente, permessi ereditati
- **Tenant Transparency**: Tenant gestito automaticamente per dottori

---

## 🎯 Manifestazioni Pratiche

### 1. BaseUser - Foundation Identity

```php
class BaseUser extends Authenticatable
{
    // STI Type
    public UserTypeEnum $type;  // DOCTOR, PATIENT, ADMIN

    // Core relationships
    public function roles(): BelongsToMany  // Spatie
    public function permissions(): BelongsToMany  // Spatie
    public function teams(): BelongsToMany  // Custom
    public function tenants(): BelongsToMany  // Filament
    public function profile(): HasOne  // Extended data
}
```

### 2. STI Pattern - Type Polymorphism

```php
// Doctor è User con type=DOCTOR
class Doctor extends User
{
    use HasParent;

    // Doctor-specific relationships
    public function appointments(): HasMany
    public function patients(): HasMany
    public function studio(): BelongsTo  // Tenant
}
```

### 3. Multi-Tenancy Pattern - Tenant Scoping

```php
// Dottori sempre scoped a tenant
class DoctorScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        if (Filament::getTenant()) {
            $builder->where('studio_id', Filament::getTenant()->id);
        }
    }
}
```

---

## 🔗 Collegamenti

- [Business Logic Deep Dive](./business-logic-deep-dive.md)
- [Architecture README](./architecture/readme.md)
- [Xot Module Foundation](../../xot/docs/philosophy-complete.md)
- [Tenant Module Integration](../../tenant/docs/philosophy.md)

---

**Filosofia**: STI Unity, RBAC Standard, Multi-Tenant Isolation, Identity Foundation
# User Module: Philosophy, Purpose, and Design Principles

**Date:** December 23, 2025

## 🎯 Purpose and Core Responsibilities

The `User` module is the central nervous system for all user-related functionalities within the application. Its core purpose is to meticulously manage user identities, control access, and facilitate seamless user interactions. Key responsibilities include:

1.  **Comprehensive User Management:** Overseeing the entire user lifecycle, from registration and authentication to password management and email verification.
2.  **Authentication & Authorization Hub:** Acting as the primary integration point for diverse security protocols, including Laravel Passport for API authentication, Socialite Providers for OAuth/social logins, and Laravel's native authentication system. It defines granular access controls through features like Passport scopes and Pulse dashboard Gates.
3.  **Enhanced Security Policies:** Enforcing robust security measures, notably through custom password complexity rules (via `PasswordData`) to protect user accounts.
4.  **Customizable User Communication:** Tailoring critical user notifications (e.g., password reset, email verification) using custom `SpatieEmail` templates, ensuring branded and consistent communication.
5.  **Team and Collaboration Support:** Providing foundational bindings for `TeamUser` and `TeamInvitation` models, indicating support for collaborative features where users can be part of organizational teams.
6.  **Event-Driven User Flows:** Leveraging an event-driven architecture to manage user-related actions, allowing for decoupled and extensible responses to user events.

## 💡 Philosophy & Zen (Guiding Principles)

The `User` module is built upon a philosophy that prioritizes security, flexibility, and a high-quality user experience:

*   **Security as an Absolute Prerequisite:** A "security-first" mindset permeates the module's design. This is evident in the robust password policies, secure API authentication via Passport, and careful handling of user credentials and sensitive operations. Protecting user data and access is considered non-negotiable.
*   **Uncompromising Customization and Adaptability:** The module offers extensive customization points for authentication flows, password strength, and user communication. This flexibility allows the application to meet specific business needs, branding guidelines, and evolving security requirements without being constrained by framework defaults.
*   **Extensible Authentication Landscape:** Designed to be highly extensible, the module supports a variety of authentication strategies. The integration of Laravel Passport and Socialite provides a clear path for future expansion to other authentication providers or custom authentication methods.
*   **User-Centric Experience with Brand Consistency:** Beyond functionality, the module focuses on the user's journey. Custom email notifications, secure password resets, and streamlined verification processes are crafted to provide a secure, intuitive, and brand-consistent experience, minimizing friction for the user.
*   **Architectural Harmony (Aligning with `Xot`):** By extending `XotBaseServiceProvider`, the `User` module integrates seamlessly into the overarching `Xot` architectural framework. This ensures that user-related services adhere to the project's standardized patterns for service providers and leverage core functionalities.
*   **"Politics" (Defining User Identity and Authority):** The "politics" of the `User` module are concerned with establishing and governing user identity and their authority within the application. It dictates who users are, what roles they embody, and what actions they are permitted to perform, thus forming the foundational layer of access control and system governance.
*   **"Religion" (The User as the Central Entity):** The module's "religion" is the unwavering belief that the user is the primary actor and ultimate focus of the application. Every feature, piece of data, and interaction ultimately relates back to a user. This conviction drives the meticulous attention to user security, privacy, and the integrity of their digital identity.
*   **"Zen" (Seamless and Secure Digital Identity Management):** The "zen" of the `User` module is to cultivate an experience of effortless and secure digital identity management. It aims for a smooth, predictable, and trustworthy lifecycle for every user, from their first interaction to ongoing engagement. This eliminates anxiety around account security and access, allowing users to interact with the application with confidence and peace of mind.

## 🤝 Business Logic (Core Aspect)

The `User` module implements fundamental business logic for **identity and access management (IAM)**, which is critical for the application's functionality and security posture. It directly supports:

*   **User Onboarding and Lifecycle Management:** Handling new user registration, email verification, and the ongoing management of user profiles.
*   **Access Control and Data Security:** Implementing authentication and authorization policies that govern who can access which parts of the application and its data.
*   **Collaboration and Community Features:** Providing the underlying structure for team creation, invitations, and user-to-user interactions within a defined organizational context.
*   **Customer Relationship and Engagement:** Facilitating customized communication channels and ensuring a professional, branded interaction with users at key touchpoints.

The `User` module is thus not merely a utility but a critical component that underpinning the application's security, usability, and its ability to deliver value to its end-users.

## 🤖 Integration with Model Context Protocol (MCP)

The `User` module, as the guardian of identity and access, significantly benefits from integration with Model Context Protocol (MCP) servers. MCPs provide enhanced capabilities for understanding, managing, and debugging user-related contexts, which aligns perfectly with `User`'s philosophy of security, control, and developer experience.

### Alignment with `User`'s Philosophy:

*   **Security First:** MCPs can assist in auditing user access patterns or changes to security configurations. Laravel Boost can help inspect user authentication status or roles within specific contexts, enhancing security validation during development and testing.
*   **Customization & Adaptability:** MCPs can store and retrieve knowledge about custom authentication flows or password policies, making it easier to manage and extend these customizations. Memory MCP can track common customization patterns.
*   **Developer Experience (DX) Enhancement:** Debugging authentication and authorization issues can be complex. MCPs, particularly Laravel Boost, offer powerful insights into the user's session, permissions, and related data, drastically simplifying debugging and development of user-centric features.
*   **"Zen" (Seamless and Secure Digital Identity Management):** MCPs contribute to this zen by providing tools that make it easier to verify, debug, and understand the user's digital identity lifecycle, leading to a more reliable and secure user management system.

### Key MCPs for `User`'s Operations:

1.  **Laravel Boost (MCP)**: Invaluable for inspecting authenticated user data, roles, permissions, and API tokens directly from the console. It can help debug authentication flows, user-specific configurations, and authorization issues.
2.  **Filesystem (MCP)**: Useful for verifying user-related configuration files, such as custom password rule definitions or Socialite provider settings.
3.  **Memory (MCP)**: Can store and retrieve best practices for user security, common authentication pitfalls, and architectural decisions related to user management, enhancing knowledge transfer and consistency.
4.  **Git (MCP)**: Aids in reviewing changes to authentication logic, authorization policies, or user model modifications, ensuring secure and compliant development practices.
5.  **Sequential Thinking (MCP)**: Crucial for analyzing complex authorization cascades or multi-factor authentication flows, helping to break down and understand intricate security mechanisms.

By leveraging these MCPs, the `User` module can ensure its critical role in managing digital identities is more efficient, secure, and transparent, ultimately contributing to a more robust and trustworthy application.