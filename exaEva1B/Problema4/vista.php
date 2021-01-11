<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <style>
      .tablero {
         width: 400px;
         height: 400px;
      }

      .tablero,
      .tablero th,
      .tablero td {
         border: 1px solid black !important;
      }
   </style>
   <title>Problema 4</title>

</head>

<body>
   <div class="container-md">
      <h3 class='mt-3 mb-3'>Carga el tablero de <?= TAM_TAB ?> x <?= TAM_TAB ?> casillas:</h3>
      <form action='<?php echo $_SERVER['PHP_SELF'] ?>' method='POST'>
         <table width='600'>
            <tr>
               <td>
                  <select name='barcos'>
                     <option value='1' <?= $infovista['barcos'] == 1 ? 'selected' : ''; ?>>1 barco</option>
                     <option value='2' <?= $infovista['barcos'] == 2 ? 'selected' : ''; ?>>2 barcos</option>
                     <option value='3' <?= $infovista['barcos'] == 3 ? 'selected' : ''; ?>>3 barcos</option>
                     <option value='4' <?= $infovista['barcos'] == 4 ? 'selected' : ''; ?>>4 barcos</option>
                     <option value='5' <?= $infovista['barcos'] == 5 ? 'selected' : ''; ?>>5 barcos</option>
                  </select>
               </td>
               <td>
                  <select name='longitud'>
                     <option value='1' <?= $infovista['longitud'] == 1 ? 'selected' : ''; ?>>De 1 casilla</option>
                     <option value='2' <?= $infovista['longitud'] == 2 ? 'selected' : ''; ?>>De 2 casillas</option>
                     <option value='3' <?= $infovista['longitud'] == 3 ? 'selected' : ''; ?>>De 3 casillas</option>
                     <option value='4' <?= $infovista['longitud'] == 4 ? 'selected' : ''; ?>>De 4 casillas</option>
                  </select>
               </td>
               <td><input type='submit' name='mostrar' value='Mostrar tablero'>
                  <input type='submit' name='real' value='Todos los barcos'></td>
            </tr>
         </table>
      </form>

      <?php if ($infovista['mostrar']) : ?>
         <h5 class='mt-2 mb-3'>Resultado del tablero</h5>
         <table class='tablero'>
            <?php foreach ($tablero as $fila) : ?>
               <tr align='center'>
                  <?php foreach ($fila as $celda) :
                     if ($celda != CAR_BLANCO) : ?>
                        <td style='color:red'><b><?= $celda; ?></b></td>
                     <?php else : ?>
                        <td><?= $celda; ?></td>
                     <?php endif; ?>
                  <?php endforeach; ?>
               <?php endforeach; ?>
               </tr>
         </table>
         <?php if (!$infovista['exito']) : ?>
            <h5 class='mt-4 mb-3'>No se consiguieron colocar los barcos! Inténtenlo de nuevo</h5>
         <?php endif; ?>
      <?php endif; ?>


   </div>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>