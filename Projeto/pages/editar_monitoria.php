<?php
$titlePage = 'Editando/Criando Monitoria';
$nameCSS = "editar_monitoria";

include_once 'header.php';
?>

<main class="card-grid">
    <div class="Sair-monitoria" id="linkSair">
        X
    </div>
    <form class="container-formulario" id="form-monitoria" method="POST" action="#">
        <div class="cabecalho-formulario">
            <div class="cabecalho-formulario-nome cabecalho-destaque">Ricardo Dias</div>
            <div class="cabecalho-formulario-disciplina cabecalho-destaque">Matemática</div>
            <div class="cabecalho-formulario-info cabecalho-destaque">INFO 2</div>
        </div>
        <div class="corpo-formulario">
            <div class = "corpo1">
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
            </div>
            <div class = "corpo2">
                <div class="linha-formulario largura-total">
                    <label for="inputData" class ="texto_materia">Matéria:</label>
                    <textarea id="areaTextoMateriais"
                        placeholder="Adicionar materiais: arquivo.pdf, link.slide, apostila"></textarea>
                </div>
            </div>
        </div>
        <div class="rodape-formulario">
            <button class="botao-enviar" id="botaoConfirmarEdicao">✔</button>
        </div>
    </form>

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

<?php
$scripts = ["editar_monitoriaJS/editar_monitoria_confirmar_modal", "editar_monitoriaJS/editar_monitoria_cancelar_modal"];
include_once 'footer.php';
?>
