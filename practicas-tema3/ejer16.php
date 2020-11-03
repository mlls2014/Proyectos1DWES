<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 16</title>
</head>
<body>
   <?php
   /*
   Escriba un programa que compruebe si una variable está vacía, en cuyo caso deberá rellenarla con texto en minúsculas y mostrar dicho texto convertido a mayúsculas en negrita.

   La función más adecuada sería empty
   */
   
   if(empty($a)){
      $a="";
      for($i=0;$i<20;$i++){
         //Por rellenar de forma algo aleatoria. El ascii de la a a la z va del 97 al 122
         //$a.=chr(rand(97,122));
         $a.=chr(rand(ord('a'),ord('z')));
      }
      echo ord('a') . " " . ord('z') . '<br/>';
      echo "La cadena en mayúsculas es " . strtoupper($a);

   }
   ?>

</body>
</html>