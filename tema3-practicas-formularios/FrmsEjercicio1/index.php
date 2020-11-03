<?php
/*
 * Generamos el documento completo mediante la inclusión de los ficheros
 * de encabezado(header.php) y pie de página (footer.php) ubicados en la
 * carpeta 'includes' 
 */ 
?>

<!DOCTYPE HTML>
<html>
  <head lang="es">
    <?php require 'includes/header.php'; ?>
  </head>
  <body>
    <?php require 'includes/body.php'; ?>
    <?php require 'includes/footer.php'; ?>
  </body>
</html>