- [Migration Rules](../../Xot/docs/migration-rules.md)
- [XotBaseMigration Guide](../../Xot/docs/xotbasemigration-guide.md)
- [Database Best Practices](../../Xot/docs/database-best-practices.md)

### Root Documentation

- [Database Migrations](../../../../docs/database-migrations.md)
- [Laraxot Philosophy](../../../../docs/architettura_filosofia_religione_politica_zen.md)

### This Analysis

- [Migration Violations](./migration-violations-tenants.md) - Detailed analysis
- [User Module README](./README.md)

---

## ✅ Definition of Done

Fix is complete when:

- [ ] File extends XotBaseMigration
- [ ] No down() method
- [ ] Has $table_name property
- [ ] Checks existence with hasTable()
- [ ] Has echo feedback messages
- [ ] PHPStan Level 10 passes
- [ ] Idempotence test passes
- [ ] Documentation updated

---

**Status**: ✅ FIX READY TO APPLY
**Verification**: PHPStan pending (after apply)
**Priority**: 🔴 CRITICAL - Filosofia violation!
---
module: theme
topic: migration-fix-tenants
canonical: ../../../Themes/docs/shared-components/migration-fix-tenants.md
---

See canonical documentation: ../../../Themes/docs/shared-components/migration-fix-tenants.md