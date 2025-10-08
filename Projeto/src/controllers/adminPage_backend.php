<?php

require_once __DIR__ . '/../utils/con_db.php';
require_once __DIR__ . '/../utils/cores_monitor.php';

$materias = array_keys($cores_lista_monitorias);

$lista_aluno_final = [];


$sql_alunos = 'SELECT Nome, Registro_Academico, Foto_Perfil, Curso, E_Monitor FROM Aluno';
$stmt_aluno = $pdo->prepare($sql_alunos);
$stmt_aluno->execute();

$resultado_alunos = $stmt_aluno->fetchAll(PDO::FETCH_ASSOC);

foreach($resultado_alunos as $aluno){
    if($aluno['E_Monitor'] == 1){
        $sql_monitoria_materia = 'SELECT disciplina_monitorada FROM Monitora WHERE Registro_Academico = :registro';
        $stmt_monitoria_materia = $pdo->prepare($sql_monitoria_materia);
        $stmt_monitoria_materia->bindParam(':registro', $aluno['Registro_Academico']);
        $stmt_monitoria_materia->execute();

        $resultado_monitoria = $stmt_monitoria_materia->fetch(PDO::FETCH_ASSOC);

        $materia_partes = explode('-', $resultado_monitoria['disciplina_monitorada']);
        $materia_selecionada = $materia_partes[0];

        $lista_aluno_final[$aluno['Registro_Academico']] = [
            'id' => $aluno['Registro_Academico'],
            'nome' => $aluno['Nome'],
            'foto_perfil' => $aluno['Foto_Perfil'],
            'curso' => $aluno['Curso'],
            'e_monitor' => 'sim',
            'materia_monitorada' => $materia_selecionada
        ]; 
    } else {
        $lista_aluno_final[$aluno['Registro_Academico']] = [
            'id' => $aluno['Registro_Academico'],
            'nome' => $aluno['Nome'],
            'foto_perfil' => $aluno['Foto_Perfil'],
            'curso' => $aluno['Curso'],
            'e_monitor' => 'nao'
        ]; 
    }

}