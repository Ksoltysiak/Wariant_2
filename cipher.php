<?php
// Sprawdzamy, czy formularz został wysłany metodą POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text   = $_POST['text']   ?? '';
    $key    = $_POST['key']    ?? '';
    $action = $_POST['action'] ?? '';

    // Prosta walidacja (czy mamy tekst i klucz)
    if (empty($text) || empty($key)) {
        echo "<!DOCTYPE html>";
        echo "<html><head><meta charset='UTF-8'><title>Błąd</title></head><body>";
        echo "<p>Brakuje tekstu lub klucza!</p>";
        echo "<p><a href='index.html'>Wróć do formularza</a></p>";
        echo "</body></html>";
        exit;
    }

    // Funkcja Vigenere (szyfr/odszyfr)
    function vigenereCipher($input, $key, $encrypt = true) {
        $alphabet = range('A', 'Z');
        $input    = strtoupper($input);
        $key      = strtoupper($key);

        $result   = '';
        $keyIndex = 0;
        $alphabetSize = 26;

        for ($i = 0; $i < strlen($input); $i++) {
            $char = $input[$i];
            // Szukamy pozycji znaku w alfabecie
            $charPos = array_search($char, $alphabet);

            if ($charPos !== false) {
                // Znajdź przesunięcie z kolejnej litery klucza
                $shift = array_search($key[$keyIndex % strlen($key)], $alphabet);
                if (!$encrypt) {
                    $shift = -$shift;
                }
                $newPos = ($charPos + $shift + $alphabetSize) % $alphabetSize;
                $result .= $alphabet[$newPos];
                $keyIndex++;
            } else {
                // Jeśli to nie litera, dodaj bez zmian (spacja, przecinek, cyfra itp.)
                $result .= $char;
            }
        }
        return $result;
    }

    // Zmienna do wyświetlenia
    $resultText = '';

    // Rozróżniamy akcję (encrypt lub decrypt)
    if ($action === 'encrypt') {
        $resultText = vigenereCipher($text, $key, true);
    } elseif ($action === 'decrypt') {
        $resultText = vigenereCipher($text, $key, false);
    } else {
        // Nieznana akcja
        $resultText = "Nieznana akcja: $action";
    }

    // Generujemy stronę z wynikiem
    echo "<!DOCTYPE html>";
    echo "<html><head><meta charset='UTF-8'>";
    echo "<title>Wynik szyfrowania</title></head><body>";
    echo "<div style='max-width: 600px; margin: 30px auto; text-align: center; font-family: Arial, sans-serif;'>";
    echo "<h1>Wynik operacji: " . htmlspecialchars($action) . "</h1>";
    echo "<p><strong>Tekst wynikowy:</strong></p>";
    echo "<div style='border: 1px solid #ccc; padding: 10px; border-radius: 5px; margin: 10px 0; background: #f9f9f9;'>";
    echo htmlspecialchars($resultText);
    echo "</div>";
    echo "<p><a href='index.html' style='text-decoration: none; color: #007bff;'>Powrót do formularza</a></p>";
    echo "</div></body></html>";
    exit;
} else {
    // Jeżeli nie przyszło żadne POST, przekierowujemy do index.html
    header('Location: index.html');
    exit;
}
