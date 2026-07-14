---
title: "User Support → Actions migration"
type: concept
tags: [user, actions, queueable-action, support, migration]
created: 2026-07-13
updated: 2026-07-13
qmd: "User Support files migrated to QueueableAction Actions"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/372"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/273"
related:
  - no-app-support-queueable-actions.md
  - no-services-no-support-queueable-actions.md
---

# User Support → Actions migration

Legacy `app/Support/` files converted to QueueableAction or confirmed dead code.

| Legacy `app/Support/` | Status | Action / Notes |
|----------------------|--------|----------------|
| `AuthenticationLogQuery` | Migrated | `Authentication\GetAuthenticationLogQueryForAuthenticatableAction` |
| `NotificationSchema` | Migrated | `Notification\IsNotificationSchemaReadableAction` |
| `Utils` (Shield) | Dead code | No callers; deleted |

## Caller updates

- `Themes/Sixteen/resources/views/components/sections/header/v1.blade.php` — switched from `NotificationSchema::isReadable()` to `app(IsNotificationSchemaReadableAction::class)->execute()`.

## Verification

- phpstan: `Modules/User` clean.
- pest: `Modules/User` tests passing.