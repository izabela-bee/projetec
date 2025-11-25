import { mensagens_sucesso } from '../validacaoDeForms/sucessos.js';
import { showMessageFromQuery } from '../validacaoDeForms/pegarQuerysGet.js';
import { mensagensSucesso } from '../validacaoDeForms/mensagensDeSucesso.js';

const mensagem = showMessageFromQuery("mensagem");

if(mensagensSucesso.hasOwnProperty(mensagem)){
    mensagens_sucesso(mensagensSucesso[mensagem]);
}
