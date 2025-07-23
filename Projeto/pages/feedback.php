<?php

    $nameCSS = "feedback";
    $titlePage = "Página de Feedback";

    include_once "header.php";
?>

<main class="principal">
        <h1 class="principal-titulo">Sinta-se a vontade para deixar abaixo seu feedback sobre o site!</h1>
        <form action="#">
            <div class="principal-emojis">
                <label  class="principal-emojis-label" id="1" for="nota1"><img src="../public/img/emojisAvaliacao/1.png" class="principal-emojis-emoji" alt="Carinha triste"></label>
                <input class="principal-emojis-input" id="1" type="checkbox" name="nota1" id="nota1">
                <label class="principal-emojis-label" id="2" for="nota2"><img src="../public/img/emojisAvaliacao/2.png" class="principal-emojis-emoji" alt="Carinha fechada"></label>
                <input class="principal-emojis-input" id="2" type="checkbox" name="nota2" id="nota2">
                <label class="principal-emojis-label" id="3" for="nota3"><img src="../public/img/emojisAvaliacao/3.png" class="principal-emojis-emoji" alt="Carinha alegre"></label>
                <input class="principal-emojis-input" id="3" type="checkbox" name="nota3" id="nota3">
                <label class="principal-emojis-label" id="4" for="nota4"><img src="../public/img/emojisAvaliacao/4.png" class="principal-emojis-emoji" alt="Carinha super alegre"></label>
                <input class="principal-emojis-input" id="4" type="checkbox" name="nota4" id="nota4">
            </div>
            <textarea class="principal-descricao" name="desricao" id="descricao"></textarea>
            <input class="principal-submit" type="submit" value="Enviar">
        </form>
        
    </main>

<?php

$scripts = ["feedbackJS/feedback"];
    
include_once "footer.php";

?>