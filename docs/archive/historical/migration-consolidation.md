<<<<<<< HEAD
---
title: "Migration Consolidation Strategy - User Module"
type: concept
tags: [migration, consolidation]
created: 2026-07-14
updated: 2026-07-14
qmd: "migration-consolidation migration consolidation strategy - user module"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./00-index-1.md"
  - "./00-index.md"
  - "./2fa-guide.md"
  - "./2fa.md"
  - "./accessor-delegation-pattern.md"
  - "./actions-path-convention-1.md"
  - "./actions-path-convention-2.md"
  - "./actions-path-convention.md"
---

# Migration Consolidation Strategy - User Module

## The Furious Argument: One File vs. Multiple Incremental Files

### The Problem
The `Modules/User/database/migrations` directory contains multiple files targeting the same tables (e.g., `teams`, `roles`, `permissions`, `users`). This violates the Laraxot principle of **"1 Table, 1 Migration File"**. It leads to confusion, redundancy, and potential conflicts during installation or updates.

### The Alternatives

#### Option 1: The Standard Laravel Way (Incremental)
Keep all migrations as they are. Each file represents a point in time.
- **Pros**: Matches standard Laravel behavior.
- **Cons**: Becomes a "file swamp" quickly. Hard to see the final schema in one place. Violates Laraxot Zen.

#### Option 2: Consolidation (The Laraxot Way)
Merge all column definitions into a single file per table.
- **Pros**: Clean, declarative, easy to understand. One file is the single source of truth for the table structure.
- **Cons**: Requires careful merging to avoid data loss or schema mismatches in multi-developer environments.

### The Winner: Consolidation via XotBaseMigration

The "Laraxot Zen" dictates that simplicity and clarity (KISS) are paramount. The `XotBaseMigration` class provides the perfect infrastructure for this:

1.  **`tableCreate()`**: Defines the absolute base schema. It runs only if the table does not exist.
2.  **`tableUpdate()`**: Contains checks for every column (`$this->hasColumn()`, `!$this->hasColumn()`). This allows the migration to be idempotent and safe to run on any existing database state.

## Implementation Plan

1.  **Identify Duplicates**: Group migrations by table name.
2.  **Anchor Migration**: Choose the oldest migration file as the "Anchor".
3.  **Content Union**: Merge all column definitions into the Anchor file.
    - `tableCreate` will contain the full intended schema for a fresh install.
    - `tableUpdate` will contain checks and additions/modifications for all columns introduced in "duplicate" files.
4.  **Cleanup**: Delete all duplicate migration files.
5.  **Verification**: Run `php artisan migrate` to ensure no errors and that the final schema is correct.

## Table Mapping & Anchor Files

| Table | Anchor Migration | Duplicates to Delete |
|-------|------------------|----------------------|
| `teams` | `2023_01_01_000006_create_teams_table.php` | `2023...07`, `2025...create_teams`, `2025...add_owner_id` |
| `team_user` | `2023_01_01_000004_create_team_user_table.php` | `2023...06`, `2025...team_user` |
| `roles` | `2023_01_01_000011_create_roles_table.php` | `2023...12`, `2024...11`, `2025...000000` |
| `permissions` | `2023_01_22_000007_create_permissions_table.php` | `2023...09` (permission_table), `2023...08` |
| `users` | `2024_01_01_000002_create_users_table.php` | `2024...06` |
| `devices` | `2023_01_01_000000_create_devices_table.php` | `2023...01` |
| `authentication_log` | `2024_01_01_000001_create_authentication_log_table.php` | `2024...02` |
| `model_has_roles` | `2024_12_05_000034_create_model_has_roles_table.php` | `2024...35` |

---
*Last Updated: 2026-01-02*
=======
# Filosofia Laraxot: Consolidamento Migrazioni

**Data Creazione**: [DATE]
**Status**: Documentazione Filosofica Completa
**Versione**: 1.0.0

## 🏛️ Comandamento Sacro: Una Tabella, Una Migration

### Principio Fondamentale

**"UNA TABELLA, UNA SOLA MIGRATION DI CREAZIONE PER MODULO"**

Questo non è un suggerimento, è un **COMANDAMENTO** della religione Laraxot.

## 🧠 Logica (Logic)

### Perché Questa Regola Esiste

1. **Single Source of Truth**: Ogni tabella ha una sola fonte di verità per la sua creazione
2. **Ordine Temporale**: Le migrazioni Laravel vengono eseguite in ordine cronologico
3. **Tracciabilità**: Possibilità di tracciare l'evoluzione dello schema in modo lineare
4. **Prevenzione Conflitti**: Elimina ambiguità su quale migrazione crea quale tabella

### Manifestazione nel Codice

```php
// ✅ CORRETTO - Una sola migrazione CREATE per tabella
Modules/User/database/migrations/
├── 2024_01_01_000011_create_roles_table.php      # Authoritative CREATE
├── 2024_06_15_143000_add_team_id_to_roles.php    # Schema evolution
└── 2025_09_18_000000_add_fields_to_roles.php     # Schema evolution

// ❌ SBAGLIATO - Multiple CREATE per stessa tabella
Modules/User/database/migrations/
├── 2023_01_01_000011_create_roles_table.php      # Duplicato
├── 2023_01_01_000012_create_roles_table.php      # Duplicato
├── 2024_01_01_000011_create_roles_table.php      # Authoritative
└── 2025_09_18_000000_create_roles_table.php      # Duplicato
```

## 🕉️ Religione (Religion)

### Ordine Temporale Sacro

Le migrazioni Laravel seguono un ordine temporale sacro basato sul timestamp nel nome del file:

```
YYYY_MM_DD_HHMMSS_description.php
```

**Violare questo ordine** crea caos nel database:
- Migrazioni eseguite in ordine sbagliato
- Conflitti di schema
- Stato database inconsistente
- Impossibilità di rollback preciso

### Rito di Consolidamento

Quando si trovano migrazioni duplicate:

1. **Identificare** la migrazione authoritative (più recente e completa)
2. **Fondere** la logica di tutte le migrazioni duplicate nella authoritative
3. **Eliminare** i duplicati
4. **Documentare** la decisione

## 🏛️ Politica (Politics)

### Governance Database

La regola dell'unicità delle migrazioni è una politica di governance del database:

1. **Controllo**: Ogni modifica allo schema è tracciabile
2. **Prevenzione**: Elimina conflitti durante il deployment
3. **Trasparenza**: Chiara evoluzione dello schema nel tempo
4. **Responsabilità**: Ogni tabella ha un unico punto di creazione

### Consequenze della Violazione

1. **Caos Deployment**: Fallimenti in produzione
2. **Debito Tecnico**: Bug impossibili da tracciare
3. **Perdita di Fiducia**: Team non può più fidarsi dello schema
4. **Esilio dal Repository**: Migration rifiutate in code review

## 🧘 Zen (Zen)

### Semplicità e Chiarezza

La regola dell'unicità è un'espressione del principio Zen di semplicità:

- **Una cosa, un posto**: Ogni tabella ha un solo punto di creazione
- **Chiarezza**: Nessuna ambiguità su cosa crea cosa
- **Armonia**: Schema database in equilibrio con il codice

### Il Cammino del Consolidamento

Il processo di consolidamento segue il cammino Zen:

1. **Riconoscere** il problema (duplicati)
2. **Comprendere** la causa (mancanza di disciplina)
3. **Agire** con determinazione (consolidare)
4. **Lasciare andare** il vecchio (eliminare duplicati)
5. **Documentare** la saggezza (questa documentazione)

## 📋 Pattern Corretto Laraxot

### Per Nuove Tabelle

```php
// 2024_01_01_000011_create_roles_table.php
return new class extends XotBaseMigration {
    public function up(): void
    {
        $this->tableCreate(static function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('guard_name')->default('web');
        });

        $this->tableUpdate(function (Blueprint $table): void {
            $this->updateTimestamps($table);
        });
    }
};
```

### Per Modifiche Schema

```php
// 2024_06_15_143000_add_team_id_to_roles_table.php
return new class extends XotBaseMigration {
    protected string $table_name = 'roles';

    public function up(): void
    {
        $this->tableUpdate(function (Blueprint $table): void {
            if (!$this->hasColumn('team_id')) {
                $table->foreignId('team_id')->nullable()->index();
            }
        });
    }
};
```

### Per Aggiunte Campi

```php
// 2025_09_18_000000_add_fields_to_roles_table.php
return new class extends XotBaseMigration {
    protected string $table_name = 'roles';

    public function up(): void
    {
        $this->tableUpdate(function (Blueprint $table): void {
            if (!$this->hasColumn('display_name')) {
                $table->string('display_name')->nullable();
            }

            if (!$this->hasColumn('description')) {
                $table->text('description')->nullable();
            }
        });
    }
};
```

## 🔍 Identificazione Duplicati

### Segnali di Allarme

- Due o più file con `create_*_table.php` per stessa tabella
- Stessa tabella in migration diverse con stesso timestamp
- Conflitti durante `php artisan migrate`
- Stato database incoerente tra ambienti

### Processo di Identificazione

```bash
# Trova tutte le migrazioni per una tabella
grep -r "create_roles_table" Modules/User/database/migrations/

# Verifica duplicati
find Modules/User/database/migrations -name "*create_roles_table.php"
```

## 🛠️ Processo di Consolidamento

### Fase 1: Analisi

1. Identificare tutte le migrazioni duplicate
2. Analizzare il contenuto di ciascuna
3. Determinare quale è la migrazione authoritative

### Fase 2: Consolidamento

1. Fondere la logica di tutte le migrazioni nella authoritative
2. Assicurarsi che tutti i campi siano presenti
3. Verificare che gli indici siano corretti
4. Controllare le foreign key

### Fase 3: Pulizia

1. Eliminare i file duplicati
2. Verificare che non ci siano dipendenze
3. Testare la migrazione consolidata

### Fase 4: Documentazione

1. Documentare la decisione
2. Aggiornare questa documentazione
3. Creare backlink nelle docs correlate

## 📊 Stato Consolidamento Modulo User

### Tabelle con Duplicati Identificati e Risolti

- ✅ `roles_table` - 4 file → 1 authoritative (`2024_01_01_000011_create_roles_table.php`)
- ✅ `teams_table` - Verificato: non esiste migrazione nel modulo User (gestita da Jetstream)
- ✅ `team_user_table` - 1 file rimasto (`2023_01_01_000004_create_team_user_table.php`)
- ✅ `team_invitations_table` - 1 file rimasto (`2023_01_01_000002_create_team_invitations_table.php`)
- ✅ `authentications_table` - Corretto: estende `XotBaseMigration`, rimosso `down()` (`2024_03_27_000000`)
- ✅ `tenants_table` - Corretto: estende `XotBaseMigration`, rimosso `down()` (`2023_01_01_000008`)
- ✅ `permissions_table` - Verificato: estende `XotBaseMigration`, nessun `down()` attivo (`2023_01_01_093340`)
- ✅ `authentication_log_table` - 1 file (`2024_01_01_000001_create_authentication_log_table.php`)
- ✅ `users_table` - 1 file (`2024_01_01_000002_create_users_table.php`)
- ✅ `devices_table` - 1 file (`2023_01_01_000000_create_devices_table.php`)
- ✅ `device_user_table` - 1 file (`2023_01_01_000004_create_device_user_table.php`)
- ✅ `model_has_roles_table` - 1 file (`2024_12_05_000034_create_model_has_roles_table.php`)

### Migrazioni Corrette per Conformità Laraxot

- ✅ `2024_03_27_000000_create_authentications_table.php` - Convertita da `Migration` a `XotBaseMigration`, rimosso `down()`, aggiunte colonne mancanti dal modello
- ✅ `2023_01_01_000008_create_tenants_table.php` - Convertita da `Migration` a `XotBaseMigration`, rimosso `down()`, aggiunte colonne mancanti dal modello

## 🎯 Obiettivo Finale

**Zero duplicati** - Ogni tabella deve avere esattamente una migrazione di creazione.

## 📚 Riferimenti

- [Migration Unicity Commandment](../../xot/docs/migration-unicity-commandment.md)
- [Migration Philosophy](../../xot/docs/migration-philosophy.md)
- [XotBaseMigration Documentation](../../xot/docs/migration-base-rules.md)

---

*Ricorda: La chiarezza dello schema è sacra. Non profanarla mai.*
>>>>>>> 60a2c9a9 (.)
