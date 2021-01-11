<!DOCTYPE html>
<html>
<!-- Sólo tenemos la vista. Este problema era el más fácil de todos y no debéis tener dificultad -->
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
            <h1 class='mt-3 mb-3'>Calculadora: </h1>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
               <div class="mb-3">
                  <label for="liInferior" class="form-label">Número A:</label>
                  <input type="text" class="form-control" id="na" name="na" placeholder="Introduzca número" value="<?= @$datos['na']; ?>">
               </div>
               <div class="mb-3">
                  <label for="liSuperior" class="form-label">Número B:</label>
                  <input type="text" class="form-control" id="nb" name="nb" placeholder="Introduzca número" value="<?= @$datos['nb']; ?>">
               </div>
               <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                  <label class="form-check-label" for="inlineCheckbox1">A+B</label>
               </div>
               <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                  <label class="form-check-label" for="inlineCheckbox2">A-B</label>
               </div>
               <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" >
                  <label class="form-check-label" for="inlineCheckbox3">A*B</label>
               </div>
               <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" >
                  <label class="form-check-label" for="inlineCheckbox3">A/B</label>
               </div>
               <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" >
                  <label class="form-check-label" for="inlineCheckbox3">A<sup>B</sup></label>
               </div>
               
               <div class="mt-3">
               <button type="submit" class="btn btn-primary" name="generar">Calcular</button>
               </div>
            </form>

            <!-- <?php if ($datos['validado']) : ?> -->
            <div class="mb-3">
               <h3 class='mt-4 mb-3'>Resultado:</h3>
               <p class="fs-2">
                  <?php
                  ?>
               </p>
            </div>
            <!-- <?php endif; ?> -->
         </div>
         <div class="col-2">
         </div>
      </div>
   </div>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>