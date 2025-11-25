document.addEventListener("DOMContentLoaded", () => {
    const btnEspera = document.querySelector(".form-espera .buttons");
    const btnConcluido = document.querySelector(".form-concluido .buttons");
    const cards = document.querySelectorAll(".card");
  
    function filtrar(status) {
      cards.forEach(card => {
        if (status === "todos" || card.dataset.status === status) {
          card.style.display = "block";
        } else {
          card.style.display = "none";
        }
      });
    }
  
    btnEspera.addEventListener("click", () => filtrar("espera"));
    btnConcluido.addEventListener("click", () => filtrar("concluido"));
  });
