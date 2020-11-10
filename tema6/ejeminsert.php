<?php
try {
   $db = new PDO('mysql:host=127.0.0.1;dbname=bdusuarios', 'admin', 'admin');
   //Probar los distintos tipos de modo de error
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
   echo "La conexión se realizó correctamente!! :)";
} catch (Exception $e) {
   die('Error : ' .  $e->GetMessage());
}

// Preparar la consulta
//Notar la sensibilidad a mayúsculas/minúsculas en el nombre de tabla (en linux).
$stmt = $db->prepare("INSERT INTO clientes (nombre, ciudad, contacto) VALUES (:nombre, :ciudad, :contacto)");
$stmt->bindParam(':nombre', $nombre); // Asociar parámetros
$stmt->bindParam(':ciudad', $ciudad);
$stmt->bindParam(':contacto', $contacto);
$nombre = "Pepe Gotega";  
$ciudad = "Madrid";  
$contacto = 4124124; 
$stmt->execute(); 
$nombre = "Otilio";  
$ciudad = "Huelva";  
$contacto = 646657671; 
$stmt->execute(); 
// Mensaje de éxito en la inserción controlado mediante excepciones
 echo "Se han creado las entradas correctamente  :)"; 
// Cerrar conexiones 
$db = null;
