<?php
session_start();
if (isset($_SESSION['contador'])) {
   $_SESSION['contador']++;
} else {
   $_SESSION['contador'] = 1; // Creamos la variable de sesión
}
?>
<html>

<head>
   <title>Control de visitas</title>
   <meta charset="UTF-8" />
</head>

<body>
   <h1> Control de visitas mediante sesiones:)</h1>
   <?php if (isset($_SESSION['contador']) && $_SESSION['contador']>1) {
      echo "Qué alegría verte de nuevo por aquí!!<br/>";    
   } else {
      echo "Bienvenido a mi página por primera vez<br/>";
   }
   echo "Nos has visitado " . $_SESSION['contador'] . " veces.";
    ?>
</body>

</html>