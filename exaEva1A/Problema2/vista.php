<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <title>Problema 2</title>
</head>

<body>
   <div class="container-md">
      <div class="row">
         <div class="col-2">
         </div>
         <div class="col-8">
            <h1 class='mt-3 mb-1 text-dark'>Cuestionario: </h1>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
               <?php foreach ($cuestionario as $i => $item) : ?>
                  <div class="form-group">
                     <label class = 'fs-4 mt-4 mb-2 text-primary'><?= $item['pregunta']; ?></label>
                     <?php foreach ($item['opciones'] as $j => $opcion) : ?>
                        <div class="form-check">
                           <input class="form-check-input" type="radio" name="p<?= $i ?>" id="p<?= $i.$j ?>" value="v<?= $j ?>" 
                               <?php if (isset($respuestas["p$i"]) && $respuestas["p$i"]=="v$j") echo "checked";  ?> >
                           <label class="form-check-label  
                                 <?php 
                                    //Para procesar retroalimentación usuario
                                    if (isset($resultados)){
                                       if ($item['respuesta']==$j){ //la respuesta correcta siempre se pone en verde
                                          echo 'text-success fw-bold';
                                       }elseif (isset($respuestas["p$i"]) &&  $respuestas["p$i"]=="v$j") { //usuario se equivocó
                                          echo 'text-danger fw-bold';
                                       }
                                    }  
                                 ?> 
                              " for="p<?= $i.$j ?>">
                              <?= $opcion; ?>
                           </label>
                        </div>
                     <?php endforeach; ?>
                  </div>
               <?php endforeach; ?>
               <button type="submit" class="mt-3 mb-3 btn btn-primary" name="enviar">Enviar</button>
               <button type="submit" class="mt-3 mb-3 btn btn-primary" name="borrar">Reiniciar</button>
            </form>

            <?php if (isset($resultados)) : ?>
               <div class="mb-3">
                  <h3 class='mt-4 mb-3'>Resultado cuestionario:</h3>
                  <p class="fs-4 text-success"><?php echo "Aciertos: " . $resultados['aciertos']; ?> </p>
                  <p class="fs-4 text-danger"><?php echo "Fallos: " . $resultados['fallos']; ?> </p>
                  <p class="fs-4 text-muted"><?php echo "En blanco: " . $resultados['blanco']; ?> </p>
               </div>
            <?php endif; ?>
         </div>
         <div class="col-2">
         </div>
      </div>
   </div>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>