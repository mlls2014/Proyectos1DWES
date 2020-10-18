<?php

   // Definimos e inicializamos el array de errores y las variables asociadas a cada campo
   $errors    = [];
   $nombre    = "";
   $apellidos = "";
   $biografia = "";
   $email = "";
   $password = "";
   $imagen = "";  //Nombre del fichero de imagen

   function filtrado($datos){
      $datos = trim($datos); //Elimina espacios antes y después de los datos
      $datos = stripslashes($datos); //Elimina backslashes\
      $datos = htmlspecialchars($datos); //Traduce caracteres especiales en entidades HTML
      return $datos;
   }

   // Función que muestra el mensaje de error bajo el campo que no ha superado
   // el proceso de validación
   function mostrar_error($errors, $campo) {
      $alert = "";
      if (isset($errors[$campo]) && (!empty($campo))) {
         $alert = '<div class="alert alert-danger" style="margin-top:5px;">' . $errors[$campo] . '</div>';
      }
      return $alert;
   }

    // Verificamos si todos los campos han sido validados
    function validez($errors) {
      if (isset($_POST["submit"]) && (count($errors) == 0)) {
         return '<div class="alert alert-success" style="margin-top:5px;"> Formulario validado correctamente!! :)</div>';
      }
   }

   // Visualización de las variables obtenidas mediante el formulario
   function valoresfrm() {
?>
      <div class="card">
         <div class="card-header">
         Valores obtenidos mediante el formulario
         </div>
      <div class="card-body">
         <p class="card-text"><?php echo "<strong>Nombre:</strong> " . $GLOBALS['nombre'] . "<br/>";?></p>
         <p class="card-text"><?php echo "<strong>Apellidos:</strong> " . $GLOBALS['apellidos'] . "<br/>";?></p>
         <p class="card-text"><?php echo "<strong>Biografía:</strong> " . $GLOBALS['biografia'] . "<br/>";?></p>
         <p class="card-text"><?php echo "<strong>Email:</strong> " . $GLOBALS['email'] . "<br/>";?></p>
         <p class="card-text"><?php echo "<strong>Password:</strong> " . $GLOBALS['password'] . "<br/>";?></p>
         <p class="card-text"><?php echo "<strong>Imagen:</strong> " . $GLOBALS['imagen'] . "<br/>";?></p>

      </div>
      </div>
<?php
   }

   //Validación de datos
   if (isset($_POST["submit"])) {
      $nombre=filtrado(($_POST["nombre"]));
      if (empty($nombre) || strlen($nombre)>20 || (preg_match("/[0-9]/", $nombre))) {
         $errors["nombre"] = "El nombre no es válido: Está vacío o tiene longitud mayor a 20 o tiene algún número";
      }

      $apellidos=filtrado(($_POST["apellidos"]));
      //Podemos usar filter_var
      //$apellidos=filter_var(($_POST["apellidos"]),FILTER_SANITIZE_STRING);
      if (empty($apellidos) || (preg_match("/[0-9]/", $_POST["apellidos"]))) {
         $errors["apellidos"] = "Los apellidos no son válidos: son vacíos o tienen algún número";
      }

      $biografia=filtrado(($_POST["biografia"]));
      if (empty($biografia)) {
         $errors["biografia"] = "La biografía no puede estar vacía";
      }

      $email=filtrado(($_POST["email"]));
      if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $errors["email"] = "El email no es válido";
      }
      // https://riptutorial.com/es/regex/example/18996/una-contrasena-que-contiene-al-menos-1-mayuscula--1-minuscula--1-digito--1-caracter-especial-y-tiene-una-longitud-de-al-menos-10
      $password=filtrado(($_POST["password"]));
      if (empty($password) || !(preg_match("/^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/", $password))) {
         $errors["password"] = "La contraseña no es válida: Debe tener una longitud mínima de 8 caracteres y contener letras mayúsculas, minúsculas, números y caracteres especiales";
      }

      $imagen=filtrado($_FILES['imagen']['name']);
 
   }