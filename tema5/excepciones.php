<?php
function inverso($x)
{
   if (!$x) { //$x == 0
      throw new Exception('División por cero.');
   } else return 1 / $x;
}

try {
   echo inverso(5) . "<br />";
   echo inverso(0) . "<br />";
   echo inverso(8) . "<br />";
} catch (Exception $e) {
   echo 'Excepción capturada: ',  $e->getMessage(), "<br />";
}

// Continuar la ejecución
echo 'Hola Mundo';
