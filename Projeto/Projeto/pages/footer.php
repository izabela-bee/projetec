<?php
if (basename($_SERVER['PHP_SELF']) !== 'login.php') {
    echo '<script src="../public/js/menu.js"></script>';
}

?>

<?php if(!empty($scripts)) foreach($scripts as $script): ?>

    <?php if(empty($script)) continue; ?>
    <script src="../public/js/<?php echo $script; ?>.js" type="module"></script>

<?php endforeach; ?>

<script>
    setTimeout(() => {
        const currentPage = window.location.pathname.split("/").pop();
        if(currentPage !== "editar_monitoria.php" && currentPage !== 'relatorio.php' && currentPage !==  'modal.php' && currentPage !== 'visualizacao_monitoria.php' && currentPage !== 'visualizacao_monitor.php'){
            window.history.replaceState({}, document.title, window.location.pathname);
        }
        
    }, 1000);
</script>
</body>

</html>
