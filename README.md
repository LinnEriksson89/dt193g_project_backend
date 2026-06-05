# Backend för projekt i kursen Fullstack-utveckling med ramverk

Detta är ett API för projektuppgiften i kursen Fullstack-utveckling med ramverk. Det använder Laravel som ramverk.

## Uppgiftens krav
- Full CRUD-funktionalitet för att administrera produkter
- Funktion för att snabbt justera saldo på produkten
- Inlogging via REST-tjänst
- Readme som beskriver applikationen

## Installation
För att köra detta API lokalt kan man klona ner detta repo och sedan köra "composer run setup" för att installera nödvändiga paket och generera env-fil. Efter detta kan man starta den lokala servern med "composer run dev".

## Tillgängliga routes
Dom egenskapade routes/endpoints som finns att använda i detta api är: 

|Metod  |URI                        |Beskrivning                                                |
|-------|---------------------------|-----------------------------------------------------------|
|Get    | /api/movie/               | Hämta alla filmer.                                        |
|Get    | /api/movie/id             | Hämta en specifik film.                                   |
|Post   | /api/movie/               | Skapa ny film.                                            |
|Put    | /api/movie/id             | Uppdatera en film.                                        |
|Delete | /api/movie/id             | Radera en film.                                           |
|Get    | /api/newmovie             | Hämta id för den nyaste filmen.                           |
|Post   | /api/updateamount         | Uppdatera antalet för en film.                            |
|Get    | /api/category             | Visa alla kategorier.                                     |
|Get    | /api/category/id          | Visa en specifik kategori.                                |
|Post   | /api/category             | Skapa en kategori.                                        |
|Put    | /api/category/id          | Uppdatera en kategori.                                    |
|Delete | /api/category/id          | Radera en kategori.                                       |
|Get    | /api/connection/          | Visa alla kopplingar mellan filmer och kategorier.        |
|Get    | /api/connection/id        | Visa en specifik koppling mellan en film och en kategori. |
|Post   | /api/connection           | Skapa en koppling mellan en film och en kategori.         |
|Put    | /api/connection/id        | Uppdatera kopplingen mellan en film och en kategori.      |
|Delete | /api/connection/id        | Radera kopplingen mellan en film och en kategori.         |
|Get    | /api/connection/movie/id  | Visa alla kopplingar mellan en film och dess kategorier.  |

För användarkonton finns följande:

|Metod  |URI            |Beskrivning            |
|-------|---------------|-----------------------|
|Get    | /api/user     | Visa användare.       |
|Post   | /api/login    | Logga in användare.   |
|Post   | /api/logout   | Logga ut användare.   |
|Post   | /api/register | Registrera användare. |

## Frontend
En frontend som använder detta API kan hittas på https://github.com/LinnEriksson89/dt193g_project_frontend