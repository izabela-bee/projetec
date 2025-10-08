<?php

require_once __DIR__ . '/../utils/cores_monitor.php';
require_once __DIR__ . '/../utils/con_db.php';

$registro_academico = $_SESSION['registro'];
$lista_final = [];

$sql_monitorias_inscritas = 'SELECT ID_Monitoria FROM Alunos_Inscritos WHERE Registro_Academico = :registro';
$stmt_monitorias_inscritas = $pdo->prepare($sql_monitorias_inscritas);
$stmt_monitorias_inscritas->bindParam(':registro', $registro_academico);
$stmt_monitorias_inscritas->execute();

$resultado_monitorias_inscritas = $stmt_monitorias_inscritas->fetchAll(PDO::FETCH_ASSOC);


foreach ($resultado_monitorias_inscritas as $monitoria) {
    $sql_monitorias = 'SELECT Registro_Academico, Localizacao, Data, Disciplina, Concluida FROM Monitoria WHERE ID_Monitoria = :id';
    $stmt_monitorias = $pdo->prepare($sql_monitorias);
    $stmt_monitorias->bindParam(':id', $monitoria['ID_Monitoria']);
    $stmt_monitorias->execute();

    $resultado_monitoria = $stmt_monitorias->fetch(PDO::FETCH_ASSOC);

    $sql_monitor = 'SELECT Nome FROM Aluno WHERE Registro_Academico = :registro';
    $stmt_monitor = $pdo->prepare($sql_monitor);
    $stmt_monitor->bindParam(':registro', $resultado_monitoria['Registro_Academico']);
    $stmt_monitor->execute();

    $resultado = $stmt_monitor->fetch(PDO::FETCH_ASSOC);


    $materia_partes = explode('-', $resultado_monitoria['Disciplina'] ?? '');
    $materia_selecionada_monitoria = trim($materia_partes[0] ?? '');

    $cor = $cores_lista_monitorias[$materia_selecionada_monitoria] ?? '#ccc';
    $nome = $resultado['Nome'];
    $data_formatada = DateTime::createFromFormat('Y-m-d', $resultado_monitoria['Data'])->format('d/m');

    $lista_final[$monitoria['ID_Monitoria']] = [
        'cor' => $cor,
        'nome' => $nome,
        'disciplina' => $resultado_monitoria['Disciplina'],
        'sala' => $resultado_monitoria['Localizacao'],
        'data' => $data_formatada,
        'concluida' => (int) $resultado_monitoria['Concluida'],
        'id' => $monitoria['ID_Monitoria']
    ];

}
