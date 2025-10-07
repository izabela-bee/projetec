<?php
$titlePage = 'Minhas Monitorias Inscritas';
$nameCSS = "minhas_monitorias_inscritas";

include_once 'header.php';
require_once __DIR__ . '/../src/controllers/minhas_monitorias_inscritas_backend.php';

?>

<main class="main-content">
    <div class="card-grid">
        <?php foreach($lista_final as $monitoria => $dados): ?>
            <?php if($dados['concluida'] === 0): ?>
                <div class="card" data-id="<?php echo htmlspecialchars($dados['id']); ?>">
                        <div class="card-top" style="background-color: <?php echo htmlspecialchars($dados['cor']); ?>;">
                            <div class="options-icon" id="optionsIcon">⋮</div>

                            <div class="options-popup" id="optionsPopup">
                                <ul>
                                    <li><a href="#" class="popup-option" data-action="visualizar">Visualizar</a></li>
                                    <li><a href="#" class="popup-option" data-action="desinscrever" id="linkSair">Desinscrever</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="info-line">
                                <p><b><?php echo htmlspecialchars($dados['nome']); ?></b></p>
                                <p><b>Sala:</b> <?php echo htmlspecialchars($dados['sala']); ?></p>
                            </div>
                            <div class="info-line">
                                <p><b><?php echo htmlspecialchars($dados['disciplina']); ?></b></p>
                                <p><b>Data:</b><?php  echo htmlspecialchars($dados['data']); ?></p>
                            </div>
                        </div>
                    </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<?php


$scripts = ["minhas_monitorias_inscritasJS/minhas_monitorias_inscritas", 'minhas_monitorias_inscritasJS/inscritasMensagensSucesso', 'minhas_monitorias_inscritasJS/inscritasMensagensErro'];
include_once 'footer.php';

?>
