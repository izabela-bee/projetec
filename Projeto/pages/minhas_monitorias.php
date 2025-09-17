<?php
$titlePage = 'Minhas Monitorias';
$nameCSS = "minhas_monitorias";

include_once 'header.php';
?>

<main class="main-content">
    <div class="abas">
        <p>Filtrar:</p>
        <form class="form-espera" action="monitoria_em_espera.php">
            <button class="buttons">Em Espera</button>
        </form>
        <form class="form-concluido" action="monitoria_concluido.php">
            <button class="buttons">Concluído</button>
        </form>
        
    </div>
    <div class="card-grid">
        <!-- Cards repetidos -->
        <div class="card">
                <div class="card-top">
                    <button class="edit-icon" id="iconeEdicao">
                        <img src="../public/img/formsComponents/icone-edicao.jpeg" alt="Ícone de Edição" class="edit-image">
                    </button>
                    <div class="options-icon" id="optionsIcon">⋮</div>

                    <div class="options-popup" id="optionsPopup">
                        <ul>
                            <li><a href="#" class="popup-option" data-action="editar">Editar</a></li>
                            <li><a href="#" class="popup-option" data-action="excluir" id="linkSair">Excluir</a></li>
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
            <div class="card">
                <div class="card-top-concluido">
                    

                    <img src="../public/img/formsComponents/concluido.png" class="img-concluido">

                    <div class="options-icon-concluido" id="optionsIcon">⋮</div>

                    <div class="options-popup" id="optionsPopup">
                        <ul>
                            <li><a href="#" class="popup-option" data-action="editar">Editar</a></li>
                            <li><a href="#" class="popup-option" data-action="excluir" id="linkSair">Excluir</a></li>
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
    <button class="botao-adicionar" id="botaoAdicionar">
        +
    </button>
    <div class="modal-overlay-sair" id="confirmModal-sair">
        <div class="modal-box-sair">
            <h3>Deseja realmente excluir as informações da monitoria selecionada?</h3>
            <button class="btn-confirmar-sair" id="btnSim-sair">Confirmar</button>
            <button class="btn-cancelar-sair" id="btnNao-sair">Cancelar</button>
        </div>
    </div>


<?php


$scripts = ["minhas_monitoriaJS/minhas_monitorias", "minhas_monitoriaJS/minhas_monitorias_excluir"];
include_once 'footer.php';

?>
