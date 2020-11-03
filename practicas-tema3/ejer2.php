<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 2</title>
</head>
<body>
   <?php
   /*
   Escriba un programa que imprima por pantalla los cuadrados (el número multiplicado por sí
   mismo) de los 10 primeros números naturales.
   */
   echo "El cuadrado de los 10 primeros números naturales:<br/>";
   for ($i=1; $i <= 10 ; $i++) { 
      echo "El cuadrado de $i es " . $i*$i . "<br/>";
   }

   ?>
</body>
</html>