<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: split from user.php for maintainability (<500 LOC).
// Canon: Modules/User/docs/wiki/concepts/claude-audit-static.md
// File: lang/it/user_loader.php
return merge_translation_files(__DIR__.'/user_navigation.php', __DIR__.'/user_fields.php', __DIR__.'/user_actions.php', __DIR__.'/user_messages.php', __DIR__.'/user_validation.php', __DIR__.'/user_permissions.php', __DIR__.'/user_auth.php', __DIR__.'/user_profile.php', __DIR__.'/user_tenancy.php', __DIR__.'/user_otp.php', __DIR__.'/user_reset_password.php', __DIR__.'/user_verify_email.php', __DIR__.'/user_model.php', __DIR__.'/user_filters.php', __DIR__.'/user_bulk_actions.php', __DIR__.'/user_notifications.php', __DIR__.'/user_search_placeholder.php', __DIR__.'/user_label.php', __DIR__.'/user_sections.php', __DIR__.'/user_plural_label.php'
);
