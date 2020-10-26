<?php
  $usuariook = 'pepe';
  $passok = 'abcd';
  if ($_POST['nombre'] == $usuariook && $_POST['pass'] == $passok) {
         session_start();
         $_SESSION["verificado"] = "si";
         echo "Tienes acceso a la página privada";
         echo "<a href='pagina1.php'>Acceda al contenido privado!!</a>";
      } else {  header ("Location: login.php?error=si");   }
