<?php
session_start();
echo "El nombre del usuario es: " . $_SESSION['nombre'] . '<br />';
$nombre = session_name();

echo "El nombre de la sesión es $nombre <br />";
session_destroy();