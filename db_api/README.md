# TAS API - dokumentacja v1.1

---

[Logowanie](#logowanie)

[Wydobywanie zasobów](#wydobywanie-zasobów)

[Dodawanie zasobów](#dodawanie-zasobów)

[Dostępne kolekcje](#dostępne-kolekcje)

[Testowanie](#testowanie)

---

### Logowanie

By wykonywać zapytania do api użytkownik najpierw musi się zalogować i utworzyć sesje. Endpointem do naszego api jest **/api/v1/sessions**,
zalogowanie odbywa się przez wykonanie odpowiedniego **POST**-a pod adres

```
http://<tutaj_url>:8080/api/v1/sessions

lub

https://<tutaj_url>:80/api/v1/sessions
```

_**Druga metoda protokołem HTTPS jest lepsza**_

Tak powinna wyglądać zawartoś POST-a który wysyłamy:

```
{
  username: <nazwa użytkownika>
  password: <hasło>
}
```

Jeśli dane są poprawne zostanie zwrócona informacja o powodzeniu, razem z cookie, które utrzyma nam sesje

Jeśli coś się nie będzie zgadzać, np. podamy złe hasło, zostanie zwrócona odpowiednia informacja

---

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

---

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

---

### Dostępne kolekcje

#### **users**

opis: _do przechowywania kont wszystkich urzytkowników_

pola:

* **username** - nazwa urzytkownika
* **password** - hasło, nie jest jawne w bazie
* **role** - rola, na chwilę obecną mamy dostępne (dwie ostatnie nie są na razie używane):

    * admin
    * voter
    * komisja_lokalna
    * komisja_centralna

dostęp:

* **admin** ma prawo do tworzenia nowych użytkowników, oraz podglądu i edycji wszystkich
* **voter** może zobaczyć i edytować tylko swoje dane
* nikt nie ma prawa do usuwania czegokolwiek

---

#### **admins**

opis: _do przechowywania informacji o administratorach_

pola:

* **user** - id usera (konta) z którym powiązany jest dany admin
* **email** - adres email

dostęp:

* **admin** - wszystkie akcje z wyjątkiem usuwania
* **voter** - nie ma dostępu

---

#### **voters**

opis: _do przechowywania danych związanych z wyborcami_

pola:

* **user** - id usera (konta) z którym powiązany jest wyborca
* **name** - imię
* **surname** - nazwisko
* **email** - adres emial wyborcy
* **document_type** - typ dokumentu podany przez wyborce podszas tworzenia konta, dostępne są:
    * passport
    * identity_card
* **document_code** - kod podanego dokumentu

dostęp:

* **admin** ma prawo do tworzenia nowych wyborców, edytowania ich i podglądu wszystkich
* **voter** może podejrzeć tylko swoje dane
* nikt nie ma prawa do usuwania czegokolwiek

---

#### **voting**

opis: _reprezentuje pojedyńcze głosowanie_

pola:

* **name** - nazwa głosowania
* **start_date** - data początku głosowania w formacie YYYY-MM-DD
* **end_date** - data zakończenia głosowania w formacie YYYY-MM-DD

dostęp:

* **admin** - wszystkie akcje z wyjątkiem usuwania
* **voter** - tylko podgląd

---

#### **voted_in**

opis: _informuje czy dany wyborca oddał głos w danym głosowaniu_

pola:

* **voter** - id wyborcy (voter)
* **voting** - id głosowania (voting)

dostęp:

* **admin** - wszystkie akcje z wyjątkiem usuwania
* **voter** - podgląd oraz dodawanie
    * dostęp wyborcy będzie jeszcze zmodyfikowany

---

### Testowanie

Jeśli API zawodzi i chcecie się upewnić czy jest to problem wewnatrz waszej aplikacji czy błąd w API, lub chcielibyście podejrzeć co dokładnie jest zwracane, można użyć narzędzi takich jak [postman](https://www.getpostman.com/apps), [httpie](https://httpie.org/), czy curl
