<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 11</title>
</head>
<body>
   <form action="ejer11.php"method="post">
      Número:<input type="text" name="num"><br/>
      <input type="submit" name="enviar" value="Enviar">
   </form>
   <?php
   /*
   Igual que el anterior pero utilizando un formulario para el envío del número.
   Resuelto con formulario autoprocesado
   */ 
   if(isset($_POST['enviar'])){
      //if (isset($_POST['num']) && is_numeric($_POST['num'])){ 

      if (isset($_POST['num']) && filter_var($_POST['num'],FILTER_VALIDATE_INT)){ 
         $num=$_POST['num'];
         echo "<p>Múltiplos de $num entre 1 y 100:</p>";
         for ($i=1; $num*$i <= 100; $i++) { 
            echo $num*$i . "<br/>";
         }
      }else{
         echo "¡No escribió número válido!";
      }
   }
   ?>
</body>
</html>