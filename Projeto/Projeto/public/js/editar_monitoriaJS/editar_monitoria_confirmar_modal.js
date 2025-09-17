const form = document.getElementById("form-monitoria");
const botao = document.getElementById("botaoConfirmarEdicao");
const modal = document.getElementById("confirmModal");
const btnSim = document.getElementById("btnSim");
const btnNao = document.getElementById("btnNao");

// Intercepta o submit
form.addEventListener("submit", function(e) {
  e.preventDefault(); // bloqueia envio imediato
  modal.style.display = "flex"; // mostra o pop-up
});

// Se confirmar → envia
btnSim.addEventListener("click", function() {
  modal.style.display = "none";
  form.submit(); // envia de verdade
});

// Se cancelar → fecha o modal
btnNao.addEventListener("click", function() {
  modal.style.display = "none";
});