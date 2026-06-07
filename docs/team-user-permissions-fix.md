- [`Modules/User/docs/laraxot-migration-philosophy.md`](file://Modules/User/docs/laraxot-migration-philosophy.md)

## Updated Memory Rules

Added to permanent memory:
> **Laraxot Migration Philosophy**: NEVER create multiple migration files for the same table. Always update the existing migration and rename it with the current date. Use XotBaseMigration pattern with `tableCreate()` and `tableUpdate()` blocks. Check `hasColumn()` before adding columns in UPDATE block.
---
module: theme
topic: team-user-permissions-fix
canonical: ../../../Themes/docs/shared-components/team-user-permissions-fix.md
---

See canonical documentation: ../../../Themes/docs/shared-components/team-user-permissions-fix.md