<?php

require_once __DIR__ . '/../utils/con_db.php';
require_once __DIR__ . '/../utils/horarios_monitoria.php';

header("Content-Type: application/json");

session_start();

// Quem está logado
$registro_academico = $_SESSION['registro'];

// Dados enviados pelo JS
$data = $_POST['data'] ?? null;
$idMonitoriaAtual = $_POST['id'] ?? null;  // ⭐ IMPORTANTE PARA EDIÇÃO ⭐

if (!$data) {
    echo json_encode([
        "status" => "error",
        "mensagem" => "Nenhuma data recebida"
    ]);
    exit;
}

// ========== VALIDAR SE A DATA É HOJE OU FUTURA ==========
$dataTimestamp = strtotime($data);
$hojeTimestamp = strtotime(date("Y-m-d"));

if ($dataTimestamp < $hojeTimestamp) {
    echo json_encode([
        "validacao_data" => [
            "status" => "inválido",
            "mensagem" => "Data inválida (não pode ser passada).",
            "disponivel" => false,
            "cor" => "red"
        ]
    ]);
    exit;
}

$resposta["validacao_data"] = [
    "status" => "válido",
    "mensagem" => "Data válida.",
    "disponivel" => true,
    "cor" => "green"
];

// ========== BUSCAR MONITORIAS DO USUÁRIO NESTA DATA ==========
$sql = "SELECT ID_Monitoria, Horario, Localizacao, Concluida 
        FROM Monitoria 
        WHERE Data = :data 
          AND Registro_Academico = :registro";

$stmt = $pdo->prepare($sql);
$stmt->bindParam('data', $data);
$stmt->bindParam('registro', $registro_academico);
$stmt->execute();

$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Vetores de horários
$horariosIndisponiveis = [];
$horariosDisponiveis = [];

// ========== PROCESSAR HORÁRIOS ==========

foreach ($resultados as $res) {

    // ⭐ IGNORAR O HORÁRIO DA MONITORIA QUE ESTÁ SENDO EDITADA ⭐
    if ($idMonitoriaAtual && $res["ID_Monitoria"] == $idMonitoriaAtual) {
        continue;
    }

    $hora = new DateTime($res['Horario']);
    $horariosIndisponiveis[] = $hora->format('H:i');
}

// Todos os horários possíveis
global $horarios_monitoria;

// Gerar lista de disponíveis
$horariosDisponiveis = array_values(array_diff($horarios_monitoria, $horariosIndisponiveis));

// ========== MONTAR RESPOSTA ==========

$resposta["ocupacao"] = [
    "horarios_disponiveis" => $horariosDisponiveis,
    "horarios_indisponiveis" => $horariosIndisponiveis,
    "disponivel" => count($horariosIndisponiveis) === 0
];

echo json_encode($resposta);
