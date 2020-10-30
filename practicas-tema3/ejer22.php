<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 22</title>
</head>
<body>
   <?php
   /*
   Utilice la función filter_var para comprobar si el email que nos llega por la URL es un email valido.
   */
   if (isset($_GET['email'])){ //existe el parámetro por URL email
     $email=filter_var($_GET['email'],FILTER_SANITIZE_EMAIL);
     
     if (!filter_var($email,FILTER_VALIDATE_EMAIL) || empty($email)){
        echo "No se ha indicado email o no es correcto";
     }else{
        echo "El email es $email";
     }
   }else{
      echo "No existe el parámetro email";
   }
   ?>
</body>
</html>