<?php
  // Conexión a la base de datos usando PDO
  $dbHost = 'localhost';
  $dbName = 'bdusuarios';
  $dbUser = 'root';
  $dbPass= '';

  try{
      $conexion = new PDO("mysql:host=$dbHost;dbname=$dbName",$dbUser,$dbPass);
      $conexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo '<div class="alert alert-success">' . "Conectado a la  Base de Datos de usuarios!! :)" . '</div>';
  }catch (PDOException $ex){
      echo '<div class="alert alert-danger">' . "No se pudo conectar a la Base de Datos de usuarios!! :( <br/> (" . $ex->getMessage(). ')</div>';
  }
?>