<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 26</title>
</head>
<body>
   <?php
   /*
   Realice un programa que resuelva una ecuación de segundo grado (del tipo ax2+bx+c = 0) 
   tomando los valores de sus parámetros mediante campos de un formulario y con el uso de funciones.
   */
   $errors = [];
   $a = '';
   $b = '';
   $c = '';

   // Función que muestra el mensaje de error bajo el campo que no ha superado
   // el proceso de validación
   function mostrar_error($errors, $campo) {
      $alert = "";
      if (isset($errors[$campo]) && (!empty($campo))) {
         $alert = '<p>' . $errors[$campo] . '</p>';
      }
      return $alert;
   }

   //Explicación solución
   //https://www.problemasyecuaciones.com/Ecuaciones/segundo-grado/problemas-ecuaciones-segundo-grado-resueltas-solucion-formula-raices-factorizar.html
   function calcular_ecuacion($a,$b,$c)
   {
      // 0x^2 + 0x + 0 = 0
      if (($a == 0) && ($b == 0) && ($c == 0)) {
         return "La ecuación tiene infinitas soluciones.";
      }

      // 0x^2 + 0x + c = 0  con c distinto de 0
      if (($a == 0) && ($b == 0) && ($c != 0)) {
         return  "La ecuación no tiene solución.";
      }


      // ax^2 + bx + 0 = 0  con a y b distintos de 0
      if (($a != 0) && ($b != 0) && ($c == 0)) {
         return [0,(-$b / $a)];
      }


      // 0x^2 + bx + c = 0  con b y c distintos de 0
      if (($a == 0) && ($b != 0) && ($c != 0)) {
         return [(-$c / $b),(-$c / $b)];
      }


      // ax^2 + bx + c = 0  con a, b y c distintos de 0
      if (($a != 0) && ($b != 0) && ($c != 0)) {  
         $discriminante = ($b * $b) - (4 * $a * $c);
         if ($discriminante < 0) {
            return  "La ecuación no tiene soluciones reales";
         } else {
            return [(-$b + sqrt($discriminante)) / (2 * $a),(-$b - sqrt($discriminante)) / (2 * $a)];
         }
      }
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
      $a = recoge("a");
      $b = recoge("b");
      $c = recoge("c");

      //Válida los números
      if (!is_numeric($a)) {
         $errors["a"] = "El coeficiente a no es válido";
      }   
      if (!is_numeric($b)) {
         $errors["b"] = "El coeficiente b no es válido";
      }
      if (!is_numeric($c)) {
         $errors["c"] = "El coeficiente c no es válido";
      }
   }

   ?>

   <h1>Solución a ecuación de segundo grado ax<sup>2</sup> + bx + x = 0</h1>
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
      <p><label>Escriba coeficiente a: <input type="text" name="a" size="12" maxlength="10" <?php if(isset($a)){echo "value='$a'";} ?>></label></p>
      <?php echo mostrar_error($errors, "a"); ?>
      <p><label>Escriba coeficiente b: <input type="text" name="b" size="12" maxlength="10" <?php if(isset($b)){echo "value='$b'";} ?>></label></p>
      <?php echo mostrar_error($errors, "b"); ?>
      <p><label>Escriba coeficiente c: <input type="text" name="c" size="12" maxlength="10" <?php if(isset($c)){echo "value='$c'";} ?>></label></p>
      <?php echo mostrar_error($errors, "c"); ?>
      <p>
         <input type="submit" value="Enviar" name="submit">
      </p>
   </form>
   <?php 
      if (isset($_POST["submit"]) && (count($errors) == 0)) {
         $soluciones = calcular_ecuacion($a,$b,$c);
         echo "Solución/es:<br/>";
         if(is_array($soluciones)){
            echo "x<sub>1</sub> = " . $soluciones[0] . '<br/>';
            echo "x<sub>2</sub> = " . $soluciones[1];
         }else{
            echo $soluciones;
         }
      } 
   ?>
</body>
</html>