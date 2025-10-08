<?php
$nameCSS = "adminPage";
$titlePage = "Página de Admin";

include_once 'header.php';

if ($_SESSION['status'] !== 'Administrador') {
    header('Location: inicial.php?mensagem=usuario_sem_permissao');
    exit;
}

require_once __DIR__ . '/../src/controllers/adminPage_backend.php';
?>

<main class="main-admin">

    <div class="admin-procurar_alunos">
        <div class="admin-procurar-container">
            <label>
                <input type="search" name="pesquisaAlunos" class="admin-procurar_alunos-pesquisa" placeholder="Pesquise o aluno que deseja encontrar">
                <img src="../public/img/formsComponents/search.png" alt="Icon de pesquisa" class="icon-search">
            </label>
        </div>


        <form action="../src/controllers/cadastrar_monitor_admin.php" method="POST">
            <table class="tabela-alunos-geral">
                <?php foreach ($lista_aluno_final as $aluno => $dados): ?>
                    <tr>
                        <th><?= htmlspecialchars($dados['id']); ?></th>
                        <th class="linha-foto">
                            <?= htmlspecialchars($dados['nome']); ?>
                            <div style="background-image: url('<?= htmlspecialchars($dados['foto_perfil']); ?>');" class="foto-table" alt="Foto avatar"></div>
                        </th>
                        <th class="linha-check"><?= htmlspecialchars($dados['curso']); ?></th>

                        <!-- Checkbox -->
                        <th class="checkbox">
                            <input
                                class="checkbox-monitor"
                                type="checkbox"
                                name="monitores[<?= $dados['id']; ?>][check]"
                                value="1"
                                <?= $dados['e_monitor'] === 'sim' ? 'checked' : '' ?>>
                            <!-- Campo escondido para armazenar estado antigo -->
                            <input type="hidden" name="monitores[<?= $dados['id']; ?>][antigo]" value="<?= $dados['e_monitor']; ?>">
                        </th>

                        <!-- Select de matéria -->
                        <th class="select-materias">
                            <select name="monitores[<?= $dados['id']; ?>][materia]" class="select"><?php if ($dados['e_monitor'] === 'sim'): ?>
                                    <option value="" disabled>Matérias</option> <?php foreach ($materias as $materia): ?> <?php var_dump($dados['materia_monitorada']); ?> <option <?= $materia === $dados['materia_monitorada'] ? 'selected' : '' ?> value="<?= htmlspecialchars($materia) ?>"><?= htmlspecialchars($materia); ?></option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="" selected disabled>Matérias</option>
                                    <?php foreach ($materias as $materia): ?>
                                        <option value="<?= htmlspecialchars($materia) ?>"><?= htmlspecialchars($materia); ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </table>

            <button type="submit" class="botao_confirmar_inscricao_monitores">
                Cadastrar
            </button>
        </form>

        </section>



</main>


<?php
$scripts = [];
include_once "footer.php";

?>