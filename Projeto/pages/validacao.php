<?php
 session_start();
 $users = ['admin' => '1234', '0071111' => 'aluno', '0072222' => 'monitor'];

 $username = $_POST['registro'];
 $password = $_POST['senha'];

 if (isset($users[$username]) && $users[$username] === $password) {
 $_SESSION['username'] = $username;
 header('Location: inicial.php');
 exit;
 } else {
	 echo "Credenciais inválidas!";
 }

 ?>
