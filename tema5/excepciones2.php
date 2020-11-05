<?php
class DivisionPorCero extends Exception
{
}
class LogaritmoDeCero extends Exception
{
}

function inverso($x)
{
   if (!$x) { //$x == 0
      throw new DivisionPorCero('División por cero.');
   } else return 1 / $x;
}

function logaritmo($x)
{
   if (!$x) { //$x == 0 tiende a -infinito
      throw new LogaritmoDeCero('Logaritmo de cero.');
   } else return log($x);
}

try {
   echo inverso(5) . "<br />";
   echo inverso(2) . "<br />";
   echo inverso(8) . "<br />";
   echo logaritmo(0) . "<br />";
   echo logaritmo(8) . "<br />";
} catch (DivisionPorCero $e) {
   echo 'Div. por cero: ',  $e->getMessage(), "<br />";
} 
// catch (LogaritmoDeCero $e) {
//    echo 'Log. de cero: ',  $e->getMessage(), "<br />";
// } catch (Exception $e) {
//    echo 'Resto excepciones: ',  $e->getMessage(), "<br />";
// }
// Continuar la ejecución
echo 'Hola Mundo';
