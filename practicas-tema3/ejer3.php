<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 3</title>
</head>
<body>
   <?php
   /*
   Modifique el ejercicio anterior para que muestre al lado de cada cuadrado si es un número
   par o impar.
   */
   echo "El cuadrado de los 10 primeros números naturales:<br/>";
   for ($i=1; $i <= 10 ; $i++) { 
      //echo "El cuadrado de $i es " . $i*$i . ". " . (($i*$i)%2==0?"El cuadrado es par.":"El cuadrado es impar.") . "<br/>";
      echo "El cuadrado de $i es " . $i*$i . ". ";
      if(($i*$i)%2==0){
         echo "El cuadrado es par.";
      }else{
         echo "El cuadrado es impar.";
      }
      echo "<br/>";
   }

   ?>
</body>
</html>