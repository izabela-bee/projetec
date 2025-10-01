<?php

$host = 'localhost';
$dbname = 'bd_monifacil';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCPETION);

    echo "Conexão realizada com sucesso!";
}catch(PDOExcpetion $e) {
    echo "Erro ao conectar ao banco de dados " . $e->getMessage();
}


