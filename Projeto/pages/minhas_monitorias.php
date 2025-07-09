<?php
$titlePage = 'Minhas Monitorias';
$nameCSS = "minhas_monitorias";

include_once 'header.php';
?>

<main class="main-content">
    <div class="card-grid">
        <!-- Cards repetidos -->
        <div class="card">
                <div class="card-top">
                    <button class="edit-icon" id="iconeEdicao">
                        <img src="assets/editar.png" alt="Ícone de Edição" class="edit-image">
                    </button>
                    <div class="options-icon" id="optionsIcon">⋮</div>

                    <div class="options-popup" id="optionsPopup">
                        <ul>
                            <li><a href="#" class="popup-option" data-action="editar">Editar</a></li>
                            <li><a href="#" class="popup-option" data-action="duplicar">Duplicar</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="info-line">
                        <p><b>Ricardo Dias</b></p>
                        <p><b>Sala:</b> 302</p>
                    </div>
                    <div class="info-line">
                        <p><b>Matemática 2</b></p>
                        <p><b>Data:</b> 17/04</p>
                    </div>
                </div>
                <div class="card-content">
                    <div class="info-line">
                        <p><b>Ricardo Dias</b></p>
                        <p><b>Sala:</b> 302</p>
                    </div>
                    <div class="info-line">
                        <p><b>Matemática 2</b></p>
                        <p><b>Data:</b> 17/04</p>
                    </div>
                </div>
            </div>

        <!-- Repita mais cards conforme necessário -->
    </div>
</main>
<button class="botao-adicionar" id="botaoAdicionar" id="editar">
        +
</button>
<script src="menu.js"></script>
<script>

    document.getElementById('botaoAdicionar').addEventListener('click', () => {
        window.location.href = 'editar_monitoria.php';
    });
    document.getElementById('iconeEdicao').addEventListener('click', () => {
        window.location.href = 'editar_monitoria.php';
    });

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
</script>

<?php

$scripts = [];
include_once 'footer.php';

?>