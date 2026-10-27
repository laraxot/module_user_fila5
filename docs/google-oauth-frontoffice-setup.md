# Google OAuth front-office setup

## Stato

Il flusso Google usa il pulsante condiviso del modulo User, l'entrypoint Socialite locale e una pagina callback Folio+Volt del tema Sixteen. La pagina è solo un guscio HTTP: la policy OAuth resta in `ProcessCallbackAction`, riusabile e testabile.

Le rotte operative sono:

```text
/{lang}/auth/login/google
/{lang}/auth/login/google/callback
```

Il callback configurato in Laravel è unico (`GOOGLE_REDIRECT_URI`). La lingua di ingresso viene salvata in sessione, così `/en/auth/login/google` può usare il callback `/it/.../callback` autorizzato da Google e tornare comunque alla pagina inglese. Non esiste una route callback classica in `routes/socialite.php` e `web.php` non viene toccato.

## Configurazione

Le credenziali non devono essere committate. Impostare nell’ambiente di deploy:

```dotenv
GOOGLE_CLIENT_ID=...
GOOGLE_CLIENT_SECRET=...
GOOGLE_REDIRECT_URI=https://www.fixcity.eu/it/auth/login/google/callback
```

In Google Cloud Console autorizzare entrambi i callback richiesti dal progetto (`/it/.../callback` e `/en/.../callback`) e le origini `https://www.fixcity.eu` e `https://fixcity.eu`. Il runtime usa il primo come callback effettivo e conserva la lingua iniziale in sessione.

Dopo la modifica dell’ambiente:

```bash
cd laravel
php artisan config:clear
php artisan optimize:clear
```

## Sicurezza

Il client secret fornito durante questa sessione è da considerarsi esposto: revocarlo/rigenerarlo in Google Cloud Console prima della produzione e sostituirlo solo nel secret store o nel `.env` non versionato del server.

Non inserire secret in JSON CMS, Blade, Filament resource, log, screenshot o documentazione.

## Verifica

- senza le tre chiavi il pulsante resta nascosto e il route entrypoint torna al login;
- con le chiavi il pulsante usa `/{lang}/auth/login/google`;
- il redirect Google contiene il callback configurato;
- il callback rifiutato torna alla stessa lingua;
- `route('oauth.callback', ['lang' => 'it', 'provider' => 'google'])` risolve la pagina Folio del tema;
- eseguire i test `Modules/User/tests/Feature/Socialite/*` e `Modules/Fixcity/tests/Feature/Auth/AuthGoogleButtonTest.php` dalla directory `laravel`.
