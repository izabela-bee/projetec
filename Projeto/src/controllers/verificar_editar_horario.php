<?php

require_once __DIR__ . '/../utils/con_db.php';
require_once __DIR__ . '/../utils/salas_monitorias.php';

header("Content-Type: application/json");

session_start();

// ------------------------------------------------------------
// 🔹 Dados recebidos
// ------------------------------------------------------------
$registro = $_SESSION['registro'] ?? null;
$horario = $_POST['horario'] ?? null;
$data = $_POST['data'] ?? null;
$idMonitoriaAtual = $_POST['id'] ?? null;      // usado na edição
$sala_atual = $_POST['sala_atual'] ?? null;    // ⭐ sala original da edição

if (!$horario || !$data) {
    echo json_encode([
        "status" => "erro",
        "mensagem" => "Horário ou data não enviados."
    ]);
    exit;
}

// ------------------------------------------------------------
// 🔹 Validar se o horário é futuro OU na mesma data após agora
// ------------------------------------------------------------
$hoje = date("Y-m-d");
$agora = date("H:i");

if ($data == $hoje && $horario < $agora) {
    echo json_encode([
        "validacao_horario" => [
            "status" => "inválido",
            "mensagem" => "Horário já passou.",
            "disponivel" => false,
            "cor" => "red"
        ]
    ]);
    exit;
}

// ------------------------------------------------------------
// 🔹 Buscar salas ocupadas no mesmo dia e horário
// ------------------------------------------------------------
$sql = "SELECT Localizacao, ID_Monitoria
        FROM Monitoria 
        WHERE Data = :data 
        AND Horario = :horario";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(":data", $data);
$stmt->bindParam(":horario", $horario);
$stmt->execute();

$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$salasIndisponiveis = [];
$salasDisponiveis = $lista_Salas;

foreach ($resultados as $linha) {

    // ⭐ Ignora a própria monitoria ao editar
    if (!empty($idMonitoriaAtual) && $linha["ID_Monitoria"] == $idMonitoriaAtual) {
        continue;
    }

    // ⭐ Não marcar a sala atual como indisponível
    if (!empty($sala_atual) && $linha["Localizacao"] == $sala_atual) {
        continue;
    }

    // Sala realmente ocupada
    $salasIndisponiveis[] = $linha['Localizacao'];
}

// ------------------------------------------------------------
// 🔹 Montar lista final de salas disponíveis
// ------------------------------------------------------------

// remove ocupadas (exceto a sala_atual)
$salasDisponiveis = array_diff($salasDisponiveis, $salasIndisponiveis);
$salasDisponiveis = array_values($salasDisponiveis);

// ⭐ Garante que sala atual esteja disponível SEMPRE
if (!empty($sala_atual) && !in_array($sala_atual, $salasDisponiveis)) {
    array_unshift($salasDisponiveis, $sala_atual);
}

// ------------------------------------------------------------
// 🔹 Resposta Final
// ------------------------------------------------------------
echo json_encode([
    "validacao_horario" => [
        "status" => "válido",
        "mensagem" => "Horário válido.",
        "disponivel" => true,
        "cor" => "green"
    ],
    "ocupacao" => [
        "salas_disponiveis" => $salasDisponiveis,
        "salas_indisponiveis" => $salasIndisponiveis
    ]
]);
