<?php
$titlePage = 'Página Monitores';
$nameCSS = "monitores";

include_once "header.php";
require_once __DIR__ . '/../src/utils/con_db.php';
?>

<main class="principal">
    <?php
    $sql = "
        SELECT 
            Aluno.Nome, 
            Aluno.Email, 
            Aluno.Curso, 
            Telefone.telefone, 
            Aluno.Sala, 
            Monitora.disciplina_monitorada
        FROM Aluno
        LEFT JOIN Telefone ON Aluno.Registro_Academico = Telefone.Registro_Academico
        LEFT JOIN Monitoria ON Aluno.ID_Monitoria = Monitoria.ID_Monitoria
        LEFT JOIN Monitora ON Aluno.Registro_Academico = Monitora.Registro_Academico
        WHERE Aluno.E_Monitor = TRUE
    ";

    $stmt = $pdo->query($sql); 
    $monitores = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($monitores) > 0) {
        foreach ($monitores as $row) { ?>
            
            <section class="principal-card">
                <div class="principal-card-titulo">
                    <h2 class="principal-card-titulo-nome"><?= htmlspecialchars($row['Nome']); ?></h2>
                    <div class="principal-card-titulo-imagem"></div>
                </div>

                <div class="principal-card-info">
                    <p class="principal-card-info-email">Email: <?= htmlspecialchars($row['Email']); ?></p>
                    <p class="principal-card-info-sala">Sala: <?= htmlspecialchars($row['Sala'] ?? 'Não informado'); ?></p>
                    <p class="principal-card-info-turma"><?= htmlspecialchars($row['Curso']); ?></p>
                </div>

                <div class="principal-card-info2">
                    <p class="principal-card-info2-telefone">Telefone: <?= htmlspecialchars($row['telefone'] ?? 'Não informado'); ?></p>
                    <p class="principal-card-info2-materia">Matéria: <?= htmlspecialchars($row['disciplina_monitorada'] ?? 'Não informado'); ?></p>
                </div>
            </section>

        <?php }
    } else {
        echo "<p>Nenhum monitor encontrado.</p>";
    }
    ?>
</main>

<?php
$scripts = [];
include_once "footer.php";
?>
