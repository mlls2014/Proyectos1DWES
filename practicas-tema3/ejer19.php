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
   El cálculo del factorial se realiza en un bucle que va disminuyendo el valor de una variable y multiplicando todos los valores entre sí, 
   como ya hemos visto anteriormente. Aprovechando este patrón, cree una función que realice la factorial del número que le pasemos por parámetro, 
   ahorrando así líneas de código.
   */

   
   function factorial($num){
      $fact=1;
      if($num>0){
         for ($i=$num; $i > 1 ; $i--) { 
            $fact = $fact * $i;
         }
      }
      return $fact;
   }

   $num=5; //Para probar
   echo "El factorial es " . factorial($num);

   ?>
</body>
</html>