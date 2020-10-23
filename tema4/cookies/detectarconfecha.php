<?php
$fecha = date("d/m/Y \a \l\a\s H:i:s");
setcookie("fecha", $fecha, time() + 31536000);
// Tenemos que definir las cookies antes de mostrar cualquier mensaje
if (isset($_COOKIE['fecha'])) {
   echo "Hola de nuevo, tu última visita fue el " . $_COOKIE['fecha'];
} else {
   echo "¡Bienvenido! Esta es su primera visita a nuestra página:)";
}
?>
<html>

<head>
   <title> Control de últimas visitas</title>
   <meta charset="UTF-8" />
</head>

<body>
   <h1>Control de últimas visitas mediante cookies :)</h1>
</body>

</html>