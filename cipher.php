<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $text   = $_POST['text']   ?? '';
    $key    = $_POST['key']    ?? '';

    // Sprawdź, czy mamy wypełnione pola
    if (!$text || !$key) {
        // Przekieruj z komunikatem o błędzie
        header('Location: index.html?result=' . urlencode('Podaj zarówno tekst, jak i klucz!'));
        exit;
    }

    // Decyduj, czy szyfrujemy, czy deszyfrujemy
    $result = '';
    if ($action === 'encrypt') {
        $result = vigenereCipher($text, $key, true);
    } elseif ($action === 'decrypt') {
        $result = vigenereCipher($text, $key, false);
    } else {
        $result = 'Nieznana akcja (ani szyfruj, ani deszyfruj).';
    }

    // Przekieruj z wynikiem na index.html
    header('Location: index.html?result=' . urlencode($result));
    exit;
}

// Funkcja szyfru/odszyfrowania Vigenere
function vigenereCipher($text, $key, $encrypt = true) {
    $alphabet = range('A', 'Z');
    $text = strtoupper($text);
    $key  = strtoupper($key);
    $result = '';
    $keyIndex = 0;
    $alphabetSize = 26;

    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        // Sprawdzamy, czy znak jest w A-Z
        $charPos = array_search($char, $alphabet);

        if ($charPos !== false) {
            $shift = array_search($key[$keyIndex % strlen($key)], $alphabet);
            if (!$encrypt) {
                $shift = -$shift;
            }
            $newPos = ($charPos + $shift + $alphabetSize) % $alphabetSize;
            $result .= $alphabet[$newPos];
            $keyIndex++;
        } else {
            // Jeżeli to nie litera (spacja, znak interpunkcji), to zostawiamy
            $result .= $char;
        }
    }
    return $result;
}
