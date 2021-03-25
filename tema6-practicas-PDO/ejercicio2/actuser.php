<?php
require_once 'config.php';
//var_dump($_GET);
// Mensaje que indicará al usuario si la inserción se realizó correctamente o no
$msgresultado ="";
//Inicializamos valores de los campos de texto
$valnombre = "";
$valemail  = "";
// Si se ha pulsado el botón actualizar...
if (isset($_POST['submit']))
  { //Realizamos la actualización con los datos existentes en los campos
    $id = $_POST['id']; //Lo recibimos por el campo oculto
    $nuevonombre= $_POST['txtnombre'];
    $nuevoemail = $_POST['txtemail'];
    try{  //Definimos la instrucción SQL parametrizada 
        $sql= "UPDATE usuarios SET nombre= :nombre, email= :email WHERE id=:id";
        $query= $conexion->prepare($sql);
        $query->execute([ 'id'     => $id, 
                          'nombre' => $nuevonombre,
                          'email'  => $nuevoemail
                        ]);
        //Supervisamos si la inserción se realizó correctamente... 
        if($query){
          $msgresultado = '<div class="alert alert-success">' . "El usuarios se actualizó correctamente!! :)" . '</div>';
        }// o no :(
      }catch (PDOException $ex){
          $msgresultado = '<div class="alert alert-success">' . "El usuario no pudo actualizarse!! :( <br/>(" . $ex->getMessage(). ')</div>';
          die();
      }
    // Obtenemos los valores para mostrarlos en los campos del formulario
    $valnombre = $nuevonombre;
    $valemail  = $nuevoemail;
  } else{ //Estamos rellenando los campos con los valores recibidos del listado
   if(isset($_GET['id'])&&(is_numeric($_GET['id'])))
     { 
      $id = $_GET['id'];
      try{ 
          $sql = "SELECT * FROM usuarios WHERE id=:id";
          $query = $conexion->prepare($sql);
          $query->execute([ 'id' => $id ]);
           //Supervisamos que la consulta se realizó correctamente... 
          if($query){
            $msgresultado = '<div class="alert alert-success">' . "Los datos del usuario se obtuvieron correctamente!! :)" . '</div>';
          }// o no :(
        }catch (PDOException $ex){
            $msgresultado = '<div class="alert alert-success">' . "No se pudieron obtener los datos de usuario!! :( <br/>(" . $ex->getMessage(). ')</div>';
            die();
      }       
      $fila = $query->fetch(PDO::FETCH_ASSOC);
      // Obtenemos los valores para mostrarlos en los campos del formulario
      $valnombre = $fila['nombre'];
      $valemail  = $fila['email'];
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
     <div class="container cuerpo text-center">	
      <ul>
       <li> <a href="listado.php"> Listar usuarios</a></li>
       <li> <a href="adduser.php"> Añadir usuario</a></li>
     </ul>
       <p><h2><img class="alineadoTextoImagen" src="images//user.png" width="50px"/>Actualizar Usuario</h2> </p>
     </div>
     <?php echo $msgresultado;  ?> 
     <form action="actuser.php" method="post">
       <label for="txtnombre">Nombre
         <input type="text" class="form-control" name="txtnombre" value="<?php echo $valnombre; ?>" required></label>
       <br/>
       <label for="txtemail">Email
         <input type="email" class="form-control" name="txtemail" value="<?php echo $valemail; ?>" required></label>
       <!--Creamos un campo oculto para mantener el valor del id que deseamos modificar cuando pulsemos el botón actualizar-->  
       <input type="hidden" name="id" value="<?php echo $id; ?>">
       <br/>
       <input type="submit" value="Actualizar" name="submit" class="btn btn-success">
     </form>
   </div>
  </body>
</html>