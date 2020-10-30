<?php
if (isset($_COOKIE['visita'])) {
   echo "Qué alegría verte de nuevo por aquí!!";
} else {
   setcookie('visita', 'ok', time() + 365 * 24 * 60 * 60);
   echo "Bienvenido a mi página por primera vez";
}
?>
<html>

<head>
   <title>Control de visitas</title>
   <meta charset="UTF-8" />
</head>

<body>
   <h1>Control de visitas mediante cookies :)</h1>
</body>

</html>