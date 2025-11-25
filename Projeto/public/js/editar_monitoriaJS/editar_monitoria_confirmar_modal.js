const form = document.getElementById("form-monitoria");
const modal = document.getElementById("confirmModal");
const btnSim = document.getElementById("btnSim");
const btnNao = document.getElementById("btnNao");

form.addEventListener("submit", function(e) {
    e.preventDefault();
    modal.style.display = "flex"; 
});

btnSim.addEventListener("click", function() {
    modal.style.display = "none";
    form.submit();
});

btnNao.addEventListener("click", function() {
    modal.style.display = "none";
});
