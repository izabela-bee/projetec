<?php
require_once __DIR__ . '/../utils/con_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $monitores = $_POST['monitores'] ?? [];

    foreach ($monitores as $id => $dados) {
        $check = isset($dados['check']) ? true : false;   
        $materia = $dados['materia'] ?? null;
        $antigo = $dados['antigo'] ?? 'nao';             

        if ($check && $antigo === 'nao') {
            $sql_insert = "INSERT INTO Monitora (Registro_Academico, disciplina_monitorada) VALUES (:id, :materia)";
            $stmt_insert = $pdo->prepare($sql_insert);
            $stmt_insert->execute([
                ':id' => $id,
                ':materia' => $materia
            ]);

            $sql_update_aluno = "UPDATE Aluno SET E_Monitor = 1 WHERE Registro_Academico = :id";
            $stmt_update = $pdo->prepare($sql_update_aluno);
            $stmt_update->execute([':id' => $id]);

        } elseif (!$check && $antigo === 'sim') {
            $sql_delete = "DELETE FROM Monitora WHERE Registro_Academico = :id";
            $stmt_delete = $pdo->prepare($sql_delete);
            $stmt_delete->execute([':id' => $id]);

            $sql_update_aluno = "UPDATE Aluno SET E_Monitor = 0 WHERE Registro_Academico = :id";
            $stmt_update = $pdo->prepare($sql_update_aluno);
            $stmt_update->execute([':id' => $id]);

        } elseif ($check && $antigo === 'sim') {
            $sql_update_materia = "UPDATE Monitora SET disciplina_monitorada = :materia WHERE Registro_Academico = :id";
            $stmt_update_materia = $pdo->prepare($sql_update_materia);
            $stmt_update_materia->execute([
                ':id' => $id,
                ':materia' => $materia
            ]);
        }
    }

    header('Location: ../../pages/adminPage.php?mensagem=sucesso_cadastro_monitores');
    exit;
}
