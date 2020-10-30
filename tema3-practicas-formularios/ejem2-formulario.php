<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Formulario de ejemplo 1
  </title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
   <?php
   /**
   * Script que muestra en una tabla los valores enviados por el usuario a través 
   * del formulario utilizando el método POST
   */
   // Definimos e inicializamos el array de errores y las variables asociadas a cada campo
   $errors    = [];
   $nombre    = "";
   $apellidos = "";

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
      global $nombre,$apellidos;
      echo "<h4>Valores obtenidos mediante el formulario</h4><br/>";
      echo "<strong>Nombre:</strong>" . $nombre . "<br/>";
      echo "<strong>Apellidos:</strong>" . $apellidos . "<br/>";
   }

   if (isset($_POST["submit"])) {
      if (!empty($_POST["nombre"]) && (!preg_match("/[0-9]/", $_POST["nombre"])) && (strlen($_POST["nombre"]) < 15)) {
         $nombre = trim($_POST["nombre"]);
         $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
      } else {
         $errors["nombre"] = "El nombre introducido no es válido :(";
      }

      if (!empty($_POST["apellidos"]) && (!preg_match("/[0-9]/", $_POST["apellidos"])) && (strlen($_POST["apellidos"]) < 20)) {
         $apellidos = trim($_POST["apellidos"]);
         $apellidos = filter_var($apellidos, FILTER_SANITIZE_STRING);
      } else {
         $errors["apellidos"] = "Los apellidos introducidos no son válidos :(";
      }
   }

   ?>
   <h1>Datos personales 1</h1>
   <?php echo validez($errors); ?>
   <?php if (isset($_POST["submit"]) && (count($errors) == 0)) { valoresfrm(); } ?>
   <form action="ejem1-formulario.php" method="post">
      <p><label>Escriba su nombre: <input type="text" name="nombre" size="20" maxlength="15" <?php if(isset($_POST["nombre"])){echo "value='{$_POST["nombre"]}'";} ?>></label></p>
      <?php echo mostrar_error($errors, "nombre"); ?>
      <p><label>Escriba sus apellidos: <input type="text" name="apellidos" size="40" maxlength="20" <?php if(isset($_POST["apellidos"])){echo "value='{$_POST["apellidos"]}'";} ?>></label></p>
      <?php echo mostrar_error($errors, "apellidos"); ?>
      <p>
         <input type="submit" value="Enviar" name="submit">
      </p>
   </form>
</body>
</html>