- [Third-Party Model Inheritance](../Xot/docs/third-party-model-inheritance-philosophy.md) - Documentazione Xot
- [Critical Architecture Rules](../Xot/docs/critical-architecture-rules.md) - Regole critiche

## 🔍 Verifica Altri Modelli User

### Modelli che Estendono BaseModel (Corretto)

Questi modelli **devono** estendere `BaseModel` perché sono modelli business domain-specific:

- ✅ `TeamPermission` → `BaseModel` (pivot table custom)
- ✅ `TeamInvitation` → `BaseModel` (business logic)
- ✅ `BaseTeam` → `BaseModel` (business logic)
- ✅ `SocialiteUser` → `BaseModel` (business logic)
- ✅ `BaseTenant` → `BaseModel` (business logic)
- ✅ `BaseProfile` → `BaseModel` (business logic)

### Modelli che Estendono Spatie (Corretto)

Questi modelli **devono** estendere le classi Spatie:

- ✅ `Permission` → `SpatiePermission`
- ✅ `Role` → `SpatieRole`

## ✅ Checklist Verifica

- [x] `Permission` estende `SpatiePermission` (non `BaseModel`)
- [x] `Role` estende `SpatieRole` (non `BaseModel`)
- [x] Alias espliciti usati (`SpatiePermission`, `SpatieRole`)
- [x] Connection specifica configurata (`'user'`)
- [x] Traits Laraxot aggiunti solo se necessari (`RelationX`)
- [x] Nessuna sovrascrittura di metodi core Spatie
- [x] Documentazione aggiornata e completa

## 🚨 Cosa Fare se si Trova una Violazione

Se si trova un modello che estende `BaseModel` ma dovrebbe estendere una classe Spatie:

1. **Identificare** la classe Spatie corretta
2. **Cambiare** l'estensione da `BaseModel` a `Spatie[Class]`
3. **Aggiungere** alias esplicito (`use Spatie\... as Spatie[Class]`)
4. **Verificare** che i traits non siano in conflitto
5. **Testare** che la funzionalità Spatie funzioni ancora
6. **Documentare** la modifica

## 📝 Pattern Corretto da Seguire

```php
<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;  // Alias esplicito
use Modules\Xot\Models\Traits\RelationX;  // Solo se necessario

class Permission extends SpatiePermission  // Estende Spatie, NON BaseModel
{
    use RelationX;  // Opzionale: solo se serve

    /** @var string */
    protected $connection = 'user';  // Connection specifica modulo

    // Solo metodi/relazioni specifiche del modulo
    // NON sovrascrivere metodi core Spatie
}
```

---

**Ultima Verifica**: 2025-01-XX
**Status**: ✅ Tutti i modelli Spatie sono corretti
**Filosofia**: Rispettata completamente
---
module: theme
topic: spatie-models-verification
canonical: ../../../Themes/docs/shared-components/spatie-models-verification.md
---

See canonical documentation: ../../../Themes/docs/shared-components/spatie-models-verification.md