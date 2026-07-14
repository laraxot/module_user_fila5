---
title: Datas, non DTOs
type: convention
tags: [datas, spatie-laravel-data, dto, root-app-cleanup]
created: 2026-07-14
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
