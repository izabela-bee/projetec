<?php
$titlePage = 'Minhas Monitorias Inscritas';
$nameCSS = "minhas_monitorias_inscritas";

include_once 'header.php';
?>

<main class="main-content">
    <div class="abas">
        <div class="aba-espera">
            Em Espera
        </div>
        <div class="aba-concluido">
            Concluída
        </div>
        
    </div>
    <div class="card-grid">
        <!-- Cards repetidos -->
        <div class="card">
                <div class="card-top">
                    <div class="options-icon" id="optionsIcon">⋮</div>

                    <div class="options-popup" id="optionsPopup">
                        <ul>
                            <li><a href="#" class="popup-option" data-action="editar">Visualizar</a></li>
                            <li><a href="#" class="popup-option" data-action="excluir" id="linkSair">Desinscrever</a></li>
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
            </div>

        <!-- Repita mais cards conforme necessário -->
    </div>
</main>
</main>
    <button class="botao-adicionar" id="botaoAdicionar" id="editar">
        +
    </button>
    <div class="modal-overlay-sair" id="confirmModal-sair">
        <div class="modal-box-sair">
            <h3>Deseja realmente desinscrever da monitoria selecionada?</h3>
            <button class="btn-confirmar-sair" id="btnSim-sair">Confirmar</button>
            <button class="btn-cancelar-sair" id="btnNao-sair">Cancelar</button>
        </div>
    </div>


<?php


$scripts = ["minhas_monitorias_inscritasJS/minhas_monitorias_inscritas"];
include_once 'footer.php';

?>
