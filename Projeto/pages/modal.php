<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
$nameCSS = "Modal";
$titlePage = "Página de Modal";
include_once 'header.php';


require_once __DIR__ . "/../src/controllers/modal_backend.php";
?>
<main>
    <form class='cor' method="POST" action="../src/controllers/modal_inscrever_backend.php?id=<?php echo htmlspecialchars($id); ?>">
        <div class='cor-header' style="background-color: <?php echo htmlspecialchars($cor); ?>;">
            <h2 class='texto'>Monitor(a): <?= htmlspecialchars($nome_monitor); ?></h2>
            <p class='texto'>Curso: <?= htmlspecialchars($curso_monitor); ?></p>
            <p class="texto">Data: <?= htmlspecialchars($data_formatada); ?></p>
        </div>
        <div class='cor-body'>
            <div class="disciplina disciplinas">
                <p>Disciplina:</p>
                <h2><?= htmlspecialchars($materia_selecionada_monitoria); ?></h2>
            </div>
            <div class="disciplina monitores">
                <p>Professor(es):</p>
                <h2><?= htmlspecialchars(implode(' e ', $professores)); ?></h2>
            </div>
            <div class="disciplina local">
                <p>Local:</p>
                <h2>Sala <?= htmlspecialchars($sala_monitoria); ?></h2>
            </div>
            <div class="disciplina horario">
                <p>Horário:</p>
                <h2><?= htmlspecialchars($horario_formatado); ?></h2>
            </div>
            <div class="disciplina publico">
                <p>Publico:</p>
                <h2><?= htmlspecialchars($publico_monitoria); ?></h2>
            </div>
            <div class="disciplina monitor" data-id="<?= htmlspecialchars($id_monitor); ?>">
                <p>Monitor(a):</p>
                <h2>
                    <?= htmlspecialchars($nome_monitor); ?>
                    <div class="foto-monitor"
                        style="background-image: url('<?= htmlspecialchars($foto_monitor); ?>');">
                    </div>
                </h2>
            </div>



            <div class="disciplina conteudos">
                <p>Conteudos: </p>
                <select name="conteudos" id="conteudos">
                    <?php foreach ($conteudos_divididos as $conteudo): ?>
                        <option value="<?php echo htmlspecialchars($conteudo); ?>"><?php echo htmlspecialchars($conteudo); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <?php if ($_SESSION['registro'] === $resultado_monitoria['Registro_Academico']): ?>
            <div class="cor-botao">
                <p>Inscrição desabilitada</p>
                <input class='custom-checkbox' type="checkbox" name="check" hidden>
            </div>
        <?php else: ?>
            <div class='cor-botao'>
                <label>
                    <p>Eu vou</p>
                    <input class='custom-checkbox' type="checkbox" name="check" <?php echo $inscrito === 'sim' ? 'checked' : ''; ?>>
                </label>
            </div>
        <?php endif; ?>
        <div class='cor-sair'>
            <button type="submit" class='sair'>x</button>
        </div>
    </form>
</main>

<?php
$scripts = ['modalJS/redirecionar_monitor'];

include_once 'footer.php';
?>