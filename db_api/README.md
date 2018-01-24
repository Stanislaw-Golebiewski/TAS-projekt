# TAS API - dokumentacja v1.2

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

http://<tutaj_url>/api/v1/sessions

https://<tutaj_url>/api/v1/sessions
```

Tak powinna wyglądać zawartoś POST-a który wysyłamy:

```
{
  username: <nazwa użytkownika>
  password: <hasło>
}
```

Jeśli dane są poprawne zostanie zwrócona informacja o powodzeniu, razem z cookie, które utrzyma nam sesje

```
HTTP/1.1 200 OK
Connection: keep-alive
Date: Wed, 24 Jan 2018 13:04:16 GMT
Transfer-Encoding: chunked
cache-control: no-cache
content-encoding: gzip
content-type: application/json; charset=utf-8
set-cookie: sealious-session=58472e67-6e40-4b0f-9476-6c69a62171e7; Max-Age=86400; Expires=Thu, 25 Jan 2018 13:04:16 GMT; HttpOnly; SameSite=Strict; Path=/
set-cookie: sealious-anon=a3dcea43-2bab-4d0e-ae3b-93a931248e00; Max-Age=86400; Expires=Thu, 25 Jan 2018 13:04:16 GMT; HttpOnly; SameSite=Strict; Path=/
vary: accept-encoding

{
    "data": {},
    "message": "Logged in!",
    "status": "success"
}
```

Jeśli coś się nie będzie zgadzać, np. podamy złe hasło, zostanie zwrócona odpowiednia informacja w sekcji **message**

```
HTTP/1.1 401 Unauthorized
Connection: keep-alive
Date: Wed, 24 Jan 2018 13:05:57 GMT
Transfer-Encoding: chunked
cache-control: no-cache
content-encoding: gzip
content-type: application/json; charset=utf-8
vary: accept-encoding

{
    "data": {},
    "is_developer_fault": false,
    "is_user_fault": true,
    "message": "User/password mismatch",
    "sealious_error": true,
    "type": "invalid_credentials"
}
```

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

#### **candidates**

opis: _inforamcje o kandydatach_

pola:

* **name** - imię
* **surname** - nazwisko

dostęp:

* **admin** - wszystkie akcje z wyjątkiem usuwania
* informacje są udostępniane publicznie do wglądu

---

#### **fractions**

opis: _informacje o partiach_

pola:

* **name** - nazwa partii
* **short_name** - krótka nazwa, akronim
* **leader** - id kandydata z kolekcji **candidates** który jest liderem partii

dostęp:

* **admin** - wszystkie akcje z wyjątkiem usuwania
* informacje są udostępniane publicznie do wglądu

---

#### **lists**

opis: _informacja o dostępnych listach w danym głosowaniu_

pola:

* **voting** - id głosowania z kolekcji **voting**
* **candidate** - id kandydata z kolekcji **candidates** którego dotyczy wpis
* **fraction** - id frakcji z kolekcji **fractions** z ramienia której startuje kandydat podczas danego głosowania
* **number** - numer kandydata na danej liście

dostęp:

* **admin** - wszystkie akcje z wyjątkiem usuwania
* informacje są udostępniane publicznie do wglądu

---

### Testowanie

Jeśli API zawodzi i chcecie się upewnić czy jest to problem wewnatrz waszej aplikacji czy błąd w API, lub chcielibyście podejrzeć co dokładnie jest zwracane, można użyć narzędzi takich jak [postman](https://www.getpostman.com/apps), [httpie](https://httpie.org/), czy curl.

Dobrze jest też obserwować zwracane [kody odpowiedzi HTTP](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status) które mogą stanowić cenną informacje o tym co poszło nie tak.
