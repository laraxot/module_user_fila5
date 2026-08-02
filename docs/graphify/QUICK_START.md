# Graphify Knowledge Graph — User Module

## Cosa è stato generato?

Questo modulo è stato mappato con Graphify, generando un **grafo della conoscenza** queryable dalla sorgente code.

```
graphify-out/
├── graph.json           # Il grafo completo (interattivo, queryable offline)
├── manifest.json        # Metadati di estrazione
└── cache/               # Cache incrementale (non toccare)
```

## Come usarlo?

### 1. Query il grafo localmente

```bash
cd laravel/Modules/User

# Spiegami CreateUserAction
graphify explain "CreateUserAction"

# Trova il percorso tra User e Email
graphify path "User" "Email"

# Query domanda nel grafo
graphify query "Which actions create users?"
graphify query "How does authentication work?"
```

### 2. Visualizza il grafo

```bash
# Genera graph.html (apri nel browser)
graphify . --code-only --out graphify-out

# Apri nel browser
open graphify-out/graph.html
```

### 3. Analizza il grafo programmaticamente

```bash
# Trovi i nodi più connessi (god nodes)
graphify god-nodes --top 20

# Esporta come Mermaid diagram
graphify export callflow-html --graph graphify-out/graph.json --output graphify-out/callflow.html
```

## Cosa estratto Graphify?

### Entità

- **Classes** (Models, Actions, Policies, Resources, Requests)
- **Methods** (execute(), boot(), run(), etc.)
- **Relationships** (imports, uses, extends, implements, calls)

### Confidence Tag su ogni edge

| Tag | Meaning |
|-----|---------|
| `EXTRACTED` | Esplicito nel codice (import statement, direct call) |
| `INFERRED` | Dedotto da Graphify (naming pattern, call-graph second pass) |
| `AMBIGUOUS` | Incerto; flagged per review |

Esempio:

```
User model (47 connessioni)
├── calls CreateUserAction (EXTRACTED: __construct calls CreateUserAction)
├── uses Hash facade (EXTRACTED: Hash::make() in mutator)
└── related to Policies (INFERRED: UserPolicy naming pattern)
```

## Comandi Utili

| Comando | Uso |
|---------|-----|
| `graphify explain "Foo"` | Mostra il nodo Foo e tutte le sue connessioni |
| `graphify path "A" "B"` | Shortest path tra A e B nel grafo |
| `graphify query "How does X work?"` | BFS traversal per rispondere |
| `graphify affected "X"` | Reverse traversal: quali nodi sono impattati da X? |
| `graphify god-nodes` | Top 10 nodi più connessi (architectural hubs) |

## Customizzazione

Per rigenerare il grafo con opzioni diverse:

```bash
# Includi test files
graphify . --include "tests/" --code-only

# Escludi specifici dir
graphify . --exclude "migrations/,cache/" --code-only

# Con semantic extraction (richiede API key)
graphify . --backend claude  # or openai, gemini, etc
```

Configurazione permanente: crea `.graphifyrc.json` nella root del modulo:

```json
{
  "include_dirs": ["app/", "config/", "tests/"],
  "exclude_dirs": ["vendor/"],
  "file_extensions": [".php", ".blade.php"],
  "max_depth": 4
}
```

## Integrazione CI/CD

Aggiungi al workflow GitHub Actions per rigenerare ad ogni push:

```yaml
- name: Update Graphify graph for User module
  run: |
    cd laravel/Modules/User
    graphify . --code-only --force
    git add docs/graphify/graphify-out/
    git commit -m "docs: update Graphify graph"
```

## Link Utili

- **This module's graph**: `graphify-out/graph.json`
- **Graphify GitHub**: https://github.com/Graphify-Labs/graphify
- **Module README**: `../README.md`
- **Full Graphify guide**: `../../../../docs/wiki/concepts/graphify-module-mapping.md`

---

**Generato**: 2026-08-02  
**Graph version**: User module v1  
**Maintained by**: Architettura Team
