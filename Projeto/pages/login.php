<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../public/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
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
                <h2 class="principal-secao-titulo-conteudo">Login</h2>
            </div>
            <form class="principal-formulario" data-form>

                <label for="registro" class="principal-formulario-label">Registro Acadêmico:</label>
                <input id="registro" class="principal-formulario-input" name="registro" type="text" required>

                <label for="senha" class="principal-formulario-label">Senha:</label>
                <input id="senha" class="principal-formulario-input" name="senha" type="password" required>

                <input class="principal-formulario-submit" id="entrar" name="entrar" value="Entrar" type="submit">

            </form>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<?php
    $scripts = ['loginJs/login'];
    include_once "footer.php";
?>