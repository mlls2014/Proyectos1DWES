<?php
  $usuariook = "pepe";
  $passok = "123";
  
  if((isset($_POST['usuario'])&& isset($_POST['password'])) 
    && (!empty($_POST['usuario'])&& !empty($_POST['password']))){
     if ($_POST['usuario'] == $usuariook && $_POST['password'] == $passok) {
        session_start();
        $_SESSION['logueado']=1;
        $_SESSION['usuario']= $_POST['usuario'];
        header ("Location: frminicio.php");
  }else{
   header ("Location: frmLogin.php?error=datos");
  }  
 }
?>
<html>
  <head lang="es">
    <?php require 'includes/header.php'; ?>
  </head>
  <body>
    <?php require 'includes/login.php'; ?>
    <?php require 'includes/footer.php'; ?>
  </body>
</html>