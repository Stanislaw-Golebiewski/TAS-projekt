# TAS API - dokumentacja v1.0

### Logowanie

By wykonywać zapytania do api użytkownik najpierw musi się zalogować i utworzyć sesje. Endpointem do naszego api jest **/api/v1/sessions**,
zalogowanie odbywa się przez wykonanie odpowiedniego **POST**-a pod adres

```
http://<tutaj_url>:8080/api/v1/sessions
```

Tak powinna wyglądać zawartoś POST-a który wysyłamy:

```
{
  username: <nazwa użytkownika>
  password: <hasło>
}
```

Jeśli dane są poprawne zostanie zwrócona informacja o powodzeniu, razem z cookie, które utrzyma nam sesje

Jeśli coś się nie będzie zgadzać, np. podamy złe hasło, zostanie zwrócona odpowiednia informacja

### Wydobywanie zasobów

Do wydobycia zasobów służy metoda **GET**.

Najbardziej podstawowym zasobem jaki możemy wydobyć jest cała kolekcja ([dostępne kolekcje](#Dostępne-zasoby)):

```
GET http://<tutaj_url>:8080/api/v1/collections/<nazwa_kolekcji>

GET http://<tutaj_url>:8080/api/v1/collections/users
```

Możemy też wydobyć konkretny rekord z danej kolekcji:

```
GET http://<tutaj_url>:8080/api/v1/collections/<nazwa_kolekcji>/<id_zasobu>

GET http://<tutaj_url>:8080/api/v1/collections/voters/S1gt6kt
```

### Dodawanie zasobów

Do wydobycia zasobów służy metoda **POST**.

By dodać zasób do wybranej kolekcji wykonujemy:

```
POST http://<tutaj_url>:8080/api/v1/collections/<nazwa_kolekcji>
{
  ...co chemy dodać
}
```

Jeśli admin chce dodać nowego użytkownika wykona:

```
POST http://<tutaj_url>:8080/api/v1/collections/users
{
  username: nowy_uzytkownik
  password: haslo_nowego_uzytkowika
  role: wyborca
}
```

Jeśli dodanie zasobu zakończy się powodzeniem, to zostanie nam zwrócony dodany zasób

Jeśli dodanie się nie uda, zostanie zwrócony odpowiedni komunikat z opisem błedu

### Dostępne kolekcje

#### **users**

opis: _do przechowywania kont wszystkich urzytkowników_

pola:

* **username** - nazwa urzytkownika
* **password** - hasło
* **role** - rola, na chwilę obecną mamy dostępne:

  * admin
  * komisja_lokalna
  * komisja_centralna
  * wyborca

dostęp:

* **admin** ma prawo do tworzenia nowym użytkowników, oraz podglądu i edycji wszystkich
* **wyborca** może zobaczyć i edytować tylko siebie
* nikt nie ma prawa do usuwania czegokolwiek

#### **voters**

opis: _do przechowywania danych związanych z wyborcami_

pola:

* **user** - id usera (konta) z którym powiązany jest wyborca
* **imię**
* **nazwisko**
* **numer_telefonu** - na razie typu text, czyli można tam dać wszystko
* **adres** - też tekst, tak, będzie trzeba rozbić na mniejsze pola :)

dostęp:

* **admin** ma prawo do tworzenia nowych wyborców, edytowania ich i podglądu wszystkich
* **wyborca** może podejrzeć tylko swoje dane
* nikt nie ma prawa do usuwania czegokolwiek

### Testowanie

Jeśli API zawodzi i chcecie się upewnić czy jest to problem wewnatrz waszej aplikacji czy błąd w API, lub chcielibyście podejrzeć co dokładnie jest zwracane, można użyć narzędzi takich jak [postman](https://www.getpostman.com/apps), [httpie](https://httpie.org/), czy curl

