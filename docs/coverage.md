---
title: "Coverage del modulo User"
type: report
module: User
updated: 2026-08-27
qmd: "coverage user pest skipped database irraggiungibile misura"
---

# Coverage del modulo User

## Misura del 27 agosto 2026

Comando canonico (AD-25 — servono **entrambe** le opzioni: `-c` sposta il perimetro di
coverage, il path sposta il bootstrap di `Pest.php`):

```bash
cd laravel
XDEBUG_MODE=coverage ./vendor/bin/pest Modules/User/tests -c Modules/User/phpunit.xml --coverage --min=0
```

| | |
|---|---:|
| **Coverage di riga** | **69,9 %** |
| Test passati | 371 |
| Test saltati | 763 |
| Falliti | **0** |
| Asserzioni | 7.591 |
| Durata (senza coverage) | 488 s |

## Il 69,9 % è misurato su un terzo della suite

**763 test su 1.134 (67 %) sono saltati**, e non per test scritti male: saltano perché il
database non è raggiungibile.

```
host configurato: 10.100.200.53:3306   → non raggiungibile da questa macchina
```

Il MySQL su `127.0.0.1` risponde, ma **non è quello che l'applicazione usa**: sia la
connessione `mysql` sia quella `user` puntano a `10.100.200.53`. I test che toccano il DB
lo verificano e si auto-saltano con motivo esplicito, il che è il comportamento giusto —
meglio un `skipped` onesto di un fallimento che nessuno sa leggere.

**Conseguenza pratica: la leva più grande sul coverage di questo modulo non è scrivere
test, è rendere raggiungibile il database di test.** Finché il 67 % della suite non gira,
ogni punto percentuale guadagnato scrivendo test nuovi si applica al terzo che gira.

Stesso quadro negli altri moduli misurati oggi: Notify 465 passati / 358 saltati,
UI 190 / 112.

## Cosa è cambiato oggi

`tests/Feature/Passport/ClientCredentials.php` non finiva in `Test.php`, quindi
`phpunit.xml` (`suffix="Test.php"`) non lo caricava: 74 righe di test che dal giorno in
cui sono state scritte non erano mai state eseguite. Rinominato `ClientCredentialsTest.php`,
ora è scoperto e dichiara 2 test — entrambi `skipped` per lo stesso motivo di cui sopra.
Prima non erano né eseguiti né saltati: erano invisibili.

Rimosso invece `tests/Feature/user-management-business-logic.php`: stesso difetto di
suffisso, ma con **zero righe proprie** rispetto a `UserManagementBusinessLogicTest.php`.
Duplicato morto, non test perduti.

Dettaglio in [story 7.3](stories/7.3.test-mai-eseguiti-suffisso-mancante.story.md).

## Come rimisurare

1. Verificare **prima** che il DB risponda: `nc -z 10.100.200.53 3306`. Senza, la misura
   racconta il terzo della suite che non tocca il database.
2. Lanciare il comando canonico qui sopra.
3. Aggiornare questa tabella, riportando **sempre** anche il numero dei saltati: un
   coverage senza il denominatore reale non è una misura.
