<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 12</title>
</head>
<body>
   <?php
   /*
   Escriba un programa que defina un array de 5 números enteros cualesquiera y que realice
   sobre él las siguientes operaciones:
   - Recorrerlo y mostrarlo.
   - Ordenarlo y mostrarlo.
   - Mostrará su longitud.
   - Buscar en el vector. 
   */
   //Array con números aleatorios de 1 a 10
   for ($i=0; $i < 5; $i++) { 
      $numeros[]=rand(0,10);
   }
   
   echo "<p>Recorrido:</p>";
   for ($i=0; $i < count($numeros); $i++) { 
      echo $numeros[$i] . '<br/>';
   }

   echo "<p>Ordenarlo:</p>";
   sort($numeros);
   print_r($numeros);

   echo "<p>Su longitud es " . count($numeros) . "</p>";

   //Busca el valor 5
   $pos = array_search(5 , $numeros);
   if($pos!==false){
      echo "El valor 5 se encuentra en la posición $pos";
   }else{
      echo "El valor 5 no se encuentra en el array";
   }
   ?>
</body>
</html>