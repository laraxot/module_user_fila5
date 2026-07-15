---
title: "Errore Volt/Folio: `VoltDirectiveMissingException` su logout"
type: concept
tags: [volt, folio, logout, error]
created: 2026-07-14
updated: 2026-07-14
qmd: "volt-folio-logout-error errore volt/folio: `voltdirectivemissingexception` su logout"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./actions-path-convention.md"
  - "./actions-structure-1.md"
  - "./actions-structure.md"
  - "./advanced-user-architecture.md"
  - "./analisi-metodi-duplicati.md"
  - "./analysis.md"
  - "./architecture-rules.md"
  - "./auth-blade-structure.md"
---

# Errore Volt/Folio: `VoltDirectiveMissingException` su logout

## Descrizione dell'errore
Quando si crea una pagina con azioni Volt/Livewire (es. logout) all'interno di una pagina Folio (file-based routing), può comparire il seguente errore:

```
Livewire\Volt\Exceptions\VoltDirectiveMissingException
The [@volt] directive is required when using Volt anonymous components in Folio pages. The directive is missing in [.../logout.blade.php].
```

## Causa
Folio richiede che tutte le pagine che usano Volt (azioni, state, ecc.) includano la direttiva `@volt` all'inizio del file Blade. Senza questa direttiva, Volt non può "montare" correttamente la logica Livewire associata alla pagina.

## Come risolvere
1. **Aggiungi la direttiva `@volt` come prima riga del file Blade** che utilizza Volt/Livewire:
   
   ```blade
   @volt
   ...
   ```
2. **Verifica che tutte le pagine Folio che usano state, mount, azioni Livewire, ecc. abbiano `@volt` come prima riga.**
3. **Non serve altro:** la direttiva `@volt` è sufficiente per abilitare Volt nella pagina.

## Esempio di fix
Prima (sbagliato):
```blade
<?php
use function Livewire\Volt\{state, mount};
// ...
```

Dopo (corretto):
```blade
@volt
<?php
use function Livewire\Volt\{state, mount};
// ...
```

## Best practice
- Ricordati sempre di aggiungere `@volt` in tutte le Folio pages che usano logica Volt/Livewire.
- Documenta questa regola nelle guide interne del team.

---

**Errore risolto: aggiungi `@volt` come prima riga!**
=======
