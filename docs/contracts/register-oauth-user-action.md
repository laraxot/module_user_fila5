---
title: "Contratto — RegisterOauthUserAction"
type: contract
action: "Modules\\User\\Actions\\Socialite\\RegisterOauthUserAction"
module: User
status: accepted
updated: 2026-11-26
qmd: "RegisterOauthUserAction registrazione nuovo utente OAuth transazione CreateUserAction CreateSocialiteUserAction evento Registered"
---

# RegisterOauthUserAction

Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`. Sorgente: `app/Actions/Socialite/RegisterOauthUserAction.php`.
Registra un cittadino sconosciuto che arriva da un provider OAuth: **crea un nuovo account**. Chiamanti: `ProcessCallbackAction.php:57` (solo se `socialite.registration` è vero e non esiste un utente con quell'email)
e il controller `Http/Controllers/Socialite/ProcessCallbackController.php:86`. Scrive dati personali (nome, email, avatar dal provider).

## Input

- `string $provider`: nome del provider.
- `Laravel\Socialite\Contracts\User $oauthUser`: id, nome, email, avatar dal provider (l'email è obbligatoria per `GetUserModelAttributesFromSocialiteAction`).

## Output

- `Modules\User\Models\SocialiteUser`: il collegamento creato (con la relazione `user`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| SOCIALITE-REGISTER-OAUTH-INV-1 | Crea un utente locale (`name`, `first_name`, `last_name`, `email`, senza password né `email_verified_at`) e un collegamento `socialite_users` con `provider`, `provider_id` e avatar del provider; ritorna il collegamento (righe 31-41; `CreateUserAction.php:44-49`). | `SOCIALITE-REGISTER-OAUTH-INV-1` |
| SOCIALITE-REGISTER-OAUTH-INV-2 | `Modules\User\Events\Registered` parte **dopo** la transazione, con il `SocialiteUser` creato: una registrazione annullata non lo emette (righe 29-44). | `SOCIALITE-REGISTER-OAUTH-INV-2` (parte «dopo la transazione» non dimostrata) |
| SOCIALITE-REGISTER-OAUTH-INV-3 | Utente e collegamento sono atomici: se uno dei due inserimenti fallisce, nessuno dei due resta (`DatabaseManager::transaction`, riga 29). | — (non dimostrato: nessun test fa fallire il secondo inserimento) |

Test: `tests/Feature/Actions/Socialite/RegisterOauthUserActionTest.php` («registers oauth user successfully»; «dispatches registered event»), con database di test. Esiste una copia
parziale in `tests/Unit/Actions/RegisterOauthUserActionTest.php` (stessi nomi, nessun group).
Il vecchio ID INV-1 prometteva l'atomicità: qui è INV-3, perché i test provano la creazione e non il rollback.

## Effetti collaterali

In quest'ordine:

1. Transazione sulla connessione di default (`DatabaseManager::transaction`): `INSERT users` (`CreateUserAction` di Socialite, `app/Actions/Socialite/CreateUserAction.php:44`),
   assegnazione dei ruoli di default (`CreateUserAction.php:56`, [SetDefaultRolesBySocialiteUserAction](set-default-roles-by-socialite-user-action.md)), `refresh()` dell'utente, poi `INSERT socialite_users`.
2. Fuori dalla transazione: dispatch sincrono di `Registered` (riga 44).

Nessuna email, nessuna coda dall'Action; i listener di `Registered` possono farne.

## Errori

- Errori del database o eccezioni di `CreateUserAction` (email vuota nei dati OAuth): la transazione è annullata e l'eccezione risale al chiamante.

## Non fa

- Non apre la sessione: il login nell'Action è commentato (righe 46-47); lo fa [LoginUserAction](login-user-action.md) dal chiamante.
- Non controlla che l'email esista già, né l'allowlist, né `socialite.registration`: sono passi precedenti di [ProcessCallbackAction](process-callback-action.md).
- Non imposta una password né `email_verified_at`: l'utente creato entra solo con il provider finché non imposta una password.
- Non verifica che l'email sia verificata dal provider.

## Limiti noti

- Limite noto: se `Registered` ha listener che falliscono, l'account è già stato creato (l'evento è fuori dalla transazione).
- La transazione usa la connessione di default, mentre `users` e `socialite_users` stanno sulla connessione `user` (`BaseModel::$connection = 'user'`): se le due connessioni sono diverse,
  `DatabaseManager::transaction` copre solo la prima. Non verificato in questo passo (richiede la configurazione del database).
