const optionsIcon = document.getElementById('optionsIcon');
const optionsPopup = document.getElementById('optionsPopup');

optionsIcon.addEventListener('click', (event) => {
    event.stopPropagation();
    optionsPopup.classList.toggle('visible');
});

document.addEventListener('click', (event) => {
    if (optionsPopup.classList.contains('visible') && !optionsPopup.contains(event.target)) {
        optionsPopup.classList.remove('visible');
    }
});

optionsPopup.addEventListener('click', (event) => {
    const clickedElement = event.target;

    if (clickedElement.classList.contains('popup-option')) {
        const action = clickedElement.dataset.action;

        if (action === 'editar') {
            window.location.href = 'editar_monitoria.php';
        } else if (action === 'duplicar') {
        }

        optionsPopup.classList.remove('visible');
    }
});
