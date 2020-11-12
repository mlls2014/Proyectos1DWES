<?php
require_once 'config.php';
//var_dump($_POST);
// Mensaje que indicará al usuario si la inserción se realizó correctamente o no
$msgresultado ="";
// Generamos el listado de los usuarios...
     try{  //Definimos la instrucción SQL parametrizada 
        $sql = "SELECT * FROM usuarios";
        // Preparamos la consulta...
        $resultsquery = $conexion->query($sql);
        //Supervisamos si la inserción se realizó correctamente... 
        if($resultsquery){
          $msgresultado = '<div class="alert alert-success">' . "El listado se realizó correctamente!! :)" . '</div>';
        }// o no :(
      }catch (PDOException $ex){
          $msgresultado = '<div class="alert alert-success">' . "El listado no pudo realizarse correctamente!! :( (" .$ex->getMessage(). ')</div>';
          die();
      }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Base de Datos con PHP y PDO</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <!--    Referencia a la CDN de la hoja de estilos de Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="cuerpo">
   <div class="container centrar">
     <a href="index.php">Inicio</a>
     <div class="container cuerpo text-center centrar">	
       <p><h2><img class="alineadoTextoImagen" src="images//user.png" width="50px"/>Listar Usuarios</h2> </p>
     </div>
     <?php echo $msgresultado;  ?> 
     <table class="table table-striped">
       <tr>
         <th>Nombre</th>
<!--         <th>Contraseña</th>-->
         <th>Email</th>
       </tr>
       <?php
        while($fila = $resultsquery->fetch()){
              echo '<tr>';
              echo '<td>' . $fila['nombre']   . '</td>' ;
//              echo '<td>' . $fila['password'] . '</td>' ;
              echo '<td>' . $fila['email']    . '</td>' ;
              echo '</tr>';
        }
       ?>
     </table>
   </div>
  </body>