<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo !empty($titlePage) ? $titlePage : 'MoniFácil'; ?></title>
    <link rel="stylesheet" href="/css/menu.css">
    <link rel="stylesheet" href="/css/<?php echo !empty($nameCSS) ? $nameCSS : ''; ?>.css">
</head>

<body>
    <header class="cabecalho">
        <nav class="cabecalho-navegacao">
            <div class="cabecalho-navegacao-menu">
                <img class="cabecalho-navegacao-menu-imagem" src="/img/menuItens/menu-hamburguer.png" alt="Menu hamburguer para ser aberto">
                <ul class="cabecalho-navegacao-menu-elementos">
                    <a href="disciplinas" ><li  class="cabecalho-navegacao-menu-elemento">Disciplinas</li></a>
                    <a><li  class="cabecalho-navegacao-menu-elemento">Agenda</li></a>
                    <a href="chat"><li  class="cabecalho-navegacao-menu-elemento">Chat</li></a>
                    <a href="feedback"><li  class="cabecalho-navegacao-menu-elemento">Feedback</li></a>
                    <a href="monitores" ><li  class="cabecalho-navegacao-menu-elemento">Monitores</li></a>
                    <a><li  class="cabecalho-navegacao-menu-elemento">Ser Monitor</li></a>
                </ul>
            </div>
            <a href="inicial">
                <img class="cabecalho-navegacao-menu-logo" src="/img/menuItens/logo.png" alt="Lodo do site MoniFacil">
            </a>

            <div class="cabecalho-navegacao-menu-perfil">
                <img class="cabecalho-navegacao-menu-perfil-imagem" src="/img/menuItens/meu-perfil.png" alt="Foto para acessar o meu perfil">
                <div class="menu-quebra">
                    <ul class="cabecalho-navegacao-menu-perfil-elementos aberto">
                        <a href='perfil' class="perfil"><li class="cabecalho-navegacao-menu-perfil-elemento">Meu Perfil</li></a>
                        <a href="registrar" class="perfil"><li class="cabecalho-navegacao-menu-perfil-elemento">Log out</li></a>
                    </ul>
                </div>
            </div>
        </nav>
    </header>