---
title: "Translation Key Prototype"
type: concept
tags: [translation, key, prototype]
created: 2026-07-14
updated: 2026-07-14
qmd: "translation-key-prototype translation key prototype"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
<<<<<<< .merge_file_7YRywU
  - "./00-index-1.md"
=======
  - "./00-index-indice-documentazione-modulo-user.md"
>>>>>>> .merge_file_iwf3cs
  - "./00-index.md"
  - "./2fa-guide.md"
  - "./2fa.md"
  - "./accessor-delegation-pattern.md"
<<<<<<< .merge_file_7YRywU
  - "./actions-path-convention-1.md"
  - "./actions-path-convention-2.md"
  - "./actions-path-convention.md"
=======
  - "./actions-path-convention.md"
  - "./actions-path-convention-convenzione-percorsi.md"
  - "./actions-path-convention.md"
status: draft
>>>>>>> .merge_file_iwf3cs
---

Translation key prototype

<<<<<<< .merge_file_7YRywU
Project convention: '<namespace>::<context>.<collection>.<item>.<type>'
=======
Project convention: '<namespace>::<context>.<collection>.<key>.<type>' (exactly five elements, counting the namespace)
>>>>>>> .merge_file_iwf3cs

Examples:
- user::auth.register.actions.submit.label -> label for the submit button in registration form
- user::auth.login.page.meta_title.label -> page meta title label for login
<<<<<<< .merge_file_7YRywU
=======
- user::auth.login.password.text -> password field text
>>>>>>> .merge_file_iwf3cs

Why:
- Ensures predictable namespacing across modules and themes
- Easier to programmatically find translation entries
- Prevents collisions and improves maintainability

Action performed:
- Replaced occurrences of __('user::auth.register.submit') with __('user::auth.register.actions.submit.label') and added corresponding entry to Modules/User/lang/it/auth.php

Follow-ups:
- Run a repo-wide grep for occurrences of less-structured keys and standardize them.
<<<<<<< .merge_file_7YRywU
- Add CI check to enforce prototype for new keys.
=======
- Add CI check to enforce prototype for new keys.
>>>>>>> .merge_file_iwf3cs
