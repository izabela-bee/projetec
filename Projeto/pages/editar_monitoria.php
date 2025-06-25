<?php


$titlePage = 'Editando/Criando Monitoria';
$nameCSS = "editar_monitoria";

include_once 'header.php';


?>

<main class="main-content">
        <div class="card-grid">
            <form class="container-formulario" id="form-monitoria" method="POST" action="#">
                <div class="cabecalho-formulario">
                    <div class="cabecalho-formulario-nome">Ricardo Dias</div>
                    <div class="cabecalho-formulario-disciplina">Matemática</div>
                    <div class="cabecalho-formulario-info">INFO 2</div>
                </div>

                <div class="corpo-formulario">
                    <div class="linha-formulario">
                        <label for="inputData">Data:</label>
                        <input type="date" id="inputData" name="data" placeholder="dd/mm/aaaa">
                    </div>
                    <div class="linha-formulario">
                        <label for="inputSala">Sala:</label>
                        <input type="text" id="inputSala" name="sala" placeholder="302">
                    </div>
                    <div class="linha-formulario">
                        <label for="inputHorario">Horário:</label>
                        <input type="text" id="inputHorario" name="horario" placeholder="19:30">
                    </div>
                    <div class="linha-formulario">
                        <label for="inputMaterias">Matérias:</label>
                        <input type="text" id="inputMaterias" name="materias" placeholder="Geometria,Equação do primeiro grau">
                    </div>
                    <div class="linha-formulario largura-total">
                        <textarea id="areaTextoMaterias"
                            placeholder="Adicionar materiais: arquivo.pdf, link.slide, apostila" name="descricao"></textarea>
                    </div>
                </div>

                <div class="rodape-formulario">
                    <button class="botao-enviar" id="botaoConfirmarEdicao" type="submit">✔️</button>
                </div>
            </form>
        </div>
    </main>


<?php

$scripts = [];
include_once 'footer.php';

?>