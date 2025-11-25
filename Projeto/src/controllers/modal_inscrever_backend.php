<?php

require_once __DIR__ . '/../utils/con_db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $registro = $_SESSION['registro'];
    $id = $_GET['id'];
    $presenca = $_POST['check'];
    $presenca_confirmada = 0;
    $presenca_requisitada = $presenca ? '1' : '0';

    // 1. PEGAR INFO DA MONITORIA
    $sql_monitoria_atual = "SELECT Data, Horario FROM Monitoria WHERE ID_Monitoria = :id";
    $stmt_monitoria_atual = $pdo->prepare($sql_monitoria_atual);
    $stmt_monitoria_atual->bindParam(':id', $id);
    $stmt_monitoria_atual->execute();
    $monitoria_atual = $stmt_monitoria_atual->fetch(PDO::FETCH_ASSOC);

    $data_monitoria = $monitoria_atual['Data'];
    $horario_monitoria = $monitoria_atual['Horario'];

    // 2. VERIFICAR CONFLITO DE HORÁRIO
    $sql_conflito = "
        SELECT ai.ID_Monitoria
        FROM Alunos_Inscritos ai
        INNER JOIN Monitoria m ON ai.ID_Monitoria = m.ID_Monitoria
        WHERE ai.Registro_Academico = :registro
          AND m.Data = :data
          AND m.Horario = :horario
          AND ai.ID_Monitoria != :id_atual
    ";

    $stmt_conflito = $pdo->prepare($sql_conflito);
    $stmt_conflito->bindParam(':registro', $registro);
    $stmt_conflito->bindParam(':data', $data_monitoria);
    $stmt_conflito->bindParam(':horario', $horario_monitoria);
    $stmt_conflito->bindParam(':id_atual', $id);
    $stmt_conflito->execute();

    $conflito = $stmt_conflito->fetch(PDO::FETCH_ASSOC);

    if ($conflito) {
        header("Location: ../../pages/disciplinas.php?mensagem=horario_ocupado");
        exit;
    }
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
