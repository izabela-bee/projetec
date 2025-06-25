const listaEmojis = document.querySelectorAll('.principal-emojis-label');
const listaInputs = document.querySelectorAll('.principal-emojis-input');

// Aplica classe aos emojis já selecionados
listaInputs.forEach((input, i) => {
  if (input.checked) {
    listaEmojis[i].classList.add('colorir-emoji');
  }
});

// Adiciona evento de clique a cada emoji
listaEmojis.forEach((emoji, index) => {
  emoji.addEventListener('click', () => {
    const isAtivo = emoji.classList.contains('colorir-emoji');

    if (isAtivo) {
      // Remove cor dos emojis a partir do clicado
      for (let i = index; i < listaEmojis.length; i++) {
        listaEmojis[i].classList.remove('colorir-emoji');
      }
    } else {
      // Limpa todos e aplica até o clicado
      listaEmojis.forEach(e => e.classList.remove('colorir-emoji'));

      for (let i = 0; i <= index; i++) {
        listaEmojis[i].classList.add('colorir-emoji');
        listaInputs[i].checked = true;
      }

      for (let i = index + 1; i < listaInputs.length; i++) {
        listaInputs[i].checked = false;
      }
    }
  });
});
