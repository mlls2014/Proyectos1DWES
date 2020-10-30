<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 5</title>
</head>
<body>
   <!--Para probar el programa -->
   <p><a href="ejer5.php?num=7">Pincha aquí para probar con la tabla del 7</a></p>
   <?php
   /*
   Escriba un programa que imprima por pantalla la tabla de multiplicar del número pasado
   mediante un parámetro GET por la URL
   */
   if (isset($_GET['num'])){ //existe el parámetro por URL num
      $num=$_GET['num'];
      echo "<p>Tabla de multiplicar del $num:</p>";
      for ($i=1; $i <= 10; $i++) { 
         echo "$num * $i = " . $num*$i . "<br/>";
      }
   }

   ?>
</body>
</html>