<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$registro_academico = $_SESSION['registro'];

require_once __DIR__ . '/../utils/con_db.php';
require_once __DIR__ . '/../utils/cores_monitor.php';
require_once __DIR__ . '/../utils/lista_professores.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if (!$id) {
    die("ID de monitoria inválido.");
}

$sql_monitoria = 'SELECT Registro_Academico, Publico_Alvo, Localizacao, Data, Horario, Conteudos_Abordados, Disciplina 
                  FROM Monitoria WHERE ID_Monitoria = :id';
$stmt_monitoria = $pdo->prepare($sql_monitoria);
$stmt_monitoria->bindParam(':id', $id);
$stmt_monitoria->execute();

$resultado_monitoria = $stmt_monitoria->fetch(PDO::FETCH_ASSOC);

if (!$resultado_monitoria) {
    die("❌ Nenhuma monitoria encontrada com o ID $id");
}

// Tratamento de data e hora
$data_original = $resultado_monitoria['Data'] ?? null;
$horario_original = $resultado_monitoria['Horario'] ?? null;

if ($data_original && $horario_original) {
    $data_formatada = DateTime::createFromFormat('Y-m-d', $data_original)->format('d/m');
    $hora_inicial = new DateTime($horario_original);
    $horario_final = (clone $hora_inicial)->modify('+50 minutes');
    $horario_formatado = $hora_inicial->format('H:i') . ' - ' . $horario_final->format('H:i') . 'h';
} else {
    $data_formatada = 'Data indefinida';
    $horario_formatado = 'Horário indefinido';
}

// Outras variáveis
$materia_partes = explode('-', $resultado_monitoria['Disciplina'] ?? '');
$materia_selecionada_monitoria = trim($materia_partes[0] ?? '');
$sala_monitoria = $resultado_monitoria['Localizacao'] ?? '';
$publico_monitoria = $resultado_monitoria['Publico_Alvo'] ?? '';
$conteudos_divididos = explode(',', $resultado_monitoria['Conteudos_Abordados'] ?? '');

$sql_monitor = 'SELECT Nome, Curso, Foto_Perfil FROM Aluno WHERE Registro_Academico = :registro';
$stmt_monitor = $pdo->prepare($sql_monitor);
$stmt_monitor->bindParam(":registro", $resultado_monitoria['Registro_Academico']);
$stmt_monitor->execute();
$resultado_monitor = $stmt_monitor->fetch(PDO::FETCH_ASSOC);

$foto_monitor = $resultado_monitor['Foto_Perfil'] ?? '';
$nome_monitor = $resultado_monitor['Nome'] ?? '';
$curso_monitor = $resultado_monitor['Curso'] ?? '';
$id_monitor = $resultado_monitoria['Registro_Academico'];

$cor = $cores_lista_monitorias[$materia_selecionada_monitoria] ?? '#ccc';
$professores = $professores_monitorias[$materia_selecionada_monitoria] ?? [];

$sql_inscrito_monitoria = 'SELECT Presenca_requisitada FROM Alunos_inscritos 
                           WHERE Registro_Academico = :registro AND ID_Monitoria = :id';
$stmt_inscrito_monitoria = $pdo->prepare($sql_inscrito_monitoria);
$stmt_inscrito_monitoria->bindParam(':registro', $registro_academico);
$stmt_inscrito_monitoria->bindParam(':id', $id);
$stmt_inscrito_monitoria->execute();

$inscrito = $stmt_inscrito_monitoria->fetch(PDO::FETCH_ASSOC) ? 'sim' : 'nao';
