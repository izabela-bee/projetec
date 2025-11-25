const form = document.getElementById("form-monitoria");
const linkSair = document.getElementById("Desinscrever");
const modalSair = document.getElementById("confirmModal-desinscrever");
const btnSim = document.getElementById("btnSim-desinscrever");
const btnNao = document.getElementById("btnNao-desinscrever");

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
