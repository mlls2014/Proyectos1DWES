<?php

/**
 * Código controlador del problema 4. Sin terminar...
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
   //validar nombre
   if (trim($datos['nombre']) == "") {
      $errores['nombre'][] = "¡El nombre no puede estar vacío!";
   }

   // Aquí se deben chequear las restricciones necesarias...

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
$datos['nombre'] = "";
$datos['fecha'] = "";
$datos['email'] = "";
$datos['acepta'] = "";
$datos['intereses'] = [];
$datos['ciudad'] = "";
// Aquí deberíamos cargar las provincias de la BD. Esta parte se debe completar. 
// Se cargan cinco provincias de prueba
$datos['ciudades'] = [
   ['id' => 2, 'provincia' => 'Albacete'],
   ['id' => 3, 'provincia' => 'Alicante'],
   ['id' => 4, 'provincia' => 'Almería'],
   ['id' => 1, 'provincia' => 'Alava'],
   ['id' => 33, 'provincia' => 'Asturias']
];

if (isset($_POST['enviar'])) {
   //Sanear
   $datos['nombre'] = recoge('nombre');
   $datos['fecha'] = recoge('fecha');
   $datos['email'] = recoge('email');
   $datos['acepta'] = recoge('acepta');
   $datos['intereses'] = recoge('intereses',[]);;
   $datos['ciudad'] = recoge('ciudad');
   //Validar
   $datos['validado'] = validar_info($datos, $errores);
}

require("vista.php");
