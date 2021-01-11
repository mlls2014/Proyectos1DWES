<?php

/**
 * Código controlador del problema 1. Completo
 */
/**
 * Valida la información del formulario
 *
 * @param array $datos Controles del formulario
 * @param array $errores Errores en la validación del formulario
 * @return boolean True si no hubo errores; false en caso contrario
 */
function validar_info($datos, &$errores)
{
   $errores = [];
   //validad limite inferior
   if (trim($datos['liInferior']) == "") {
      $errores['liInferior'][] = "¡El límite inferior no puede estar vacío!";
   } elseif (!is_numeric($datos['liInferior'])) {
      $errores['liInferior'][] = "¡El límite inferior debe ser un valor numérico!";
   } elseif (($datos['liInferior'] < 0)) {
      $errores['liInferior'][] = "¡El límite inferior debe ser un valor mayor o igual que 0";
   }

   //validar limite superior
   if (trim($datos['liSuperior']) == "") {
      $errores['liSuperior'][] = "¡El límite superior no puede estar vacío!";
   } elseif (!is_numeric($datos['liSuperior'])) {
      $errores['liSuperior'][] = "¡El límite superior debe ser un valor numérico!";
   } elseif (($datos['liSuperior'] < 0)) {
      $errores['liSuperior'][] = "¡El límite superior debe ser un valor mayor o igual que 0";
   }

   if ($datos['liSuperior'] < $datos['liInferior']) {
      $errores['liSuperior'][] = "¡El límite superior no puede ser mas bajo que el inferior!";
   }

   //validar numero

   if (trim($datos['numero']) == "") {
      $errores['numero'][] = "¡El número no puede estar vacío!";
   } elseif (!is_numeric($datos['numero'])) {
      $errores['numero'][] = "¡El número debe ser un valor numérico!";
   } elseif (($datos['numero'] < 0)) {
      $errores['numero'][] = "¡El número debe ser un valor mayor o igual que 0";
   }

   if ($datos['numero'] < $datos['liInferior'] || $datos['numero'] > $datos['liSuperior']) {
      $errores['numero'][] = "¡El número no está entre el valor inferior y el superior!";
   }

   //validar Repeticiones

   if (trim($datos['repeticiones']) == "") {
      $errores['repeticiones'][] = "¡Las repeticones no pueden estar vacías!";
   } elseif (!is_numeric($datos['repeticiones'])) {
      $errores['repeticiones'][] = "¡Las repeticiones debe ser un valor numérico!";
   } elseif (($datos['repeticiones'] < 0)) {
      $errores['repeticiones'][] = "¡Las repeticiones debe ser un valor mayor o igual que 0";
   }

   if (count($errores) > 0)
      return false;
   else return true;
}

/**
 * Para recoger de forma saneada los datos de los formularios
 * Se explica bien en https://www.mclibre.org/consultar/php/lecciones/php-recogida-datos.html
 *
 * @param string $var
 * @return void
 */
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

/**
 * Muestra errores en la vista
 *
 * @param array $errors
 * @param string $elem Elemento del que mostrar los errores
 * @return void
 */
function mostrar_error($errors, $elem)
{
   $alert = "";
   if (isset($errors[$elem])) {
      foreach ($errors[$elem] as $error) {
         $alert .= '<div class="alert alert-danger" style="margin-top:5px;">' . $error . '</div>';
      }
   }
   return $alert;
}

$validado = false;
$errores = array();
$datos = array();
$datos['validado'] = false;
$datos['liInferior'] = "";
$datos['liSuperior'] = "";
$datos['numero'] = "";
$datos['repeticiones'] = "";

if (isset($_POST['generar'])) {
   //Sanear
   $datos['liInferior'] = recoge('liInferior');
   $datos['liSuperior'] = recoge('liSuperior');
   $datos['numero'] = recoge('numero');
   $datos['repeticiones'] = recoge('repeticiones');
   //Validar
   $datos['validado'] = validar_info($datos, $errores);

   if ($datos['validado']) {
      //Generar secuencia de números aleatorios a mostrar
      $cont = 0;
      $datos['secuencia'] = [];
      while ($cont < $datos['repeticiones']) {
         $test = rand($datos['liInferior'], $datos['liSuperior']);
         $datos['secuencia'][] = $test;
         if ($test == $datos['numero']) {
            $cont++;
         }
      }
   }
}

require("vista.php");
