<?php

require_once __DIR__ . '/../utils/con_db.php';
require_once __DIR__ . '/../utils/salas_monitorias.php';

header("Content-Type: application/json");

session_start();

$registro_academico = $_SESSION['registro'];

$sala = $_POST['sala'] ?? null;
$horario = $_POST['horario'] ?? null;

if(!$sala){
    echo json_encode([
        "status" => "error",
        "mensagem" => "Nenhuma data recebida"
    ]);
    exit;
}


$sql = "SELECT Horario,  Concluida, Localizacao FROM Monitoria WHERE Localizacao = :sala AND Registro_Academico = :registro AND Horario = :horario";
$stmt = $pdo->prepare($sql);
$stmt->bindParam('sala', $sala);
$stmt->bindParam('registro', $registro_academico);
$stmt->bindParam('horario', $horario);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $resposta["validacao_sala"] = [
        "mensagem" => "horario já foi escolhido",
        "disponivel" => false
    ];
} else {
    $resposta["validacao_sala"] = [
        "mensagem" => "horario ainda não foi escolhido",
        "disponivel" => true
    ];
}

echo json_encode($resposta);