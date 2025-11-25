<?php 

require_once __DIR__ . '/../utils/con_db.php';

// Verifica se o método é POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../../pages/adminPage.php?erro=metodo_invalido");
    exit;
}

// 1) Buscar todos os usuários
$sql = "SELECT Registro_Academico FROM Aluno";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$lista_users = $stmt->fetchAll(PDO::FETCH_COLUMN);

foreach ($lista_users as $userId) {

    // Checkbox enviado?
    $monitorMarcado = isset($_POST["monitor_$userId"]);
    
    // Atualizar E_Monitor na tabela Aluno
    $sqlUpdate = "UPDATE Aluno SET E_Monitor = :monitor WHERE Registro_Academico = :id";
    $stmtUpdate = $pdo->prepare($sqlUpdate);
    $stmtUpdate->execute([
        ':monitor' => $monitorMarcado ? 1 : 0,
        ':id' => $userId
    ]);

    // Antes de cadastrar novas disciplinas, apagar todas as antigas
    $sqlDelete = "DELETE FROM Monitora WHERE Registro_Academico = :id";
    $stmtDelete = $pdo->prepare($sqlDelete);
    $stmtDelete->execute([':id' => $userId]);

    // Se NÃO foi marcado como monitor, pula para o próximo
    if (!$monitorMarcado) {
        continue;
    }

    // 2) Pegar as matérias selecionadas
    $materiasSelecionadas = $_POST["subjects_$userId"] ?? [];

    // 3) Inserir as matérias selecionadas
    if (!empty($materiasSelecionadas)) {

        $sqlInsert = "INSERT INTO Monitora (Registro_Academico, Disciplina_Monitorada)
                      VALUES (:id, :materia)";
        $stmtInsert = $pdo->prepare($sqlInsert);

        foreach ($materiasSelecionadas as $materia) {
            $stmtInsert->execute([
                ':id' => $userId,
                ':materia' => $materia
            ]);
        }
    }
}

// Finaliza
header("Location: ../../pages/adminPage.php?success=1");
exit;
