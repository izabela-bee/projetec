<?php 
require_once __DIR__ . '/../utils/con_db.php';
require_once __DIR__ . '/../utils/cores_monitor.php';

$registro_academico = $_SESSION['registro'];

$sql_infos_monitor = 'SELECT Nome, Curso FROM Aluno WHERE Registro_Academico = :registro';
$stmt_infos_monitor = $pdo->prepare($sql_infos_monitor);
$stmt_infos_monitor->bindParam(':registro', $registro_academico);
$stmt_infos_monitor->execute();
$resultado_infos_monitor = $stmt_infos_monitor->fetch(PDO::FETCH_ASSOC);

$sql_disciplina_monitor = 'SELECT disciplina_monitorada FROM Monitora WHERE Registro_Academico = :registro';
$stmt_disciplina_monitor = $pdo->prepare($sql_disciplina_monitor);
$stmt_disciplina_monitor->bindParam(':registro', $registro_academico);
$stmt_disciplina_monitor->execute();
$resultado_disciplina = $stmt_disciplina_monitor->fetch(PDO::FETCH_ASSOC);

$materia_selecionada = '';
$cor = '';

if ($resultado_disciplina && isset($resultado_disciplina['disciplina_monitorada'])) {
    $materia_partes = explode('-', $resultado_disciplina['disciplina_monitorada']);
    $materia_selecionada = $materia_partes[0];

    foreach ($cores_lista_monitorias as $cor_monitor => $cor_especifica) {
        if ($cor_monitor === $materia_selecionada) {
            $cor = $cor_especifica;
            break;
        }
    }
}

$nome = $resultado_infos_monitor['Nome'] ?? 'Desconhecido';
$materia_monitor = $materia_selecionada ?: 'Indefinida';
$curso = $resultado_infos_monitor['Curso'] ?? 'Sem curso';
$cor_escolhida = $cor ?: '#CCCCCC';
