<?php

require_once __DIR__ . '/../utils/con_db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $registro = $_POST['registro'];
    $senha = $_POST['senha'];

    $sql = "SELECT Senha, E_Monitor FROM Aluno WHERE Registro_Academico = :registro";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':registro', $registro);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if($resultado){
        $senha_banco = $resultado['Senha'];
        $e_monitor_banco = $resultado['E_Monitor'];

        if($senha === $senha_banco){
            echo "Login realizado com sucesso";
            session_start();
            if($e_monitor_banco){
                $_SESSION['status'] = 'Monitor';
                header('Location: ../../pages/inicial.php?mensagem=usuario_logado_monitor');
            } else {
                $_SESSION['status'] = 'Aluno';
                header('Location: ../../pages/inicial.php?mensagem=usuario_logado_aluno');
            }
        }else {
            echo "Tente novamente senha incorreta.";
            header('Location: ../../pages/login.php?mensagem=usuario_senha_incorreta');
        }
    } else {
        echo "Usuário não encontrado";
        header('Location: ../../pages/login.php?mensagem=usuario_nao_encontrado');
    }
}
