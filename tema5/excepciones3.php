<?php
function inverse($x) {
    if (!$x) {
        throw new Exception('División por cero.');
    }
    else return 1/$x;
}

try {
    echo inverse(5) . "<br />";
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "<br />";
} finally {
    echo "Primer finally. <br />";
}

try {
    echo inverse(0) . "<br />";
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "<br />";
} finally {
    echo "Segundo finally. <br />";
}

// Continuar ejecución
echo 'Hola Mundo';

