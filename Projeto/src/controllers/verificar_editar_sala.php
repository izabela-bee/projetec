<?php

require_once __DIR__ . '/../utils/con_db.php';
require_once __DIR__ . '/../utils/salas_monitorias.php';
header("Content-Type: application/json");

session_start();

// ------------------------------------------------------------
// 🔹 Dados enviados
// ------------------------------------------------------------
$sala = $_POST['sala'] ?? null;
$horario = $_POST['horario'] ?? null;
$data = $_POST['data'] ?? null;
$idMonitoriaAtual = $_POST['id'] ?? null; // para edição
$salaAtual = $_POST['sala_atual'] ?? null; // ⭐ sala original

if (!$sala || !$horario || !$data) {
    echo json_encode([
        "status" => "erro",
        "mensagem" => "Dados insuficientes enviados."
    ]);
    exit;
}

// ------------------------------------------------------------
// 🔹 Validar se sala existe
// ------------------------------------------------------------
$listaSalas = $lista_Salas;

if (!in_array($sala, $listaSalas)) {
    echo json_encode([
        "validacao_sala" => [
            "status" => "inválido",
            "mensagem" => "Sala inexistente.",
            "disponivel" => false,
            "cor" => "red"
        ]
    ]);
    exit;
}

// ------------------------------------------------------------
// 🔹 Verificar se a sala está ocupada
// ------------------------------------------------------------
$sql = "SELECT ID_Monitoria, Localizacao 
        FROM Monitoria 
        WHERE Data = :data 
        AND Horario = :horario 
        AND Localizacao = :sala";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(":data", $data);
$stmt->bindParam(":horario", $horario);
$stmt->bindParam(":sala", $sala);
$stmt->execute();

$ocupacao = $stmt->fetch(PDO::FETCH_ASSOC);

// ------------------------------------------------------------
// ⭐ SALA ATUAL SEMPRE PERMITIDA ⭐
// ------------------------------------------------------------
if ($sala === $salaAtual) {
    echo json_encode([
        "validacao_sala" => [
            "status" => "válido",
            "mensagem" => "Sala atual mantida.",
            "disponivel" => true,
            "cor" => "green"
        ],
        "ocupacao" => [
            "sala_ocupada" => false
        ]
    ]);
    exit;
}

// ------------------------------------------------------------
// 🔹 Ocupada por outra monitoria
// ------------------------------------------------------------
if ($ocupacao) {
    echo json_encode([
        "validacao_sala" => [
            "status" => "inválido",
            "mensagem" => "Sala já ocupada neste horário.",
            "disponivel" => false,
            "cor" => "red"
        ],
        "ocupacao" => [
            "sala_ocupada" => true
        ]
    ]);
    exit;
}

// ------------------------------------------------------------
// 🔹 Sala livre
// ------------------------------------------------------------
echo json_encode([
    "validacao_sala" => [
        "status" => "válido",
        "mensagem" => "Sala disponível.",
        "disponivel" => true,
        "cor" => "green"
    ],
    "ocupacao" => [
        "sala_ocupada" => false
    ]
]);
