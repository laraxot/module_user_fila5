---
title: "Password"
type: concept
tags: [password]
created: 2026-07-14
updated: 2026-07-14
qmd: "password password"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./actions-path-convention.md"
  - "./actions-structure-1.md"
  - "./actions-structure.md"
  - "./advanced-user-architecture.md"
  - "./analisi-metodi-duplicati.md"
  - "./analysis.md"
  - "./architecture-rules.md"
  - "./auth-blade-structure.md"
---

use Illuminate\Validation\Rules\Password;

 Password::defaults(function () {
            return Password::min(8)
                           ->mixedCase()
                           ->uncompromised();
        });

$request->validate([
    'password' => ['required', Password::defaults()],
]);

---

ZxcvbnPhp\Zxcvbn

ZxcvbnRule

https://github.com/bjeavons/zxcvbn-php

https://github.com/DivineOmega/laravel-password-exposed-validation-rule

NoOldPasswords
https://laracasts.com/discuss/channels/laravel/complex-password-rules-for-password-reset

https://njoguamos.me.ke/posts/create-and-test-a-custom-laravel-validation-rule !!!!
