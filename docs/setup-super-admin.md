- [User Module README](../README.md)
- [Roles & Permissions](./roles-permissions.md)
- [Authentication](./authentication.md)

### Migrazioni Correlate
- [Create Roles Table](../database/migrations/2024_01_01_000011_create_roles_table.php)
- [Create Users Table](../database/migrations/)

### Root Progetto
- [Setup Guide](../../../docs/setup-guide.md)
- [Database Configuration](../../../docs/database-configuration.md)

## Codice Sorgente

**Comando**: `Modules/User/app/Console/Commands/SuperAdminCommand.php`

**Modello Role**: Usa `Modules\User\Models\Role` che estende `Spatie\Permission\Models\Role`

**Integration**: Sistema di permessi basato su [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission)

## Note Operative

### Aggiunta di Nuovi Moduli

Quando si aggiunge un nuovo modulo, il super-admin riceverà automaticamente il ruolo `{modulo}::admin` al prossimo login o alla prossima esecuzione di `user:super-admin`.

### Rimozione Ruoli

Per rimuovere il super-admin:
```bash
php artisan tinker
>>> $user = Modules\Xot\Datas\XotData::make()->getUserByEmail('email@example.com');
>>> $user->removeRole('super-admin');
>>> $user->removeRole('blog::admin'); // specifico
```

### Backup Ruoli

Prima di modifiche importanti:
```bash
php artisan tinker
>>> $roles = Spatie\Permission\Models\Role::with('permissions')->get();
>>> file_put_contents('backup_roles.json', $roles->toJson(JSON_PRETTY_PRINT));
```

## Conclusioni

Il comando `user:super-admin` è fondamentale per il setup iniziale dell'applicazione. Seguire sempre la sequenza corretta:

1. ✅ Migrazioni database
2. ✅ Creazione utente
3. ✅ Assegnazione super-admin
4. ✅ Verifica funzionamento

Con questa guida, il setup dovrebbe essere straightforward e senza errori! 🚀

---
module: theme
topic: setup-super-admin
canonical: ../../../Themes/docs/shared-components/setup-super-admin.md
---

See canonical documentation: ../../../Themes/docs/shared-components/setup-super-admin.md