
import { mensagens_sucesso } from '../validacaoDeForms/sucessos.js';
import { mensagens_erro } from '../validacaoDeForms/erros.js';
import { validacaoCampoVazio, validacaoEmail } from '../validacaoDeForms/validacoesPadrao.js';

window.onload = function () {
    const formulario = document.querySelector('[data-form]');
    formulario.addEventListener("submit", function (event) {
        event.preventDefault();
        
        document.querySelectorAll(".toastify").forEach(el => el.remove());

        let validarFormulario = true;
        
        const registro = document.getElementById("registro").value.trim();
        const email = document.getElementById("email").value.trim();
        const senha = document.getElementById("senha").value.trim();
        const senhaConfirm = document.getElementById("senha-confirm").value.trim();

        
        if(validacaoCampoVazio(registro)){
            mensagens_erro("O campo Registro não pode estar vazio.");
            validarFormulario = false;
        } else if(registro.length !== 7){
            mensagens_erro("O campo Registro deve conter exatamente 7 caracteres.");
            validarFormulario = false;
        }

        if(validacaoCampoVazio(email)){
            mensagens_erro("O campo Email não pode estar vazio.");
            validarFormulario = false;
        } else if(validacaoEmail(email)){
            mensagens_erro("O Email informado é inválido.");
            validarFormulario = false;
        }

        if(validacaoCampoVazio(senha)){
            mensagens_erro("O campo Senha não pode estar vazio.");
            validarFormulario = false;
        } else if(senha.length < 6){
            mensagens_erro("A Senha deve conter no mínimo 6 caracteres.");
            validarFormulario = false;
        }

        if(validacaoCampoVazio(senhaConfirm)){
            mensagens_erro("O campo Confirmar Senha não pode estar vazio.");
            validarFormulario = false;
        } else if(senhaConfirm.length < 6){
            mensagens_erro("A Confirmação de Senha deve conter no mínimo 6 caracteres.");
            validarFormulario = false;
        }

        if(senha !== senhaConfirm){
            mensagens_erro("As senhas devem ser idênticas.");
            validarFormulario = false;
        }

        // const erroSenha = document.getElementById("erro-senha");

        // erroSenha.textContent = "";

        // if (registro !== "" && email !== "" && senha !== "" && senhaConfirm !== "") {
        //     if (senha === senhaConfirm) {
        //         window.location.href = "inicial.php";
        //     } else {
        //         erroSenha.textContent = "As senhas devem ser idênticas";
        //     }
        // } else {
        //     erroSenha.textContent = "Por favor, preencha todos os campos.";
        // }

        if (validarFormulario){
            formulario.submit();
            mensagens_sucesso("Registro realizado com sucesso!");
        }
    });
};
