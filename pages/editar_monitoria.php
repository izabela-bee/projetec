<?php
$titlePage = 'Editando/Criando Monitoria';
$nameCSS = "editar_monitoria";

include_once 'header.php';
require_once __DIR__ . '/../src/controllers/layout_editar_monitoria_backend.php';

if ($_SESSION['status'] !== 'Monitor') {
    header('Location: inicial.php?mensagem=usuario_sem_permissao_acesso');
    exit;
}
$pagina_necessaria = '';

if (isset($_GET['id'])) {
    $pagina_necessaria = 'Editar';
} else {
    $pagina_necessaria = 'Criar';
}

require_once __DIR__ . '/../src/controllers/editar_monitoria_dados.php';

?>

<main class="card-grid">
    <a href="minhas_monitorias.php" class="Sair-monitoria" id="linkSair">
        X
    </a>
    <?php if ($pagina_necessaria === 'Criar'): ?>
        <form class="container-formulario" id="form-monitoria" method="POST" action="../src/controllers/criar_monitoria_backend.php">
            <div class="cabecalho-formulario" style="background-color: <?php echo htmlspecialchars($cor); ?>;">
                <div class="cabecalho-formulario-nome cabecalho-destaque"><?php echo htmlspecialchars($nome); ?></div>
                <div class="cabecalho-formulario-disciplina cabecalho-destaque  "><?php echo htmlspecialchars($materia_monitor); ?></div>
                <div class="cabecalho-formulario-info cabecalho-destaque"><?php echo htmlspecialchars($curso); ?></div>
            </div>
            <div class="corpo-formulario">
                <div class="corpo1">
                    <div class="linha-formulario">
                        <label for="inputData">Data:</label>
                        <input type="date" name="data" id="inputData" placeholder="dd/mm/aaaa">
                    </div>
                    <div class="linha-formulario">
                        <label for="inputSala">Sala:</label>
                        <input type="text" name="sala" id="inputSala" placeholder="302">
                    </div>
                    <div class="linha-formulario">
                        <label for="inputHorario">Horário:</label>
                        <input type="text" name="horario" id="inputHorario" placeholder="00:00">
                    </div>
                </div>
                <div class="corpo2">
                    <div class="linha-formulario largura-total">
                        <label for="inputData" class="texto_materia">Matéria:</label>
                        <textarea id="areaTextoMateriais" name="materia"
                            placeholder="Adicionar materiais: arquivo.pdf, link.slide, apostila"></textarea>
                    </div>
                </div>
            </div>
            <div class="rodape-formulario">
                <button class="botao-enviar" id="botaoConfirmarEdicao" type="submit">✔</button>
            </div>
        </form>

    <?php else: ?>
        <form class="container-formulario" id="form-monitoria" method="POST" action="../src/controllers/editar_monitoria_backend.php?id=<?php echo htmlspecialchars($id_monitoria); ?>">
            <div class="cabecalho-formulario" style="background-color: <?php echo htmlspecialchars($cor); ?>;">
                <div class="cabecalho-formulario-nome cabecalho-destaque"><?php echo htmlspecialchars($nome); ?></div>
                <div class="cabecalho-formulario-disciplina cabecalho-destaque  "><?php echo htmlspecialchars($materia_monitor); ?></div>
                <div class="cabecalho-formulario-info cabecalho-destaque"><?php echo htmlspecialchars($curso); ?></div>
            </div>
            <div class="corpo-formulario">
                <div class="corpo1">
                    <div class="linha-formulario">
                        <label for="inputData">Data:</label>
                        <input type="date" name="data" id="inputData" placeholder="dd/mm/aaaa" value="<?php echo htmlspecialchars($data); ?>">
                    </div>
                    <div class="linha-formulario">
                        <label for="inputSala">Sala:</label>
                        <input type="text" name="sala" id="inputSala" placeholder="302" value="<?php echo htmlspecialchars($sala); ?>">
                    </div>
                    <div class="linha-formulario">
                        <label for="inputHorario">Horário:</label>
                        <input type="text" name="horario" id="inputHorario" placeholder="00:00" value="<?php echo htmlspecialchars($horario_formatado); ?>">
                    </div>
                </div>
                <div class="corpo2">
                    <div class="linha-formulario largura-total">
                        <label for="inputData" class="texto_materia">Matéria:</label>
                        <textarea id="areaTextoMateriais" name="materia"
                            placeholder="Adicionar materiais: arquivo.pdf, link.slide, apostila"> <?php echo htmlspecialchars($conteudos); ?></textarea>
                    </div>
                </div>
            </div>
            <div class="rodape-formulario">
                <button class="botao-enviar" id="botaoConfirmarEdicao" type="submit">✔</button>
            </div>
        </form>

    <?php endif; ?>

    <div class="modal-overlay" id="confirmModal">
        <div class="modal-box">
            <h3>Deseja realmente aplicar as mudanças feitas na monitoria?</h3>
            <button class="btn-confirmar" id="btnSim">Confirmar</button>
            <button class="btn-cancelar" id="btnNao">Cancelar</button>
        </div>
    </div>

    <div class="modal-overlay-sair" id="confirmModal-sair">
        <div class="modal-box-sair">
            <h3>Deseja realmente cancelar as informações editadas da monitoria?</h3>
            <button class="btn-confirmar-sair" id="btnSim-sair">Confirmar</button>
            <button class="btn-cancelar-sair" id="btnNao-sair">Cancelar</button>
        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<?php
$scripts = ["editar_monitoriaJs/editar_monitoria"];
include_once 'footer.php';
?>