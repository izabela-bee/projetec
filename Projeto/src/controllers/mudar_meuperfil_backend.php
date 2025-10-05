<?php

require_once __DIR__ . '/../utils/con_db.php';
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $registro_usuario = $_SESSION['registro'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['tel'];

    $sql_infos = 'SELECT Email, Senha FROM Aluno WHERE Registro_Academico = :registro';
    $stmt_infos = $pdo->prepare($sql_infos);
    $stmt_infos->bindParam(':registro', $registro_usuario);
    $stmt_infos->execute();

    $resultado_infos = $stmt_infos->fetch(PDO::FETCH_ASSOC);

    
    if($senha === null || $senha === ''){
        $senha = $resultado_infos['Senha'];
    }

    

    $sql_tel = 'SELECT telefone FROM Telefone WHERE Registro_Academico = :registro';
    $stmt_tel = $pdo->prepare($sql_tel);
    $stmt_tel->bindParam(':registro', $registro_usuario);
    $stmt_tel->execute();

    $resultado_tel = $stmt_tel->fetch(PDO::FETCH_ASSOC);

    $email_correto = $email === $resultado_infos['Email'] ? $resultado_infos['Email'] : $email; 
    $senha_correto = $senha === $resultado_infos['Senha'] ? $resultado_infos['Senha'] : $senha;
    $telefone_correto = $telefone === $resultado_tel['telefone'] ? $resultado_tel['telefone'] : $telefone;

    $sql_update_infos = 'UPDATE Aluno SET Email = :email, Senha = :senha WHERE Registro_Academico = :registro';
    $stmt_update_infos = $pdo->prepare($sql_update_infos);
    $stmt_update_infos->bindParam(':email', $email_correto);
    $stmt_update_infos->bindParam(':senha', $senha_correto);
    $stmt_update_infos->bindParam(':registro', $registro_usuario);
    $ok_update_infos = $stmt_update_infos->execute();

    $sql_update_tel = 'UPDATE Telefone SET telefone = :telefone WHERE Registro_Academico = :registro';
    $stmt_update_tel = $pdo->prepare($sql_update_tel);
    $stmt_update_tel->bindParam(':telefone', $telefone_correto);
    $stmt_update_tel->bindParam(':registro', $registro_usuario);
    $ok_update_tel = $stmt_update_tel->execute();

    if($ok_update_infos && $ok_update_tel){
       header('Location: ../../pages/perfil.php?mensagem=sucesso_atualizacao_informacoes');
       exit;
    } else{
       header('Location: ../../pages/perfil.php?mensagem=erro_atualizacao_informacoes');
       exit;
    }



}