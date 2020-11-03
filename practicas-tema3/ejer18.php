<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 18</title>
   <style>
      table{border-collapse:collapse;}
      th,tr,td{
	      border:1px solid #000;
	      width:150px;
	      height:45px;
	      vertical-align:middle;
	      text-align:center;
      }
      th{
	      color:#fff;
	      background-color: #252525;
      }

      tr:nth-child(odd) td{
	      background-color:#eee;
      }
   </style>
</head>
<body>
   <?php
   /*
   Cree un array con el contenido de la siguiente tabla ... Cree un script PHP que recorra y muestre la tabla en HTML con el contenido del array
   */
   $arr=['Frutas' => ['Manzana','Naranja','Sandía','Fresa'], 
         'Deportes' => ['Fútbol','Tenis','Baloncesto','Beisbol'], 
         'Idiomas' => ['Español','Inglés','Francés','Italiano']];
   
   //Tal y como he construido el array mostrarlo por pantalla como sale en el enunciado del problema no se resuelve con un foreach dentro de otro foreach
   echo "<table>\n<tbody>\n";
   //Recupero las claves de la primera dimensión para formar la fila cabecera
   $keys= array_keys($arr);
   echo "<tr>\n";
   foreach ($keys as $key) {
      echo "<th>$key</th>\n";
   }
   echo "</tr>\n";

   //Tengo que recorrer por columnas
   //Voy a suponer que $arr es una tabla donde todas las filas tienen el mismo número de elementos
   //En caso contrario $cont tendría que valer el número de elementos de la fila más larga
   if(!empty($keys)){
      $cont=count($arr[$keys[0]]);
      for ($i=0; $i < $cont ; $i++) { 
      
         echo "<tr>\n";
         foreach ($keys as $key) {   
            echo "<td>" . $arr[$key][$i] . "</td>\n";
         }
         echo "</tr>\n";
      }
      echo "</tbody>\n</table>\n";
   }
   ?> 
</body>
</html>