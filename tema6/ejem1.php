<?php
try {
   $conex = new PDO('mysql:host=127.0.0.1;dbname=bdusuarios', 'admin', 'admin');
   $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
   echo "La conexión se realizó correctamente!! :)";
} catch (Exception $e) {
   echo 'Error : ' .  $e->GetMessage();
} finally {
   echo "Hola";
   $base = null;
}  //cierre de la conexión    
