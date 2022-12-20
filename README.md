KINAMU Business Solutions GmbH
Talpagasse 1 A - 1230 Wien - Österreich

# KINAMU – Eignungstest für Kandidaten im Bereich CRM

Das Ziel dieses Tests ist es Daten von der Sugar-CRM REST Schnittstelle mit
PHP zu holen und diese grafisch darzustellen.

**Technische Voraussetzungen zur Absolvierung des Tests**

- Umgebung zur Ausführung von PHP, z.B. ein Linux-Rechner, das
    Windows Subsystem für Linux oder eine Virtualisierung
- Mindestens PHP-Version 7.
- Eine stabile Internetverbindung
- Composer empfohlen
- Postman für Beispielbibliothek und Schnittstellentest
- GitHub Account zum Upload der Ergebnisse

Das Ergebnis bitte auf GitHub hochladen (GitHub account erforderlich)

Die REST Schnittstelle ist erreichbar unter:

https://sg-bewerbung.demo.sugarcrm.eu/rest/v11_17

Mit dem angegebenen Login.

Eine Dokumentation aller Endpunkte erreicht man unter:

https://sg-bewerbung.demo.sugarcrm.eu/rest/v11_17/help

oder API und DB Schema unter

https://apidocs.sugarcrm.com/

Eine Beispiel Postman Collection gibt es im Sugar-CRM als Download:

https://sg-bewerbung.demo.sugarcrm.eu/#Notes/f93aac16-0682-11ed-8aaa-02f8a092ac8c


KINAMU Business Solutions GmbH
Talpagasse 1 A - 1230 Wien - Österreich

## Teilaufgabe 1:

Daten von der Rest Schnittstelle in PHP laden.

Schreiben Sie ein PHP-Script, welches einen Firmennamen über die API sucht
und alle Kontakte dieser Firma ausgibt.

Um dies zu erreichen können Sie beliebige PHP-Bibliothek oder direkt cURL
verwenden.

Unsere Empfehlung ist Guzzle über Composer zu installieren.

## Teilaufgabe 2:

Präsentieren Sie die für die Firma „Sobrudt Security Systems“ erhaltenen Daten
in einer Tabelle. Die Spalten, die Sie anzeigen sind Ihnen überlassen, jedoch soll
die Tabelle zumindest folgende Features besitzten:

- Sortierung
- Per Klick auf den Datensatz CRM-System
- mailto: Links

Verwenden Sie hierfür eine JavaScript Bibliothek ihrer Wahl.

Anmerkung: Die Daten sollen über die API in Echtzeit geladen werden.

Unsere Empfehlung ist Datatables.

## Teilaufgabe 3:

Erstellen Sie eine SQL-Abfrage, die folgendes Ergebnis erzeugt.
Selektiert werden die Kontakte der Firma „Sobrudt Security Systems“.

Hierfür haben wir zum Testen der Abfrage den custom BewerberAPI Endpunkt
angelegt.

Im Body wird der Parameter „query“ übergeben, der die SQL-Abfrage
enthalten soll.

In der Postman Collection finden Sie auch einen Hinweis zum joinen der E-
Mail-Adressen Tabelle.

```json
[
    {
        "id": "bbcc73c4-0672-11ed-97ae-02f8a092ac8c",
        "name": "Linda Holiday",
        "account": "Sobrudt Security Systems",
        "email_address": "linda.holiday@yahoo.de"
    },
    {
        "id": "c102d144-0672-11ed-a75c-02f8a092ac8c",
        "name": "Lara Riser",
        "account": "Sobrudt Security Systems",
        "email_address": "lara.riser@web.de"
    },
    {
        "id": "c1d9d2d4-0672-11ed-9cb3-02f8a092ac8c",
        "name": "Leo Evertsen",
        "account": "Sobrudt Security Systems",
        "email_address": "leo.evertsen@outlook.de"
    },
    {
        "id": "c27eda2c-0672-11ed-9b66-02f8a092ac8c",
        "name": "Jakob Oettinger",
        "account": "Sobrudt Security Systems",
        "email_address": "jakob.oettinger@web.de"
    },
    {
        "id": "c3573408-0672-11ed-a053-02f8a092ac8c",
        "name": "Lara Schmauch",
        "account": "Sobrudt Security Systems",
        "email_address": "lara.schmauch@web.de"
    },
    {
        "id": "c415578a-0672-11ed-bc18-02f8a092ac8c",
        "name": "Mads Gussman",
        "account": "Sobrudt Security Systems",
        "email_address": "mads.gussman@yahoo.de"
    },
    {
        "id": "c49f6baa-0672-11ed-a269-02f8a092ac8c",
        "name": "Lennard Gutting",
        "account": "Sobrudt Security Systems",
        "email_address": "lennard.gutting@gmx.de"
    },
    {
        "id": "c561e068-0672-11ed-b334-02f8a092ac8c",
        "name": "Nick Bernstein",
        "account": "Sobrudt Security Systems",
        "email_address": "nick.bernstein@gmx.de"
    },
    {
        "id": "c64a9916-0672-11ed-8a66-02f8a092ac8c",
        "name": "Helena Bettenhausen",
        "account": "Sobrudt Security Systems",
        "email_address": "helena.bettenhausen@aol.de"
    },
    {
        "id": "c72f010a-0672-11ed-904f-02f8a092ac8c",
        "name": "Finn Fash",
        "account": "Sobrudt Security Systems",
        "email_address": "finn.fash@aol.de"
    }
]
```
