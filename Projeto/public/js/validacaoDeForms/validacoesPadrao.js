
export const validacaoEmail = (mensagem) => {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(!regex.test(mensagem)){
        return true;
    } else {
        return false;
    }
}

export const validacaoCampoVazio = (mensagem) => {
    if(mensagem.length === 0){

        return true;
    } else {
        return false;
    }
}