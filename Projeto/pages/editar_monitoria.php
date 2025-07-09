<?php
$titlePage = 'Editando/Criando Monitoria';
$nameCSS = "editar_monitoria";

include_once 'header.php';
?>

<main class="card-grid">
    <form class="container-formulario" id="form-monitoria" method="POST" action="#">
        <div class="cabecalho-formulario">
            <div class="cabecalho-formulario-nome">Ricardo Dias</div>
            <div class="cabecalho-formulario-disciplina">Matemática</div>
            <div class="cabecalho-formulario-info">INFO 2</div>
        </div>
        <div class="corpo-formulario">
            <div class="linha-formulario">
                <label for="inputData">Data:</label>
                <input type="text" id="inputData" placeholder="dd/mm/aaaa">
            </div>
            <div class="linha-formulario">
                <label for="inputSala">Sala:</label>
                <input type="text" id="inputSala" value="302">
            </div>
            <div class="linha-formulario">
                <label for="inputHorario">Horário:</label>
                <input type="text" id="inputHorario" value="19:30">
            </div>
            <div class="linha-formulario">
                <label for="inputMaterias">Conteúdos:</label>
                <input type="text" id="inputMaterias" value="Geometria">
            </div>
            <div class="linha-formulario largura-total">
                <textarea id="areaTextoMateriais"
                    placeholder="Adicionar materiais: arquivo.pdf, link.slide, apostila"></textarea>
            </div>
        </div>
        <div class="rodape-formulario">
            <button class="botao-enviar" id="botaoConfirmarEdicao">✔️</button>
        </div>
    </form>

</main>
<script>
    document.getElementById('botaoConfirmarEdicao').addEventListener('click', () => {
        window.location.href = 'minhas_monitorias.php';
    });
</script>

<?php
$scripts = [];
include_once 'footer.php';
?>
