<?php

require_once __DIR__ . '/../utils/con_db.php';
require_once __DIR__ . '/../utils/horarios_monitoria.php';

header("Content-Type: application/json");

session_start();

$registro_academico = $_SESSION['registro'];

$data = $_POST['data'] ?? null;

if (!$data) {
    echo json_encode([
        "status" => "error",
        "mensagem" => "Nenhuma data recebida"
    ]);
    exit;
}

$dataTimestamp = strtotime($data);
$hojeTimestamp = strtotime(date("Y-m-d"));

if ($dataTimestamp >= $hojeTimestamp) {
    $resposta["validacao_data"] =[
        "status" => "Válido",
        "mensagem" => "Data válida (hoje ou futura).",
        "disponivel" => true,
        "cor" => "green"
    ];
}else {
    echo json_encode([
        "status" => "inválido",
        "mensagem" => "Data inválida (hoje ou futura).",
        "disponivel" => false,
        "cor" => "red"
    ]);
    exit;
}




$sql = "SELECT Horario,  Concluida, Localizacao FROM Monitoria WHERE Data = :data AND Registro_Academico = :registro";
$stmt = $pdo->prepare($sql);
$stmt->bindParam('data', $data);
$stmt->bindParam('registro', $registro_academico);
$stmt->execute();

$resultado_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$horariosDisponiveis = [];
$horariosIndisponiveis = [];

foreach ($resultado_data as $resultado) {
    $hora = new DateTime($resultado['Horario']);
    $horariosIndisponiveis[] = $hora->format('H:i');
}

$horariosDisponiveis = array_diff($horarios_monitoria, $horariosIndisponiveis);
$horariosDisponiveis = array_values($horariosDisponiveis);


if ($stmt->rowCount() > 0) {
    $resposta["ocupacao"] = [
        "horarios_disponiveis" => $horariosDisponiveis,
        "horarios_indisponiveis" => $horariosIndisponiveis,
        "disponivel" => false
    ];
} else {
    $resposta["ocupacao"] = [
        "horarios_disponiveis" => $horarios_monitoria,
        "horarios_indisponiveis" => '',
        "disponivel" => true
    ];
}

echo json_encode($resposta);
