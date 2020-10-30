<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 7</title>
</head>
<body>
   <?php
   /*
   Igual que el anterior pero utilizando elbucleforeach. 
   */
   $meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
   
   foreach ($meses as $value) {
      echo "$value<br/>";
   }
   ?>
</body>
</html>