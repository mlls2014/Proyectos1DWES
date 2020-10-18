<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 25</title>
</head>
<body>
   <?php
   /*
   Escriba un programa que calcule el área de un triángulo tomando los valores de sus parámetros mediante campos de un formulario y con el uso 
   de funciones.
   */
   $errors = [];
   $lados = [];

   // Función que muestra el mensaje de error bajo el campo que no ha superado
   // el proceso de validación
   function mostrar_error($errors, $campo) {
      $alert = "";
      if (isset($errors[$campo]) && (!empty($campo))) {
         $alert = '<p>' . $errors[$campo] . '</p>';
      }
      return $alert;
   }

   // Se explica en http://es.onlinemschool.com/math/assistance/figures_area/triangle1/
   function calcular_area($lados){
      //Para calcular el área del triángulo conociendo sus lados se puede usar la fórmula de Herón
      // s será la suma de los lados a, b, c
      // el área será sqrt(s*(s-a)*(s-b)*(s-c))
      $s = array_sum($lados)/2; //suma de los lados
      $acum= $s;
      for ($i=0; $i < count($lados); $i++) { 
         $acum *= ($s-$lados[$i]);
      }
      return (sqrt($acum));
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
      $lados = recoge("lados");

      //Válida los números
      for ($i=0; $i < count($lados); $i++) { 
         if (!is_numeric($lados[$i])) {
            $errors["lado$i"] = "La longitud del lado " . ($i+1) . " no es válida";
         }   
      }
   }

   ?>

   <h1>Cálculo área triángulo</h1>
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
      <p><label>Escriba longitud lado 1: <input type="text" name="lados[]" size="12" maxlength="10" <?php if(isset($lados[0])){echo "value='{$lados[0]}'";} ?>></label></p>
      <?php echo mostrar_error($errors, "lado0"); ?>
      <p><label>Escriba longitud lado 2: <input type="text" name="lados[]" size="12" maxlength="10" <?php if(isset($lados[1])){echo "value='{$lados[1]}'";} ?>></label></p>
      <?php echo mostrar_error($errors, "lado1"); ?>
      <p><label>Escriba longitud lado 3: <input type="text" name="lados[]" size="12" maxlength="10" <?php if(isset($lados[2])){echo "value='{$lados[2]}'";} ?>></label></p>
      <?php echo mostrar_error($errors, "lado2"); ?>
      <p>
         <input type="submit" value="Enviar" name="submit">
      </p>
   </form>
   <?php if (isset($_POST["submit"]) && (count($errors) == 0)) { 
      echo "El área del triángulo es " . calcular_area($lados);
      } 
   ?>
</body>
</html>