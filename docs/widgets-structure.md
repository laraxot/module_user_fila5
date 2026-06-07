- **[LOGIN_FILAMENT_WIDGET_ERROR.md](../../../Themes/TwentyOne/docs/LOGIN_FILAMENT_WIDGET_ERROR.md)** — Per conoscere gli errori più comuni e le soluzioni sbagliate da evitare nella progettazione dei widget Filament, consulta questo file: offre casi reali e motivazioni pratiche.
- **[LOGIN_FILAMENT_WIDGET_PRO_CONS.md](../../../Themes/TwentyOne/docs/LOGIN_FILAMENT_WIDGET_PRO_CONS.md)** — Per un confronto ragionato tra approcci, vantaggi/svantaggi e best practice sull’implementazione del LoginWidget, consulta questo file: aiuta a scegliere il pattern più adatto e conforme alle regole Windsurf/Xot.

---

## Ragionamento e sintesi: LoginWidget secondo Windsurf/Xot

---

## Approfondimento massimo: flow, test, estensione, refactoring

---

## Analisi LoginWidget implementato: struttura, estendibilità, best practice

---

## Widget Filament in Blade: flow, rischi, checklist

### Pattern @livewire
- I widget Filament possono essere inseriti in qualsiasi Blade view tramite la direttiva `@livewire(NomeWidget::class)`.
- Questo rende i widget riutilizzabili anche fuori dal Panel Filament.

### Raccomandazioni di struttura
- Il widget deve essere completamente autonomo e DRY: nessuna logica duplicata tra Blade e Panel.
- Seguire sempre la struttura Windsurf/Xot (estensione XotBaseWidget, contracts, tipizzazione).
- Documentare nei PHPDoc e nella docs dove il widget può essere usato.

### Rischi
- Possibili problemi di stato/sessione se il widget non è progettato per essere usato fuori dal Panel.
- Rischio di divergenza UX tra Panel e Blade se la logica non è centralizzata.
- Attenzione a non duplicare la logica di autenticazione.

### Checklist
- [x] Widget DRY e centralizzato
- [x] Testato sia in Panel che in Blade
- [x] Documentazione aggiornata
- [x] Nessuna logica business nella Blade

### Struttura
- File posizionato correttamente in /app/Filament/Widgets
- Namespace conforme a Modules\User\Filament\Widgets
- Estensione XotBaseWidget garantisce override centralizzato
- Schema form dichiarato tramite getFormSchema con chiavi stringa e componenti Filament

### Estendibilità
- Facile aggiungere 2FA, captcha, social login grazie a struttura modulare
- Possibile estrarre logica in Actions per riuso e testabilità
- Pronto per logging, auditing, multi-tenant

### Best practice
- Tipizzazione forte e PHPDoc
- Validazione integrata Filament
- Gestione errori tramite ValidationException
- Nessuna duplicazione di logica

### Checklist architetturale
- [x] Posizione e namespace corretti
- [x] Estensione XotBaseWidget
- [x] Solo componenti Filament importati
- [x] Schema form chiaro e tipizzato
- [x] Pronto per estensioni future
- [ ] Azioni dedicate e logging avanzato

---

### Regola fondamentale: firma dei metodi identica alla base

---

### Regola: proprietà statiche tipizzate sempre inizializzate

---

### Regola: path view Blade widget Filament
Il path della view Blade di un widget Filament deve seguire convenzioni diverse a seconda del contesto di utilizzo:

#### A. Widget usato in un pannello Filament (AdminPanel, ecc.)

1. **Formato corretto**: `{modulo-lowercase}::filament.widgets.<percorso>.<nome>`
   - Esempio: `user::filament.widgets.auth.login`

2. **Formato ERRATO**: `modules.{modulo}::filament.widgets.<percorso>.<nome>`
   - Esempio ERRATO: `modules.user::filament.widgets.auth.login`

3. **Spiegazione tecnica**: In Laravel, il formato per risolvere le view nei pacchetti è `package::path.to.view`, NON `modules.package::path.to.view`. Il prefisso `modules.` causa errori di risoluzione della view.

4. **Corrispondenza fisica**: Il path deve rispecchiare la struttura fisica delle cartelle delle view:
   ```
   laravel/Modules/User/resources/views/filament/widgets/auth/login.blade.php
   └─ corrisponde a: 'user::filament.widgets.auth.login'
   ```

#### B. Widget usato con direttiva @livewire in una Blade view (es. @livewire(\Modules\User\Filament\Widgets\LoginWidget::class))

1. **Formato corretto**: `filament.widgets.<nome>` (SENZA il prefisso del namespace!)
   - Esempio: `filament.widgets.login` 

2. **Formato ERRATO**: `user::filament.widgets.<nome>` (Con il prefisso del namespace)
   - Esempio ERRATO: `user::filament.widgets.login`

3. **Spiegazione tecnica**: Quando usi un widget Filament con la direttiva @livewire, Livewire cerca la view SENZA considerare i namespace dei pacchetti. Questo comportamento è diverso da quando il widget è usato all'interno di un pannello Filament!

4. **Corrispondenza fisica**: Il path deve corrispondere alla struttura delle cartelle, ma senza il prefisso del namespace:
   ```
   laravel/Modules/User/resources/views/filament/widgets/login.blade.php
   └─ corrisponde a: 'filament.widgets.login'
   ```

#### C. Errori comuni da evitare

1. **Conflitto tra proprietà `$view` e attributo `#[Layout()]`**
   ```php
   // NON fare questo - causa conflitti di risoluzione view
   protected static string $view = 'user::filament.widgets.auth.login';
   #[Layout('modules.user::filament.widgets.auth.login')]
   ```

2. **Doppia dichiarazione della proprietà view (statica e non-statica)**
   ```php
   // NON fare questo - causa conflitti tra Livewire e Filament
   protected static string $view = 'user::filament.widgets.auth.login';
   public string $view = 'user::filament.widgets.auth.login'; 
   ```

3. **Soluzione raccomandata per widget usati con @livewire**
   ```php
   // Usa questo formato per widget richiamati con @livewire
   protected static string $view = 'filament.widgets.login';
   ```
In PHP 8.1+ tutte le proprietà statiche tipizzate (es. `public static string $view`) devono essere inizializzate alla dichiarazione, altrimenti errore fatale.
Quando si sovrascrive un metodo di una classe base (es. XotBaseWidget), la firma deve essere identica:
- Staticità (static/non-static)
- Tipi di ritorno e parametri
- Visibilità (public/protected/private)

Non seguire questa regola causa errori fatali difficili da debug e incompatibilità tra moduli.

### Flowchart della vita di un LoginWidget
1. mount() → inizializzazione stato
2. getFormSchema() → definizione campi, validazione
3. submit → validazione Filament, chiamata authenticate()
4. Successo → redirect, flash message, eventi
5. Errore → feedback UX, logging, rate limiting

### Best practice per testabilità
- Scrivere test end-to-end simulando login reali, mockando Auth.
- Testare edge case: password errata, utente disabilitato, brute force.
- Usare Data e Actions per isolare logica e facilitare il mocking.

### Esempi di estensione
- 2FA: aggiungere step dopo login, mantenendo validazione centralizzata.
- Captcha: aggiungere campo e validazione senza rompere UX.
- Login social: integrare provider tramite Actions dedicate.

### Strategie di refactoring
- Migrare da Livewire puro a Filament/Xot: spostare schema in getFormSchema, centralizzare autenticazione.
- Separare responsabilità: Widget solo per UX, Actions per logica, Data per trasporto dati.

### Versionamento e documentazione
- Versionare i widget come codice critico.
- Aggiornare sempre la documentazione e i riferimenti incrociati dopo ogni evoluzione.

---

### Analisi del file Livewire/Login.php.to_widget
- Usa componenti Filament per il form, proprietà pubbliche per stato, validazione server-side classica.
- Pattern Livewire: ciclo di vita mount, validazione, feedback.
- Limite: non estende XotBaseWidget, non sfrutta pattern Filament-native (azioni, feedback reattivo, modularità widget), validazione non Filament.

### Come realizzare LoginWidget secondo Windsurf/Xot
- File: `/laravel/Modules/User/app/Filament/Widgets/LoginWidget.php`
- Namespace: `Modules\User\Filament\Widgets`
- Estendere: `Modules\Xot\Filament\Widgets\XotBaseWidget`
- Importare: componenti Filament (`TextInput`, `Checkbox`, ecc.)
- Definire `getFormSchema(): array` con chiavi stringa e componenti Filament.
- Logica di autenticazione in metodo dedicato (`authenticate()`), con validazione e feedback Filament.
- Protezione CSRF, feedback chiaro, possibilità di estensione (2FA, captcha, ecc.).

### Esempio schematico
```php
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Checkbox;
use Illuminate\Support\Facades\Auth;

class LoginWidget extends XotBaseWidget
{
    public static function getFormSchema(): array
    {
        return [
            'email' => TextInput::make('email')->email()->required()->label(__('Email')),
            'password' => TextInput::make('password')->password()->required()->label(__('Password')),
            'remember' => Checkbox::make('remember')->label(__('Ricordami')),
        ];
    }

    public function authenticate(array $data): void
    {
        if (!Auth::attempt(['email' => $data['email'], 'password' => $data['password']], $data['remember'] ?? false)) {
            // Gestione errore: feedback utente
        }
        // Redirect o azioni post-login
    }
}
```

### Motivazione delle scelte
- Pattern Filament-native: modularità, feedback reattivo, validazione integrata.
- Estensione XotBaseWidget: coerenza architetturale, patch globali, DRY.
- Import componenti Filament: riuso, chiarezza, aggiornabilità.
- Validazione e sicurezza: ispirazione da Laravel UI/Livewire, ma implementazione idiomatica Filament/Xot.
---
module: theme
topic: widgets-structure
canonical: ../../../Themes/docs/shared-components/widgets-structure.md
---

See canonical documentation: ../../../Themes/docs/shared-components/widgets-structure.md