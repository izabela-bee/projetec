<?php

$nameCSS = "disciplina";
$titlePage = "Página de Disciplinas";

include_once "header.php";
require_once __DIR__ . '/../src/controllers/disciplinas_monitorias_backend.php';
?>

<main>
        <div class="main-barra-de-pesquisa secao-pesquisa">
            <input type="search" class="barra-pesquisa-input" placeholder="Pesquisar">
        </div>
        <div class="disciplina">
            <?php foreach($disciplinas as $disciplina): ?>
                <section class="disciplina-secao">
                    <div class="disciplina-header">
                        <h2 class="disciplina-titulo"><?php echo htmlspecialchars($disciplina); ?></h2>
                        <button class="toggle-btn" type="button">▼</button>
                    </div>
                    <?php foreach($monitorias as $monitoria => $dados): ?>
                        <?php if($monitoria === $disciplina): ?>
                            <div class="cards-container" id="cards-filosofia" data-closed="true" data-id="<?php echo htmlspecialchars($dados['id']); ?>">
                                <article class="card-monitoria matematica-card">
                                    <header class="card-cabecalho" style="background-color: <?php echo htmlspecialchars($dados['cor']); ?>;">
                                        <span class="monitor-nome"><?php echo htmlspecialchars($dados['nome']); ?></span>
                                        <div class="monitoria-info">
                                            <span class="monitoria-horario"><?php echo htmlspecialchars($dados['horario']); ?></span> - <span class="monitoria-data"><?php echo htmlspecialchars($dados['data']); ?></span>
                                        </div>
                                    </header>
                                    <div class="card-conteudo">
                                        <ul class="monitoria-observacoes">
                                            <?php foreach($dados['conteudos'] as $conteudo): ?>
                                                <li><?php echo htmlspecialchars($conteudo); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <footer class="card-rodape">
                                        <span class="monitoria-sala"><?php echo htmlspecialchars($dados['curso']); ?></span>
                                    </footer>
                                </article>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </section>
            <?php endforeach; ?>
        </div>
    </main>
    <div id="resultado"></div>

<?php
    $scripts = ['disciplinasJS/disciplina', 'disciplinasJS/disciplina_pesquisa', 'disciplinasJS/disciplina_monitoria_modal'];
    include_once "footer.php";

?>
