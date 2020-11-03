<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 8</title>
</head>
<body>
   <?php
   /*
   Escriba un programa que calcule el factorial de 5.(El factorial de un número entero N es una
   operación matemática que consiste en multiplicar todos los factores N x (N-1) x (N-2) x ... x 1. Así, el
   factorial de 5 (escrito como 5!) es igual a: 5! = 5 x 4 x 3 x 2 x 1 = 120 )
   */
   $num=5; //Para probar
   $fact=1;
   if($num>0){
      for ($i=$num; $i > 1 ; $i--) { 
         $fact = $fact * $i;
      }
   }
   echo "El factorial es $fact";

   ?>
</body>
</html>