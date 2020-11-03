<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 17</title>
</head>
<body>
   <?php
   /*
   Cree un script PHP que tenga tres variables, una tipo array, otra tipo string y otra booleana y que 
   imprima un mensaje indicando el tipo de variable del que se trate.
   */
   $arr=[1,2,3,4];
   $cad='Hola';
   $bol=true;

   echo '$arr es de tipo ' . gettype($arr) . ' $cad es de tipo ' . gettype($cad) . ' $bol es de tipo ' . gettype($bol);

   ?>
</body>
</html>