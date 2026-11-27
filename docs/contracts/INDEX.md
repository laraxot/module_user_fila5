---
title: "INDEX contratti — User"
type: index
module: User
status: active
created: 2026-11-27
updated: 2026-11-27
qmd: "user contracts index machine readable"
---

# User behavioral contract index

Inventario machine-readable dei contratti di comportamento del modulo **User**.
Ogni file `type: contract` in questa cartella e' elencato qui; la tabella di lavoro
e le coperture dei group Pest sono in [index.md](index.md).

## Contratti

- [analyze-socialite-email-domain-action](analyze-socialite-email-domain-action.md)
- [authentication-log-query-action](authentication-log-query-action.md)
- [build-active-user-provider-action](build-active-user-provider-action.md)
- [build-api-login-limit-action](build-api-login-limit-action.md)
- [build-password-reset-url-action](build-password-reset-url-action.md)
- [consume-auth-submission-slot-action](consume-auth-submission-slot-action.md)
- [create-client-action](create-client-action.md)
- [create-generic-client-action](create-generic-client-action.md)
- [create-password-client-action](create-password-client-action.md)
- [create-personal-access-client-action](create-personal-access-client-action.md)
- [create-socialite-user-action](create-socialite-user-action.md)
- [create-user-action](create-user-action.md)
- [delete-user-action](delete-user-action.md)
- [ensure-reset-password-mail-template-action](ensure-reset-password-mail-template-action.md)
- [get-authentication-log-query-action](get-authentication-log-query-action.md)
- [get-authentication-log-query-for-authenticatable-action](get-authentication-log-query-for-authenticatable-action.md)
- [get-current-device-action](get-current-device-action.md)
- [get-domain-allow-list-action](get-domain-allow-list-action.md)
- [get-guard-action](get-guard-action.md)
- [get-login-history-action](get-login-history-action.md)
- [get-login-redirect-route-action](get-login-redirect-route-action.md)
- [get-login-stats-action](get-login-stats-action.md)
- [get-missing-provider-settings-action](get-missing-provider-settings-action.md)
- [get-new-password-action](get-new-password-action.md)
- [get-permission-model-action](get-permission-model-action.md)
- [get-post-login-url-action](get-post-login-url-action.md)
- [get-provider-buttons-action](get-provider-buttons-action.md)
- [get-provider-redirect-uri-action](get-provider-redirect-uri-action.md)
- [get-provider-scopes-action](get-provider-scopes-action.md)
- [get-provider-setup-guide-action](get-provider-setup-guide-action.md)
- [get-user-model-attributes-from-socialite-action](get-user-model-attributes-from-socialite-action.md)
- [get-user-teams-option-action](get-user-teams-option-action.md)
- [hash-otp-value-action](hash-otp-value-action.md)
- [has-verified-identity-action](has-verified-identity-action.md)
- [is-notification-schema-readable-action](is-notification-schema-readable-action.md)
- [is-provider-configured-action](is-provider-configured-action.md)
- [is-registration-enabled-action](is-registration-enabled-action.md)
- [is-user-allowed-action](is-user-allowed-action.md)
- [is-user-database-configured-action](is-user-database-configured-action.md)
- [login-user-action](login-user-action.md)
- [logout-user-action](logout-user-action.md)
- [log-registration-action](log-registration-action.md)
- [otp-hash-needs-rehash-action](otp-hash-needs-rehash-action.md)
- [process-callback-action](process-callback-action.md)
- [record-authentication-log-action](record-authentication-log-action.md)
- [record-login-pulse-action](record-login-pulse-action.md)
- [redirect-to-login-action](redirect-to-login-action.md)
- [regenerate-client-secret-action](regenerate-client-secret-action.md)
- [register-oauth-user-action](register-oauth-user-action.md)
- [register-socialite-user-action](register-socialite-user-action.md)
- [remember-login-return-url-action](remember-login-return-url-action.md)
- [resend-email-verification-action](resend-email-verification-action.md)
- [resolve-exclusions-configuration-action](resolve-exclusions-configuration-action.md)
- [resolve-filament-user-configuration-action](resolve-filament-user-configuration-action.md)
- [resolve-notifiable-email-action](resolve-notifiable-email-action.md)
- [resolve-permissions-configuration-action](resolve-permissions-configuration-action.md)
- [resolve-shield-authentication-configuration-action](resolve-shield-authentication-configuration-action.md)
- [resolve-shield-resource-configuration-action](resolve-shield-resource-configuration-action.md)
- [resolve-super-admin-configuration-action](resolve-super-admin-configuration-action.md)
- [resolve-user-name-fields-from-socialite-action](resolve-user-name-fields-from-socialite-action.md)
- [retrieve-oauth-user-action](retrieve-oauth-user-action.md)
- [retrieve-socialite-user-action](retrieve-socialite-user-action.md)
- [revoke-all-user-tokens-action](revoke-all-user-tokens-action.md)
- [revoke-client-action](revoke-client-action.md)
- [revoke-refresh-token-action](revoke-refresh-token-action.md)
- [revoke-token-action](revoke-token-action.md)
- [revoke-user-access-action](revoke-user-access-action.md)
- [send-otp-by-user-action](send-otp-by-user-action.md)
- [set-default-roles-by-socialite-user-action](set-default-roles-by-socialite-user-action.md)
- [shield-get-permission-model-action](shield-get-permission-model-action.md)
- [shield-utils-action](shield-utils-action.md)
- [socialite-create-user-action](socialite-create-user-action.md)
- [store-intended-url-action](store-intended-url-action.md)
- [update-user-action](update-user-action.md)
- [upsert-user-from-digital-identity-action](upsert-user-from-digital-identity-action.md)
- [user-create-user-action](user-create-user-action.md)
- [validate-provider-action](validate-provider-action.md)
- [verify-otp-hash-action](verify-otp-hash-action.md)

## Note

- `hasteamsandusercontract.md` e `teamcontract.md` sono `type: concept`, non contratti: non elencati.

## Autore

Usa lo standard di authoring Xot `Modules/Xot/docs/contracts/contract-authoring-standard.md`
e il template [_template.md](_template.md). Il comportamento legacy e' documentato cosi'
com'e' e non e' un modello per codice nuovo.
