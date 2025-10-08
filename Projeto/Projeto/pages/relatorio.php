<?php
$titlePage = 'Relatorio das Monitorias';
$nameCSS = "relatorio";

include_once 'header.php';
if($_SESSION['status'] !== 'Monitor'){
    header('Location: inicial.php?mensagem=usuario_sem_permissao_acesso');
    exit;
}

require_once __DIR__ . '/../src/controllers/layout_relatorio_monitoria_backend.php';
require_once __DIR__ . '/../src/controllers/relatorio_monitor_dados.php';
?>

<main class="card-grid">
    <div class="container-formulario" id="form-monitoria">
        <div class="cabecalho-formulario" style="background-color: <?php echo htmlspecialchars($cor_escolhida); ?>;">
            <div class="cabecalho-formulario-nome cabecalho-destaque"><?php echo htmlspecialchars($nome); ?></div>
            <div class="cabecalho-formulario-disciplina cabecalho-destaque  "><?php echo htmlspecialchars($materia_monitor); ?></div>
            <div class="cabecalho-formulario-info cabecalho-destaque"><?php echo htmlspecialchars($curso); ?></div>
        </div>
        <div class="corpo-formulario">
            <div class="linha-formulario">
                <label for="inputData">Data:</label>
                <input type="date" id="inputData" placeholder="dd/mm/aaaa" value="<?php echo htmlspecialchars($data); ?>" disabled>
            </div>
            <div class="linha-formulario">
                <label for="inputSala">Sala:</label>
                <input type="text" id="inputSala" placeholder="302" value="<?php echo htmlspecialchars($sala); ?>" disabled>
            </div>
            <div class="linha-formulario">
                <label for="inputHorario">Horário:</label>
                <input type="text" id="inputHorario" placeholder="00:00" value="<?php echo htmlspecialchars($horario_formatado); ?>" disabled>
            </div>
            <div class="linha-formulario largura-total">
                <label for="inputHorario">Matérias:</label>
                <textarea id="areaTextoMateriais"
                    placeholder="Adicionar matérias que serão lecionadas" disabled><?php echo htmlspecialchars($conteudos); ?></textarea>
            </div>
        </div>
</div>
    <form class="container-lateral" action="../src//controllers/salvar_relatorio_backend.php?id=<?php echo htmlspecialchars($id_monitoria); ?>" method="POST">
        <h3 class="container-lateral-titulo">Alunos inscritos:</h3>
        <div class="box-lateral">
            <table class="tabela-alunos">
                <?php foreach($lista_usuarios as $usuario => $dados): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($dados['registro_academico']); ?></td>
                        <td><?php echo htmlspecialchars($dados['nome']); ?></td>
                        <td><?php echo htmlspecialchars($dados['curso']); ?></td>
                        <input type="hidden" name="presenca[<?php echo $dados['registro_academico']; ?>]" value="0">
                        <td><input type="checkbox" name="presenca[<?php echo $dados['registro_academico']; ?>]" value="1" <?php echo $dados['presenca'] === 0 ? '' : 'checked'; ?>></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <h3 class="container-lateral-titulo">Feedback da monitoria:</h3>
        <textarea id="areaTextoFeedback" name="feedback_monitoria" placeholder="Digite o feedback da monitoria"><?php echo htmlspecialchars($feedback); ?></textarea>

        <button class="btn-salvar" type="submit">Salvar</button>
    </form>
</main>

<?php
include_once 'footer.php';
?>
