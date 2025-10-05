<?php
$titlePage = 'Minhas Monitorias';
$nameCSS = "minhas_monitorias";

include_once 'header.php';
if ($_SESSION['status'] !== 'Monitor') {
    header('Location: inicial.php?mensagem=usuario_sem_permissao_acesso');
    exit;
}
require_once __DIR__ . '/../src/controllers/minhas_monitorias_backend.php';
?>

<main class="main-content">
    <div class="abas">
        <p>Filtrar:</p>
        <div class="form-espera">
            <button class="buttons">Em Espera</button>
        </div>
        <div class="form-concluido">
            <button class="buttons">Concluído</button>
        </div>

    </div>
    <div class="card-grid">
        <?php foreach ($lista_final as $monitoria => $dados): ?>
            <div class="card" data-id="<?php echo htmlspecialchars($dados['id']); ?>" data-status="<?php echo $dados['conclusao'] === 1 ? 'concluido' : 'espera'; ?>">
                <?php if ($dados['conclusao'] === 1): ?>
                    <div class="card-top-concluido" style="background-color: <?php echo htmlspecialchars($dados['cor_monitor']); ?>;">
                        <img src="../public/img/formsComponents/concluido.png" class="img-concluido">

                        <div class="options-icon-concluido" id="optionsIcon">⋮</div>

                        <div class="options-popup" id="optionsPopup">
                            <ul>
                                <li><a href="#" class="popup-option" data-action="ver-relatorio">Ver Relatorio</a></li>
                                <li><a href="#" class="popup-option" data-action="excluir" id="linkSair">Excluir</a></li>
                            </ul>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="card-top" style="background-color: <?php echo htmlspecialchars($dados['cor_monitor']); ?>;">
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
                <?php endif; ?>
                <div class="card-content">
                    <div class="info-line">
                        <p><b><?php echo htmlspecialchars($dados['nome']); ?></b></p>
                        <p><b>Sala:</b> <?php echo htmlspecialchars($dados['localizacao']); ?></p>
                    </div>
                    <div class="info-line">
                        <p><b><?php echo htmlspecialchars($dados['materia']); ?></b></p>
                        <p><b>Data:</b> <?php echo htmlspecialchars($dados['data']); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
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


<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<?php


$scripts = ["minhas_monitoriaJS/minhas_monitorias","minhas_monitoriaJS/minhas_monitoria_filtragem","minhas_monitoriaJS/minhas_monitorias_sucesso", "minhas_monitoriaJS/minhas_monitorias_erro"];
include_once 'footer.php';

?>