document.getElementById('botaoAdicionar').addEventListener('click', () => {
    window.location.href = 'editar_monitoria.php';
});

const cards = document.querySelectorAll('.card');

cards.forEach(card => {
    const cardId = card.dataset.id;
    const editIcon = card.querySelector('.edit-icon');
    const optionsIcon = card.querySelector('.options-icon, .options-icon-concluido');
    const optionsPopup = card.querySelector('.options-popup');

    if (editIcon) {
        editIcon.addEventListener('click', () => {
            window.location.href = `editar_monitoria.php?id=${cardId}`;
        });
    }

    if (!optionsIcon || !optionsPopup) return;

    optionsIcon.addEventListener('click', event => {
        event.stopPropagation();

        document.querySelectorAll('.options-popup.visible').forEach(p => {
            if (p !== optionsPopup) p.classList.remove('visible');
        });

        optionsPopup.classList.toggle('visible');
    });

    document.addEventListener('click', event => {
        if (optionsPopup.classList.contains('visible') && !optionsPopup.contains(event.target)) {
            optionsPopup.classList.remove('visible');
        }
    });

    // Ações dentro do popup
    optionsPopup.addEventListener('click', event => {
        const clickedElement = event.target;
        if (!clickedElement.classList.contains('popup-option')) return;

        const action = clickedElement.dataset.action;

        if (action === 'editar') {
            window.location.href = `editar_monitoria.php?id=${cardId}`;
        } 
        else if (action === 'excluir') {
            window.location.href = `../src/controllers/excluir_monitoria.php?id=${cardId}`;
        } else if(action === 'ver-relatorio'){
            window.location.href = `relatorio.php?id=${cardId}`;
        }

        optionsPopup.classList.remove('visible');
    });
});
