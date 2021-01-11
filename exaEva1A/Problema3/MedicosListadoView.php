<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Listado de médicos</title>
</head>

<body>
   <main>
      <div class="container">
         <?php if (isset($alert)) {
            echo "<br>";
            include "includes/Mensajes.php";
         } ?>
         <div class="container p-3 my-3 rounded shadow-sm">
            <div class="row">
               <div class="col-sm-5">
                  <h4 class="text-primary">Listado de Médicos</h4>
               </div>
               <div class="col-sm-4">
                  <a class="text-blue nounderline" href="?accion=nueva"><i class="fas fa-plus-square"></i>Nuevo médico</a>
               </div>
               <div class="col-sm-3">
                  <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Registros por página
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="?accion=listado&pagina=1&regsxpag=5">5</a>
                        <a class="dropdown-item" href="?accion=listado&pagina=1&regsxpag=10">10</a>
                        <a class="dropdown-item" href="?accion=listado&pagina=1&regsxpag=15">15</a>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm">
                  <!-- Pendiente de implementar el filtro de la consulta -->
                  <form action="?accion=filtrar" method="post">
                     <div class="form-row ml-3 mb-1 mt-1">
                        <div class="col">
                           <label class="col-form-label text-secondary font-weight-bold">Búsqueda por:</label>
                        </div>
                        <div class="col">
                           <input type="text" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="col">
                           <input type="text" class="form-control" placeholder="Nivel">
                        </div>
                        <div class="col">
                           <button type="submit" class="btn btn-secondary">Buscar</button>
                        </div>
                     </div>
                  </form>
                  </div>
               </div>
            </div>

         </div>
         <div class="row">
            <div class="col-md-12 mx-auto">
               <?php  ?>
               <table class="table table-striped table-hover">
                  <thead class="thead-dark">
                     <tr>
                        <th style="width: 320px;">Nombre</th>
                        <th>Apellidos</th>
                        <th>Nivel</th>
                        <th>Salario</th>
                        <th>Acción</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if ($totalregistros >= 1) :
                        foreach ($allmedicos as $medico) :
                     ?>
                           <tr>
                              <td><?= $medico->getNombre(); ?></td>
                              <td><?= $medico->getApellidos(); ?></td>
                              <td><?= $medico->getNivel(); ?></td>
                              <td><?= $medico->getSalario(); ?></td>
                              <td>
                                 <a href="?accion=editar&id=<?= $medico->getId(); ?>" data-toggle="tooltip" data-placement="left" title="Editar"><i class="fas fa-edit"></i></a>
                                 <a class="confirmar" href="?accion=borrar&id=<?= $medico->getId(); ?>" data-toggle="tooltip" data-placement="right" title="Borrar"><i class="fas fa-trash-alt"></i></a>
                              </td>
                           </tr>

                     <?php endforeach;
                     endif; ?>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="row text-center">
            <div class="col-md-6">
               <?php
               $url = "?accion=listado";
               include "Paginacion.php";
               ?>
            </div>
         </div>
      </div>

   </main>
   <footer class="footer">
      <div class="container text-center">
         <span class="text-muted">Problema 3. 2º DAW - DWES - 2020-21</span>
      </div>
   </footer>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</body>

</html>