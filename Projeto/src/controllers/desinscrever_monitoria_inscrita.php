<?php

require_once __DIR__ . '/../utils/con_db.php';

session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $registro_academico = $_SESSION['registro'];

    $sql_desinscrever_monitoria = 'DELETE FROM Alunos_Inscritos WHERE Registro_Academico = :registro AND ID_Monitoria = :id';
    $stmt_desinscrever_monitoria = $pdo->prepare($sql_desinscrever_monitoria);
    $stmt_desinscrever_monitoria->bindParam(':registro', $registro_academico);
    $stmt_desinscrever_monitoria->bindParam(':id', $id);

    $resultado = $stmt_desinscrever_monitoria->execute();

    if($resultado){
        header('Location: ../../pages/minhas_monitorias_inscritas.php?mensagem=desinscricao_sucesso');
        exit;
    } else {
        header('Location: ../../pages/minhas_monitorias_inscritas.php?mensagem=desinscricao_erro');
        exit;
    }

} else {
    $id = $_GET['id'];
    $registro_academico = $_SESSION['registro'];

    $sql_desinscrever_monitoria = 'DELETE FROM Alunos_Inscritos WHERE Registro_Academico = :registro AND ID_Monitoria = :id';
    $stmt_desinscrever_monitoria = $pdo->prepare($sql_desinscrever_monitoria);
    $stmt_desinscrever_monitoria->bindParam(':registro', $registro_academico);
    $stmt_desinscrever_monitoria->bindParam(':id', $id);

    $resultado = $stmt_desinscrever_monitoria->execute();

    if($resultado){
        header('Location: ../../pages/minhas_monitorias_inscritas.php?mensagem=desinscricao_sucesso');
        exit;
    } else {
        header('Location: ../../pages/minhas_monitorias_inscritas.php?mensagem=desinscricao_erro');
        exit;
    }
}