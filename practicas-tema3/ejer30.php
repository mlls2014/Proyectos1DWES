<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 30</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
   <div class="container">
      <?php
      /*
      Realice un programa que escoja al azar 2 palabras en español del mini-diccionario del ejercicio anterior. El programa pedirá mediante un formulario que el usuario 
      teclee la traducción al inglés de cada una de las palabras y comprobará si son correctas. Al final, el programa deberá mostrar cuántas respuestas son válidas y cuántas erróneas.
      */
      define('NUMPAL', 2); //Número de palabras a traducir
      $palabras = []; //Lo que teclea el usuario
      $respuestas = []; //Guardo las palabras aleatorias a traducir del juego
      $diccionario = ['gato' => 'cat', 'perro' => 'dog', 'leon' => 'lion', 'oveja' => 'sheep', 'tiburón' => 'shark'];

      //En este caso pasamos por referencia $datos, los cambios en filtrado se verán fuera de la función
      function filtrado(&$datos)
      {
         $datos = trim($datos); //Elimina espacios antes y después de los datos
         $datos = stripslashes($datos); //Elimina backslashes\
         $datos = htmlspecialchars($datos); //Traduce caracteres especiales en entidades HTML
      }

      //Validación de datos
      if (isset($_POST["submit"])) {
         $palabras = $_POST["palabras"];
         $respuestas = $_POST["respuestas"];
         //Cargo $adivina a partir de $respuestas
         for ($i = 0; $i < count($respuestas); $i++) {
            $adivina[$i] = array_search($respuestas[$i], $diccionario);
         }

         //Se sanea la entrada de datos
         //Ejemplo de callback
         array_walk_recursive($palabras, 'filtrado');
         //No parece necesario validar nada
      } else { //Supongo que entro en la página por la url y no por botón
         //Selecciono las NUMPAL palabras aleatorias a traducir
         $adivina = array_rand($diccionario, NUMPAL);
         //Por si NUMPAL=1
         if (!is_array($adivina)) {
            $adivina = (array)$adivina;
         }
         // Cargo $respuestas
         for ($i = 0; $i < count($adivina); $i++) {
            $respuestas[$i] = $diccionario[$adivina[$i]];
         }
      }
      ?>

      <h1>Juego traducir palabras:</h1>
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

         <?php
         for ($i = 0; $i < NUMPAL; $i++) {
         ?>

            <div class="form-group">
               <label for="palabras<?php echo $i ?>">Escriba la traducción de <?php echo "<u><i>{$adivina[$i]}</i></u>" ?>:</label>
               <input type="text" class="form-control" name="palabras[]" id="palabras<?php echo $i ?>" placeholder="Introduzca la  traducción" <?php echo "value='" . @$palabras[$i] . "'"; ?>>

               <input type="text" name="respuestas[]" <?php echo "value='" . @$respuestas[$i] . "'"; ?>>
            </div>
         <?php
         }
         ?>
         <?php

         //Chequeo el resultado del juego
         if (isset($_POST["submit"])) {
            $aciertos = 0;
            for ($i = 0; $i < count($adivina); $i++) {
               if (strtolower($palabras[$i]) == $respuestas[$i]) {
                  $aciertos++;
               }
            }
            echo "<h3>¡¡¡Ha obtenido $aciertos aciertos!!!</h3>";
         ?>
            <button type="submit" onclick="location.reload();" class="btn btn-primary">Volver a jugar</button>
         <?php
         } else {
         ?>
            <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
         <?php
         }
         ?>
      </form>
      <br/>   
      <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Recargar (reinicia la página)</a>
   </div>
</body>

</html>