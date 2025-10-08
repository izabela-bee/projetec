<?php

require_once __DIR__ . '/../utils/con_db.php';
require_once __DIR__ . '/../utils/cores_monitor.php';


$lista_final = [];

$sql_infos_monitores = 'SELECT Nome, Email, Sala, Curso, Foto_Perfil, Registro_Academico FROM Aluno WHERE E_Monitor = 1';
$stmt_infos_monitores = $pdo->prepare($sql_infos_monitores);
$stmt_infos_monitores->execute();

$resultado_infos_monitores = $stmt_infos_monitores->fetchAll(PDO::FETCH_ASSOC);



foreach($resultado_infos_monitores as $monitor){
    $cor = '';
    $sql_tel_monitor = "SELECT telefone FROM Telefone WHERE Registro_Academico = :registro";
    $stmt_tel_monitor = $pdo->prepare($sql_tel_monitor);
    $stmt_tel_monitor->bindParam(':registro', $monitor['Registro_Academico']);
    $stmt_tel_monitor->execute();
    $resultado_tel_monitor = $stmt_tel_monitor->fetch(PDO::FETCH_ASSOC);

    $sql_materia_monitor = "SELECT disciplina_monitorada FROM Monitora WHERE Registro_Academico = :registro";
    $stmt_materia_monitor = $pdo->prepare($sql_materia_monitor);
    $stmt_materia_monitor->bindParam(':registro', $monitor['Registro_Academico']);
    $stmt_materia_monitor->execute();
    $resultado_materia_monitor = $stmt_materia_monitor->fetch(PDO::FETCH_ASSOC);
    $materia_partes = explode('-', $resultado_materia_monitor['disciplina_monitorada']);
    $materia_selecionada = $materia_partes[0];

    foreach($cores_lista_monitorias as $cor_monitor => $cor_especifica){
        if($cor_monitor === $materia_selecionada){
            $cor = $cor_especifica;
        }
    }

    $lista_final[$monitor['Registro_Academico']] = [
        'nome' => $monitor['Nome'],
        'email' => $monitor['Email'],
        'sala' => $monitor['Sala'],
        'curso' => $monitor['Curso'],
        'foto_perfil' => $monitor['Foto_Perfil'],
        'telefone' => $resultado_tel_monitor['telefone'],
        'disciplina' => $resultado_materia_monitor['disciplina_monitorada'],
        'cor_monitor' => $cor,
        'id' => $monitor['Registro_Academico']
    ];
}


