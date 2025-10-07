<?php

require_once __DIR__ . '/../utils/cores_monitor.php';
require_once __DIR__ . '/../utils/con_db.php';

$id = $_GET['id'];

$sql_monitoria = 'SELECT Registro_Academico, Data, Localizacao, Horario, Conteudos_Abordados, Disciplina FROM Monitoria WHERE ID_Monitoria = :id';
$stmt_monitoria = $pdo->prepare($sql_monitoria);
$stmt_monitoria->bindParam(':id', $id);
$stmt_monitoria->execute();

$resultado_monitoria = $stmt_monitoria->fetch(PDO::FETCH_ASSOC);

$sql_monitor = 'SELECT Nome, Curso, Foto_Perfil FROM Aluno WHERE Registro_Academico = :registro';
$stmt_monitor = $pdo->prepare($sql_monitor);
$stmt_monitor->bindParam(':registro', $resultado_monitoria['Registro_Academico']);
$stmt_monitor->execute();

$resultado_monitor = $stmt_monitor->fetch(PDO::FETCH_ASSOC);

$materia_partes = explode('-', $resultado_monitoria['Disciplina'] ?? '');
$materia_selecionada_monitoria = trim($materia_partes[0] ?? '');
$data_monitoria = $resultado_monitoria['Data'];
$data_formatada = DateTime::createFromFormat('Y-m-d', $data_monitoria)->format('d/m/Y');
$sala_monitoria = $resultado_monitoria['Localizacao'];
$horario_formatado = substr($resultado_monitoria['Horario'], 0, 5);
$materia_monitoria = $resultado_monitoria['Conteudos_Abordados'];
$nome_monitor = $resultado_monitor['Nome'];
$curso_monitor = $resultado_monitor['Curso'];
$foto_monitor = $resultado_monitor['Foto_Perfil'];
$cor_monitor = $cores_lista_monitorias[$materia_selecionada_monitoria] ?? '#ccc';


