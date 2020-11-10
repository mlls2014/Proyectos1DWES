<?php
try {
   $db = new PDO('mysql:host=127.0.0.1;dbname=bdusuarios', 'admin', 'admin');
   //Probar los distintos tipos de modo de error
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo "La conexión se realizó correctamente!! :)";
} catch (Exception $e) {
   die('Error : ' .  $e->GetMessage());
}

// Datos FETCH_ASSOC 
$stmt = $db->prepare("SELECT * FROM clientes");
// Especificamos el fetch mode antes de llamar a fetch() 
$stmt->setFetchMode(PDO::FETCH_ASSOC);
// Ejecutamos la sentencia
$stmt->execute();
// Mostramos los resultados 
while ($row = $stmt->fetch()) {
   echo "Nombre: {$row["nombre"]} <br>";
   echo "Ciudad: {$row["ciudad"]} <br>";
}

//PDO::FETCH_OBJ
echo "<br>";
$stmt->execute();
// Ahora vamos a indicar el fetch mode cuando llamamos a fetch()
while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
   echo "Nombre: " .  $row->nombre  . "<br>";
   echo "Ciudad:" .  $row->ciudad  . "<br>";
}

//PDO::FETCH_BOUND
echo "<br>";
$stmt->execute();  // Ejecutamos la consulta
//Hacemos el bindColumn de los campos de la BD
$stmt->bindColumn(1, $nombre);
$stmt->bindColumn('ciudad', $ciudad);
while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
   $cliente = $nombre  . ":" .  $ciudad;
   echo $cliente . "<br>";
}

class Clientes
{
   public $nombre;
   public $ciudad;
   public $otros;
   public function __construct($otros = '')
   {
      $this->nombre = strtoupper($this->nombre);
      $this->ciudad = mb_substr($this->ciudad, 0, 3);
      $this->otros = $otros;
   }
   // ....Código de la clase.... 
}

$stmt->setFetchMode(PDO::FETCH_CLASS, 'Clientes');
$stmt->execute();
while ($objeto = $stmt->fetch()) {
   echo $objeto->nombre . " -> ";
   echo $objeto->ciudad . "<br>";
   echo $objeto->otros . "<br>";
}

// fetchAll() con PDO::FETCH_ASSOC 
$stmt->execute();
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($clientes as $cliente) {
   echo $cliente['nombre'] . "<br>";
}

 //con query
$results = $db->query("SELECT * FROM clientes");
$clientes = $results->fetchAll(PDO::FETCH_OBJ);
foreach ($clientes as $cliente) {
   echo $cliente->nombre . "<br>";
}
