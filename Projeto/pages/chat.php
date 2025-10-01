<?php
$pageTitle = "Página de Chat";
$nameCSS = "chat";
include_once "header.php";
?>

<main>
        <div class="lista-nomes">
            <div class="caixa-nome">
                <div class="caixa-matematica">
                    <div>
                        <h1 class="nome-monitor">Giovana</h1>
                        <p class="titulo-monitor-caixa-nome">Matemática</p>
                    </div>
                </div>
                <img class="icone-contato" src="../public/img/fotosPerfil/perfilPadrao.png">
            </div>
            <div class="caixa-nome">
                <div class="caixa-portugues">
                    <div>
                        <h1 class="nome-monitor">Rafael</h1>
                        <p class="titulo-monitor-caixa-nome">Português</p>
                    </div>
                </div>
                <img class="icone-contato" src="../public/img/fotosPerfil/perfilPadrao.png">
            </div>
            <div class="caixa-nome-lucas">
                <div class="caixa-historia">
                    <div>
                        <h1 class="nome-monitor">Lucas</h1>
                        <p class="titulo-monitor-caixa-nome">História</p>
                    </div>
                </div>
                <img class="icone-contato" src="../public/img/fotosPerfil/perfilPadrao.png">
            </div>
            <div class="caixa-nome">
                <div class="caixa-elet-analogica">
                    <div>
                        <h1 class="nome-monitor">Gabriel</h1>
                        <p class="titulo-monitor-caixa-nome">Elet. Analógica</p>
                    </div>
                </div>
                <img class="icone-contato" src="../public/img/fotosPerfil/perfilPadrao.png">
            </div>
            <div class="caixa-nome">
                <div class="caixa-biologia">
                    <div>
                        <h1 class="nome-monitor">Ana</h1>
                        <p class="titulo-monitor-caixa-nome">Biologia</p>
                    </div>
                </div>
                <img class="icone-contato" src="../public/img/fotosPerfil/perfilPadrao.png">
            </div>
            <div class="caixa-nome">
                <div class="caixa-portugues">
                    <div>
                        <h1 class="nome-monitor">Júlia</h1>
                        <p class="titulo-monitor-caixa-nome">Português</p>
                    </div>
                </div>
                <img class="icone-contato" src="../public/img/fotosPerfil/perfilPadrao.png">
            </div>
            <div class="caixa-nome">
                <div class="caixa-quimica">
                    <div>
                        <h1 class="nome-monitor">Amanda</h1>
                        <p class="titulo-monitor-caixa-nome">Química</p>
                    </div>
                </div>
                <img class="icone-contato" src="../public/img/fotosPerfil/perfilPadrao.png">
            </div>
            <div class="caixa-nome">
                <div class="caixa-fisica">
                    <div>
                        <h1 class="nome-monitor">Frederico</h1>
                        <p class="titulo-monitor-caixa-nome">Física</p>
                    </div>
                </div>
                <img class="icone-contato" src="../public/img/fotosPerfil/perfilPadrao.png">
            </div>
        </div>
        <div class="fundo">
            <div class="cabecalho-fundo">
                <img class="icone-cabecalho" src="../public/img/fotosPerfil/perfilPadrao.png" alt="icone">
                <div class="nome-titulo-monitor">
                    <h2>Lucas</h2>
                    <p class="titulo-monitor-cabecalho">Monitor de História</p>
                </div>
            </div>
            <div class="mensagens-container"> <img src="../public/img/gato_trabalhando.gif" alt="gato mexendo num computador" class="imagem-gato" width="500px" height="500px"> <label id="texto">Estamos trabalhando nisso!</label>
                <h2 class="mensagens-aviso"> Você só pode enviar cinco mensagens até ser respondido!</h2>
                <div class="mensagens-geral direita">
                    <p class="texto">Olá! Tudo bem? Gostaria 
                         de marcar uma monitoria de história. 
                         Você tem disponibilidade?</p>
                    <p class="hora">15:00</p>
                  </div>
                  <div class="mensagens-geral esquerda">
                    <p class="texto">Olá!! Claro! Qual o melhor 
                                     horário para você?</p>
                    <p class="hora">15:01</p>
                  </div>
            </div>
            <div class="input-container">
                <form class="form-input" method="post">
                    <label>
                        <img class="icone-file" width="20px" height="20px" src="../public/img/formsComponents/anexos.png" alt="ícone anexo">
                        <input type="file" name="file">
                    </label>
                    <input type="text" name="text" placeholder="Mensagem">
                    <label>
                        <img class="icone-microfone" src="../public/img/formsComponents/microfone.png" alt="ícone microfone">
                        <input type="button" name="microfone">
                    </label>
                </form>
            </div>
        </div>
    </main>

<?php
    $scripts = [];
    include_once "footer.php";
?>

