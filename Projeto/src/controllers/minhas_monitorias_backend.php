<?php

require_once __DIR__ . '/../utils/con_db.php';
require_once __DIR__ . '/../utils/cores_monitor.php';

$lista_final = [];
session_start();
$registro_academico = $_SESSION['registro'];

$sql_infos_aluno = 'SELECT Nome FROM Aluno WHERE Registro_Academico = :registro';
$stmt_infos_aluno = $pdo->prepare($sql_infos_aluno);
$stmt_infos_aluno->bindParam(':registro', $registro_academico);
$stmt_infos_aluno->execute();

$resultado_infos_aluno = $stmt_infos_aluno->fetch(PDO::FETCH_ASSOC);

$sql_infos_monitoria = 'SELECT ID_Monitoria,Localizacao, Data, Concluida FROM Monitoria WHERE Registro_Academico = :registro';
$stmt_infos_monitoria = $pdo->prepare($sql_infos_monitoria);
$stmt_infos_monitoria->bindParam(':registro', $registro_academico);
$stmt_infos_monitoria->execute();

$resultado_infos_monitoria = $stmt_infos_monitoria->fetchAll(PDO::FETCH_ASSOC);

$sql_disciplina_monitor = 'SELECT disciplina_monitorada FROM Monitora WHERE Registro_Academico = :registro';
$stmt_disciplina_monitor = $pdo->prepare($sql_disciplina_monitor);
$stmt_disciplina_monitor->bindParam(':registro', $registro_academico);
$stmt_disciplina_monitor->execute();

$resultado_disciplina_monitor = $stmt_disciplina_monitor->fetch(PDO::FETCH_ASSOC);

$cor = '';
$materia_partes = explode('-', $resultado_disciplina_monitor['disciplina_monitorada']);
$materia_selecionada = $materia_partes[0];

foreach ($cores_lista_monitorias as $cor_monitor => $cor_especifica) {
    if ($cor_monitor === $materia_selecionada) {
        $cor = $cor_especifica;
    }
}

foreach($resultado_infos_monitoria as $monitoria){
    $dataFormatada = date("d/m", strtotime($monitoria['Data']));

    $lista_final[$monitoria['ID_Monitoria']] = [
        'id' => $monitoria['ID_Monitoria'],
        'nome' => $resultado_infos_aluno['Nome'],
        'materia' => $resultado_disciplina_monitor['disciplina_monitorada'],
        'localizacao' => $monitoria['Localizacao'],
        'data' => $dataFormatada,
        'cor_monitor' => $cor,
        'conclusao' => $monitoria['Concluida']
    ];
}
