<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 13</title>
</head>
<body>
   <?php
   /*
   Escriba un programa que muestre la dirección IP del usuario que visita nuestra web y, si usa Firefox, que le muestre un mensaje de enhorabuena.

   Mirar ayuda de variable superglobal $_SERVER
   */

   echo "La dirección IP del usuario es: " . $_SERVER['REMOTE_ADDR'] . "<br/>";
   echo "Información sobre el navegador:" . $_SERVER['HTTP_USER_AGENT'] . "<br/>";

   if(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== false){   
      //Importante usar !== (no idéntico) ya que si la cadena Firefox se encuentra en la posición 0, 0 se convertiría a false con el operador != y no sería encontrado Firefox
      echo "¡Enhorabuena, usa Firefox!";
   }
      
   ?>
</body>
</html>