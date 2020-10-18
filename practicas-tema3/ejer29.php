<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 29</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
   <div class="container">
      <?php
      /*
   Cree un mini-diccionario español-inglés que contenga, al menos, 5 palabras (con su traducción). 
   Utilice un array asociativo para almacenar las parejas de palabras. El programa pedirá una palabra en español mediante un formulario y dará su correspondiente traducción en inglés.
   */
      $errors = [];
      $palabra = "";
      $diccionario = ['gato'=>'cat', 'perro'=>'dog','leon'=>'lion','oveja'=>'sheep','tiburón'=>'shark'];

      // Función que muestra el mensaje de error bajo el campo que no ha superado
      // el proceso de validación
      function mostrar_error($errors, $campo)
      {
         $alert = "";
         if (isset($errors[$campo]) && (!empty($campo))) {
            $alert = '<p>' . $errors[$campo] . '</p>';
         }
         return $alert;
      }

      function filtrado($datos)
      {
         $datos = trim($datos); //Elimina espacios antes y después de los datos
         $datos = stripslashes($datos); //Elimina backslashes\
         $datos = htmlspecialchars($datos); //Traduce caracteres especiales en entidades HTML
         return $datos;
      }

      //Validación de datos
      if (isset($_POST["submit"])) {
         $palabra = filtrado(($_POST["palabra"]));
         
         if (empty($palabra) || (preg_match("/[0-9]/", $palabra))) {
            $errors["palabra"] =  "La palabra está vacía o tiene algún número:(";
         }
      }
      ?>

      <h1>Traducción de palabras:</h1>
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form-group">
         <div class="form-group">
            <label for="palabra">Escriba la palabra a traducir al inglés: </label>
            <input type="text" class="form-control" name="palabra" id="palabra" placeholder="Palabra a traducir" <?php echo "value='" . @$palabra . "'"; ?>>
         </div>
         <?php echo mostrar_error($errors, "palabra"); ?>
         <button type="submit" class="btn btn-primary" name="submit">Traducir</button>

      </form>

      <?php
      //Muestro traducción si todo ha ido bien
      //Busco dentro de las claves del array la palabra escrita
      if (isset($_POST["submit"]) && (count($errors) == 0)) {
         //Paso a minúsculas la palabra para no depender de tamaño letra
         $palabra=strtolower($palabra);
         if(isset($diccionario[$palabra])){
            echo "<h3>En inglés es <b>" . $diccionario[$palabra] . "</b></h3>";
         }else{
            echo "<h3>La palabra $palabra no se encuentra en nuestro diccionario.</h3>";
         }
      }      
      ?>

      <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Recargar (reinicia la página)</a>
   </div>
</body>

</html>