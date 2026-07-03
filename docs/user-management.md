La tabella `users` contiene campi comuni a tutti i tipi di utenti, oltre a campi specifici per ciascun tipo. Per una documentazione dettagliata sulla mappatura dei campi, consulta la [Mappatura dei Campi Database nel Modulo Patient](/laravel/Modules/Patient/docs/DATABASE_FIELD_MAPPING.md).

## Registrazione degli Utenti

### Processo di Registrazione dei Pazienti

I pazienti possono registrarsi direttamente e ricevono accesso immediato al sistema:

1. Compilazione del form di registrazione
2. Validazione dei dati
3. Creazione del record nel database con stato `APPROVED`
4. Invio email di benvenuto
5. Accesso immediato al sistema

### Processo di Registrazione dei Dottori

I dottori devono passare attraverso un processo di moderazione:

1. Compilazione del form di registrazione con dati personali e professionali
2. Caricamento delle certificazioni
3. Creazione del record nel database con stato `PENDING`
4. Creazione di un workflow di registrazione
5. Invio email di conferma
6. Moderazione da parte dell'amministratore
7. Invio email di approvazione/rifiuto
8. Accesso al sistema (se approvato)

Per una documentazione dettagliata sul processo di registrazione dei dottori, consulta il [Processo di Registrazione dei Dottori](/laravel/Modules/Patient/docs/DOCTOR_REGISTRATION_PROCESS.md).

## Gestione dei File

Gli utenti possono caricare vari tipi di file, come avatar, certificazioni e documenti. Questi file sono gestiti tramite il componente `FileUpload` di Filament e memorizzati nel database come percorsi o array JSON.

Per una documentazione dettagliata sulla gestione dei file, consulta la [Gestione dei File Upload in Filament](/docs/filament-file-uploads.md).

## Best Practices

### 1. Utilizzo dei Campi Corretti

Assicurarsi di utilizzare i campi corretti per ciascun tipo di utente, come documentato nella [Mappatura dei Campi Database](/laravel/Modules/Patient/docs/DATABASE_FIELD_MAPPING.md).

### 2. Gestione degli Stati

Utilizzare gli enum di stato per gestire i diversi stati degli utenti:

```php
use Modules\Patient\Enums\DoctorStatus;

$doctor->status = DoctorStatus::PENDING->value;
```

### 3. Validazione dei Dati

Implementare una validazione rigorosa per tutti i dati degli utenti:

```php
$request->validate([
    'first_name' => 'required|string|max:255',
    'last_name' => 'required|string|max:255',
    'email' => 'required|email|unique:users,email',
    // Altri campi...
]);
```

## Documentazione Correlata

- [Pattern di Ereditarietà dei Modelli](/docs/model-inheritance-patterns.md)
- [Mappatura dei Campi Database nel Modulo Patient](/laravel/Modules/Patient/docs/DATABASE_FIELD_MAPPING.md)
- [Processo di Registrazione dei Dottori](/laravel/Modules/Patient/docs/DOCTOR_REGISTRATION_PROCESS.md)
- [Gestione dei File Upload in Filament](/docs/filament-file-uploads.md)
- [Migrazioni del Database](/docs/database-migrations.md)
---
module: theme
topic: user-management
canonical: ../../../Themes/docs/shared-components/user-management.md
---

See canonical documentation: ../../../Themes/docs/shared-components/user-management.md