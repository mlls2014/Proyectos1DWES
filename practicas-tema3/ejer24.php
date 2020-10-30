<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 24</title>
</head>

<body>
   <form action="ejer24.php" method="post">
      Número:<input type="text" name="num"><br /><br />
      ¿Mostrar en HTML?
      <input type="radio" name="opciones[]" value="0" />No
      <input type="radio" name="opciones[]" value="1" checked />Sí<br /><br />
      <input type="submit" name="enviar" value="Enviar">
   </form>
   <?php
   /*
   Cree una función que reciba un número mediante un formulario y muestre su tabla de multiplicar.
   */

   function mostrar_tabla($num, $html = false)
   {
      echo $html ? "<table border=1>" : "";
      echo ($html ? "<caption>" : "<p>") . "Tabla de multiplicar del $num:" . ($html ? "</caption>" : "</p>");
      for ($i = 1; $i <= 10; $i++) {
         echo ($html ? "<tr><td>" : "") . "$num * $i = " . $num * $i . ($html ? "<td><tr>" : "<br/>");
      }
      echo $html ? "</table>" : "";
   }

   echo "<br/>";
   if (isset($_POST['enviar'])) { //Se ha pulsado el botón enviar
      if (isset($_POST['num']) && filter_var($_POST['num'], FILTER_VALIDATE_INT)) {
         $num = $_POST['num'];
         if (isset($_POST['opciones'])) { //en cualquier caso con checked sabemos que existe $_POST['opciones']
            $html = $_POST['opciones'][0];
            mostrar_tabla($num, $html);
         } else {
            echo "¡No se seleccionó opción!";
         }
      } else {
         echo "¡No escribió número válido!";
      }
   }
   ?>
</body>

</html>