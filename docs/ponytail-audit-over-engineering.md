# Ponytail audit — User (over-engineering)

**Ultimo run:** 2026-07-02  
**Modulo:** auth, team, Passport, profili.  
**Hub:** [../../../../docs/audit/ponytail-audit.md](../../../../docs/audit/ponytail-audit.md)  
**Remediation:** [../../../../docs/project/ponytail-audit-remediation.md](../../../../docs/project/ponytail-audit-remediation.md)  
**GitHub monorepo:** [Issue #221](https://github.com/laraxot/base_quaeris_fila5/issues) · [Discussion #222](https://github.com/laraxot/base_quaeris_fila5/discussions) · [Discussion #228](https://github.com/laraxot/base_quaeris_fila5/discussions)

## Findings

| # | Tag | Cosa | Sostituzione | Path |
|---|-----|------|--------------|------|
| U2 | `delete` | 16 contratti Fortify/Jetstream orfani (1 ref = solo definizione) | Widget `getState()` + Action | `app/Contracts/` | ✅ **2026-07-01** |
| U2b | `delete` | `MockUserWithTeams` duplicato fuori `Fixtures/` | Solo `Fixtures/MockUserWithTeams` | `tests/Unit/Models/Traits/` | ✅ |
| U2c | `shrink` | `HasAuthenticationLogTrait` generics `$this` | PHPStan L10 covariant | `app/Models/Traits/` | ✅ |
| U3 | `shrink` | `BaseUser.php` con molti trait | Consolidato HasDevices+HasSocialite+HasModules → HasRelations; inlined HasSpatiePermission | `app/Models/BaseUser.php` | ✅ **2026-07-02** |
| U4 | `delete` | ~281 `lang/**/*.backup_*` | `lang/{locale}/*.php.bak` in-place | `lang/` | ✅ — [wiki](./wiki/concepts/lang-backup-in-place.md) |

**Contratti rimasti (canonici):** `UserContract`, `TeamContract`, `TenantContract`, `HasTeamsContract`, `HasAuthentications`, `HasShieldPermissions`, `ModelContract`, `PassportHasApiTokensContract`.

## ⛔ Fuori perimetro (non tagliare)

| Area | Motivo |
|------|--------|
| `app/Models/Policies/*Policy.php` | Contratto Laravel/Filament — anche stub su `UserBasePolicy`. Vedi [Job: model-policy-laravel-contract](../../Job/docs/wiki/concepts/model-policy-laravel-contract.md). |

## Remediation U3

| Metrica | Prima | Dopo |
|---------|-------|------|
| Trait files in `Models/Traits/` | 12 | 9 |
| Trait imports in `BaseUser.php` | 14 | 11 |
| `use` lines in class body | 13 | 11 |
| Files deleted | — | 4 (`HasDevices`, `HasSocialite`, `HasModules`, `HasSpatiePermission`) |
| Files created | — | 1 (`HasRelations`) |

**Cosa fatto:**
- HaDevices (1 metodo) + HasSocialite (3 metodi) + HasModules (1 metodo) → fusi in `HasRelations`
- HasSpatiePermission (wrapper vuoto su Spatie HasRoles + HasPermissions) → inline direttamente in BaseUser
- Aggiunti `// ponytail:` comment per grouping e inlining

## Vincolo correlato

`spatie/laravel-permission` resta in **Xot** `composer.json`, non rimuovere da lì.

## Collegamenti

- [00-INDEX.md](./00-INDEX.md)
- [Xot audit](../../Xot/docs/ponytail-audit-over-engineering.md)
