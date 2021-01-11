<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <title>Problema 1 </title>
</head>

<body>
   <div class="container-md">
      <div class="row">
         <div class="col-2">
         </div>
         <div class="col-8">
            <h1 class='mt-3 mb-3'>Secuencia de números </h1>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
               <div class="mb-3">
                  <label for="liInferior" class="form-label">Límite inferior</label>
                  <input type="text" class="form-control" id="liInferior" name="liInferior" placeholder="Límite inferior de la secuencia" value="<?= $datos['liInferior']; ?>">
                  <?php echo mostrar_error($errores, 'liInferior'); ?>
               </div>
               <div class="mb-3">
                  <label for="liSuperior" class="form-label">Límite superior</label>
                  <input type="text" class="form-control" id="liSuperior" name="liSuperior" placeholder="Límite superior de la secuencia" value="<?= $datos['liSuperior']; ?>">
                  <?php echo mostrar_error($errores, 'liSuperior'); ?>
               </div>
               <div class="mb-3">
                  <label for="numero" class="form-label">Número</label>
                  <input type="text" class="form-control" id="numero" name="numero" placeholder="Número de la secuencia" value="<?= $datos['numero']; ?>">
                  <?php echo mostrar_error($errores, 'numero'); ?>
               </div>
               <div class="mb-3">
                  <label for="repeticiones" class="form-label">Repeticiones</label>
                  <input type="text" class="form-control" id="repeticiones" name="repeticiones" placeholder="Repeticiones de la secuencia" value="<?= $datos['repeticiones']; ?>">
                  <?php echo mostrar_error($errores, 'repeticiones'); ?>
               </div>
               <button type="submit" class="btn btn-primary" name="generar">Generar números</button>
            </form>

            <?php if ($datos['validado']) : ?>
               <div class="mb-3">
                  <h3 class='mt-4 mb-3'>Secuencia de números generada:</h3>
                  <p class="fs-2">
                     <?php
                     $sec = "";
                     foreach ($datos['secuencia'] as $dato) :
                        $sec = $sec . ($sec == "" ? "" : ", ") . ($dato == $datos['numero'] ? "<b style='color:red;'>$dato</b>" : $dato);
                     endforeach;
                     echo "$sec";
                     ?>
                  </p>
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