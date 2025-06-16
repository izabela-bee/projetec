<script src="/js/menu.js"></script>

<?php if(!empty($scripts)) foreach($scripts as $script): ?>

    <?php if(empty($script)) continue; ?>
    <script src="/js/<?php echo $script; ?>.js"></script>

<?php endforeach; ?>
</body>

</html>