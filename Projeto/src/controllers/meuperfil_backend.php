<?php

require_once __DIR__ . '/../utils/con_db.php';

if(!isset($_SESSION['status'])){
    header('Location: ../pages/login.php?mensagem=usuario_nao_logado');
    exit;
}

$sql_user_infos = 'SELECT Nome, Email, Curso, Foto_Perfil, E_Monitor FROM Aluno WHERE Registro_Academico = :registro';
$stmt_user_infos = $pdo->prepare($sql_user_infos);
$stmt_user_infos->bindParam(':registro', $_SESSION['registro']);
$stmt_user_infos->execute();

$resultado_infos = $stmt_user_infos->fetch(PDO::FETCH_ASSOC);

$sql_tel = 'SELECT telefone FROM telefone WHERE Registro_Academico = :registro';
$stmt_tel = $pdo->prepare($sql_tel);
$stmt_tel->bindParam(':registro', $_SESSION['registro']);
$stmt_tel->execute();

$resultado_tel = $stmt_tel->fetch(PDO::FETCH_ASSOC);


$registro_academico_usuario = $_SESSION['registro'];
$nome_usuario = $resultado_infos['Nome'];
$email_usuario = $resultado_infos['Email'];
$curso_usuario = $resultado_infos['Curso'];
$foto_perfil_usuario = $resultado_infos['Foto_Perfil'];
$telefone_usuario = $resultado_tel['telefone'];
$monitor_usuario = $resultado_infos['E_Monitor'];