<?php

require_once __DIR__ . '/../utils/con_db.php';

$id_monitoria = $_GET['id'];
$lista_usuarios = [];

$sql_infos_monitoria = 'SELECT Data, Localizacao, Horario, Conteudos_Abordados, Feedback FROM Monitoria WHERE ID_Monitoria = :id';
$stmt_infos_monitoria = $pdo->prepare($sql_infos_monitoria);
$stmt_infos_monitoria->bindParam(':id', $id_monitoria);
$stmt_infos_monitoria->execute();

$resultado = $stmt_infos_monitoria->fetch(PDO::FETCH_ASSOC);

$horario_formatado = substr($resultado['Horario'], 0, 5);

$data = $resultado['Data'];
$sala = $resultado['Localizacao'];
$conteudos = $resultado['Conteudos_Abordados'];
$feedback = $resultado['Feedback'];

$sql_alunos_inscritos = 'SELECT Registro_Academico, Presenca_confirmada FROM Alunos_Inscritos WHERE ID_Monitoria = :id';
$stmt_alunos_inscritos = $pdo->prepare($sql_alunos_inscritos);
$stmt_alunos_inscritos->bindParam(':id', $id_monitoria);
$stmt_alunos_inscritos->execute();

$resultado_alunos_inscritos = $stmt_alunos_inscritos->fetchAll(PDO::FETCH_ASSOC);


foreach($resultado_alunos_inscritos as $aluno){
    $sql_infos_aluno = 'SELECT Nome, Curso FROM Aluno WHERE Registro_Academico = :registro';
    $stmt_infos_aluno = $pdo->prepare($sql_infos_aluno);
    $stmt_infos_aluno->bindParam(':registro', $aluno['Registro_Academico']);
    $stmt_infos_aluno->execute();
    $resultado_dados_aluno = $stmt_infos_aluno->fetch(PDO::FETCH_ASSOC);


    $lista_usuarios[$aluno['Registro_Academico']] = [
        'nome' => $resultado_dados_aluno['Nome'],
        'curso' => $resultado_dados_aluno['Curso'],
        'registro_academico' => $aluno['Registro_Academico'],
        'presenca' => $aluno['Presenca_confirmada']
    ];
}
