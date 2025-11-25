document.addEventListener("DOMContentLoaded", () => {
    // Seleciona todos os ícones de opções e popups
    const optionIcons = document.querySelectorAll(".options-icon");
    const confirmModal = document.getElementById("confirmModal-sair");
    const btnSimSair = document.getElementById("btnSim-sair");
    const btnNaoSair = document.getElementById("btnNao-sair");

    let monitoriaSelecionada = null; // Guardará o ID da monitoria clicada

    // === ABRIR / FECHAR POPUPS INDIVIDUAIS ===
    optionIcons.forEach((icon) => {
        icon.addEventListener("click", (event) => {
            event.stopPropagation(); // Evita fechar imediatamente ao clicar

            const card = icon.closest(".card");
            const popup = card.querySelector(".options-popup");

            // Fecha todos os outros popups abertos
            document.querySelectorAll(".options-popup.visible").forEach((p) => {
                if (p !== popup) p.classList.remove("visible");
            });

            // Alterna visibilidade do popup atual
            popup.classList.toggle("visible");
        });
    });

    // === FECHAR POPUPS AO CLICAR FORA ===
    document.addEventListener("click", () => {
        document.querySelectorAll(".options-popup.visible").forEach((popup) => {
            popup.classList.remove("visible");
        });
    });

    // === TRATAR CLIQUES NAS OPÇÕES DO POPUP ===
    document.querySelectorAll(".options-popup").forEach((popup) => {
        popup.addEventListener("click", (event) => {
            const clicked = event.target;

            if (clicked.classList.contains("popup-option")) {
                event.preventDefault();
                const action = clicked.dataset.action;
                const card = clicked.closest(".card");
                const monitoriaId = card.dataset.id;

                // Ação: Visualizar
                if (action === "visualizar") {
                    window.location.href = `visualizacao_monitoria.php?id=${monitoriaId}`;
                }

                // Ação: Desinscrever
                else if (action === "desinscrever") {
                    monitoriaSelecionada = monitoriaId;
                    window.location.href = `../src/controllers/desinscrever_monitoria_inscrita.php?id=${monitoriaSelecionada}`;
                }

                popup.classList.remove("visible");
            }
        });
    });

});
