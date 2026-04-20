# Wiki Locale - Module User

## Schema di Riferimento

Vedi [[../../../../docs/.schema/WIKI_SCHEMA.md|Schema Wiki Globale]]

## Struttura Locale

```
wiki/
├── concepts/       # Pattern e metodologie
├── entities/       # Classi e componenti
├── summaries/      # Sommari documenti
├── comparisons/    # Confronti
└── overviews/     # Panoramiche
```

## Pagine Compilate

| Pagina | Tipo | Argomento |
|--------|------|-----------|
| [user-module](./overviews/user-module.md) | overview | User, Profile, Team, Spatie RBAC, OAuth, multi-tenancy |
| [socialite-architecture](./concepts/socialite-architecture.md) | concept | Architettura Socialite: SocialiteUser, SocialProvider, no google_id column |
| [socialite-admin-tutorial](./concepts/socialite-admin-tutorial.md) | tutorial | Configurare GOOGLE_CLIENT_ID/SECRET via backoffice Filament |
| [socialite-user](./entities/socialite-user.md) | entity | Modello SocialiteUser — tabella socialite_users |
| [login-page-design-comuni](./concepts/login-page-design-comuni.md) | concept | Login page Bootstrap Italia / Design Comuni |
| [filament-langserviceprovider-governance](./concepts/filament-langserviceprovider-governance.md) | concept | Regola anti-regressione: no `->label()`/`->tooltip()` nei componenti Filament |
| [profile-migration-uuid-contract](./concepts/profile-migration-uuid-contract.md) | concept | `profiles.uuid` obbligatorio e una sola `create_profiles_table` canonica |

## Raw Sources

Vedi [[../raw/index|Lista Sorgenti Grezzi]]

## Index Globale

Vedi [[../../../../docs/wiki/index|Index Globale Wiki]]

---

*Ultimo aggiornamento: 2026-04-20*
