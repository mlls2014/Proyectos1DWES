<?php
define('TAM_TAB', 10);
define("CAR_BLANCO", '--');

/**
 * Carga en el tablero $barcos barcos de longitud $longitud en casillas
 *
 * @param array $tablero
 * @param int $barcos
 * @param int $longitud
 * @param string $car  Carácter que deseas utilizar para representar los barcos
 * @return booblean  Devuelve true si consigue cargar todos los barcos
 */
function cargar_barcos(&$tablero, $barcos, $longitud, $car = '')
{
   $bar_car = 1;
   $lista = genera_lista_opciones($tablero);
   while ($bar_car <= $barcos) {
      //Escojo sentido horizontal 1, vertical 0
      $sent = rand(0, 1);

      //pido una posición aleatoria en la lista
      if (count($lista)) {
         $coor = rand(0, count($lista) - 1);
         $fil = $lista[$coor][0];
         $col = $lista[$coor][1];
         // Elimino la posición de la lista de opciones
         unset($lista[$coor]);
         $lista = array_values($lista); //para reordenar los índices, sin huecos
      } else {
         return false; //No he conseguido colocar todos los barcos
      }

      $libre = true;
      if ($sent) {
         //intento colocar el barco en horizontal
         if (($col + $longitud - 1) > TAM_TAB) {
            $libre = false;
         } else {
            for ($j = $col; $libre && $j <= TAM_TAB && $j < ($col + $longitud); $j++) {
               if (valida_celda($tablero, $fil, $j, $sent, ($j == $col) ? true : false)) {
                  $tablero[$fil][$j] = $car . $bar_car;
               } else {
                  $libre = false;
               }
            }
         }
         if ($libre) {
            $bar_car++;
         } else {
            //Tengo que deshacer la parte del barco que no pude terminar
            for ($j = $col; $j <= TAM_TAB && $tablero[$fil][$j] == $car . $bar_car; $j++) {
               $tablero[$fil][$j] = CAR_BLANCO;
            }
         }
      } else {
         if (($fil + $longitud - 1) > TAM_TAB) {
            $libre = false;
         } else {
            //intento colocar el barco en vertical
            for ($i = $fil; $libre && $i <= TAM_TAB && $i < ($fil + $longitud); $i++) {
               if (valida_celda($tablero, $i, $col, $sent, ($i == $fil) ? true : false)) {
                  $tablero[$i][$col] = $car . $bar_car;
               } else {
                  $libre = false;
               }
            }
         }
         if ($libre) {
            $bar_car++;
         } else {
            //Tengo que deshacer la parte del barco que no pude terminar
            for ($i = $fil; $i <= TAM_TAB && $tablero[$i][$col] == $car . $bar_car; $i++) {
               $tablero[$i][$col] = CAR_BLANCO;
            }
         }
      }
   }
   return true;
}

/**
 * Valida si la casilla $i, $j del tablero $tablero puede ser ocupada por una casilla de barco
 * Comprueba que no esté ocupada la casilla en cuestión ni las adyacentes
 * Tiene en cuenta el sentido vertical u horizontal en el que se está desplegado el barco y si es 
 * la primera casilla que pones del barco, para no considerar adyacente la de atrás en barcos de 
 * más de una casilla
 *
 * @param array $tablero
 * @param int $i
 * @param int $j
 * @param int $sent
 * @param boolean $inicio
 * @return boolean Devuelve true cuando la casilla en válida y false en c.c.
 */
function valida_celda($tablero, $i, $j, $sent, $inicio)
{
   // sentido horizontal 1, vertical 0
   if ($sent) { //horizontal
      if (
         $tablero[$i][$j] == CAR_BLANCO
         &&
         comprobar_sin_salir($tablero, $i, $j + 1) &&
         comprobar_sin_salir($tablero, $i + 1, $j + 1) &&
         comprobar_sin_salir($tablero, $i - 1, $j + 1) &&
         comprobar_sin_salir($tablero, $i - 1, $j) &&
         comprobar_sin_salir($tablero, $i + 1, $j) &&
         comprobar_sin_salir($tablero, $i + 1, $j - 1) &&
         comprobar_sin_salir($tablero, $i - 1, $j - 1)
      ) {
         if ($inicio) {
            if (comprobar_sin_salir($tablero, $i, $j - 1)) {
               return true;
            }
         } else {
            return true;
         }
      }
   } else {
      if (
         $tablero[$i][$j] == CAR_BLANCO
         &&
         comprobar_sin_salir($tablero, $i, $j + 1) &&
         comprobar_sin_salir($tablero, $i, $j - 1) &&
         comprobar_sin_salir($tablero, $i + 1, $j + 1) &&
         comprobar_sin_salir($tablero, $i + 1, $j) &&
         comprobar_sin_salir($tablero, $i + 1, $j - 1) &&
         comprobar_sin_salir($tablero, $i - 1, $j + 1) &&
         comprobar_sin_salir($tablero, $i - 1, $j - 1)
      ) {
         if ($inicio) {
            if (comprobar_sin_salir($tablero, $i - 1, $j)) {
               return true;
            }
         } else {
            return true;
         }
      }
   }
   return false;
}

/**
 * Comprueba si la casilla es agua. Si se sale del rango de la matriz evita la excepción
 * y da por buena la casilla
 *
 * @param array $tablero
 * @param int $i
 * @param int $j
 * @param int $numfil
 * @param int $numcol
 * @return boolean Devuelve true si la casilla es agua o era fuera de rango
 */
function comprobar_sin_salir($tablero, $i, $j, $numfil = TAM_TAB, $numcol = TAM_TAB)
{
   if ($i < 1 || $i > $numfil || $j < 1 || $j > $numcol || $tablero[$i][$j] == CAR_BLANCO) {
      return true;
   } else {
      return false;
   }
}

/**
 * Devuelve un array de una dimensión con elementos que se corresponden con las coordenadas (i,j) de posiciones libres en el tablero
 *
 * @param array $tablero
 * @return array
 */
function genera_lista_opciones($tablero)
{
   $lista = [];
   foreach ($tablero as $i => $fila) {
      foreach ($fila as $j => $celda) {
         if ($celda == CAR_BLANCO) {
            $lista[] = [$i, $j];
         }
      }
   }
   return $lista;
}

/**
 * Llena de agua el tablero
 *
 * @param [type] $tablero
 * @return void
 */
function limpia_tablero(&$tablero){
   //cargo tablero TAM_TAB x TAM_TAB con caracteres CAR_BLANCO
   for ($i = 1; $i <= TAM_TAB; $i++) {
      for ($j = 1; $j <= TAM_TAB; $j++) {
         $tablero[$i][$j] = CAR_BLANCO;
      }
   }
}

$infovista = [];
$infovista['barcos'] = 1;
$infovista['longitud'] = 1;
$mostrar = false;
$infovista['mostrar'] = $mostrar;
$exito = false;
$tablero = [];

if (count($_POST)>0) {
   if (isset($_POST['mostrar'])) {
      limpia_tablero($tablero);
      $infovista['barcos'] =  $_POST['barcos'];
      $infovista['longitud'] = $_POST['longitud'];
      $exito = cargar_barcos($tablero, $infovista['barcos'], $infovista['longitud']);
   } elseif (isset($_POST['real'])) {
      do {
         limpia_tablero($tablero);
         $exito = cargar_barcos($tablero, 1, 5, 'P');
         $exito = $exito && cargar_barcos($tablero, 2, 4, 'A');
         $exito = $exito && cargar_barcos($tablero, 3, 3, 'C');
         $exito = $exito && cargar_barcos($tablero, 4, 2, 'D');
         $exito = $exito && cargar_barcos($tablero, 5, 1, 'S');
      } while (!$exito);
   }
   $infovista['tablero'] = $tablero;
   $infovista['exito'] = $exito;
   $infovista['mostrar'] = true;
}
include("vista.php");
