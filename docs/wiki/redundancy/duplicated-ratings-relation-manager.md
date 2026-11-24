---
title: "Duplicated RatingsRelationManager (3 occurrences)"
type: redundancy
owner: Modules/User
severity: medium
created: 2026-05-21
related:
  - "./duplicated-auth-widgets.md"
  - "./duplicated-profile-form.md"
  - "./duplicated-users-relation-manager.md"
  - "./oauth-dual-resource-trees.md"
<<<<<<< HEAD
<<<<<<< HEAD
=======
qmd: "duplicated ratings relation manager ratingsrelationmanager occurrences"
>>>>>>> laraxot/dev
=======
<<<<<<< .merge_file_nKJ6NF
qmd: "duplicated ratings relation manager ratingsrelationmanager occurrences"
=======
>>>>>>> .merge_file_Zs2U5t
>>>>>>> laraxot/dev
---

# Duplicated RatingsRelationManager

## Problem
`RatingsRelationManager.php` appears in at least 3 different places.

## Impact
- Same rating attachment logic duplicated
- Risk of inconsistent rating behavior across different entities
- Maintenance burden

## Recommended Fix
- Centralize in `Modules/Rating` (or a shared place) and make other modules consume it via relation manager or reusable component.

## Related
- Issue #90
