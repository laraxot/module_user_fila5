---
type: bmad-initiative
status: open
created: 2026-10-17
updated: 2026-10-17
initiative_id: kp-google-auth-login
related:
  - module: User
  - module: Fixcity
  - initiative_id: kp-designcomuni-auth-blog
summary: |
  Aggiungere un pulsante di login con Google alla pagina di login (`/it/auth/login`) usando Filament, **senza modificare web.php, api.php o creare nuovi controller**. Utilizzare i provider di autenticazione social esistenti di Filament (es. `Socialite`). Seguire il processo BMAD + Second Brain + Filament Blueprint: brainstorming, architettura, documentazione, e assicurarsi che la parità di visualizzazione con DesignComuni sia mantenuta.
references:
  - laravel/Modules/User/app/Filament/Widgets/Auth/LoginWidget.php
  - docs/priority/auth/google-integration.md
