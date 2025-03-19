function vigenereCipher(text, key, encrypt = true) {
    const alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    text = text.toUpperCase();
    key = key.toUpperCase();
    let result = '';
    let keyIndex = 0;

    for (let i = 0; i < text.length; i++) {
        let char = text[i];
        let charIndex = alphabet.indexOf(char);

        if (charIndex !== -1) {
            let shift = alphabet.indexOf(key[keyIndex % key.length]);
            if (!encrypt) shift = -shift;
            let newIndex = (charIndex + shift + 26) % 26;
            result += alphabet[newIndex];
            keyIndex++;
        } else {
            result += char;
        }
    }
    return result;
}
function encryptText() {
    const text = document.getElementById('text').value;
    const key = document.getElementById('key').value;
    if (text && key) {
        document.getElementById('result').innerText = vigenereCipher(text, key, true);
    } else {
        alert('Wprowadź tekst i klucz!');
    }
}
function decryptText() {
    const text = document.getElementById('text').value;
    const key = document.getElementById('key').value;
    if (text && key) {
        document.getElementById('result').innerText = vigenereCipher(text, key, false);
    } else {
        alert('Wprowadź tekst i klucz!');
    }
}