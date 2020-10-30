<?php
if (isset($_POST['color'])) { // Si marcamos una preferencia en el formulario
   $color = $_POST['color'];
   setcookie("color", $color, time() + 8000000);
} else {
   if (isset($_COOKIE['color'])) { // Si ya tenemos registrada una preferencia
      $color = $_COOKIE['color'];
   } else {
      $color = 'white';
   } // Si no existe preferencia alguna, color blanco
}
?>
<html>

<head>
   <title> Preferencias: Color de fondo</title>
   <meta charset="UTF-8" />
</head>

<body style="background-color: <?php echo $color; ?> ">
   <h1>Elección del color mediante cookies :)</h1>
   <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
      <label for="color">Escoge tu color de fondo</label>
      <select name="color">
         <option value="red">Rojo</option>
         <option value="blue">Azul</option>
         <option value="green">Verde</option>
         <option value="yellow">Amarillo</option>
         <option value="black">Negro</option>
      </select>
      <input type="submit" value="Cambiar Color!" />
   </form>

</html>