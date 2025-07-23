window.onload = function () {
    const formulario = document.querySelector('[data-form]');

    formulario.addEventListener("submit", function (event) {
        event.preventDefault();

        const registro = document.getElementById("registro").value.trim();
        const email = document.getElementById("email").value.trim();
        const senha = document.getElementById("senha").value.trim();
        const senhaConfirm = document.getElementById("senha-confirm").value.trim();
        const erroSenha = document.getElementById("erro-senha");

        erroSenha.textContent = "";

        if (registro !== "" && email !== "" && senha !== "" && senhaConfirm !== "") {
            if (senha === senhaConfirm) {
                window.location.href = "pagina-inicial.html";
            } else {
                erroSenha.textContent = "As senhas devem ser idênticas";
            }
        } else {
            erroSenha.textContent = "Por favor, preencha todos os campos.";
        }
    });
};