<?php

require_once __DIR__ . '/con_db.php';

$sql = 'SELECT Registro_Academico, Nome, Curso, Email, Foto_Perfil, E_Monitor 
        FROM Aluno';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

$lista_users = [];

foreach ($resultado as $user) {

    $item = [
        'id'    => $user['Registro_Academico'],
        'name'  => $user['Nome'],
        'class' => $user['Curso'],
        'email' => $user['Email'],
        'avatar' => !empty($user['Foto_Perfil']) 
                        ? $user['Foto_Perfil'] 
                        : '../public/img/fotosPerfil/avatar.png'
    ];

    // Se for monitor, pegar as matérias monitoradas
    if ($user['E_Monitor'] == '1') {

        $item['monitor'] = true;

        $sql_monitor = 'SELECT Disciplina_Monitorada 
                        FROM Monitora 
                        WHERE Registro_Academico = :id';

        $stmt_monitor = $pdo->prepare($sql_monitor);
        $stmt_monitor->bindParam(':id', $user['Registro_Academico']);
        $stmt_monitor->execute();

        // pega todas as disciplinas como array simples
        $materiasMonitor = $stmt_monitor->fetchAll(PDO::FETCH_COLUMN);

        // sempre salvar em array (mesmo se vier vazio)
        $item['subjects'] = $materiasMonitor ?: [];
    }

    $lista_users[] = $item;
}
