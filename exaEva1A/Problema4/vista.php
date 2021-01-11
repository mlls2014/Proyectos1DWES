<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <title>Problema 4</title>
</head>

<body>
   <div class="container-md">
      <div class="row">
         <div class="col">
         </div>
         <div class="col-8">
            <h1 class='mt-3 mb-4'>Rellene la encuesta</h1>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
               <div class="form-group row mb-3">
                  <label for="nombre" class="col-sm-3 form-label">Nombre</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre usuario" value="<?= $datos['nombre']; ?>">
                     <?php echo mostrar_error($errores, 'nombre'); ?>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label for="fecha" class="col-sm-3 form-label">Fecha</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control" id="fecha" name="fecha" placeholder="dd/mm/aaaa" value="<?= $datos['fecha']; ?>">
                     <!-- <?php echo mostrar_error($errores, 'fecha'); ?> -->
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label for="email" class="col-sm-3 form-label">Correo electrónico</label>
                  <div class="col-sm-9">
                     <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?= $datos['email']; ?>">
                     <!-- <?php echo mostrar_error($errores, 'email'); ?> -->
                  </div>
               </div>

               <div class="form-group row mb-3">
                  <label for="ciudad" class="col-sm-3 form-label">Ciudad</label>
                  <div class="col-sm-9">
                     <select class="form-control mr-sm-2" id="ciudad" name="ciudad">
                        <option value="0" selected>Escoja ciudad...</option>
                        <?php foreach ($datos['ciudades'] as $ciudad) : ?>
                           <option value="<?= $ciudad['id'] ?>"><?= $ciudad['provincia'] ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
               </div>

               <div class="form-group  mb-3">
                  <div class="row">
                     <legend class="col-form-label col-sm-3 pt-0">Intereses</legend>
                     <div class="col-sm-9">
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="intereses[]" value="Interés 1">
                           <label class="form-check-label" for="inlineCheckbox1">Interés 1</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="intereses[]" value="Interés 2">
                           <label class="form-check-label" for="inlineCheckbox2">Interés 2</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="intereses[]" value="Interés 3">
                           <label class="form-check-label" for="inlineCheckbox3">Interés 3</label>
                        </div>
                     </div>
                  </div>
               </div>

               <fieldset class="form-group mb-3">
                  <div class="row">
                     <legend class="col-form-label col-sm-3 pt-0">¿Aceptas términos?</legend>
                     <div class="col-sm-9">
                        <div class="form-check">
                           <input class="form-check-input" type="radio" name="acepta" id="gridRadios1" value="Sí" checked>
                           <label class="form-check-label" for="gridRadios1">
                              Sí
                           </label>
                        </div>
                        <div class="form-check">
                           <input class="form-check-input" type="radio" name="acepta" id="gridRadios2" value="No">
                           <label class="form-check-label" for="gridRadios2">
                              No
                           </label>
                        </div>
                     </div>
                  </div>
               </fieldset>
               <button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
            </form>
            <?php if ($datos['validado']) : ?>
               <div class="mb-3">
                  <h3 class='mt-4 mb-3'>Datos introducidos:</h3>
                  <p class="fs-6 text-success"><?php echo "Nombre: " . $datos['nombre']; ?> </p>
                  <p class="fs-6 text-success"><?php echo "Fecha: " . $datos['fecha']; ?> </p>
                  <p class="fs-6 text-success"><?php echo "Correo: " . $datos['email']; ?> </p>
                  <p class="fs-6 text-success"><?php echo "Ciudad: " . $datos['ciudad']; ?> </p>
                  <p class="fs-6 text-success">
                     <?php echo "Intereses: ";
                     foreach ($datos['intereses'] as $interes) {
                        echo $interes . ' ';
                     }
                     ?> </p>
                  <p class="fs-6 text-success"><?php echo "¿Aceptas?: " . $datos['acepta']; ?> </p>
               </div>
            <?php endif; ?>

         </div>
         <div class="col">
         </div>
      </div>
   </div>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


</body>

</html>