<?php

require_once __DIR__ . '/../utils/con_db.php';
require_once __DIR__ . '/../utils/salas_monitorias.php';

header("Content-Type: application/json");

session_start();

$registro_academico = $_SESSION['registro'];

$horario = $_POST['horario'] ?? null;
$data = $_POST['data'] ?? null;

if(!$horario){
    echo json_encode([
        "status" => "error",
        "mensagem" => "Nenhuma data recebida"
    ]);
    exit;
}


$sql = "SELECT Horario,  Concluida, Localizacao FROM Monitoria WHERE Horario = :horario AND Registro_Academico = :registro AND Data = :data";
$stmt = $pdo->prepare($sql);
$stmt->bindParam('horario', $horario);
$stmt->bindParam('registro', $registro_academico);
$stmt->bindParam('data', $data);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $resposta["validacao_horario"] = [
        "mensagem" => "horario já foi escolhido",
        "disponivel" => false
    ];
} else {
    $resposta["validacao_horario"] = [
        "mensagem" => "horario ainda não foi escolhido",
        "disponivel" => true
    ];
}

$sql2 = "SELECT Localizacao FROM Monitoria WHERE Horario = :horario AND Data = :data";
$stmt2 = $pdo->prepare($sql2);
$stmt2->bindParam('horario', $horario);
$stmt2->bindParam('data', $data);
$stmt2->execute();

$resposta_salas = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$salasDisponiveis = [];
$salasIndisponiveis = [];

foreach ($resposta_salas as $sala) {
    $salasIndisponiveis[] = $sala['Localizacao'];
}

$salasDisponiveis = array_diff($lista_Salas, $salasIndisponiveis);
$salasDisponiveis = array_values($salasDisponiveis);


if ($stmt2->rowCount() > 0) {
    $resposta["ocupacao"] = [
        "salas_disponiveis" => $salasDisponiveis,
        "salas_indisponiveis" => $salasIndisponiveis,
        "disponivel" => false
    ];
} else {
    $resposta["ocupacao"] = [
        "salas_disponiveis" => $lista_Salas,
        "salas_indisponiveis" => '',
        "disponivel" => true
    ];
}

echo json_encode($resposta);