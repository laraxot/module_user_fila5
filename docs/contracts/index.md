---
title: "Indice operativo dei contratti — User"
type: index
module: User
status: active
updated: 2026-11-27
---

# Indice operativo dei contratti — User

Registro dei 78 contratti `type: contract` presenti in questa cartella (ADR 0012 di Xot). Ogni file ha le sei sezioni
canoniche (`Input`, `Output`, `Invarianti`, `Effetti collaterali`, `Errori`, `Non fa`) e il marker `action:`; la classe
implementatrice rimanda al file con `@contract docs/contracts/<file>.md`. Copertura = invarianti il cui group Pest
esiste davvero in `tests/` del modulo (conteggio del 2026-11-27). Comandi da `laravel/`; un gruppo = una promessa:
`vendor/bin/pest Modules/User/tests --group=<ID>`.

## Accesso social e provider OAuth

| Operazione | Contratto | Classe | Invarianti | Copertura | Comando di esempio |
|---|---|---|---|---|---|
| AnalyzeSocialiteEmailDomainAction | [analyze-socialite-email-domain-action.md](analyze-socialite-email-domain-action.md) | `Modules\User\Actions\Socialite\AnalyzeSocialiteEmailDomainAction` | `SOCIALITE-DOMAIN-INV-1..3` | 0/3 | — |
| CreateSocialiteUserAction | [create-socialite-user-action.md](create-socialite-user-action.md) | `Modules\User\Actions\Socialite\CreateSocialiteUserAction` | `SOCIALITE-CREATE-SU-INV-1..2` | 0/2 | — |
| GetDomainAllowListAction | [get-domain-allow-list-action.md](get-domain-allow-list-action.md) | `Modules\User\Actions\Socialite\GetDomainAllowListAction` | `SOCIALITE-ALLOW-INV-1..2` | 0/2 | — |
| GetGuardAction | [get-guard-action.md](get-guard-action.md) | `Modules\User\Actions\Socialite\GetGuardAction` | `SOCIALITE-GUARD-INV-1` | 0/1 | — |
| GetLoginRedirectRouteAction | [get-login-redirect-route-action.md](get-login-redirect-route-action.md) | `Modules\User\Actions\Socialite\GetLoginRedirectRouteAction` | `SOCIALITE-LOGIN-ROUTE-INV-1` | 0/1 | — |
| GetMissingProviderSettingsAction | [get-missing-provider-settings-action.md](get-missing-provider-settings-action.md) | `Modules\User\Actions\Socialite\GetMissingProviderSettingsAction` | `SOCIALITE-MISSING-ENV-INV-1..2` | 0/2 | — |
| GetProviderButtonsAction | [get-provider-buttons-action.md](get-provider-buttons-action.md) | `Modules\User\Actions\Socialite\GetProviderButtonsAction` | `SOCIALITE-BUTTONS-INV-1` | 0/1 | — |
| GetProviderRedirectUriAction | [get-provider-redirect-uri-action.md](get-provider-redirect-uri-action.md) | `Modules\User\Actions\Socialite\GetProviderRedirectUriAction` | `SOCIALITE-REDIRECT-URI-INV-1..2` | 0/2 | — |
| GetProviderScopesAction | [get-provider-scopes-action.md](get-provider-scopes-action.md) | `Modules\User\Actions\Socialite\GetProviderScopesAction` | `SOCIALITE-SCOPES-INV-1..2` | 0/2 | — |
| GetProviderSetupGuideAction | [get-provider-setup-guide-action.md](get-provider-setup-guide-action.md) | `Modules\User\Actions\Socialite\GetProviderSetupGuideAction` | `SOCIALITE-SETUP-GUIDE-INV-1..3` | 0/3 | — |
| GetUserModelAttributesFromSocialiteAction | [get-user-model-attributes-from-socialite-action.md](get-user-model-attributes-from-socialite-action.md) | `Modules\User\Actions\Socialite\GetUserModelAttributesFromSocialiteAction` | `SOCIALITE-USER-ATTR-INV-1..4` | 0/4 | — |
| IsProviderConfiguredAction | [is-provider-configured-action.md](is-provider-configured-action.md) | `Modules\User\Actions\Socialite\IsProviderConfiguredAction` | `SOCIALITE-IS-CONFIGURED-INV-1` | 0/1 | — |
| IsRegistrationEnabledAction | [is-registration-enabled-action.md](is-registration-enabled-action.md) | `Modules\User\Actions\Socialite\IsRegistrationEnabledAction` | `SOCIALITE-REG-ENABLED-INV-1` | 0/1 | — |
| IsUserAllowedAction | [is-user-allowed-action.md](is-user-allowed-action.md) | `Modules\User\Actions\Socialite\IsUserAllowedAction` | `SOCIALITE-ALLOWED-INV-1..3` | 1/3 | vendor/bin/pest Modules/User/tests --group=SOCIALITE-ALLOWED-INV-1 |
| LoginUserAction | [login-user-action.md](login-user-action.md) | `Modules\User\Actions\Socialite\LoginUserAction` | `SOCIALITE-LOGIN-INV-1..4` | 3/4 | vendor/bin/pest Modules/User/tests --group=SOCIALITE-LOGIN-INV-1 |
| LogoutUserAction | [logout-user-action.md](logout-user-action.md) | `Modules\User\Actions\Socialite\LogoutUserAction` | `SOCIALITE-LOGOUT-INV-1..3` | 0/3 | — |
| ProcessCallbackAction | [process-callback-action.md](process-callback-action.md) | `Modules\User\Actions\Socialite\ProcessCallbackAction` | `USER-SOCIAL-CALLBACK-INV-1..7` | 2/7 | vendor/bin/pest Modules/User/tests --group=USER-SOCIAL-CALLBACK-INV-1 |
| RedirectToLoginAction | [redirect-to-login-action.md](redirect-to-login-action.md) | `Modules\User\Actions\Socialite\RedirectToLoginAction` | `SOCIALITE-REDIRECT-LOGIN-INV-1..3` | 0/3 | — |
| RegisterOauthUserAction | [register-oauth-user-action.md](register-oauth-user-action.md) | `Modules\User\Actions\Socialite\RegisterOauthUserAction` | `SOCIALITE-REGISTER-OAUTH-INV-1..3` | 2/3 | vendor/bin/pest Modules/User/tests --group=SOCIALITE-REGISTER-OAUTH-INV-1 |
| RegisterSocialiteUserAction | [register-socialite-user-action.md](register-socialite-user-action.md) | `Modules\User\Actions\Socialite\RegisterSocialiteUserAction` | `SOCIALITE-REGISTER-SU-INV-1..3` | 0/3 | — |
| GetUserNameFieldsFromSocialiteAction | [resolve-user-name-fields-from-socialite-action.md](resolve-user-name-fields-from-socialite-action.md) | `Modules\User\Actions\Socialite\GetUserNameFieldsFromSocialiteAction` | `SOCIALITE-NAME-FIELDS-INV-1..3` | 0/3 | — |
| RetrieveOauthUserAction | [retrieve-oauth-user-action.md](retrieve-oauth-user-action.md) | `Modules\User\Actions\Socialite\RetrieveOauthUserAction` | `SOCIALITE-RETRIEVE-OAUTH-INV-1..2` | 0/2 | — |
| RetrieveSocialiteUserAction | [retrieve-socialite-user-action.md](retrieve-socialite-user-action.md) | `Modules\User\Actions\Socialite\RetrieveSocialiteUserAction` | `SOCIALITE-RETRIEVE-SU-INV-1..3` | 0/3 | — |
| SetDefaultRolesBySocialiteUserAction | [set-default-roles-by-socialite-user-action.md](set-default-roles-by-socialite-user-action.md) | `Modules\User\Actions\Socialite\SetDefaultRolesBySocialiteUserAction` | `SOCIALITE-DEFAULT-ROLES-INV-1..3` | 2/3 | vendor/bin/pest Modules/User/tests --group=SOCIALITE-DEFAULT-ROLES-INV-1 |
| CreateUserAction | [socialite-create-user-action.md](socialite-create-user-action.md) | `Modules\User\Actions\Socialite\CreateUserAction` | `SOCIALITE-CREATE-USER-INV-1..3` | 0/3 | — |
| ValidateProviderAction | [validate-provider-action.md](validate-provider-action.md) | `Modules\User\Actions\Socialite\ValidateProviderAction` | `SOCIALITE-VALIDATE-PROVIDER-INV-1..2` | 0/2 | — |

## Registro attività

| Operazione | Contratto | Classe | Invarianti | Copertura | Comando di esempio |
|---|---|---|---|---|---|
| AuthenticationLogQueryAction | [authentication-log-query-action.md](authentication-log-query-action.md) | `Modules\User\Actions\Activity\AuthenticationLogQueryAction` | `AUTH-LOG-QUERY-INV-1..2` | 0/2 | — |
| LogRegistrationAction | [log-registration-action.md](log-registration-action.md) | `Modules\User\Actions\Activity\LogRegistrationAction` | `LOG-REG-INV-1..2` | 0/2 | — |

## Autenticazione e identità

| Operazione | Contratto | Classe | Invarianti | Copertura | Comando di esempio |
|---|---|---|---|---|---|
| BuildActiveUserProviderAction | [build-active-user-provider-action.md](build-active-user-provider-action.md) | `Modules\User\Actions\Auth\BuildActiveUserProviderAction` | `USER-PROVIDER-INV-1..4` | 4/4 | vendor/bin/pest Modules/User/tests --group=USER-PROVIDER-INV-1 |
| BuildApiLoginLimitAction | [build-api-login-limit-action.md](build-api-login-limit-action.md) | `Modules\User\Actions\Auth\BuildApiLoginLimitAction` | `API-LOGIN-LIMIT-INV-1..3` | 0/3 | — |
| BuildPasswordResetUrlAction | [build-password-reset-url-action.md](build-password-reset-url-action.md) | `Modules\User\Actions\Auth\BuildPasswordResetUrlAction` | `PWD-URL-INV-1..4` | 0/4 | — |
| ConsumeAuthSubmissionSlotAction | [consume-auth-submission-slot-action.md](consume-auth-submission-slot-action.md) | `Modules\User\Actions\Auth\ConsumeAuthSubmissionSlotAction` | `USER-AUTH-THROTTLE-INV-1..4` | 4/4 | vendor/bin/pest Modules/User/tests --group=USER-AUTH-THROTTLE-INV-1 |
| EnsureResetPasswordMailTemplateAction | [ensure-reset-password-mail-template-action.md](ensure-reset-password-mail-template-action.md) | `Modules\User\Actions\Auth\EnsureResetPasswordMailTemplateAction` | `MAIL-TPL-INV-1..4` | 0/4 | — |
| GetAuthenticationLogQueryAction | [get-authentication-log-query-action.md](get-authentication-log-query-action.md) | `Modules\User\Actions\Auth\GetAuthenticationLogQueryAction` | `GET-AUTH-LOG-INV-1` | 0/1 | — |
| GetPostLoginUrlAction | [get-post-login-url-action.md](get-post-login-url-action.md) | `Modules\User\Actions\Auth\GetPostLoginUrlAction` | `POST-LOGIN-INV-1..2` | 0/2 | — |
| HasVerifiedIdentityAction | [has-verified-identity-action.md](has-verified-identity-action.md) | `Modules\User\Actions\Auth\HasVerifiedIdentityAction` | `USER-VERIFIED-INV-1..5` | 3/5 | vendor/bin/pest Modules/User/tests --group=USER-VERIFIED-INV-1 |
| RecordAuthenticationLogAction | [record-authentication-log-action.md](record-authentication-log-action.md) | `Modules\User\Actions\Auth\RecordAuthenticationLogAction` | `USER-AUTHLOG-INV-1..4` | 2/4 | vendor/bin/pest Modules/User/tests --group=USER-AUTHLOG-INV-1 |
| RememberLoginReturnUrlAction | [remember-login-return-url-action.md](remember-login-return-url-action.md) | `Modules\User\Actions\Auth\RememberLoginReturnUrlAction` | `REMEMBER-RET-INV-1..4` | 0/4 | — |
| ResendEmailVerificationAction | [resend-email-verification-action.md](resend-email-verification-action.md) | `Modules\User\Actions\Auth\ResendEmailVerificationAction` | `RESEND-VERIFY-INV-1..2` | 0/2 | — |
| GetNotifiableEmailAction | [resolve-notifiable-email-action.md](resolve-notifiable-email-action.md) | `Modules\User\Actions\Auth\GetNotifiableEmailAction` | `RESOLVE-EMAIL-INV-1..3` | 0/3 | — |
| RevokeUserAccessAction | [revoke-user-access-action.md](revoke-user-access-action.md) | `Modules\User\Actions\Auth\RevokeUserAccessAction` | `USER-REVOKE-INV-1..4` | 3/4 | vendor/bin/pest Modules/User/tests --group=USER-REVOKE-INV-1 |
| StoreIntendedUrlAction | [store-intended-url-action.md](store-intended-url-action.md) | `Modules\User\Actions\Auth\StoreIntendedUrlAction` | `STORE-INTENDED-INV-1..3` | 0/3 | — |
| UpsertUserFromDigitalIdentityAction | [upsert-user-from-digital-identity-action.md](upsert-user-from-digital-identity-action.md) | `Modules\User\Actions\Auth\UpsertUserFromDigitalIdentityAction` | `USER-SPID-UPSERT-INV-1..6` | 5/6 | vendor/bin/pest Modules/User/tests --group=USER-SPID-UPSERT-INV-1 |

## Token e client Passport

| Operazione | Contratto | Classe | Invarianti | Copertura | Comando di esempio |
|---|---|---|---|---|---|
| CreateClientAction | [create-client-action.md](create-client-action.md) | `Modules\User\Actions\Passport\CreateClientAction` | `PASSPORT-CREATE-CLIENT-INV-1..3` | 0/3 | — |
| CreateGenericClientAction | [create-generic-client-action.md](create-generic-client-action.md) | `Modules\User\Actions\Passport\CreateGenericClientAction` | `PASSPORT-GENERIC-CLIENT-INV-1..2` | 0/2 | — |
| CreatePasswordClientAction | [create-password-client-action.md](create-password-client-action.md) | `Modules\User\Actions\Passport\CreatePasswordClientAction` | `PASSPORT-PWD-CLIENT-INV-1..2` | 0/2 | — |
| CreatePersonalAccessClientAction | [create-personal-access-client-action.md](create-personal-access-client-action.md) | `Modules\User\Actions\Passport\CreatePersonalAccessClientAction` | `PASSPORT-PAT-CLIENT-INV-1` | 0/1 | — |
| RegenerateClientSecretAction | [regenerate-client-secret-action.md](regenerate-client-secret-action.md) | `Modules\User\Actions\Passport\RegenerateClientSecretAction` | `PASSPORT-REGEN-SECRET-INV-1..2` | 0/2 | — |
| RevokeAllUserTokensAction | [revoke-all-user-tokens-action.md](revoke-all-user-tokens-action.md) | `Modules\User\Actions\Passport\RevokeAllUserTokensAction` | `PASSPORT-REVOKE-ALL-INV-1..2` | 2/2 | vendor/bin/pest Modules/User/tests --group=PASSPORT-REVOKE-ALL-INV-1 |
| RevokeClientAction | [revoke-client-action.md](revoke-client-action.md) | `Modules\User\Actions\Passport\RevokeClientAction` | `PASSPORT-REVOKE-CLIENT-INV-1..3` | 0/3 | — |
| RevokeRefreshTokenAction | [revoke-refresh-token-action.md](revoke-refresh-token-action.md) | `Modules\User\Actions\Passport\RevokeRefreshTokenAction` | `PASSPORT-REVOKE-REFRESH-INV-1..2` | 0/2 | — |
| RevokeTokenAction | [revoke-token-action.md](revoke-token-action.md) | `Modules\User\Actions\Passport\RevokeTokenAction` | `PASSPORT-REVOKE-TOKEN-INV-1..3` | 0/3 | — |

## Azioni generali

| Operazione | Contratto | Classe | Invarianti | Copertura | Comando di esempio |
|---|---|---|---|---|---|
| CreateUserAction | [create-user-action.md](create-user-action.md) | `Modules\User\Actions\CreateUserAction` | `CREATE-USER-INV-1..3` | 0/3 | — |
| GetCurrentDeviceAction | [get-current-device-action.md](get-current-device-action.md) | `Modules\User\Actions\GetCurrentDeviceAction` | `DEVICE-INV-1..3` | 0/3 | — |
| GetPermissionModelAction | [get-permission-model-action.md](get-permission-model-action.md) | `Modules\User\Actions\GetPermissionModelAction` | `PERM-MODEL-INV-1..2` | 0/2 | — |

## Utenti

| Operazione | Contratto | Classe | Invarianti | Copertura | Comando di esempio |
|---|---|---|---|---|---|
| DeleteUserAction | [delete-user-action.md](delete-user-action.md) | `Modules\User\Actions\User\DeleteUserAction` | `DELETE-USER-INV-1..4` | 1/4 | vendor/bin/pest Modules/User/tests --group=DELETE-USER-INV-1 |
| GetNewPasswordAction | [get-new-password-action.md](get-new-password-action.md) | `Modules\User\Actions\User\GetNewPasswordAction` | `NEW-PWD-INV-1..3` | 0/3 | — |
| UpdateUserAction | [update-user-action.md](update-user-action.md) | `Modules\User\Actions\User\UpdateUserAction` | `UPDATE-USER-INV-1..4` | 0/4 | — |
| CreateUserAction | [user-create-user-action.md](user-create-user-action.md) | `Modules\User\Actions\User\CreateUserAction` | `USER-CREATE-INV-1..3` | 0/3 | — |

## Registro accessi

| Operazione | Contratto | Classe | Invarianti | Copertura | Comando di esempio |
|---|---|---|---|---|---|
| GetAuthenticationLogQueryForAuthenticatableAction | [get-authentication-log-query-for-authenticatable-action.md](get-authentication-log-query-for-authenticatable-action.md) | `Modules\User\Actions\Authentication\GetAuthenticationLogQueryForAuthenticatableAction` | `GET-AUTH-LOG-FOR-AUTH-INV-1` | 0/1 | — |

## Login e statistiche

| Operazione | Contratto | Classe | Invarianti | Copertura | Comando di esempio |
|---|---|---|---|---|---|
| GetLoginHistoryAction | [get-login-history-action.md](get-login-history-action.md) | `Modules\User\Actions\Login\GetLoginHistoryAction` | `LOGIN-HIST-INV-1..4` | 0/4 | — |
| GetLoginStatsAction | [get-login-stats-action.md](get-login-stats-action.md) | `Modules\User\Actions\Login\GetLoginStatsAction` | `LOGIN-STATS-INV-1..4` | 0/4 | — |
| RecordLoginPulseAction | [record-login-pulse-action.md](record-login-pulse-action.md) | `Modules\User\Actions\Login\RecordLoginPulseAction` | `PULSE-LOGIN-INV-1..2` | 0/2 | — |

## Team

| Operazione | Contratto | Classe | Invarianti | Copertura | Comando di esempio |
|---|---|---|---|---|---|
| GetUserTeamsOptionAction | [get-user-teams-option-action.md](get-user-teams-option-action.md) | `Modules\User\Actions\Team\GetUserTeamsOptionAction` | `TEAMS-OPT-INV-1..3` | 0/3 | — |

## OTP

| Operazione | Contratto | Classe | Invarianti | Copertura | Comando di esempio |
|---|---|---|---|---|---|
| HashOtpValueAction | [hash-otp-value-action.md](hash-otp-value-action.md) | `Modules\User\Actions\Otp\HashOtpValueAction` | `HASH-OTP-INV-1` | 0/1 | — |
| OtpHashNeedsRehashAction | [otp-hash-needs-rehash-action.md](otp-hash-needs-rehash-action.md) | `Modules\User\Actions\Otp\OtpHashNeedsRehashAction` | `OTP-REHASH-INV-1` | 0/1 | — |
| SendOtpByUserAction | [send-otp-by-user-action.md](send-otp-by-user-action.md) | `Modules\User\Actions\Otp\SendOtpByUserAction` | `USER-OTP-SEND-INV-1..3` | 2/3 | vendor/bin/pest Modules/User/tests --group=USER-OTP-SEND-INV-1 |
| VerifyOtpHashAction | [verify-otp-hash-action.md](verify-otp-hash-action.md) | `Modules\User\Actions\Otp\VerifyOtpHashAction` | `VERIFY-OTP-INV-1` | 0/1 | — |

## Notifiche

| Operazione | Contratto | Classe | Invarianti | Copertura | Comando di esempio |
|---|---|---|---|---|---|
| IsNotificationSchemaReadableAction | [is-notification-schema-readable-action.md](is-notification-schema-readable-action.md) | `Modules\User\Actions\Notification\IsNotificationSchemaReadableAction` | `NOTIF-SCHEMA-INV-1..2` | 0/2 | — |

## Database

| Operazione | Contratto | Classe | Invarianti | Copertura | Comando di esempio |
|---|---|---|---|---|---|
| IsUserDatabaseConfiguredAction | [is-user-database-configured-action.md](is-user-database-configured-action.md) | `Modules\User\Actions\Database\IsUserDatabaseConfiguredAction` | `USER-DB-CONFIGURED-INV-1..2` | 0/2 | — |

## Shield e permessi

| Operazione | Contratto | Classe | Invarianti | Copertura | Comando di esempio |
|---|---|---|---|---|---|
| GetExclusionsConfigurationAction | [resolve-exclusions-configuration-action.md](resolve-exclusions-configuration-action.md) | `Modules\User\Actions\Shield\GetExclusionsConfigurationAction` | `SHIELD-EXCL-INV-1..2` | 0/2 | — |
| GetFilamentUserConfigurationAction | [resolve-filament-user-configuration-action.md](resolve-filament-user-configuration-action.md) | `Modules\User\Actions\Shield\GetFilamentUserConfigurationAction` | `SHIELD-FILAMENT-USER-INV-1..2` | 0/2 | — |
| GetPermissionsConfigurationAction | [resolve-permissions-configuration-action.md](resolve-permissions-configuration-action.md) | `Modules\User\Actions\Shield\GetPermissionsConfigurationAction` | `SHIELD-PERM-CFG-INV-1..2` | 0/2 | — |
| GetShieldAuthenticationConfigurationAction | [resolve-shield-authentication-configuration-action.md](resolve-shield-authentication-configuration-action.md) | `Modules\User\Actions\Shield\GetShieldAuthenticationConfigurationAction` | `SHIELD-AUTH-CFG-INV-1..3` | 0/3 | — |
| GetShieldResourceConfigurationAction | [resolve-shield-resource-configuration-action.md](resolve-shield-resource-configuration-action.md) | `Modules\User\Actions\Shield\GetShieldResourceConfigurationAction` | `SHIELD-RES-CFG-INV-1..3` | 0/3 | — |
| GetSuperAdminConfigurationAction | [resolve-super-admin-configuration-action.md](resolve-super-admin-configuration-action.md) | `Modules\User\Actions\Shield\GetSuperAdminConfigurationAction` | `SHIELD-SUPER-ADMIN-INV-1` | 0/1 | — |
| GetPermissionModelAction | [shield-get-permission-model-action.md](shield-get-permission-model-action.md) | `Modules\User\Actions\Shield\GetPermissionModelAction` | `SHIELD-PERM-MODEL-INV-1..2` | 0/2 | — |
| ShieldUtilsAction | [shield-utils-action.md](shield-utils-action.md) | `Modules\User\Actions\Shield\ShieldUtilsAction` | `SHIELD-UTILS-INV-1..3` | 0/3 | — |

## Note

- L'inventario machine-readable e' [INDEX.md](INDEX.md); il formato e' descritto in [README.md](README.md) e il template in [_template.md](_template.md).
- `hasteamsandusercontract.md` e `teamcontract.md` sono `type: concept` (note sulle interfacce), non contratti di Action: non sono elencati qui.
- Le decisioni dietro i contratti stanno in [../adr/](../adr/index.md).
