import { mensagens_erro } from '../validacaoDeForms/erros.js';
import { mensagensErroLogin } from '../validacaoDeForms/mensagensDeErro.js';

function getQueryParam(name) {
    const params = new URLSearchParams(window.location.search);
    return params.has(name) ? params.get(name) : null;
}

function showMessageFromQuery(paramName){
    const msg = getQueryParam(paramName);
    return msg;
}


const mensagem = showMessageFromQuery('mensagem');

console.log(mensagem);
console.log(mensagensErroLogin);

if(mensagensErroLogin.hasOwnProperty(mensagem)){
    mensagens_erro(mensagensErroLogin[mensagem]);
    console.log('a');
}