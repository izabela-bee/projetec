document.getElementById("inputHorario").addEventListener("change", function () {
  const horarioSelecionado = this.value;
  const inputData = document.getElementById('inputData').value;

  fetch("../src/controllers/verificar_horario.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "horario=" + encodeURIComponent(horarioSelecionado) + "&data=" + encodeURIComponent(inputData),
  })
    .then((response) => response.json())
    .then((retorno) => {
      const validacao = retorno.validacao_horario;
      const ocupacao = retorno.ocupacao;

      const icone = document.getElementById("iconeStatus2");
      const input = document.getElementById("inputHorario");

      if (validacao?.disponivel === true) {
        input.style.borderColor = "green";
        icone.style.color = "green";
        icone.innerHTML = "✔";
      } else {
        input.style.borderColor = "red";
        icone.style.color = "red";
        icone.innerHTML = "✖";
      }

      const selectSalas = document.getElementById("inputSala");
      const opcoes = selectSalas.querySelectorAll("option");

      const disponiveis = ocupacao.salas_disponiveis || [];
      const indisponiveis = ocupacao.salas_indisponiveis || [];


      opcoes.forEach((op) => {
        const valor = op.value;

        if (valor === "") return;

        op.style.backgroundColor = "";
        op.disabled = false;

        if (disponiveis.includes(valor)) {
          op.style.backgroundColor = "#5CE65C";
        }

        if (indisponiveis.includes(valor)) {
          op.style.backgroundColor = "#FF7081";
          op.disabled = true;
        }
      });
    });
});
document.getElementById("inputData").addEventListener("change", function () {
  const dataSelecionada = this.value;

  const inputHorario = document.getElementById("inputHorario");
  const inputSala = document.getElementById("inputSala");

  inputHorario.value = "";
  inputSala.value = "";

  const icone2 = document.getElementById("iconeStatus2");
  const icone3 = document.getElementById("iconeStatus3");

  inputHorario.style.borderColor = "";
  icone2.style.color = "";
  icone2.innerHTML = "";

  inputSala.style.borderColor = "";
  icone3.style.color = "";
  icone3.innerHTML = "";

  fetch("../src/controllers/verificar_data.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "data=" + encodeURIComponent(dataSelecionada),
  })
    .then((response) => response.json())
    .then((retorno) => {
      const validacao = retorno.validacao_data;
      const ocupacao = retorno.ocupacao;

      const icone = document.getElementById("iconeStatus");
      const input = document.getElementById("inputData");

      if (validacao?.disponivel === true) {
        input.style.borderColor = "green";
        icone.style.color = "green";
        icone.innerHTML = "✔";
      } else {
        input.style.borderColor = "red";
        icone.style.color = "red";
        icone.innerHTML = "✖";
      }

      const selectHorario = document.getElementById("inputHorario");
      const opcoes = selectHorario.querySelectorAll("option");

      const disponiveis = ocupacao.horarios_disponiveis || [];
      const indisponiveis = ocupacao.horarios_indisponiveis || [];

      opcoes.forEach((op) => {
        const valor = op.value;

        if (valor === "") return;

        op.style.backgroundColor = "";
        op.disabled = false;

        if (disponiveis.includes(valor)) {
          op.style.backgroundColor = "#5CE65C";
        }

        if (indisponiveis.includes(valor)) {
          op.style.backgroundColor = "#FF7081";
          op.disabled = true;
        }
      });
    })
    .catch((error) => console.error("Erro:", error));
});
document.getElementById("inputSala").addEventListener("change", function () {
  const salaSelecionada = this.value;
  const horarioSelecionado = document.getElementById('inputHorario').value;

  fetch("../src/controllers/verificar_sala.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "sala=" + encodeURIComponent(salaSelecionada) + "&horario=" + encodeURIComponent(horarioSelecionado),
  })
    .then((response) => response.json())
    .then((retorno) => {
      const validacao = retorno.validacao_sala;

      const icone = document.getElementById("iconeStatus3");
      const input = document.getElementById("inputSala");

      if (validacao?.disponivel === true) {
        input.style.borderColor = "green";
        icone.style.color = "green";
        icone.innerHTML = "✔";
      } else {
        input.style.borderColor = "red";
        icone.style.color = "red";
        icone.innerHTML = "✖";
      }
    });
});
