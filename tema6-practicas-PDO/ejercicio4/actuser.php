<?php
require_once 'config.php';
//var_dump($_POST);
// Mensaje que indicará al usuario si la inserción se realizó correctamente o no
   $msgresultado ="";
// Array asociativo que almacenará los mensajes de error que se generen por cada campo
   $errores= array();
// Inicializamos valores de los campos de texto
   $valnombre  = "";
   $valemail   = "";
   $valimagen  = "";

// Si se ha pulsado el botón actualizar...
if (isset($_POST['submit']))
  { //Realizamos la actualización con los datos existentes en los campos
    $id = $_POST['id']; //Lo recibimos por el campo oculto
    $nuevonombre = $_POST['txtnombre'];
    $nuevoemail  = $_POST['txtemail'];
    $nuevaimagen = "";
    
    // Definimos la variable $imagen que almacenará el nombre de imagen 
    // que almacenará la Base de Datos inicializada a NULL
    $imagen = NULL;

    if(isset($_FILES["imagen"]) && (!empty($_FILES["imagen"]["tmp_name"]))){
    // Verificamos la carga de la imagen
    // var_dump($_FILES["imagen"]);
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
          $movfichimg = move_uploaded_file($_FILES["imagen"]["tmp_name"],"fotos/".$nombrefichimg);
          $imagen     = $nombrefichimg;
          // Verficamos que la carga se ha realizado correctamente
          if($movfichimg){
                  $imagencargada = true;
          }  else {
                  $imagencargada = false;
                  $errores["imagen"]="Error: La imagen no se cargó correctamente! :(";
          }
        }
        //var_dump($imagen);
    }   
    
    $nuevaimagen = $imagen;
    if(count($errores)==0){
      try{  //Definimos la instrucción SQL parametrizada 
          $sql= "UPDATE usuarios SET nombre= :nombre, email= :email, imagen= :imagen WHERE id=:id";
          $query= $conexion->prepare($sql);
          $query->execute([ 'id'     => $id, 
                            'nombre' => $nuevonombre,
                            'email'  => $nuevoemail,
                            'imagen' => $nuevaimagen
                          ]);
          //Supervisamos si la inserción se realizó correctamente... 
          if($query){
            $msgresultado = '<div class="alert alert-success">' . "El usuarios se actualizó correctamente!! :)" . '</div>';
          }// o no :(
        }catch (PDOException $ex){
            $msgresultado = '<div class="alert alert-success">' . "El usuario no pudo actualizarse!! :( <br/>(" . $ex->getMessage(). ')</div>';
            //die();
        }
     }else{
      $msgresultado = '<div class="alert alert-danger">' . "Datos de registro de usuario erróneos!! :( (" . $ex->getMessage(). ')</div>';
      //die();
    }
      
    // Obtenemos los valores para mostrarlos en los campos del formulario
    $valnombre = $nuevonombre;
    $valemail  = $nuevoemail;
    $valimagen = $nuevaimagen;
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
            $msgresultado = '<div class="alert alert-danger">' . "No se pudieron obtener los datos de usuario!! :( <br/>(" . $ex->getMessage(). ')</div>';
            //die();
      }       
      $fila = $query->fetch(PDO::FETCH_ASSOC);
      // var_dump($fila);
      // Obtenemos los valores para mostrarlos en los campos del formulario
      $valnombre = $fila['nombre'];
      $valemail  = $fila['email'];
      $valimagen = $fila['imagen'];
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
     <form action="actuser.php" method="post" enctype="multipart/form-data">
       <label for="txtnombre">Nombre
         <input type="text" class="form-control" name="txtnombre" value="<?php echo $valnombre; ?>" required></label>
       <br/>
       <label for="txtemail">Email
         <input type="email" class="form-control" name="txtemail" value="<?php echo $valemail; ?>" required></label>
       <br/>  
       <?php if($valimagen != null) {	?>
	    </br>Imagen del Perfil: <img src="fotos/<?php echo $valimagen; ?>" width="60" /></br>
       <?php  } ?>
       </br>
       <label for="imagen">Actualizar imagen de perfil:
         <input type="file" name="imagen" class="form-control" /></label>
       </br>
       <!--Creamos un campo oculto para mantener el valor del id que deseamos modificar cuando pulsemos el botón actualizar-->  
       <input type="hidden" name="id" value="<?php echo $id; ?>">
       <br/>
       <input type="submit" value="Actualizar" name="submit" class="btn btn-success">
     </form>
   </div>
  </body>
</html>