const form = document.getElementById("form-monitoria");
const linkSair = document.getElementById("linkSair");
const botao = document.getElementById("botaoConfirmarEdicao");
const modalSair = document.getElementById("confirmModal-sair");
const btnSim = document.getElementById("btnSim-sair");
const btnNao = document.getElementById("btnNao-sair");

linkSair.addEventListener("click", function(e) {
    e.preventDefault();
    modalSair.style.display = "flex";
});

btnSim.addEventListener("click", function() {
    window.location.href = "minhas_monitorias_inscritas.php";
  });
btnNao.addEventListener("click", function() {
    modalSair.style.display = "none";
  });
