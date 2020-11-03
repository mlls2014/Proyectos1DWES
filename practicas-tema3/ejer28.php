<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 28</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
   <div class="container">
   <?php
   /*
   Realice un conversor de euros a dólares. La cantidad en euros|dólares que se desee convertir así como el tipo de conversión a realizar (euro-dólar|dólar-euro)
    deberá recogerse en un formulario mediante una caja de texto y una lista desplegable con los dos tipos de conversión.
   */
   $errors = [];
   $cantidad = "";
   $tipo = "";
   define("EURDOL",1.1709);

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
      $cantidad = recoge("cantidad");
      $tipo = recoge("tipo");

      //Válida entrada   
      if (!is_numeric($cantidad)) {
         $errors["cantidad"] = "El número a convertir no es válido";
      }  
   }
   ?>

   <h1>Conversión Euro/Dólar:</h1>
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form-inline">  
      <div class="form-group">
         <label for="cantidad">Escriba la cantidad a convertir: </label>
         <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Entrar cantidad" <?php echo "value='" . @$cantidad . "'"; ?>>
      </div>
      <div class="form-group">
         <label for="tipo"> Tipo conversión:</label>
         <select class="form-control" id="tipo" name="tipo">
            <option value="0" <?php if($tipo==0){ echo "selected='selected'"; } ?>>Euro/Dólar</option>
            <option value="1" <?php if($tipo==1){ echo "selected='selected'"; } ?>>Dólar/Euro</option>
         </select>
      </div>
      <?php echo mostrar_error($errors, "cantidad"); ?>
      <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
      
   </form>
   
   <?php 
      if (isset($_POST["submit"]) && (count($errors) == 0)) {         
         if($tipo==0){ // Euro/Dólar Paso de Euro a Dólar
            echo "<h3>$cantidad euros son " . $cantidad * EURDOL . " dólares</h3>"; 
         }else{
            echo "<h3>$cantidad dólares son " . $cantidad / EURDOL . " euros</h3>"; 
         }
         
      } 
   ?>
      
   <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Recargar (reinicia la página)</a>
   </div>
</body>

</html>