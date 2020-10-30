<html>

<head>
   <title>Ejercicio Login </title>
   <meta charset="UTF-8" />
</head>

<body>
   <?php
   if (isset(($_GET['error']))) {
      if ($_GET['error'] == "si") {
         echo "Tu usuario o/y tu contraseña no son correctos, inténtelo de nuevo!! :( <br/>";
      } elseif ($_GET['error'] == "fuera") {
         echo "No puede acceder  directamente en esta página, ha de loguearse!! :O <br/>";
      }
   }
   ?>
   <form action="inicio.php" method="post">
      <label for "nombre">Nombre de Usuario</label>
      <input type="text" name="nombre" placeholder="Tu Nombre!!" /> <br />
      <label for "pass">Tu Contraseña</label>
      <input type="password" name="pass" /> <br />
      <input type="submit" value="entrar!" />
   </form>
</body>

</html>