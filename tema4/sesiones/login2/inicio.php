<?php
$usuariook = 'pepe';
$passok = 'abcd';
if (!empty($_POST['entrar'])) {
   if ($_POST['usuario'] == $usuariook && $_POST['password'] == $passok) {
      session_start();
      $_SESSION['usuario'] = $_POST['usuario'];
      if (!empty($_POST['recuerda'])) {
         setcookie("usuario", $_POST['usuario'], time() + (365 * 24 * 60 * 60));
         setcookie("password", $_POST['password'], time() + (365 * 24 * 60 * 60));
         setcookie("recuerda", $_POST['recuerda'], time() + (365 * 24 * 60 * 60));
      } else {
         if (isset($_COOKIE['usuario'])) {
            setcookie("usuario", "");
         }
         if (isset($_COOKIE['password'])) {
            setcookie("password", "");
         }
         if (isset($_COOKIE['recuerda'])) {
            setcookie("recuerda", "");
         }
      }
      $_SESSION["verificado"] = "si";
      echo "Tienes acceso a la página privada";
      echo "<a href='pagina1.php'>Acceda al contenido privado!!</a>";
   } else {
      header ("Location: login.php?error=si"); 
   }
}
