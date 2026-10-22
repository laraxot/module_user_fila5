---
title: Datas, non DTOs
type: convention
tags: [datas, spatie-laravel-data, dto, root-app-cleanup]
created: 2026-07-14
related:
<<<<<<< .merge_file_pJzrZf
  - "./00-index-1.md"
=======
  - "./00-index-indice-documentazione-modulo-user.md"
>>>>>>> .merge_file_SU3Dy1
  - "./00-index.md"
  - "./2fa-guide.md"
  - "./2fa.md"
  - "./accessor-delegation-pattern.md"
<<<<<<< .merge_file_pJzrZf
  - "./actions-path-convention-1.md"
  - "./actions-path-convention-2.md"
  - "./actions-path-convention.md"
=======
  - "./actions-path-convention.md"
  - "./actions-path-convention-convenzione-percorsi.md"
  - "./actions-path-convention.md"
status: draft
updated: 2026-10-07
qmd: "datas, non dtos user"
>>>>>>> .merge_file_SU3Dy1
---

# Datas, non DTOs

Vedi `Modules/UI/docs/datas-not-dtos-convention.md` per la regola completa.

## Storia in questo modulo

`laravel/app/DTOs/UserContextDto.php` (root, non modulare, zero utilizzatori)
è stato convertito e spostato in `Modules\User\Datas\UserContextData`
(estende `Spatie\LaravelData\Data`, stesso comportamento — `fromUserModel()`,
`hasRole()`).

Segue lo stile già presente in `Modules\User\Datas\SuperAdminData` (proprietà
pubbliche/`readonly`, nessun getter manuale).
