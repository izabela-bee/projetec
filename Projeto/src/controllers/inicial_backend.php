<?php

require_once __DIR__ . '/../utils/con_db.php';

$listaFinal = [];

$sql_infos = 'SELECT Nome, Curso, Foto_Perfil, Registro_Academico FROM Aluno WHERE E_Monitor = 1';
$stmt_infos = $pdo->prepare($sql_infos);
$stmt_infos->execute();

$resultado = $stmt_infos->fetchAll(PDO::FETCH_ASSOC);

foreach($resultado as $monitor){

    $sql_materia_monitor = 'SELECT disciplina_monitorada FROM Monitora WHERE Registro_Academico = :registro';
    $stmt_materia_monitor = $pdo->prepare($sql_materia_monitor);
    $stmt_materia_monitor->bindParam(':registro', $monitor['Registro_Academico']);
    $stmt_materia_monitor->execute();
    $resultado_materia_monitor = $stmt_materia_monitor->fetch(PDO::FETCH_ASSOC);

    $listaFinal[$monitor['Registro_Academico']] = [
        'nome' => $monitor['Nome'],
        'curso' => $monitor['Curso'],
        'foto_perfil' => $monitor['Foto_Perfil'],
        'disciplina' => $resultado_materia_monitor['disciplina_monitorada']
    ];
}

$quantidade = min(3, count($listaFinal));
$chavesSelecionadas = array_rand($listaFinal, $quantidade);

if(!is_array($chavesSelecionadas)){
    $chavesSelecionadas = [$chavesSelecionadas];
}

$monitoresSelecionados = [];

foreach($chavesSelecionadas as $registro){
    $monitoresSelecionados[$registro] = $listaFinal[$registro];
}