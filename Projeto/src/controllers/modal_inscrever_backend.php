<?php

require_once __DIR__ . '/../utils/con_db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $registro = $_SESSION['registro'];
    $id = $_GET['id'];
    $presenca = $_POST['check'];
    $presenca_confirmada = 0;
    $presenca_requisitada = $presenca ? '1' : '0';
    $sql_aluno_inscrito = 'SELECT Presenca_requisitada FROM Alunos_Inscritos WHERE Registro_Academico = :registro AND ID_Monitoria = :id';
    $stmt_aluno_inscrito = $pdo->prepare($sql_aluno_inscrito);
    $stmt_aluno_inscrito->bindParam(':registro', $registro);
    $stmt_aluno_inscrito->bindParam(':id', $id);
    $stmt_aluno_inscrito->execute();

    $resultado_inscrito = $stmt_aluno_inscrito->fetch(PDO::FETCH_ASSOC) ? 'sim' : 'nao';
    if ($presenca) {
        if ($resultado_inscrito === 'sim') {
            header('Location: ../../pages/disciplinas.php?mensagem=inscricao_mantida');
            exit;
        } else {
            $sql_inscrever_aluno = 'INSERT INTO Alunos_Inscritos(Registro_Academico, Presenca_confirmada, Presenca_requisitada, ID_Monitoria) VALUES (:registro, :presenca_c , :presenca_r, :id)';
            $stmt_inscrever_aluno = $pdo->prepare($sql_inscrever_aluno);
            $stmt_inscrever_aluno->bindParam(':registro', $registro);
            $stmt_inscrever_aluno->bindParam(':presenca_c', $presenca_confirmada);
            $stmt_inscrever_aluno->bindParam(':presenca_r', $presenca_requisitada);
            $stmt_inscrever_aluno->bindParam(':id', $id);

            $resultado_inscrever = $stmt_inscrever_aluno->execute();

            if ($resultado_inscrever) {
                header('Location: ../../pages/disciplinas.php?mensagem=inscricao_feita_sucesso');
                exit;
            } else {
                header('Location: ../../pages/disciplinas.php?mensagem=erro_na_inscricao');
                exit;
            }
        }
    } else {
        if($resultado_inscrito === 'sim'){
            $sql_deletar_inscricao = 'DELETE FROM Alunos_Inscritos WHERE Registro_Academico = :registro AND ID_Monitoria = :id';
            $stmt_deletar_inscricao = $pdo->prepare($sql_deletar_inscricao);
            $stmt_deletar_inscricao->bindParam(':registro', $registro);
            $stmt_deletar_inscricao->bindParam(':id', $id);
            $resultado_deletar = $stmt_deletar_inscricao->execute();

            if($resultado_deletar){
                header('Location: ../../pages/disciplinas.php?mensagem=delecao_feita_sucesso');
                exit;
            } else {
                header('Location: ../../pages/disciplinas.php?mensagem=erro_na_delecao');
                exit;
            }
        } else {
            header('Location: ../../pages/disciplinas.php?mensagem=desinscricao_mantida');
            exit;
        }
    }
}
