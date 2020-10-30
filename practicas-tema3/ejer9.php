<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 9</title>
</head>
<body>
   <?php
   /*
   Escriba un programa que muestre todos los números pares existentes entre el 1 y el 100. 
   */
   echo "<p>Los números pares del 1 al 100</p>";
   for ($i=2; $i <= 100 ; $i+=2) { 
      echo "$i<br/>";
   }
   ?>
</body>
</html>