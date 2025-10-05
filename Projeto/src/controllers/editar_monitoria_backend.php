<?php

require_once __DIR__ . '/../utils/con_db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $id = $_GET['id'];
    $data = $_POST['data'];
    $sala = $_POST['sala'];
    $horario = $_POST['horario'];
    $conteudos = $_POST['materia'];

    $sql_editar_monitoria = "UPDATE Monitoria SET Data = :data, Localizacao = :sala, Horario = :horario, Conteudos_Abordados = :conteudo WHERE ID_Monitoria = :id";
    $stmt_editar_monitoria = $pdo->prepare($sql_editar_monitoria);
    $stmt_editar_monitoria->bindParam(':data', $data);
    $stmt_editar_monitoria->bindParam(':sala', $sala);
    $stmt_editar_monitoria->bindParam(':horario', $horario);
    $stmt_editar_monitoria->bindParam(':conteudo', $conteudos);
    $stmt_editar_monitoria->bindParam(':id', $id);

    $resultado = $stmt_editar_monitoria->execute();

    if($resultado){
        header('Location: ../../pages/minhas_monitorias.php?mensagem=atualizacao_sucesso');
        exit;
    } else {
        header('Location: ../../pages/minhas_monitorias.php?mensagem=atualizacao_erro');
        exit;
    }
}