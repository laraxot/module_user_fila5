---
title: "Collegamento al Modulo Cms"
type: concept
tags: [cms, link]
created: 2026-07-14
updated: 2026-07-14
qmd: "cms-link collegamento al modulo cms"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
<<<<<<< .merge_file_08vXsH
  - "./00-index-1.md"
=======
  - "./00-index-indice-documentazione-modulo-user.md"
>>>>>>> .merge_file_09S9vw
  - "./00-index.md"
  - "./2fa-guide.md"
  - "./2fa.md"
  - "./accessor-delegation-pattern.md"
<<<<<<< .merge_file_08vXsH
  - "./actions-path-convention-1.md"
  - "./actions-path-convention-2.md"
  - "./actions-path-convention.md"
=======
  - "./actions-path-convention.md"
  - "./actions-path-convention-convenzione-percorsi.md"
  - "./actions-path-convention.md"
status: draft
>>>>>>> .merge_file_09S9vw
---

# Collegamento al Modulo Cms

Questo documento descrive le relazioni e i collegamenti tra il modulo User e il modulo Cms per quanto riguarda i componenti Filament e le convenzioni di namespace.
## Convenzioni di Namespace
Sia il modulo User che il modulo Cms seguono le stesse convenzioni di namespace per i componenti Filament:
- Il namespace corretto è sempre `Modules\<NomeModulo>\Filament`, anche se i file si trovano in `app/Filament`
- Non va mai aggiunto `App` nel namespace
Per dettagli specifici, consulta:
- [Convenzioni di Namespace](./namespace-conventions.md) in questo modulo
- [Convenzioni Namespace Filament](../../cms/project_docs/convenzioni-namespace-filament.md) nel modulo Cms
<<<<<<< .merge_file_08vXsH
- [Convenzioni Namespace Filament](../../cms/docs/convenzioni-namespace-filament.md) nel modulo Cms
=======
- [Convenzioni Namespace Filament](../../Cms/docs/convenzioni-namespace-filament.md) nel modulo Cms
>>>>>>> .merge_file_09S9vw
## Punti di Integrazione
- **Autenticazione e UI**: I componenti di autenticazione del modulo User sono integrati con l'interfaccia utente del modulo Cms
- **Widgets condivisi**: Alcuni widget del modulo User sono utilizzati nelle dashboard del modulo Cms
- **Filament Resources**: I resource di entrambi i moduli interagiscono in diverse parti dell'applicazione
## Collegamenti Bidirezionali
- [Convenzioni Namespace Filament nel modulo Cms](../../cms/project_docs/convenzioni-namespace-filament.md)
- [Collegamento User-Cms nel modulo Cms](../../cms/project_docs/user-link.md)
<<<<<<< .merge_file_08vXsH
- [Convenzioni Namespace Filament nel modulo Cms](../../cms/docs/convenzioni-namespace-filament.md)
- [Collegamento User-Cms nel modulo Cms](../../cms/docs/user-link.md)
=======
- [Convenzioni Namespace Filament nel modulo Cms](../../Cms/docs/convenzioni-namespace-filament.md)
- [Collegamento User-Cms nel modulo Cms](../../Cms/docs/user-link.md)
>>>>>>> .merge_file_09S9vw
---
### Nota Importante
Quando aggiungi nuovi componenti Filament nel modulo User, assicurati di:
1. Utilizzare il namespace corretto `Modules\User\Filament`
2. NON includere `App` nel namespace
3. Seguire le convenzioni di stile condivise con il modulo Cms
## Collegamenti tra versioni di cms-link.md
* [cms-link.md](../../../xot/project_docs/cms-link.md)
* [cms-link.md](../../../user/project_docs/cms-link.md)
* [cms-link.md](../../../ui/project_docs/cms-link.md)
* [cms-link.md](../../../lang/project_docs/cms-link.md)
* [cms-link.md](../../../xot/docs/cms-link.md)
* [cms-link.md](../../../user/docs/cms-link.md)
* [cms-link.md](../../../ui/docs/cms-link.md)
<<<<<<< .merge_file_08vXsH
* [cms-link.md](../../../lang/docs/cms-link.md)
=======
* [cms-link.md](../../Lang/docs/cms-link.md)
>>>>>>> .merge_file_09S9vw
# Collegamento al Modulo Cms

Questo documento descrive le relazioni e i collegamenti tra il modulo User e il modulo Cms per quanto riguarda i componenti Filament e le convenzioni di namespace.

## Convenzioni di Namespace

Sia il modulo User che il modulo Cms seguono le stesse convenzioni di namespace per i componenti Filament:

- Il namespace corretto è sempre `Modules\<NomeModulo>\Filament`, anche se i file si trovano in `app/Filament`
- Non va mai aggiunto `App` nel namespace

Per dettagli specifici, consulta:
- [Convenzioni di Namespace](./namespace-conventions.md) in questo modulo
<<<<<<< .merge_file_08vXsH
- [Convenzioni Namespace Filament](../../cms/docs/convenzioni-namespace-filament.md) nel modulo Cms
=======
- [Convenzioni Namespace Filament](../../Cms/docs/convenzioni-namespace-filament.md) nel modulo Cms
>>>>>>> .merge_file_09S9vw

## Punti di Integrazione

- **Autenticazione e UI**: I componenti di autenticazione del modulo User sono integrati con l'interfaccia utente del modulo Cms
- **Widgets condivisi**: Alcuni widget del modulo User sono utilizzati nelle dashboard del modulo Cms
- **Filament Resources**: I resource di entrambi i moduli interagiscono in diverse parti dell'applicazione

## Collegamenti Bidirezionali

<<<<<<< .merge_file_08vXsH
- [Convenzioni Namespace Filament nel modulo Cms](../../cms/docs/convenzioni-namespace-filament.md)
- [Collegamento User-Cms nel modulo Cms](../../cms/docs/user-link.md)
=======
- [Convenzioni Namespace Filament nel modulo Cms](../../Cms/docs/convenzioni-namespace-filament.md)
- [Collegamento User-Cms nel modulo Cms](../../Cms/docs/user-link.md)
>>>>>>> .merge_file_09S9vw

---

### Nota Importante
Quando aggiungi nuovi componenti Filament nel modulo User, assicurati di:
1. Utilizzare il namespace corretto `Modules\User\Filament`
2. NON includere `App` nel namespace
3. Seguire le convenzioni di stile condivise con il modulo Cms

## Collegamenti tra versioni di cms-link.md
* [cms-link.md](../../../xot/docs/cms-link.md)
* [cms-link.md](../../../user/docs/cms-link.md)
* [cms-link.md](../../../ui/docs/cms-link.md)
<<<<<<< .merge_file_08vXsH
* [cms-link.md](../../../lang/docs/cms-link.md)
=======
* [cms-link.md](../../Lang/docs/cms-link.md)
>>>>>>> .merge_file_09S9vw
