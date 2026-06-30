# Ponytail audit — User (over-engineering)

**Ultimo run:** 2026-06-30  
**Modulo:** auth, team, Passport, profili.  
**Hub:** [../../../../docs/audit/ponytail-audit.md](../../../../docs/audit/ponytail-audit.md)  
**Remediation:** [../../../../docs/project/ponytail-audit-remediation.md](../../../../docs/project/ponytail-audit-remediation.md)  
**GitHub monorepo:** [Issue #221](https://github.com/laraxot/base_predict_fila5/issues/221) · [Discussion #222](https://github.com/laraxot/base_predict_fila5/discussions/222) · [Discussion #228](https://github.com/laraxot/base_predict_fila5/discussions/228)

## Findings

| # | Tag | Cosa | Sostituzione | Path |
|---|-----|------|--------------|------|
| U2 | `delete`→`.bak` | Contratti Fortify/Jetstream orfani | Grep e archivio | `app/Contracts/` | ✅ **7** canonici (2026-06-30) |
| U3 | `shrink` | `BaseUser.php` con molti trait | Dopo audit permessi Spatie | `app/Models/BaseUser.php` | aperto |
| U4 | `delete` | ~281 `lang/**/*.backup_*` | `lang/{locale}/*.php.bak` in-place | `lang/` | ✅ — [wiki](./wiki/concepts/lang-backup-in-place.md) |

## ⛔ Fuori perimetro (non tagliare)

| Area | Motivo |
|------|--------|
| `app/Models/Policies/*Policy.php` | Contratto Laravel/Filament — anche stub su `UserBasePolicy`. Vedi [Job: model-policy-laravel-contract](../../Job/docs/wiki/concepts/model-policy-laravel-contract.md). |

## Vincolo correlato

`spatie/laravel-permission` resta in **Xot** `composer.json`, non rimuovere da lì.

## Collegamenti

- [00-INDEX.md](./00-INDEX.md)
- [Xot audit](../../Xot/docs/ponytail-audit-over-engineering.md)
