---
title: "TeamContract — perché il contratto (e la nullability)"
type: concept
module: User
status: active
updated: 2026-10-20
tags: [docs, user, teams, teamcontract]
qmd: "teamcontract usage reasoning hasteams nullability personalTeam test tipizzazione"
related:
  - ./contracts/teamcontract.md
  - ./scopo.md
  - ./00-INDEX.md
  - ./stories/phpstan-test-wave-user-b.story.md
---

# TeamContract — perché il contratto (e la nullability)

Indice: [00-INDEX.md](./00-INDEX.md) · API: [contracts/teamcontract.md](./contracts/teamcontract.md) · scopo: [scopo.md](./scopo.md).

## Perché `TeamContract` e non `Team`

1. **Inversion**: `HasTeams` non deve conoscere la classe concreta del tenant/progetto.
2. **Foglie STI**: i `User` concreti possono vivere fuori dal modulo; il team resta tipizzato sul contratto.
3. **Test**: fixture/mock del contratto senza bootstrap Eloquent completo del modello `Team`.

## Perché i test devono tipizzare

`personalTeam(): ?TeamContract` e `belongsToTeam(?TeamContract)` modellano la realtà: utente senza team. Errori tipici da evitare:

- `belongsToTeam(5)` — l'ID non è un team
- `$this->user->personalTeam()->id` senza guard — il ritorno è nullable
- `shouldReceive` su un model Eloquent reale al posto di una fixture `TeamContract`

Evidence lane: [stories/phpstan-test-wave-user-b.story.md](./stories/phpstan-test-wave-user-b.story.md).

## Variante underscore

`team_contract_usage_reasoning.md` è superseded: usa questo file.
