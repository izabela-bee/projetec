<?php

$title = "Perfil do Usuário";
$nameCSS = "perfil";

include_once "header.php";
?>
<main class="principal">
        <form class="formulario">
            <div class="formulario-superior">
                <div class="formulario-superior-itens">
                    <h1 class="formulario-superior-titulo">Meu perfil</h1>
                    <label class="formulario-superior-label">
                        <input class="formulario-superior-label-input" type="file" name="fotoPerfil">
                        <img class="formulario-superior-label-img" src="../public/img/fotosPerfil/avatar.png" alt="">
                    </label>
                </div>
                <div class="formulario-superior-infosUser">
                    <h2 class="formulario-superior-infosUser-nome">Julia Costa Silva</h2>
                    <h3 class="formulario-superior-infosUser-registro">Registro Acadêmico: 0079412</h3>
                </div>
            </div>
            <div class="formulario-inferior">
                <div class="formulario-inferior-container">
                    <div class="formulario-inferior-container-labels">
                        <label class="formulario-inferior-container-labels-label">
                            <p class="formulario-inferior-container-labels-label-titulo">Email: </p>
                            <input class="formulario-inferior-container-labels-label-input" type="email">
                        </label>
                        <label class="formulario-inferior-container-labels-label">
                            <p class="formulario-inferior-container-labels-label-titulo">Senha: </p>
                            <input class="formulario-inferior-container-labels-label-input" type="password">
                            <img class="formulario-inferior-container-labels-label-eye" src="../public/img/formsComponents/eye.png" alt="">
                        </label>    
                        <label class="formulario-inferior-container-labels-label">
                            <p class="formulario-inferior-container-labels-label-titulo">Curso: </p>
                            <input class="formulario-inferior-container-labels-label-input" type="text">
                        </label>
                        <label class="formulario-inferior-container-labels-label">
                            <p class="formulario-inferior-container-labels-label-titulo">Telefone: </p>
                            <input class="formulario-inferior-container-labels-label-input" type="tel">
                        </label>
                    </div>
                    <button class="formulario-inferior-container-submit" type="submit">Atualizar</button>
                </div>
            </div>
        </form>
    </main>

<?php
    $scripts = [];
    include_once "footer.php";
?>