<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../public/css/registrar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Konkhmer+Sleokchher&display=swap"
        rel="stylesheet">
</head>

<body>
    <header class="cabecalho">
        <div class="cabecalho-logo">
            <img src="../public/img/menuItens/logo.png" alt="Logo monifacil" class="cabecalho-logo-conteudo">
        </div>
    </header>

<main class="principal">
    <section class="principal-secao">
        <div class="principal-secao-titulo">
            <h2 class="principal-secao-titulo-conteudo">Registrar</h2>
        </div>
        <form class="principal-formulario" data-form>
            <div class="principal-formulario-container">
                <label for="registro" class="principal-formulario-label">Registro Acadêmico:</label>
                <input id="registro" class="principal-formulario-input" name="registro" type="text" required placeholder="Ex: 0084182">
            </div>
            <div class="principal-formulario-container">
                <label for="email" class="principal-formulario-label">Email:</label>
                <input id="email" class="principal-formulario-input" name="email" type="email" required placeholder="Ex: example@gmail.com">
            </div>
            <div class="principal-formulario-container">
                <label for="senha" class="principal-formulario-label">Senha:</label>
                <input id="senha" class="principal-formulario-input" name="senha" type="password" required>
            </div>
            <div class="principal-formulario-container">
                <label for="senha-confirm" class="principal-formulario-label">Confirmar senha:</label>
                <input id="senha-confirm" class="principal-formulario-input" name="senha-confirm" type="password" required>
                <!-- <span id="erro-senha" class="erro-mensagem"></span> -->
            </div>
            <input class="principal-formulario-submit" id="entrar" name="entrar" value="Entrar" type="submit">
        </form>
    </section>
</main>



<?php
    $scripts = ['registrarJS/registrar'];
    include_once "footer.php";
?>