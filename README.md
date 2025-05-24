# Wariant 2 - Szyfr Vigenere – aplikacja webowa

## Opis projektu

Aplikacja umożliwia szyfrowanie i deszyfrowanie tekstu przy użyciu szyfru Vigenere’a. Użytkownik podaje tekst oraz klucz (słowo lub fraza), wybiera operację (szyfrowanie lub deszyfrowanie), a wynik pojawia się na stronie. Projekt realizuje zagadnienia z zakresu bezpieczeństwa systemów informatycznych i kryptografii klasycznej.

---

## Technologie

- **HTML** – struktura strony, formularz, wyświetlanie wyników
- **CSS** – atrakcyjna stylizacja interfejsu
- **JavaScript** – interaktywność, sprawdzanie siły klucza w czasie rzeczywistym
- **PHP** – realizacja algorytmu szyfrowania/deszyfrowania po stronie serwera
- **XAMPP** – środowisko uruchomieniowe (Apache + PHP)

---

## Funkcjonalności

- Szyfrowanie tekstu szyfrem Vigenere’a
- Deszyfrowanie tekstu szyfrem Vigenere’a
- Walidacja poprawności danych wejściowych
- Dynamiczne wyświetlanie siły klucza (JavaScript)
- Przyjazny i czytelny interfejs użytkownika
- Wynik prezentowany na osobnej stronie, z możliwością powrotu do formularza

---

## Instrukcja uruchomienia

1. **Zainstaluj XAMPP** i uruchom serwer Apache.
2. Skopiuj cały folder projektu do katalogu `htdocs` (np. `C:\xampp\htdocs\vigenere`).
3. Wejdź w przeglądarce na adres:  
   ```
   http://localhost/vigenere/index.html
   ```
4. Korzystaj z aplikacji: wpisz tekst, klucz, wybierz operację i naciśnij odpowiedni przycisk.

---

## Struktura plików

```
vigenere/
├── cipher.php      # Backend – algorytm szyfru Vigenere (PHP)
├── index.html      # Strona główna z formularzem
├── script.js       # Skrypt JS do oceny siły klucza
├── style.css       # Stylizacja strony
└── README.md       # Ten plik
```

---

## Przykład użycia

1. Wprowadź tekst do szyfrowania lub deszyfrowania.
2. Wpisz klucz (słowo lub frazę).
3. Kliknij "Szyfruj" lub "Deszyfruj".
4. Wynik pojawi się na nowej stronie z możliwością powrotu do formularza.

---

## Bezpieczeństwo

- Dane użytkownika nie są nigdzie zapisywane ani przechowywane.
- Szyfrowanie/deszyfrowanie odbywa się wyłącznie w pamięci serwera.
- Klucz powinien być odpowiednio długi i niepowtarzalny, aby zwiększyć bezpieczeństwo szyfru.

---

## Autorzy

1. Dominik Łakomy, nr albumu 29163
2. Jakub Sołtysiak, nr albumu 29291

---

## Licencja

Projekt edukacyjny – do wykorzystania w celach naukowych.

---

