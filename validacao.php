<?php
session_start();
$users = ['adminif' => '1234567', '0071111' => 'aluno2025', '0072222' => 'monitor'];

$username = $_POST['registro'];
$password = $_POST['senha'];

//entrada aluno
if (isset($users[$username]) && $users[$username] === $password) {
$_SESSION['registro'] = $username;
header('Location: inicial.php');
exit;
}
//entrada monitor
elseif (isset($users[$username]) && $users[$username] === $password) {
	$_SESSION['registro'] = $username;
	header('Location: inicial.php');
	exit;
}
//entrada adm
elseif (isset($users[$username]) && $users[$username] === $password) {
	$_SESSION['registro'] = $username;
	$_SESSION['permissao'] = $usuario_permissao; 
	header('Location: adminPage.php');
	exit;
}
else {
	echo "Credenciais inválidas!";
}
?>
