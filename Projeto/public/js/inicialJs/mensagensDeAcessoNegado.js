import { mensagens_sucesso } from '../validacaoDeForms/sucessos.js';
import { mensagens_erro } from '../validacaoDeForms/erros.js';
import { mensagensErroLogin } from '../validacaoDeForms/mensagensDeErro.js';
import { showMessageFromQuery } from '../validacaoDeForms/pegarQuerysGet.js';

const mensagem = showMessageFromQuery('mensagem');

if(mensagensErroLogin.hasOwnProperty(mensagem)){
    mensagens_erro(mensagensErroLogin[mensagem]);

    console.log(mensagensErroLogin[mensagem]);
}
