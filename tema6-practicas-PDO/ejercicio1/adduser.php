<?php
require_once 'config.php';
//var_dump($_POST);
// Mensaje que indicará al usuario si la inserción se realizó correctamente o no
$msgresultado ="";
// Si se ha pulsado el botón guardar...
if(isset($_POST['submit']))
 { // y hermos recibido las variables del formulario y éstas no están vacías...
  if(isset($_POST) and (!empty($_POST)))
   {
    $nombre = $_POST['txtnombre'];
    $password = sha1($_POST['txtpass']);
    $email = $_POST['txtemail'];
    try{  //Definimos la instrucción SQL parametrizada 
        $sql = "INSERT INTO usuarios(nombre,password,email)
                       VALUES (:nombre,:password,:email)";
        // Preparamos la consulta...
        $query = $conexion->prepare($sql); 
        // y la ejecutamos indicando los valores que tendría cada parámetro
        $query->execute ([
            'nombre'   => $nombre,
            'password' => $password,
            'email'    => $email
        ]); //Supervisamos si la inserción se realizó correctamente... 
        if($query){
          $msgresultado = '<div class="alert alert-success">' . "El usuarios se registró correctamente!! :)" . '</div>';
        }// o no :(
      }catch (PDOException $ex){
          $msgresultado = '<div class="alert alert-success">' . "El usuario no pudo registrarse!! :(" . '</div>';
          die();
      }
   }
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
       <p><h2><img class="alineadoTextoImagen" src="images//user.png" width="50px"/>Añadir Usuario</h2> </p>
     </div>
     <?php echo $msgresultado;  ?> 
     <form action="adduser.php" method="post">
       <label for="txtnombre">Nombre
       <input type="text" class="form-control" name="txtnombre" required></label>
       <br/>
       <label for="txtemail">Email
       <input type="text" class="form-control" name="txtemail"></label>
       <br/>
       <label for="txtpass">Contraseña
       <input type="password" class="form-control" name="txtpass" required></label>
       <br/>
       <input type="submit" value="Guardar" name="submit" class="btn btn-success">
     </form>
   </div>
  </body>
</html>