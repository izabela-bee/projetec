<?php
$pageTitle = "Página de Chat";
$nameCSS = "chat";
include_once "header.php";

require_once __DIR__ . '/../src/utils/con_db.php';

$sql = "SELECT Registro_Academico, Nome FROM Aluno WHERE Registro_Academico = :registro";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':registro', $_SESSION['registro']);
$stmt->execute();
$current_user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<main>
    <!-- Dynamic contacts list loaded by JavaScript -->
    <div class="lista-nomes">
        <!-- Contacts will be populated by JavaScript -->
    </div>
    
    <div class="fundo">
        <!-- Dynamic header with selected contact -->
        <div class="cabecalho-fundo">
            <img class="icone-cabecalho" src="../public/img/fotosPerfil/perfilPadrao.png" alt="icone">
            <div class="nome-titulo-monitor">
                <h2>Selecione um contato</h2>
                <p class="titulo-monitor-cabecalho">Escolha um monitor ou aluno para conversar</p>
            </div>
        </div>

        <!-- Dynamic messages container -->
        <div class="mensagens-container">
            <img class="imagem-gato" src="../public/img/gato_trabalhando.gif" alt="Gato trabalhando">
            <p id="texto">Nenhuma conversa selecionada</p>
        </div>

        <!-- Message input form -->
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

<!-- Set current user ID for JavaScript -->
<script>
    window.currentUserId = '<?php echo htmlspecialchars($current_user['Registro_Academico']); ?>';
</script>

<?php
    $scripts = ['chatJS/chat'];
    include_once "footer.php";
?>
