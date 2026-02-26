# 🧬 Schemaless Attributes in User Module

**Status:** ⚠️ SPECIAL CONFIGURATION
**Reference:** [Global Rules](../../Xot/docs/schemaless-attributes-rules.md)

---

## ⚠️ Configurazione Speciale: Colonna `extra`

Il modulo User utilizza una configurazione non standard per gli attributi schemaless in `BaseProfile`.

### Differenze dallo Standard
1.  **Nome Colonna**: `extra` (invece di `extra_attributes`).
2.  **Definizione**:
    ```php
    protected $fillable = [..., 'extra'];
    
    protected function casts(): array
    {
        return [
            'extra' => SchemalessAttributes::class,
        ];
    }
    ```

### Implicazioni
- Il trait `SchemalessAttributesTrait` è utilizzato.
- Verificare che lo scope `withExtraAttributes` funzioni correttamente con la colonna `extra`.
- Se lo scope non funziona, usare `where('extra->key', $value)`.

---

## 📝 Best Practices per User Module

1.  **Non rinominare la colonna** per ora (breaking change).
2.  **Usare `casts()`** come definito.
3.  **Non implementare scope manuali errati**.
