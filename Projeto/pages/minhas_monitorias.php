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


<?php

$scripts = ["minhas_monitoriasJS/minhas_monitorias"];
include_once 'footer.php';

?>