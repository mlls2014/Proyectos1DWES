<?php

/**
 * Realizar un test al usuario. Completo.
 */
// Alternativa real a cuestionario.php: tomar los datos de un fichero json
$data = file_get_contents("cuestionario.json");
$cuestionario = json_decode($data, true);

// require('cuestionario.php');

if(isset($_POST['enviar'])){
   //Comprobar resultados
   $resultados['aciertos'] = 0;
   $resultados['fallos'] = 0;
   $resultados['blanco'] = 0;
   $respuestas = [];
   foreach ($cuestionario as $i=>$item){
      if(isset($_POST["p$i"])){
         $respuestas["p$i"] = $_POST["p$i"]; 
         if('v' .$item['respuesta'] == $_POST["p$i"]){
            $resultados['aciertos'] += 1;
         } else{
            $resultados['fallos'] += 1;
         }
      }else{
         $resultados['blanco'] += 1;
      }
      
   }
}elseif (isset($_POST['borrar'])) {
   header('Location:');
}


require("vista.php");

   

