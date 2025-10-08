<?php
$titlePage = 'Página Monitores';
$nameCSS = "monitores";

include_once "header.php";
require_once __DIR__ . '/../src/controllers/monitores_backend.php';
?>

<main class="principal">



    <?php foreach ($lista_final as $monitor => $dados): ?>
        <section class="principal-card" onclick="window.location.href = 'visualizacao_monitor.php?id=<?= htmlspecialchars($dados['id']); ?>'"
            style="cursor: pointer;">
            <div class="principal-card-titulo" style="background-color:<?= htmlspecialchars($dados['cor_monitor']); ?>">
                <h2 class="principal-card-titulo-nome"><?= htmlspecialchars($dados['nome']); ?></h2>
                <div style="background-image: url('<?= htmlspecialchars($dados['foto_perfil']); ?>')" class="principal-card-titulo-imagem"></div>
            </div>

            <div class="principal-card-info">
                <p class="principal-card-info-email">Email: <?= htmlspecialchars($dados['email']); ?></p>
                <p class="principal-card-info-sala">Sala: <?= htmlspecialchars($dados['sala']); ?></p>
                <p class="principal-card-info-turma"><?= htmlspecialchars($dados['curso']); ?></p>
            </div>

            <div class="principal-card-info2">
                <p class="principal-card-info2-telefone">Telefone: <?= htmlspecialchars($dados['telefone']); ?></p>
                <p class="principal-card-info2-materia">Matéria: <?= htmlspecialchars($dados['disciplina']); ?></p>
            </div>
        </section>
    <?php endforeach; ?>

    <?php
    $scripts = [];
    include_once "footer.php";
    ?>