<?php
require_once 'config.php';
//var_dump($_POST);
// Mensaje que indicará al usuario si la inserción se realizó correctamente o no
   $msgresultado ="";
// Array asociativo que almacenará los mensajes de error que se generen por cada campo
   $errores= array();
// Si se ha pulsado el botón guardar...
if(isset($_POST['submit']))
 { // y hermos recibido las variables del formulario y éstas no están vacías...
  if(isset($_POST) and (!empty($_POST)))
   {
    $nombre   = $_POST['txtnombre'];
    $password = sha1($_POST['txtpass']);
    $email    = $_POST['txtemail'];
    /* Realizamos la carga de la imagen en el servidor */
    // Hacemos un var_dump para comprobar la estructura de la variable $_FILES["imagen"]
    //var_dump($_FILES["imagen"]);
    // Comprobamos que el campo tmp_name tiene un valor asignado para asegurar que hemos
    //recibido la imagen correctamente

    // Definimos la variable $imagen que almacenará el nombre de imagen 
    // que almacenará la Base de Datos inicializada a NULL
    $imagen = NULL;

    if(isset($_FILES["imagen"]) && (!empty($_FILES["imagen"]["tmp_name"]))){
    // Verificamos la carga de la imagen
     var_dump($_FILES["imagen"]);
    // die();

    // Comprobamos si existe el directorio fotos, y si no, lo creamos
       if(!is_dir("fotos"))
         { $dir = mkdir("fotos", 0777, true);  }
        else{ $dir = true; }
    // Ya verificado que la carpeta uploads existe movemos el fichero seleccionado a dicha carpeta
       if($dir){
          //Para asegurarnos que el nombre va a ser único...
          $nombrefichimg = time() . "-" . $_FILES["imagen"]["name"];
          // Movemos el fichero de la carpeta temportal a la nuestra
          $movfichimg    = move_uploaded_file($_FILES["imagen"]["tmp_name"],"fotos/".$nombrefichimg);
          $imagen = $nombrefichimg;
          // Verficamos que la carga se ha realizado correctamente
          if($movfichimg){
                  $imagencargada = true;
          }  else {
                  $imagencargada = false;
                  $errores["imagen"]="Error: La imagen no se cargó correctamente! :(";
          }
        }
        var_dump($imagen);
    }   
    if(count($errores)==0){
      try{  //Definimos la instrucción SQL parametrizada 
          $sql = "INSERT INTO usuarios(nombre,password,email,imagen)
                         VALUES (:nombre,:password,:email , :imagen)";
          // Preparamos la consulta...
          $query = $conexion->prepare($sql); 
          // y la ejecutamos indicando los valores que tendría cada parámetro
          $query->execute ([
              'nombre'   => $nombre,
              'password' => $password,
              'email'    => $email,
              'imagen'   => $imagen
          ]); //Supervisamos si la inserción se realizó correctamente... 
          if($query){
            $msgresultado = '<div class="alert alert-success">' . "El usuarios se registró correctamente!! :)" . '</div>';
          }// o no :(
        }catch (PDOException $ex){
            $msgresultado = '<div class="alert alert-danger">' . "El usuario no pudo registrarse!! :( (" . $ex->getMessage(). ')</div>';
            die();
        }
    }else{
      $msgresultado = '<div class="alert alert-danger">' . "Datos de registro de usuario erróneos!! :( (" . $ex->getMessage(). ')</div>';
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
    <div class="centrar">	
   <div class="container centrar">
     <a href="index.php">Inicio</a>
     <div class="container cuerpo text-center centrar">	 
       <p><h2><img class="alineadoTextoImagen" src="images//user.png" width="50px"/>Añadir Usuario</h2> </p>
     </div>
     <?php echo $msgresultado;  ?> 
     <form action="adduser.php" method="post" enctype="multipart/form-data">
       <label for="txtnombre">Nombre
       <input type="text" class="form-control" name="txtnombre" required></label>
       <br/>
       <label for="txtemail">Email
         <input type="email" class="form-control" name="txtemail"></label>
       <br/>
       <label for="txtpass">Contraseña
       <input type="password" class="form-control" name="txtpass" required></label>
       <br/>
       <label for="imagen"> Imagen <input type="file" name="imagen" class="form-control" /></label>
       </br>
       <input type="submit" value="Guardar" name="submit" class="btn btn-success">
     </form>
   </div>
  </body>
</html>