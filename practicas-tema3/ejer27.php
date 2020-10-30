<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 27</title>
   <!-- CSS only -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   <!-- JS, Popper.js, and jQuery -->
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
   <div class="container">
      <?php
      /*
   Escriba un programa que pida 10 números por teclado y que muestre los números introducidos junto a sus valores máximo y mínimo.
   */
      $errors = [];
      $numeros = [];

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

      // Para recoger de forma saneada los datos de los formularios
      // Se explica bien en https://www.mclibre.org/consultar/php/lecciones/php-recogida-datos.html
      function recoge($var, $m = "")
      {
         if (!isset($_REQUEST[$var])) {
            $tmp = (is_array($m)) ? [] : "";
         } elseif (!is_array($_REQUEST[$var])) {
            $tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
         } else {
            $tmp = $_REQUEST[$var];
            array_walk_recursive($tmp, function (&$valor) {
               $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
            });
         }
         return $tmp;
      }

      if (isset($_POST["submit"])) {
         //Sanea los tres lados
         $numeros = recoge("numeros");

         //Válida los números
         for ($i = 0; $i < count($numeros); $i++) {
            if (!is_numeric($numeros[$i])) {
               $errors["numeros$i"] = "El número " . ($i + 1) . " no es válido";
            }
         }
      }
      ?>

      <?php if (!isset($_POST["submit"]) || (count($errors) != 0)) {
      ?>
         <h1>Introduzca diez números:</h1>
         <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

            <?php
            for ($i = 0; $i < 10; $i++) {
            ?>

               <div class="form-group">
                  <label for="numero<?php echo $i ?>">Escriba el número <?php echo ($i + 1) ?>:</label>
                  <input type="text" class="form-control" name="numeros[]" id="numero<?php echo $i ?>" placeholder="Entrar número" <?php echo "value='" . @$numeros[$i] . "'"; ?>>
                  <?php echo mostrar_error($errors, "numeros$i"); ?>
               </div>

            <?php
            }
            ?>
            <button type="submit" class="btn btn-primary" name="submit">Enviar</button>

         </form>

      <?php
      } elseif (isset($_POST["submit"]) && (count($errors) == 0)) {
         echo "<h1>Los números introducidos son: </h1>";
         foreach ($numeros as $numero) {
            echo $numero . '<br/>';
         }
         echo "<b>Valor máximo:</b> " . max($numeros) . '<br/>';
         echo "<b>Valor mínimo:</b> " . min($numeros) . '<br/>';
      }
      ?>
      <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Recargar (reinicia la página)</a>
   </div>
</body>

</html>