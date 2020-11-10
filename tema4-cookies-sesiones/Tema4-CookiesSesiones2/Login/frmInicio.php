<?php
  session_start();
  if(!isset($_SESSION['logueado'])){
     header ("Location: frmLogin.php?error=fuera");
  }
?>

<html>
  <head lang="es">
    <?php require 'includes/header.php'; ?>
  </head>
  <body>
    <?php require 'includes/inicio.php'; ?>
    <?php require 'includes/footer.php'; ?>
  </body>
</html>