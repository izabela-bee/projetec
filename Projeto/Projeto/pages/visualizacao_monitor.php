<?php
$titlePage = 'Visualizar Monitor';
$nameCSS = "visualizar_monitor";

include_once 'header.php'; 
require_once __DIR__ . '/../src/controllers/visualizacao_monitor_backend.php';
?>

<main class="card-grid">


    <div class="container-formulario" id="form-monitoria">
        <div class="cabecalho-formulario" style="background-color: <?= htmlspecialchars($cor_monitor); ?>;">
            <div class="cabecalho-formulario-nome cabecalho-destaque"><?= htmlspecialchars($nome_monitor); ?></div>
            <div class="cabecalho-formulario-disciplina cabecalho-destaque"><?= htmlspecialchars($disciplina_monitor); ?></div>
            <div class="cabecalho-formulario-info cabecalho-destaque"><?= htmlspecialchars($curso_monitor); ?></div>
            <div class="cabecalho-formulario-imagem" style="background-image: url('<?= htmlspecialchars($foto_monitor); ?>');"></div>
        </div>
        <div class="corpo-formulario">
            <div class="corpo1">
                <div class="linha-formulario">
                    <label for="inputData">Sala:</label>
                    <input type="text" id="inputData" value="302" disabled value="<?= htmlspecialchars($sala_monitor); ?>">
                </div>
                <div class="linha-formulario">
                    <label for="inputSala">Email:</label>
                    <input type="text" id="inputSala" value="123@gmail.com" disabled value="<?= htmlspecialchars($email_monitor); ?>">
                </div>
                <div class="linha-formulario">
                    <label for="inputHorario">Número de Monitorias Atuais:</label>
                    <input type="text" id="inputHorario" disabled value="<?= htmlspecialchars($numero_monitorias); ?>">
                </div>
                <div class="linha-formulario">
                    <label for="inputHorario">Avaliação:</label>
                    <input type="text" id="inputHorario" value="2/5" disabled>
                </div>
            </div>

        </div>

        
    </div>

    <div class="monitorias-monitor">
        <h1 class="monitorias-monitor-titulo">Monitorias Disponíveis: </h1>
        <div class="cards-container" id="cards-filosofia" data-closed="true">
            <?php foreach($lista_monitorias as $monitoria => $dados): ?>
            <?php if($dados['concluida'] === 'nao'): ?>
            <article class="card-monitoria matematica-card" data-id="<?= htmlspecialchars($dados['id']); ?>">
                <header class="card-cabecalho" style="background-color: <?= htmlspecialchars($dados['cor']); ?>;">
                    <span class="monitor-nome"><?= htmlspecialchars($dados['nome']); ?></span>
                    <div class="monitoria-info">
                        <span class="monitoria-horario"><?= htmlspecialchars($dados['horario']) ?></span> - <span class="monitoria-data"><?= htmlspecialchars($dados['data']); ?></span>
                    </div>
                </header>
                <div class="card-conteudo">
                    <ul class="monitoria-observacoes">
                        <?php foreach($dados['conteudos'] as $conteudo): ?>
                            <li><?= htmlspecialchars($conteudo); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <footer class="card-rodape">
                    <span class="monitoria-sala"><?= htmlspecialchars($dados['curso']) ?></span>
                </footer>
            </article>
            <?php endif; ?>
        <?php endforeach; ?>
        </div>
    </div>

    <a href="javascript:history.back()" class="botao-sair-monitoria" id="Sair">
            Voltar
    </a>
</main>

<?php
$scripts = [];
include_once 'footer.php';
?>