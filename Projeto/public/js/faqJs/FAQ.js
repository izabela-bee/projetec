document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.faq-cards-container').forEach(container => {
        container.style.maxHeight = '0';
        container.style.opacity = '0';
        container.dataset.closed = 'true';
    });

    document.querySelectorAll('.faq-secao').forEach(secao => {
        const header = secao.querySelector('.faq-header');
        const btn = secao.querySelector('.faq-toggle-btn');
        const container = secao.querySelector('.faq-cards-container');

        const toggleAccordion = () => {
            const isClosed = container.dataset.closed === 'true';
            container.style.maxHeight = isClosed ? '500px' : '0';
            container.style.opacity = isClosed ? '1' : '0';
            container.dataset.closed = (!isClosed).toString();
            btn.classList.toggle('rotate');
        };

        btn.addEventListener('click', toggleAccordion);
        header.addEventListener('click', toggleAccordion);
    });

    // Barra de pesquisa
    const searchInput = document.querySelector('.barra-pesquisa-input');
    searchInput.addEventListener('input', () => {
        const termo = searchInput.value.toLowerCase();
        document.querySelectorAll('.faq-card').forEach(card => {
            const pergunta = card.querySelector('.faq-card-header').textContent.toLowerCase();
            const resposta = card.querySelector('.faq-card-body').textContent.toLowerCase();
            if(pergunta.includes(termo) || resposta.includes(termo)){
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });

});
