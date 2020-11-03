<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 4</title>
</head>
<body>
   <?php
   /*Escriba un programa que multiplique los 20 primeros números naturales. 
     Obtendré 1*2*3*4*5*...*20
   */
   $acum=1;
   for ($i=1; $i <= 20 ; $i++) { 
      $acum*=$i;
   }
   echo "La multiplicación es $acum";
   ?>
</body>
</html>