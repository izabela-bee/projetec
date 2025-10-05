<?php

$title = "Perfil do Usuário";
$nameCSS = "perfil";

include_once "header.php";
require_once __DIR__ . '/../src/controllers/meuperfil_backend.php'
?>
<main class="principal">
        <div class="formulario">
            <div class="formulario-superior">
                <div class="formulario-superior-itens">
                    <h1 class="formulario-superior-titulo">Meu perfil</h1>
                    <label class="formulario-superior-label">
                        <img class="formulario-superior-label-img" src="<?php echo htmlspecialchars($foto_perfil_usuario); ?>" alt="">
                    </label>
                </div>
                <div class="formulario-superior-infosUser">
                    <h2 class="formulario-superior-infosUser-nome"><?php echo htmlspecialchars($nome_usuario); ?> (<?php echo $monitor_usuario === 1 ? 'Monitor(a)' : 'Aluno(a)' ?>)</h2>
                    <h3 class="formulario-superior-infosUser-registro">Registro Acadêmico: <?php echo htmlspecialchars($registro_academico_usuario); ?></h3>
                </div>
            </div>
            <div class="formulario-inferior">
                <form  action="../src/controllers/mudar_meuperfil_backend.php" method="POST"  class="formulario-inferior-container" data-form>
                    <div class="formulario-inferior-container-labels">
                        <label class="formulario-inferior-container-labels-label">
                            <p class="formulario-inferior-container-labels-label-titulo">Email: </p>
                            <input class="formulario-inferior-container-labels-label-input" id="email" type="email" name="email" value="<?php echo htmlspecialchars($email_usuario); ?>">
                        </label>
                        <label class="formulario-inferior-container-labels-label">
                            <p class="formulario-inferior-container-labels-label-titulo">Senha: </p>
                            <input class="formulario-inferior-container-labels-label-input" type="password" id="senha" name="senha">
                            <img class="formulario-inferior-container-labels-label-eye" src="../public/img/formsComponents/eye.png" alt="">
                        </label>    
                        <label class="formulario-inferior-container-labels-label">
                            <p class="formulario-inferior-container-labels-label-titulo">Curso: </p>
                            <input class="formulario-inferior-container-labels-label-input" type="text" value="<?php echo htmlspecialchars($curso_usuario); ?>" disabled>
                        </label>
                        <label class="formulario-inferior-container-labels-label">
                            <p class="formulario-inferior-container-labels-label-titulo">Telefone: </p>
                            <input class="formulario-inferior-container-labels-label-input" type="tel" id="telefone" name="tel" value="<?php echo htmlspecialchars($telefone_usuario); ?>">
                        </label>
                    </div>
                    <button class="formulario-inferior-container-submit" type="submit">Atualizar</button>
                </form>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<?php
    $scripts = ['perfilJs/perfil_form', 'perfilJs/perfil_mensagens_erro', 'perfilJs/perfil_mensagens_sucesso'];
    include_once "footer.php";
?>