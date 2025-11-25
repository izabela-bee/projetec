function verificarData() {

    const dataSelecionada = document.getElementById('inputData').value;

        // Inputs principais
        const inputHorario = document.getElementById("inputHorario");
        const inputSala = document.getElementById("inputSala");

        // 🔹 RESET (somente se a data foi realmente alterada)
        if (dataSelecionada !== dataAtual) {
            inputHorario.value = "";
            inputSala.value = "";
        }

        // Ícones de validação
        const iconeData = document.getElementById("iconeStatus");
        const iconeHorario = document.getElementById("iconeStatus2");
        const iconeSala = document.getElementById("iconeStatus3");

        // Função para limpar status
        function limparStatus() {
            inputHorario.style.borderColor = "";
            iconeHorario.innerHTML = "";
            iconeHorario.style.color = "";

            inputSala.style.borderColor = "";
            iconeSala.innerHTML = "";
            iconeSala.style.color = "";
        }
        limparStatus();

        // ==============================
        //      CHAMADA AO PHP
        // ==============================
        fetch("../src/controllers/verificar_editar_data.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body:
                "data=" + encodeURIComponent(dataSelecionada) +
                "&id=" + encodeURIComponent(idMonitoriaAtual) // ⭐ ENVIAR ID DA MONITORIA ⭐
        })
            .then((response) => response.json())
            .then((retorno) => {

                // ----- Validação da data -----
                const validacao = retorno.validacao_data;
                const input = document.getElementById("inputData");

                if (validacao.disponivel || dataSelecionada === dataAtual) {
                    iconeData.innerHTML = "✔";
                    iconeData.style.color = "green";
                    input.style.borderColor = "green";
                } else {
                    iconeData.innerHTML = "✖";
                    iconeData.style.color = "red";
                    input.style.borderColor = "red";
                }

                // ----- TRATAR HORÁRIOS -----
                const ocupacao = retorno.ocupacao;
                const horariosDisponiveis = ocupacao.horarios_disponiveis;
                const horariosIndisponiveis = ocupacao.horarios_indisponiveis;

                const opcoesHorario = inputHorario.querySelectorAll("option");

                opcoesHorario.forEach((op) => {
                    const valor = op.value;

                    if (!valor) return;

                    op.disabled = false;
                    op.style.backgroundColor = "";

                    // ⭐ Manter o horário atual como sempre disponível ⭐
                    if (valor === horarioAtual && dataSelecionada === dataAtual) {
                        op.disabled = false;
                        op.style.backgroundColor = "#A3D3FF"; // azul
                        return;
                    }

                    if (horariosDisponiveis.includes(valor)) {
                        op.style.backgroundColor = "#5CE65C"; // verde
                    }

                    if (horariosIndisponiveis.includes(valor)) {
                        op.style.backgroundColor = "#FF7081"; // vermelho
                        op.disabled = true;
                    }
                });
            })
            .catch((error) => console.error("Erro:", error));

    };

document.getElementById("inputData").addEventListener("change", verificarData);

// --- Executa automaticamente caso exista valor pré definido ---
window.addEventListener("DOMContentLoaded", function () {
  verificarData();
});





// ======================================================
//       ATUALIZAÇÃO DE SALAS QUANDO HORÁRIO MUDA
// ======================================================
function validarHorario() {
    const horarioSelecionado = document.getElementById("inputHorario").value;
    const inputData = document.getElementById("inputData").value;
  
    if (!horarioSelecionado || !inputData) return; // evita erros
  
    fetch("../src/controllers/verificar_editar_horario.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body:
        "horario=" + encodeURIComponent(horarioSelecionado) +
        "&data=" + encodeURIComponent(inputData) +
        "&sala_atual=" + encodeURIComponent(salaAtual)
    })
      .then((response) => response.json())
      .then((retorno) => {
        const validacao = retorno.validacao_horario;
        const ocupacao = retorno.ocupacao;
  
        const icone = document.getElementById("iconeStatus2");
        const input = document.getElementById("inputHorario");
  
        // --- Ícone verde/vermelho ---
        if (validacao?.disponivel === true) {
          input.style.borderColor = "green";
          icone.style.color = "green";
          icone.innerHTML = "✔";
        } else {
          input.style.borderColor = "red";
          icone.style.color = "red";
          icone.innerHTML = "✖";
        }
  
        // --- Salas ---
        const selectSalas = document.getElementById("inputSala");
        const opcoes = selectSalas.querySelectorAll("option");
  
        const disponiveis = ocupacao.salas_disponiveis || [];
        const indisponiveis = ocupacao.salas_indisponiveis || [];

        console.log(salaAtual);
        console.log(indisponiveis);
  
        opcoes.forEach((op) => {
          const valor = op.value;
  
          if (valor === "") return;
  
          op.style.backgroundColor = "";
          op.disabled = false;

          if (valor === salaAtual) {
            op.disabled = false;
            op.style.backgroundColor = "#A3D3FF"; // azul
            return;
        }
  
          if (disponiveis.includes(valor)) {
            op.style.backgroundColor = "#5CE65C"; // verde
          }
  
          if (indisponiveis.includes(valor)) {
            op.style.backgroundColor = "#FF7081"; // vermelho
            op.disabled = true;
          }
        });
      });
  }

  document.getElementById("inputHorario").addEventListener("change", validarHorario);

  // --- Executa automaticamente caso exista valor pré definido ---
  window.addEventListener("DOMContentLoaded", function () {
    validarHorario();
  });

// ------------------------------------------------------------
// FUNÇÃO PRINCIPAL QUE VALIDA A SALA
// ------------------------------------------------------------
function validarSala() {
    const salaSelecionada = document.getElementById("inputSala").value;
    const horarioSelecionado = document.getElementById("inputHorario").value;
    const dataSelecionada = document.getElementById("inputData").value;

    if (!salaSelecionada || !horarioSelecionado || !dataSelecionada) {
        return;
    }

    fetch("../src/controllers/verificar_editar_sala.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body:
            "sala=" + encodeURIComponent(salaSelecionada) +
            "&horario=" + encodeURIComponent(horarioSelecionado) +
            "&data=" + encodeURIComponent(dataSelecionada) +
            "&id=" + encodeURIComponent(idMonitoriaAtual) +
            "&sala_atual=" + encodeURIComponent(salaAtual)
    })
        .then((response) => response.json())
        .then((retorno) => {

            const validacao = retorno.validacao_sala;
            const salaOcupada = retorno.ocupacao?.sala_ocupada ?? false;

            const input = document.getElementById("inputSala");
            const icone = document.getElementById("iconeStatus3");

            // -------------------------------
            // ÍCONE E BORDA (VERDE / VERMELHA)
            // -------------------------------
            if (validacao?.disponivel === true) {
                input.style.borderColor = "green";
                icone.style.color = "green";
                icone.innerHTML = "✔";
            } else {
                input.style.borderColor = "red";
                icone.style.color = "red";
                icone.innerHTML = "✖";
            }

            // -------------------------------
            // COLORIR LISTA DE SALAS
            // -------------------------------
            const select = document.getElementById("inputSala");
            const opcoes = select.querySelectorAll("option");

            opcoes.forEach((op) => {
                const valor = op.value;
                if (!valor) return;

                op.disabled = false;
                op.style.backgroundColor = "";

                // ⭐ Sala atual da edição sempre azul e sempre habilitada
                if (valor === salaAtual) {
                    op.style.backgroundColor = "#A3D3FF"; // azul clarinho
                    op.disabled = false;
                    return;
                }

                // Sala está ocupada? vermelho
                if (salaOcupada && valor === salaSelecionada) {
                    op.style.backgroundColor = "#FF7081";
                    op.disabled = true;
                }

                // Caso contrário, sala livre → verde
                if (!salaOcupada) {
                    op.style.backgroundColor = "#5CE65C";
                }
            });

        })
        .catch((erro) => console.error("Erro salas:", erro));
}


// ------------------------------------------------------------
// DISPARA QUANDO O USUÁRIO ALTERA A SALA
// ------------------------------------------------------------
document.getElementById("inputSala").addEventListener("change", validarSala);


// ------------------------------------------------------------
// EXECUTA AUTOMATICAMENTE QUANDO A PÁGINA CARREGA
// (Para caso exista sala pré-definida)
// ------------------------------------------------------------
window.addEventListener("DOMContentLoaded", function () {
    validarSala();
});
