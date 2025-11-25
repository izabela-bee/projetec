export const mensagens_sucesso = (mensagem) => {
    return Toastify({
        text: mensagem,
        duration: 3000,
        close: true,
        gravity: "top", 
        position: "center", 
        style:{ 
           background: "#228b22",
        },
        stopOnFocus: true, // Prevents dismissing of toast on hover
    }).showToast();
}
