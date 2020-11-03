<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 10</title>
</head>
<body>
   <?php
   /*
   Escriba un programa que muestre los números múltiplos de un número pasado por la URL
   que existan entre 1 y el 100
   */
   if (isset($_GET['num'])){ //existe el parámetro por URL num
     $num=$_GET['num'];
     echo "<p>Múltiplos de $num entre 1 y 100:</p>";
     for ($i=1; $num*$i <= 100; $i++) { 
        echo $num*$i . "<br/>";
     }
   }
   ?>
</body>
</html>