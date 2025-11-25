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

export const validacaoDeDia = (mensagem) => {
    const dataFormatada = new Date(mensagem + "T00:00:00");

    const diaDataFormatada = dataFormatada.getDate();
    const mesDataFormatada = dataFormatada.getMonth();

    const hoje = new Date();

    const dia = hoje.getDate();
    const mes = hoje.getMonth();

    if(diaDataFormatada <= dia && mes === mesDataFormatada){
        return true;
    } else {
        return false;
    }
}

export const validacaoDeMes = (mensagem) => {
    const dataFormatada = new Date(mensagem + "T00:00:00");

    const mesDataFormatada = dataFormatada.getMonth();
    const anoDataFormatada = dataFormatada.getFullYear();

    const hoje = new Date();

    const mes = hoje.getMonth();
    const ano = hoje.getFullYear();

    if(mesDataFormatada < mes && anoDataFormatada === ano){
        return true;
    }else{
        return false;
    }
}

export const validacaoDeAno = (mensagem) => {
    const dataFormatada = new Date(mensagem + "T00:00:00");

    const anoDataFormatada = dataFormatada.getFullYear();

    const hoje = new Date();

    const ano = hoje.getFullYear();

    if(anoDataFormatada != ano){
        return true;
    }else{
        return false;
    }
}

export const validarHorario = (horario) => {
    // Regex: dois dígitos, dois pontos, dois dígitos
    const regex = /^([01]\d|2[0-3]):([0-5]\d)$/;

    if (regex.test(horario)) {
        return false
    } else {
        return true;
    }
}

export const validarHorarioEntre13e17 = (horario) => {

    // Separa hora e minuto
    const [horaStr, minutoStr] = horario.split(":");
    const hora = parseInt(horaStr, 10);
    const minuto = parseInt(minutoStr, 10);4

    console.log(minuto);
    console.log(hora);

    // Valida intervalo entre 13:00 e 17:00 (inclusive)
    if (hora < 13 || hora > 17) return true;

    // Se hora = 17, minutos não podem passar de 00 (ou você define 17:59 se quiser)
    if (hora === 17 && minuto > 0) return true;

    return false;
}
