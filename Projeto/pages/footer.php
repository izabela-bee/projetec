<script src="../public/js/menu.js"></script>

<?php if(!empty($scripts)) foreach($scripts as $script): ?>

    <?php if(empty($script)) continue; ?>
    <script src="../public/js/<?php echo $script; ?>.js"></script>

<?php endforeach; ?>
</body>

</html>
