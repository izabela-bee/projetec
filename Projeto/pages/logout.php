<?php
 session_start();
 session_destroy();
 header('Location: login.php?mensagem=usuario_deslogado');
 exit;
 ?>
