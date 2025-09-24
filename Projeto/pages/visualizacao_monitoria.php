<?php
$titlePage = 'Visualizar Monitoria';
$nameCSS = "visualizacao_monitoria";

include_once 'header.php';
?>

<main class="card-grid">

    <div class="Sair-monitoria" id="linkSair">
        X
    </div>

    <form class="container-formulario" id="form-monitoria" method="POST" action="#">
        <div class="cabecalho-formulario">
            <div class="cabecalho-formulario-nome cabecalho-destaque">Ricardo Dias</div>
            <div class="cabecalho-formulario-disciplina cabecalho-destaque  ">Matemática</div>
            <div class="cabecalho-formulario-info cabecalho-destaque">INFO 2</div>
        </div>
        <div class="corpo-formulario">
            <div class="corpo1">
                <div class="linha-formulario">
                    <label for="inputData">Data:</label>
                    <input type="text" id="inputData" placeholder="dd/mm/aaaa" disabled>
                </div>
                <div class="linha-formulario">
                    <label for="inputSala">Sala:</label>
                    <input type="text" id="inputSala" placeholder="302" disabled>
                </div>
                <div class="linha-formulario">
                    <label for="inputHorario">Horário:</label>
                    <input type="text" id="inputHorario" placeholder="00:00" disabled>
                </div>
            </div>
            <div class = "corpo2">
                <div class="linha-formulario largura-total">
                    <label for="inputData" class ="texto_materia">Matéria:</label>
                    <textarea id="areaTextoMateriais"
                        placeholder="Adicionar materiais: arquivo.pdf, link.slide, apostila"></textarea disabled>
                </div>
            </div>
        </div>
        <button type="submit" class="botao-desencricao-monitoria" id="Desinscrever">
            Desinscrever
        </button>
    </form>

    <div class="modal-overlay-sair" id="confirmModal-sair">
        <div class="modal-box-sair">
            <h3>Deseja realmente sair da visualização da monitoria selecionada?</h3>
            <button class="btn-confirmar-sair" id="btnSim-sair">Confirmar</button>
            <button class="btn-cancelar-sair" id="btnNao-sair">Cancelar</button>
        </div>
    </div>

    <div class="modal-overlay-desinscrever" id="confirmModal-desinscrever">
        <div class="modal-box-desinscrever">
            <h3>Deseja realmente sair da visualização da monitoria selecionada?</h3>
            <button class="btn-confirmar-desinscrever" id="btnSim-desinscrever">Confirmar</button>
            <button class="btn-cancelar-desinscrever" id="btnNao-desinscrever">Cancelar</button>
        </div>
    </div>

</main>

<?php
$scripts = ["visualizar_monitoriaJS/visualizar_modal_cancelar","visualizar_monitoriaJS/visualizar_modal_desinscrever"];
include_once 'footer.php';
?>
