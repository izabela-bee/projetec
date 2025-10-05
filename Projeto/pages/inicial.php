<?php
    $titlePage = 'Página Inicial';
    $nameCSS = 'inicial';
    include_once "header.php";
    require_once __DIR__ . '/../src/controllers/inicial_backend.php';
?>

<main class="principal">
        <section class="principal-secao1">
            <h1 class="principal-secao1-titulo">Monitores de Elite:</h1>
            <h2 class="principal-secao1-subtitulo">Sua Jornada Acadêmica, Nossas Melhores Mentes</h2>
            <h3 class="principal-secao1-texto">Conheça alguns de nossos monitores</h3>
        </section>
        
            <section class="principal-secao2">
            <?php foreach($monitoresSelecionados as $registro => $dados): ?>
                <div class="principal-secao2-card">
                    <h2 class="principal-secao2-card-nome"><?php echo htmlspecialchars($dados['nome']); ?></h2>
                    <img src="<?php echo ($dados['foto_perfil'] === null || $dados['foto_perfil'] === '') ?  '../public/img/fotosPerfil/avatar.png' :  htmlspecialchars($dados['foto_perfil']); ?>" class="principal-secao2-card-imagem"/>
                    <p class="principal-secao2-card-titulo">Monitor(a) de <?php echo htmlspecialchars($dados['disciplina']); ?></p>
                    <h3 class="principal-secao2-card-turma"><?php echo htmlspecialchars($dados['curso']); ?></h3>
                </div>

            <?php endforeach; ?>
            </section>
            
    </main>

    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    
<?php
    $scripts = ['inicialJs/mensagensDeAcessoNegado', 'inicialJs/mensagensDeSucesso'];
    include_once "footer.php";
?>
