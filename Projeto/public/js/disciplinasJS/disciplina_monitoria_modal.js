document.addEventListener("DOMContentLoaded", function() {
    // Seleciona todos os containers de cards
    const cards = document.querySelectorAll(".card-monitoria");

    cards.forEach(card => {
        card.addEventListener("click", () => {
            // Pega o ID do data-id
            const id = card.getAttribute("data-id");

            // Redireciona para a nova página com o ID na URL
            window.location.href = `modal.php?id=${id}`;
        });
    });
});
