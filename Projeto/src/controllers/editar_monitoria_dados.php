<?php

require_once __DIR__ . '/../utils/con_db.php';



if($pagina_necessaria === 'Editar'){

    $id_monitoria = $_GET['id'];

    $sql_infos_monitoria = 'SELECT Data, Localizacao, Horario, Conteudos_Abordados FROM Monitoria WHERE ID_Monitoria = :id';
    $stmt_infos_monitoria = $pdo->prepare($sql_infos_monitoria);
    $stmt_infos_monitoria->bindParam(':id', $id_monitoria);
    $stmt_infos_monitoria->execute();

    $resultado = $stmt_infos_monitoria->fetch(PDO::FETCH_ASSOC);

    $horario_formatado = substr($resultado['Horario'], 0, 5);

    $data = $resultado['Data'];
    $sala = $resultado['Localizacao'];
    $conteudos = $resultado['Conteudos_Abordados'];
}