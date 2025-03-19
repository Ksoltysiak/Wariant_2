<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function vigenereCipher($text, $key, $encrypt = true) {
        $alphabet = range('A', 'Z');
        $text = strtoupper($text);
        $key = strtoupper($key);
        $result = '';
        $keyIndex = 0;

        for ($i = 0; $i < strlen($text); $i++) {
            $char = $text[$i];
            $charIndex = array_search($char, $alphabet);

            if ($charIndex !== false) {
                $shift = array_search($key[$keyIndex % strlen($key)], $alphabet);
                if ($encrypt === false) $shift = -$shift;
                $newIndex = ($charIndex + $shift + 26) % 26;
                $result .= $alphabet[$newIndex];
                $keyIndex++;
            } else {
                $result .= $char;
            }
        }
        return $result;
    }

    $text = isset($_POST['text']) ? $_POST['text'] : '';
    $key = isset($_POST['key']) ? $_POST['key'] : '';

    if ($text && $key) {
        echo json_encode(["result" => vigenereCipher($text, $key, false)]);
    } else {
        echo json_encode(["error" => "Wprowadź tekst i klucz"]);
    }
}