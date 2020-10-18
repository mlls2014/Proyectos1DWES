<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ejercicio 23</title>
</head>
<body>
   <form action="ejer23.php" method="post">
      Número:<input type="text" name="num"><br/>
      <input type="submit" name="enviar" value="Enviar">
   </form>
   <?php
   /*
   Cree una función que reciba un número mediante un formulario y muestre su tabla de multiplicar.
   */ 

   function mostrar_tabla($num){
      echo "<p>Tabla de multiplicar del $num:</p>";
         for ($i=1; $i <= 10; $i++) { 
            echo "$num * $i = " . $num * $i . "<br/>";
      }
   }

   if(isset($_POST['enviar'])){ //Se ha pulsado el botón enviar
      if (isset($_POST['num']) && filter_var($_POST['num'],FILTER_VALIDATE_INT)){ 
         $num=$_POST['num'];
         mostrar_tabla($num);
      }else{
         echo "¡No escribió número válido!";
      }
   }
   ?>
</body>
</html>