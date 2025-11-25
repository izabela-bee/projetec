import { mensagens_erro } from '../validacaoDeForms/erros.js';
import { validacaoCampoVazio, validacaoEmail } from '../validacaoDeForms/validacoesPadrao.js';

window.onload = function () {
    const formulario = document.querySelector('[data-form]');
    formulario.addEventListener("submit", function (event) {
        event.preventDefault();
        
        document.querySelectorAll(".toastify").forEach(el => el.remove());

        let validarFormulario = true;
        
        const email = document.getElementById("email").value.trim();
        const senha = document.getElementById("senha").value.trim();
        const telefone = document.getElementById("telefone").value.trim();
        
        if(validacaoCampoVazio(email)){
            mensagens_erro("O campo Registro não pode estar vazio.");
            validarFormulario = false;
        } else if(validacaoEmail(email)){
            mensagens_erro("O campo email deve estar preenchido corretamente: user@email.com");
            validarFormulario = false;
        }

        if(senha.length < 6 && senha.length > 0){
            mensagens_erro('O campo de senha deve ter pelo menos 6 caracteres.');
            validarFormulario = false;
        }

        if(telefone.length === 0){
            mensagens_erro('O campo de telefone deve estar preenchido');
            validarFormulario = false;
        } else if (telefone.length !== 10){
            mensagens_erro('O campo de telefone deve estar no formato: 3199991111');
            validarFormulario = false;
        }


        if (validarFormulario){
            formulario.submit();
        }
    });
    
};
