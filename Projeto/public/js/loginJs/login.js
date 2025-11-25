import { mensagens_erro } from '../validacaoDeForms/erros.js';
import { validacaoCampoVazio } from '../validacaoDeForms/validacoesPadrao.js';

const formulario = document.querySelector("[data-form]");
formulario.addEventListener("submit", function (event) {
  event.preventDefault();

  document.querySelectorAll(".toastify").forEach((el) => el.remove());

  let validarFormulario = true;

  const registro = document.getElementById("registro").value.trim();
  const senha = document.getElementById("senha").value.trim();

  if (validacaoCampoVazio(registro)) {
    mensagens_erro("O campo Registro não pode estar vazio.");
    validarFormulario = false;
  } else if (registro.length !== 7) {
    mensagens_erro("O campo Registro deve conter exatamente 7 caracteres.");
    validarFormulario = false;
  }

  if (validacaoCampoVazio(senha)) {
    mensagens_erro("O campo Senha não pode estar vazio.");
    validarFormulario = false;
  } else if (senha.length < 6) {
    mensagens_erro("A Senha deve conter no mínimo 6 caracteres.");
    validarFormulario = false;
  }

  if (validarFormulario) {
    formulario.submit();
  }
});
