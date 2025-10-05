<?php

require_once __DIR__ . '/../utils/con_db.php';
require_once __DIR__ . '/../utils/publico_alvo.php';
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = $_POST['data'];
    $registro_academico = $_SESSION['registro'];
    $sala = $_POST['sala'];
    $horario = $_POST['horario'];
    $materia = $_POST['materia'];
    $publico_alvo = '';
    $conclusao = false;

    $sql_aluno = 'SELECT disciplina_monitorada FROM Monitora WHERE Registro_Academico = :registro';
    $stmt_aluno = $pdo->prepare($sql_aluno);
    $stmt_aluno->bindParam(':registro', $registro_academico);
    $stmt_aluno->execute();

    $resultado_aluno = $stmt_aluno->fetch(PDO::FETCH_ASSOC);

    foreach($publico_alvo_materias as $materia_m => $publico){
        if($resultado_aluno['disciplina_monitorada'] === $materia_m){
            $publico_alvo = $publico;
        }
    }

    $sql_criar_monitoria = 'INSERT INTO Monitoria(Registro_Academico, Publico_Alvo, Localizacao, Data, Horario, Conteudos_Abordados, Concluida, Disciplina) VALUES (:registro, :publico_alvo, :localizacao, :data, :horario, :conteudos, :conclusao, :disciplina);';
    $stmt_criar_monitoria = $pdo->prepare($sql_criar_monitoria);
    $stmt_criar_monitoria->bindParam(':registro', $registro_academico);
    $stmt_criar_monitoria->bindParam(':publico_alvo', $publico_alvo);
    $stmt_criar_monitoria->bindParam(':localizacao', $sala);
    $stmt_criar_monitoria->bindParam(':data', $data);
    $stmt_criar_monitoria->bindParam(':horario', $horario);
    $stmt_criar_monitoria->bindParam(':conteudos', $materia);
    $stmt_criar_monitoria->bindParam(':conclusao', $conclusao);
    $stmt_criar_monitoria->bindParam(':disciplina', $resultado_aluno['disciplina_monitorada']);
    $sucesso_criacao = $stmt_criar_monitoria->execute();

    if($sucesso_criacao){
        header('Location: ../../pages/minhas_monitorias.php?mensagem=sucesso_criar_monitoria');
        exit;
    } else {
        header('Location: ../../pages/minhas_monitorias.php?mensagem=falha_criar_monitoria');
        exit;
    }


}