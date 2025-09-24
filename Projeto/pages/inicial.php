<?php
    $titlePage = 'Página Inicial';
    $nameCSS = 'inicial';
    session_start();
    if (isset($_SESSION['username'])) {
	    header('Location: login.php');
	    exit;
     }
    include_once "header.php";
?>

<main class="principal">
        <section class="principal-secao1">
            <h1 class="principal-secao1-titulo">Monitores de Elite:</h1>
            <h2 class="principal-secao1-subtitulo">Sua Jornada Acadêmica, Nossas Melhores Mentes</h2>
            <h3 class="principal-secao1-texto">Conheça alguns de nossos monitores</h3>
        </section>
        <section class="principal-secao2">
            <div class="principal-secao2-card">
                <h2 class="principal-secao2-card-nome">Gabriela Nunes</h2>
                <div  class="principal-secao2-card-imagem gabriela"></div>
                <p class="principal-secao2-card-titulo">Monitor(a) de História II</p>
                <h3 class="principal-secao2-card-turma">ELET II</h3>
            </div>
            <div class="principal-secao2-card">
                <h2 class="principal-secao2-card-nome">Bernardo Bento</h2>
                <div class="principal-secao2-card-imagem bernardo"></div>
                <p class="principal-secao2-card-titulo">Monitor(a) de WEB II</p>
                <h3 class="principal-secao2-card-turma">INFO III</h3>
            </div>
            <div class="principal-secao2-card">
                <h2 class="principal-secao2-card-nome">Letícia Alves</h2>
                <div class="principal-secao2-card-imagem leticia"></div>
                <p class="principal-secao2-card-titulo">Monitor(a) de Biologia III</p>
                <h3 class="principal-secao2-card-turma">ADM III</h3>
            </div>
        </section>
    </main>
    
<?php
    $scripts = [];
    include_once "footer.php";
?>
