export const mensagens_erro = (mensagem) => {
    return Toastify({
        text: mensagem,
        duration: 3000,
        close: true,
        gravity: "top", 
        position: "center", 
        style:{ 
           background: "#ff0000",
           zIndex: 9999999,
        },
        stopOnFocus: true, // Prevents dismissing of toast on hover
    }).showToast();
}
