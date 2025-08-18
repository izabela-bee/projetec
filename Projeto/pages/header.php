<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo !empty($titlePage) ? $titlePage : 'MoniFácil'; ?></title>
    <link rel="stylesheet" href="../public/css/menu.css">
    <link rel="stylesheet" href="../public/css/modal.css">
    <link rel="icon" href="../public/img/menuItens/icone.png" type="image/png">
    <link rel="stylesheet" href="../public/css/<?php echo !empty($nameCSS) ? $nameCSS : ''; ?>.css">
</head>

<body>
    <header class="cabecalho">
        <nav class="cabecalho-navegacao">
            <div class="cabecalho-navegacao-menu">
                <img class="cabecalho-navegacao-menu-imagem" src="../public/img/menuItens/menu-hamburguer.png" alt="Menu hamburguer para ser aberto">
                <ul class="cabecalho-navegacao-menu-elementos">
                    <a href="disciplinas.php" ><li  class="cabecalho-navegacao-menu-elemento">Disciplinas</li></a>
                    <a><li  class="cabecalho-navegacao-menu-elemento">Agenda</li></a>
                    <a href="chat.php"><li  class="cabecalho-navegacao-menu-elemento">Chat</li></a>
                    <a href="feedback.php"><li  class="cabecalho-navegacao-menu-elemento">Feedback</li></a>
                    <a href="monitores.php" ><li  class="cabecalho-navegacao-menu-elemento">Monitores</li></a>
                    <a href="minhas_monitorias.php"> <li  class="cabecalho-navegacao-menu-elemento">Minhas Monitorias</li></a>
                    <a href="adminPage.php"> <li  class="cabecalho-navegacao-menu-elemento">Admin page</li></a>
                </ul>
            </div>
            <a href="inicial.php">
                <img class="cabecalho-navegacao-menu-logo" src="../public/img/menuItens/logo.png" alt="Logo do site MoniFacil">
            </a>

            <div class="cabecalho-navegacao-menu-perfil">
                <img class="cabecalho-navegacao-menu-perfil-imagem" src="../public/img/menuItens/meu-perfil.png" alt="Foto para acessar o meu perfil">
                <div class="menu-quebra">
                    <ul class="cabecalho-navegacao-menu-perfil-elementos aberto">
                        <a href='perfil.php' class="perfil"><li class="cabecalho-navegacao-menu-perfil-elemento">Meu Perfil</li></a>
                        <a href="registrar.php" class="perfil"><li class="cabecalho-navegacao-menu-perfil-elemento">Log out</li></a>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
