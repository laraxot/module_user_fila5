---
title: "BaseUser Model in Laravel Modules"
type: concept
tags: [baseuser]
created: 2026-07-14
updated: 2026-07-20
qmd: "baseuser baseuser model in laravel modules"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./00-index.md"
  - "./actions.md"
  - "./permissions.md"
  - "./passport-integration.md"
  - "./socialite-microsoft-integration.md"
---

# BaseUser Model in Laravel Modules

## Overview
`Modules\User\Models\BaseUser` (`app/Models/BaseUser.php`) is the abstract authenticatable
model that provides identity, auth, team, permission, device, OAuth (Passport) and Socialite
functionality for every user type in the system. `Modules\User\Models\User` (`app/Models/User.php`)
is the concrete, non-abstract class actually used at runtime; it extends `BaseUser` and adds
Single Table Inheritance (STI) child types via Parental's `HasChildren`.

This reflects the code as of 2026-07-20 (`BaseUser.php`, 515 lines; `User.php`, 173 lines),
not the generic scaffold previously documented here.

## Key facts

- **Primary key**: UUID string (`HasUuids`, `$incrementing = false`, `$keyType = 'string'`), not
  auto-increment int.
- **Connection**: uses a dedicated `user` DB connection (`protected $connection = 'user'`).
- **STI**: `$childColumn = 'type'`; `User::$childTypes` maps `master_admin`, `backoffice_user`,
  `customer_user`, `system`, `technician` all to `User::class` (i.e. type differentiates data,
  not PHP class, in the current setup).
- **Interfaces implemented**: `FilamentUser`, `HasName`, `HasTenants` (Filament), `MustVerifyEmail`,
  `OAuthenticatable` (Passport), `HasMedia` (Spatie Media Library), plus module contracts
  `HasAuthentications` and `Xot\Contracts\UserContract`.

## Traits composed on BaseUser (and why)

| Trait | Purpose |
|---|---|
| `HasApiTokens` (Passport) | OAuth2 personal access tokens |
| `HasAuthenticationLogTrait` | Records login/logout events, exposes `latestAuthentication()` |
| `HasChildren` (Parental) | STI support for `type` column |
| `HasDevices` | Device/session tracking (see `Device`, `DeviceUser`, `DeviceProfile`) |
| `HasModules` | Per-module role/permission helpers (`assignModule()`) |
| `HasSocialite` | Social login glue (SSO providers, `SocialiteUser`) |
| `HasSpatiePermission` + `HasTeams` | See "teams() vs membershipTeams()" below — combined with an explicit conflict-resolution `insteadof`/`as` |
| `HasUuids` | UUID primary keys |
| `HasXotFactory` | Factory resolution across modules |
| `InteractsWithMedia` | Spatie Media Library |
| `Notifiable` | Laravel notifications |
| `Traits\HasTenants` (module-local) | Multi-tenant resolution, distinct from Filament's `HasTenants` interface |
| `XotTraits\RelationX` | Cross-module relation helpers (`belongsToManyX`, etc.) |

## `teams()` vs `membershipTeams()` — the non-obvious part

Both `HasSpatiePermission` and `HasTeams` (module trait, `app/Models/Traits/HasTeams.php`)
define a `teams()` method, and they mean different things:

- `HasSpatiePermission::teams()` — Spatie Permission's "teams" feature (permission scoping by team).
- `HasTeams::teams()` — Laraxot/Jetstream-style team **membership** pivot
  (`belongsToManyX($teamClass)` via `RelationX`).

`BaseUser` resolves the collision explicitly:

```php
use HasSpatiePermission, HasTeams {
    HasSpatiePermission::teams insteadof HasTeams;
    HasTeams::teams as membershipTeams;
}
```

So on any `BaseUser`/`User` instance:
- `$user->teams()` / `$user->teams` → Spatie's permission-teams relation (guard/permission scoping).
- `$user->membershipTeams()` / `$user->membershipTeams` → actual team membership (Jetstream-style),
  used by `treeSons()`, `allTeams()`, `attach()/detach()`.

This split is verified working via a runtime PSR-4 gate check. Do not "clean up" by renaming one
of them without checking every caller — `HasTeams::allTeams()` merges `ownedTeams` with
`membershipTeams`, and Filament resources/relation managers may depend on either name.

## Key relations and behavior

- `profile(): HasOne` — resolves the profile class dynamically via `XotData::make()->getProfileClass()`,
  with a fallback to `Modules\User\Models\Profile`, and a final no-op fallback relation
  (`whereRaw('1=0')`) if nothing resolves — avoids hard-coupling to a single Profile class across
  projects that override it.
- `clients(): MorphMany` — OAuth2 clients owned by the user (`OauthClient`, polymorphic `owner`).
- `notifications(): MorphMany` — module-local `Notification` model (not the default Laravel
  `DatabaseNotification` table).
- `latestAuthentication(): MorphOne` — latest `AuthenticationLog` row, `latestOfMany()`.
- `findForPassport()` / `validateForPassportPasswordGrant()` — Passport password-grant support.

## Password and name accessors (non-obvious)

- `setPasswordAttribute()`: if the incoming value is shorter than 32 chars it is hashed via
  `Hash::make()`; if ≥32 chars it is stored as-is (already-hashed values, e.g. from imports/seeders,
  pass through unchanged). Empty values unset the attribute rather than overwriting the stored hash.
- `getNameAttribute()`: if `name` is not set, derives a unique slug from the email local-part
  (`email-before-@-1`, `-2`, ...) and persists it via `update()` — except during testing
  (`app()->environment('testing')` or `APP_ENV=testing`), where it only sets the in-memory attribute
  to avoid DB writes during unit tests.
- `getFilamentName()` / `getFullNameAttribute()`: both build a display name from
  `name`/`first_name`/`last_name`, falling back to `email`, then the literal string `'User'`.

## Panel access

`canAccessPanel(Panel $panel)`: any non-`admin` panel ID is treated as a role name and access is
granted only if `$this->hasRole($panelId)`. The `admin` panel currently allows all authenticated
users (`return true`), with a commented-out email-domain check left in place as a marked TODO/example
in the source — flag before relying on it as an authorization boundary.

## Extending BaseUser

`User extends BaseUser` is the only concrete subclass in this module; project-level overrides should
extend `User` (or `BaseUser` directly if bypassing STI), not fork `BaseUser`.

## Related Documentation
- [Actions conventions](./actions.md)
- [Permissions](./permissions.md)
- [Passport integration](./passport-integration.md)
- [Socialite + Microsoft integration](./socialite-microsoft-integration.md)
- [Module index](./00-index.md)
