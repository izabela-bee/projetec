import {
  validacaoCampoVazio,
  validacaoDeAno,
  validacaoDeDia,
  validacaoDeMes,
  validarHorario,
  validarHorarioEntre13e17,
} from "../validacaoDeForms/validacoesPadrao.js";
import { mensagens_erro } from "../validacaoDeForms/erros.js";
import { salasDisponiveis } from "../validacaoDeForms/salasPossiveis.js";

const form = document.querySelector(".container-formulario");

form.addEventListener("submit", function (e) {
  e.preventDefault();

  document.querySelectorAll(".toastify").forEach((el) => el.remove());

  let validarFormulario = true;

  const data = document.getElementById("inputData").value.trim();

  const dataFormatada = new Date(data + "T00:00:00");

  const sala = document.getElementById("inputSala").value.trim();
  const horario = document.getElementById("inputHorario").value.trim();
  const materias = document.getElementById("areaTextoMateriais").value.trim();

  const hoje = new Date();
  const agoraHora = hoje.getHours();
  const hojeFormatado = hoje.toISOString().split("T")[0]; // yyyy-mm-dd
  
  if (validacaoCampoVazio(data)) {
    mensagens_erro("O campo de data deve ser preenchido");
    validarFormulario = false;
  
  } else if (validacaoDeAno(data)) {
    mensagens_erro(`O ano que você escolheu tem que ser igual a 2025`);
    validarFormulario = false;
  
  } else if (validacaoDeMes(data)) {
    mensagens_erro(
      `O mês que você escolheu (${dataFormatada.getMonth() + 1}) já passou`
    );
    validarFormulario = false;
  
  } else if (data === hojeFormatado) {
    // ⭐ REGRA NOVA: só considera dia inválido se já passou das 17:00
    if (agoraHora >= 17) {
      mensagens_erro("O dia de hoje já não pode mais ser selecionado (passou das 17:00)");
      validarFormulario = false;
    }
  
  } else if (validacaoDeDia(data)) {
    mensagens_erro(`O dia que você apresentou tem que ser maior que o atual`);
    validarFormulario = false;
  }

  if (validacaoCampoVazio(sala)) {
    mensagens_erro("O campo sala deve ser preenchido");
    validarFormulario = false;
  } else if (sala.length > 3) {
    mensagens_erro("A sala deve conter apenas 3 caracteres");
    validarFormulario = false;
  } else if (!salasDisponiveis.includes(sala)) {
    mensagens_erro("A sala deve estar entre 101 e 306 indo de 1 a 6");
    validarFormulario = false;
  }

  if (validacaoCampoVazio(horario)) {
    mensagens_erro("O campo horário deve ser preenchido");
  } else if (validarHorario(horario)) {
    mensagens_erro("O horário deve estar no formato 00:00");
    validarFormulario = false;
  } else if (validarHorarioEntre13e17(horario)) {
    mensagens_erro("O horário deve ser entre 13:00 e 17:00");
    validarFormulario = false;
  }

  if (validacaoCampoVazio(materias)) {
    mensagens_erro("O campo de materias deve estar preenchido");
    validarFormulario = false;
  }

  if (validarFormulario) {
    form.submit();
  }
});
