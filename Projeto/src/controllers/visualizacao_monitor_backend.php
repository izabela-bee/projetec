<?php

require_once __DIR__ . '/../utils/con_db.php';
require_once __DIR__ . '/../utils/cores_monitor.php';

$id = $_GET['id'];
$lista_monitorias = [];
$contador_monitorias = 0;


$sql_monitor_infos = 'SELECT Nome, Curso, Sala, Email, Foto_Perfil FROM Aluno WHERE Registro_Academico = :registro';
$stmt_monitor_infos = $pdo->prepare($sql_monitor_infos);
$stmt_monitor_infos->bindParam(':registro', $id);
$stmt_monitor_infos->execute();

$resultado_monitor_infos = $stmt_monitor_infos->fetch(PDO::FETCH_ASSOC);

$sql_monitor_status = 'SELECT disciplina_monitorada FROM Monitora WHERE Registro_Academico = :registro';
$stmt_monitor_status = $pdo->prepare($sql_monitor_status);
$stmt_monitor_status->bindParam(':registro', $id);
$stmt_monitor_status->execute();

$resultado_monitor_status = $stmt_monitor_status->fetch(PDO::FETCH_ASSOC);

$sql_monitoria_monitor = 'SELECT ID_Monitoria, Horario, Data, Conteudos_Abordados, Concluida FROM Monitoria WHERE Registro_Academico = :registro';
$stmt_monitoria_monitor = $pdo->prepare($sql_monitoria_monitor);
$stmt_monitoria_monitor->bindParam(':registro', $id);
$stmt_monitoria_monitor->execute();

$resultado_monitoria_monitor = $stmt_monitoria_monitor->fetchAll(PDO::FETCH_ASSOC);

$materia_partes = explode('-', $resultado_monitor_status['disciplina_monitorada'] ?? '');
$materia_selecionada_monitoria = trim($materia_partes[0] ?? '');

foreach($resultado_monitoria_monitor as $monitoria){
    $horario_formatado = substr($monitoria['Horario'], 0, 5);
    $data_formatada = DateTime::createFromFormat('Y-m-d', $monitoria['Data'])->format('d/m/Y');
    $conteudos_divididos = explode(',', $monitoria['Conteudos_Abordados']);
    $cor = $cores_lista_monitorias[$materia_selecionada_monitoria] ?? '#ccc';
    if($monitoria['Concluida'] === 1){
        $concluida = 'sim';
    } else {
        $concluida = 'nao';
    }

    $lista_monitorias[$monitoria['ID_Monitoria']] = [
        'nome' => $resultado_monitor_infos['Nome'],
        'horario' => $horario_formatado,
        'data' => $data_formatada,
        'conteudos' => $conteudos_divididos,
        'curso' => $resultado_monitor_infos['Curso'],
        'cor' => $cor,
        'id' => $monitoria['ID_Monitoria'],
        'concluida' => $concluida
    ];

    $contador_monitorias = $contador_monitorias + 1;
}

$nome_monitor = $resultado_monitor_infos['Nome'];
$disciplina_monitor = $materia_selecionada_monitoria;
$curso_monitor = $resultado_monitor_infos['Curso'];
$foto_monitor = $resultado_monitor_infos['Foto_Perfil'];
$sala_monitor = $resultado_monitor_infos['Sala'];
$email_monitor = $resultado_monitor_infos['Email'];
$numero_monitorias = $contador_monitorias;
$cor_monitor = $cores_lista_monitorias[$materia_selecionada_monitoria] ?? '#ccc';
