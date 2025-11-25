const inputPesquisa = document.querySelector(".barra-pesquisa-input");

  inputPesquisa.addEventListener("input", () => {
    const termo = inputPesquisa.value.toLowerCase();

    document.querySelectorAll('.disciplina-secao').forEach(section => {
      const container = section.querySelector('.cards-container');
      const toggleBtn = section.querySelector('.toggle-btn');
      if (!container) return;

      let algumVisivel = false;

      container.querySelectorAll('.card-monitoria').forEach(card => {
        const monitorNome = card.querySelector(".monitor-nome")?.textContent.toLowerCase() || "";
        const horario = card.querySelector(".monitoria-horario")?.textContent.toLowerCase() || "";
        const data = card.querySelector(".monitoria-data")?.textContent.toLowerCase() || "";
        const sala = card.querySelector(".monitoria-sala")?.textContent.toLowerCase() || "";
        const conteudos = Array.from(card.querySelectorAll(".monitoria-observacoes li"))
          .map(li => li.textContent.toLowerCase())
          .join(" ");

        if (monitorNome.includes(termo) || horario.includes(termo) || data.includes(termo) || sala.includes(termo) || conteudos.includes(termo)) {
          card.style.display = "block";
          algumVisivel = true;
        } else {
          card.style.display = "none";
        }
      });

      if (algumVisivel && container.dataset.closed === 'true') {
        container.style.maxHeight = '2000px';
        container.style.opacity = '1';
        container.style.marginTop = '20px';
        container.dataset.closed = 'false';
        toggleBtn?.classList.add('rotate');
      }
    });
  });

  const resultado = document.getElementById('resultado');
  document.querySelectorAll('.card-monitoria').forEach(card => {
    card.addEventListener('click', () => {
      fetch('modal.php')
        .then(response => response.text())
        .then(data => resultado.innerHTML = data);
    });
  });
