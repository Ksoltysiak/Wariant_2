document.addEventListener('DOMContentLoaded', () => {
    const keyInput = document.getElementById('key');
    const keyStrengthDisplay = document.getElementById('keyStrength');
  
    // Podczas pisania w polu klucza, wyświetlamy komunikat o jego sile:
    keyInput.addEventListener('input', () => {
      const key = keyInput.value;
      let strengthMsg = '';
  
      if (key.length === 0) {
        strengthMsg = 'Brak klucza.';
      } else if (key.length < 5) {
        strengthMsg = 'Klucz jest krótki (niska siła).';
      } else if (key.length < 10) {
        strengthMsg = 'Klucz ma średnią siłę.';
      } else {
        strengthMsg = 'Klucz jest mocny.';
      }
  
      keyStrengthDisplay.textContent = strengthMsg;
    });
  });
  