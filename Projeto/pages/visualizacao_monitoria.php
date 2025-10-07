<?php
$titlePage = 'Visualizar Monitoria';
$nameCSS = "visualizacao_monitoria";

include_once 'header.php';
require_once __DIR__ . '/../src/controllers/visualizar_monitoria_backend.php';
?>

<main class="card-grid">


    <form class="container-formulario" id="form-monitoria" method="POST" action="../src/controllers/desinscrever_monitoria_inscrita.php">
        <div class="cabecalho-formulario" style="background-color: <?= htmlspecialchars($cor_monitor); ?>;">
            <div class="cabecalho-formulario-nome cabecalho-destaque"><?= htmlspecialchars($nome_monitor);  ?></div>
            <div class="cabecalho-formulario-disciplina cabecalho-destaque  "><?= htmlspecialchars($materia_selecionada_monitoria); ?></div>
            <div class="cabecalho-formulario-info cabecalho-destaque"><?= htmlspecialchars($curso_monitor); ?></div>
            <div class="cabecalho-formulario-imagem" style="background-image: url('<?= htmlspecialchars($foto_monitor); ?>');"></div>
        </div>
        <div class="corpo-formulario">
            <div class="corpo1">
                <div class="linha-formulario">
                    <label for="inputData">Data:</label>
                    <input type="text" id="inputData" placeholder="dd/mm/aaaa" disabled value="<?= htmlspecialchars($data_formatada); ?>">
                </div>
                <div class="linha-formulario">
                    <label for="inputSala">Sala:</label>
                    <input type="text" id="inputSala" placeholder="302" disabled value="<?=  htmlspecialchars($sala_monitoria); ?>">
                </div>
                <div class="linha-formulario">
                    <label for="inputHorario">Horário:</label>
                    <input type="text" id="inputHorario" placeholder="00:00" disabled value="<?= htmlspecialchars($horario_formatado); ?>">
                </div>
            </div>
            <div class = "corpo2">
                <div class="linha-formulario largura-total">
                    <label for="inputData" class ="texto_materia">Matéria:</label>
                    <textarea id="areaTextoMateriais"
                        placeholder="Adicionar materiais: arquivo.pdf, link.slide, apostila" disabled><?= htmlspecialchars($materia_monitoria); ?></textarea >
                </div>
            </div>
        </div>
        <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id']); ?>" hidden>
        <button type="submit" class="botao-desencricao-monitoria" id="Desinscrever">
            Desinscrever
        </button>
        <a href="minhas_monitorias_inscritas.php?mensagem=inscricao_mantida" class="botao-sair-monitoria" id="Sair">
            Sair
        </a>
    </form>
    


</main>

<?php
$scripts = [];
include_once 'footer.php';
?>
