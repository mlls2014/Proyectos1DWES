<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 6</title>
</head>
<body>
   <?php
   /*
   Cree un array llamado meses y que almacene el nombre de los doce meses del año.
   Recórralo mediante un bucle FOR para mostrar por pantalla los doce nombres
   */
   $meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
   
   for ($i=0; $i < count($meses) ; $i++ ) { 
       echo "${meses[$i]}<br/>";
   }
   ?>
</body>
</html>