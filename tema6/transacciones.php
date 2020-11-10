<?php
try {
   $db = new PDO('mysql:host=127.0.0.1;dbname=bdusuarios', 'admin', 'admin');
   //Probar los distintos tipos de modo de error
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo "La conexión se realizó correctamente!! :)";
} catch (Exception $e) {
   die('Error : ' .  $e->GetMessage());
}

try {
   $db->beginTransaction();
   $db->query("INSERT INTO clientes (nombre, ciudad) 
                                          VALUES ('Pepe Gotera', 'Huelva')");
   $db->query("INSERT INTO clientes (nombre, ciudad) 
                                          VALUES ('Anacleto', 'Cádiz')");
   $db->query("INSERT INTO clientes (nombre, ciudad) 
                                          VALUES ('Carpanta', 'Córdoba')");
   $db->query("INSERT INTO clientes (nombre, ciudad) 
                                          VALUES ('Otilio', 'Jaen')");
   $db->query("INSERT INTO clientes (nombre, ciudad) 
                                          VALUES ('Mortadelo', 'Málaga')");
   $db->commit();
   echo "Los nuevos clientes se registraron correctamente!! :) ";
} catch (Exception $e) {
   echo "Ha habido algún error!! :( ";
   $db->rollback();
}
