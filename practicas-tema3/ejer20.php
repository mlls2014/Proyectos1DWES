<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 20</title>
</head>
<body>
   <?php
   /*
   Utilice una función de PHP para mostrar la fecha actual por pantalla
   */
      date_default_timezone_set('UTC');
      setlocale(LC_ALL, 'es_ES');
      echo date("F j, Y, g:i a") . '<br/>';
      echo date('\e\s \e\l j \d\í\a.');;
   ?>
</body>
</html>