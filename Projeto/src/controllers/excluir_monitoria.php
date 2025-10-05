<?php

require_once __DIR__ . '/../utils/con_db.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $sql_excluir_monitoria = 'DELETE FROM Monitoria WHERE ID_Monitoria = :id';
    $stmt_excluir_monitoria = $pdo->prepare($sql_excluir_monitoria);
    $stmt_excluir_monitoria->bindParam(':id', $id);

    $resultado = $stmt_excluir_monitoria->execute();

    if ($resultado) {
        header('Location: ../../pages/minhas_monitorias.php?mensagem=excluir_sucesso');
        exit;
    } else {
        header('Location: ../../pages/minhas_monitorias.php?mensagem=excluir_erro');
        exit;
    }
} else {
    header('Location: ../../pages/minhas_monitorias.php?mensagem=id_invalido');
    exit;
}
