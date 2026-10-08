---
type: decision-log
title: "Decision Log — User"
links: {github_issue: #XXX, discussion: #XXX}
---
# Decision Log — User

## Decisions

### 2026-10-08: Ripristino dei 37 file regrediti dal re-import del 07/10
- **Choose**: Ripristinare verbatim da `45c62e86c` i 37 file User che, rispetto allo stato del monorepo al 06/10 (`51570adf3`), avevano perso almeno 20 righe di contenuto reale.
- **Over**: Ripristino in blocco dell'intero modulo, o riscrittura a mano delle parti perse.
- **Because**: Il commit `35df2c6a7` (07/10 13:04, senza genitori, 5423 file) ha re-importato il modulo da una copia vecchia; lo stesso giorno, tra le 13:01 e le 13:11, è successo anche a Lang, Job, Notify, UI e Xot. Criterio di selezione: contenuto attuale identico byte per byte a una versione più vecchia già sostituita. Per tutti e 37: versione 06/10 del monorepo == `45c62e86c` del sotto-repo, e nessun commit dopo il re-import li tocca, quindi nessuna modifica voluta da perdere.
- **Cosa torna**: traduzioni `lang/it/*` (user, role, team, profile, team_user, users, client, passport_dashboard, view_user, tenant, password, recent_logins, socialite_user) e `lang/en/user.php`; vista `filament/widgets/auth/login.blade.php` (era ridotta a `</div>`); `PassportDashboard` con `newCredentialsAction` (issue #181); tabelle e relation manager di `UserResource`, `PermissionsTable`, `BaseProfilesTable`, tabelle Socialite/Sso; `UserOverview`, `RecentLoginsWidget`, `SocialLoginWidget`, `UserTypeRegistrationsChartWidget`, `SocialiteProviderSettingsPage`, `SocialiteServiceProvider`; trait `HasTeams` e `IsProfileTrait`.
- **Verifica**: `php -l` pulito; PHPStan su `Modules/User` senza errori nel codice ripristinato (restano 17 errori in `tests/Feature/AuthComponentsTest.php`, facade `View` non importata, file non toccato). Pest su 26 file di test eseguito prima e dopo, un file per volta: nessun peggioramento, `ClientsRelationManagerAssociateTest` migliora (da 2 a 1 fallimento). I fallimenti rimasti sono uguali prima e dopo: colonna `uuid` mancante nel DB di test (`profiles`, `teams`), tabella `media` assente, rotte `socialite.*` non caricate perché `routes/web.php` non include `socialite.php`.
- **Rischio aperto**: restano circa 287 file User con perdite sotto le 20 righe, non ancora rivisti. Il fix vive nel working tree finché non arriva su `laraxot/module_user_fila5`.

## Open Questions

