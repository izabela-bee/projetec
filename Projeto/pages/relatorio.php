<?php
$titlePage = 'Relatorio das Monitorias';
$nameCSS = "relatorio";

include_once 'header.php';
if($_SESSION['status'] !== 'Monitor'){
    header('Location: inicial.php?mensagem=usuario_sem_permissao_acesso');
    exit;
}
?>

<main class="card-grid">
    <div class="container-formulario" id="form-monitoria">
        <div class="cabecalho-formulario">
            <div class="cabecalho-formulario-nome cabecalho-destaque">Ricardo Dias</div>
            <div class="cabecalho-formulario-disciplina cabecalho-destaque  ">Matemática</div>
            <div class="cabecalho-formulario-info cabecalho-destaque">INFO 2</div>
        </div>
        <div class="corpo-formulario">
            <div class="linha-formulario">
                <label for="inputData">Data:</label>
                <input type="text" id="inputData" placeholder="dd/mm/aaaa">
            </div>
            <div class="linha-formulario">
                <label for="inputSala">Sala:</label>
                <input type="text" id="inputSala" placeholder="302">
            </div>
            <div class="linha-formulario">
                <label for="inputHorario">Horário:</label>
                <input type="text" id="inputHorario" placeholder="00:00">
            </div>
            <div class="linha-formulario largura-total">
                <label for="inputHorario">Matérias:</label>
                <textarea id="areaTextoMateriais"
                    placeholder="Adicionar matérias que serão lecionadas"></textarea>
            </div>
        </div>
</div>
    <div class="container-lateral">
        <h3 class="container-lateral-titulo">Alunos inscritos:</h3>
        <div class="box-lateral">
            <table class="tabela-alunos">
                <tr>
                    <td>0078346</td>
                    <td>Gabriel Luís B. S.</td>
                    <td>INFO-3</td>
                    <td><input type="checkbox"></td>
                </tr>
                <tr>
                    <td>0023451</td>
                    <td>Juliana Fernandes</td>
                    <td>ADM-3</td>
                    <td><input type="checkbox"></td>
                </tr>
                <tr>
                    <td>0023451</td>
                    <td>Juliana Fernandes</td>
                    <td>ELET-3</td>
                    <td><input type="checkbox"></td>
                </tr>
                <tr>
                    <td>0078346</td>
                    <td>Gabriel Luís B. S.</td>
                    <td>INFO-3</td>
                    <td><input type="checkbox"></td>
                </tr>
                <tr>
                    <td>0023451</td>
                    <td>Juliana Fernandes</td>
                    <td>ADM-3</td>
                    <td><input type="checkbox"></td>
                </tr>
                <tr>
                    <td>0023451</td>
                    <td>Juliana Fernandes</td>
                    <td>ELET-3</td>
                    <td><input type="checkbox"></td>
                </tr>
            </table>
        </div>
        <h3 class="container-lateral-titulo">Feedback da monitoria:</h3>
        <textarea id="areaTextoFeedback" placeholder="Digite o feedback da monitoria"></textarea>

        <button class="btn-salvar">Salvar</button>
    </div>
</main>

<?php
include_once 'footer.php';
?>
