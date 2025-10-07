<?php

require_once __DIR__ . '/../utils/con_db.php';
require_once __DIR__ . '/../utils/cores_monitor.php';

$disciplinas = [];
$monitorias = [];

foreach($cores_lista_monitorias as $disciplina => $cor){
    $disciplinas[$disciplina] = $disciplina;
}

$sql_monitorias = 'SELECT ID_Monitoria, Registro_Academico, Horario, Data, Conteudos_Abordados, Concluida, Disciplina FROM Monitoria';

$stmt_monitorias = $pdo->prepare($sql_monitorias);

$stmt_monitorias->execute();

$resultado_monitorias = $stmt_monitorias->fetchAll(PDO::FETCH_ASSOC);

$cor = '';

foreach($resultado_monitorias as $monitoria){
    $materia_partes = explode('-', $monitoria['Disciplina']);
    $materia_selecionada = $materia_partes[0];

    foreach ($cores_lista_monitorias as $cor_monitor => $cor_especifica) {
        if ($cor_monitor === $materia_selecionada) {
            $cor = $cor_especifica;
            break;
        }
    }

    $sql_monitor = 'SELECT Nome, Curso FROM Aluno WHERE Registro_Academico = :registro';
    $stmt_monitor = $pdo->prepare($sql_monitor);
    $stmt_monitor->bindParam(':registro', $monitoria['Registro_Academico']);
    $stmt_monitor->execute();

    $resultado_monitor = $stmt_monitor->fetch(PDO::FETCH_ASSOC);

    $conteudos_divididos = explode(',', $monitoria['Conteudos_Abordados']);

    $data_formatada = DateTime::createFromFormat('Y-m-d', $monitoria['Data'])->format('d/m/Y');
    $horario_formatado = substr($monitoria['Horario'], 0, 5);

    $monitorias[$monitoria['ID_Monitoria']] = [
        'disciplina' => $materia_selecionada,
        'nome' => $resultado_monitor['Nome'],
        'curso' => $resultado_monitor['Curso'],
        'horario' => $horario_formatado,
        'data' => $data_formatada,
        'conteudos' => $conteudos_divididos,
        'cor' => $cor,
        'id' => $monitoria['ID_Monitoria'],
        'concluida' => $monitoria['Concluida']
    ];
}