<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 14</title>
   <style>
      td {border: solid 1px #000000};
   </style>
</head>
<body>
  <?php
  /*
  Escriba un programa que añada valores a un array mientras que su longitud sea menor a 10 y, una vez alcanzado dicho número de elementos, muestre la información del array por pantalla.
  */
   do{
      $array[]=rand(1,100);
   }while(count($array)<10);
   echo "<table>\n";
   foreach ($array as $value) {
      
      echo "<tr><td>$value</td></tr>";
   }
   echo "</table>\n";
  ?> 
</body>
</html>