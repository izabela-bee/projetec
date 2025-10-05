<?php

require_once __DIR__ . '/../utils/con_db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_GET['id'] ?? null;

    $presenca = $_POST['presenca'] ?? [];
    $feedback = $_POST['feedback_monitoria'];

    $sql_monitoria_feedback = 'UPDATE Monitoria SET Feedback = :feedback WHERE ID_Monitoria = :id';
    $stmt_monitoria_feedback = $pdo->prepare($sql_monitoria_feedback);
    $stmt_monitoria_feedback->bindParam(':feedback', $feedback);
    $stmt_monitoria_feedback->bindParam(':id', $id);
    $stmt_monitoria_feedback->execute();

    foreach($presenca as $aluno => $valor){
        if($valor == 1){
            $sql_aluno_presente = 'UPDATE Alunos_Inscritos SET Presenca_Confirmada = 1 WHERE Registro_Academico = :registro';
            $stmt_aluno_presente = $pdo->prepare($sql_aluno_presente);
            $stmt_aluno_presente->bindParam(':registro', $aluno);
            $resultado = $stmt_aluno_presente->execute();
        } else {
            $sql_aluno_ausente = 'UPDATE Alunos_Inscritos SET Presenca_Confirmada = 0 WHERE Registro_Academico = :registro';
            $stmt_aluno_ausente = $pdo->prepare($sql_aluno_ausente);
            $stmt_aluno_ausente->bindParam(':registro', $aluno);
            $resultado = $stmt_aluno_ausente->execute();
        }
    }

    if($resultado){
        header('Location: ../../../pages/minhas_monitorias.php?mensagem=relatorio_atualizado_sucesso');
        exit;
    } else{
        header('Location: ../../../pages/minhas_monitorias.php?mensagem=relatorio_atualizado_erro');
        exit;
    }
}