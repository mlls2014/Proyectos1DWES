<?php
 require_once 'paginador.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Paginación con PDO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    
    <!-- Custom styles for this template -->
    <link href="css/misestilos.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
          <div class="page-header">
            <h1>Ejemplo de paginación <small>PHP,MySQL y PDO</small></h1>
          </div>  
          
          <div class="btn-group open">
            <a class="btn btn-primary" href="#"><i class="icon-user"></i> Registros por página:</a>
            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
             </span></a>
            <ul class="dropdown-menu">
              <li><a href="index.php?regsxpag=2"> <i class="icon-fixed-width icon-th"></i> 2</a></li>
              <li><a href="index.php?regsxpag=4"> <i class="icon-fixed-width icon-th"> </i> 4</a></li>
              <li><a href="index.php?regsxpag=8"> <i class="icon-fixed-width icon-th"></i> 8</a></li>
              <li><a href="index.php?regsxpag=10"><i class="icon-fixed-width icon-th"></i> 10</a></li>
            </ul>
          </div>
          
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <th>Apellidos</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
              </tr>
            </thead>
            <tbody>
              <?php //Verificamos que existen registros a mostrar
                if($totalregistros>=1):  
                  foreach($registros as $reg): 
              ?>
              <tr>
                <td> <?php echo $reg['apellidos']?> </td>
                <td> <?php echo $reg['nombre']?>    </td>
                <td> <?php echo $reg['email']?>     </td>
                <td> <?php echo $reg['telefono']?>  </td>
              </tr>           
              <?php 
                  endforeach; 
                else:  
              ?>
            <td colspan="4"> No existen registros para mostrar... :( </td>
              <?php endif; ?>
            </tbody>
          </table>
      </div>
    </div><!-- /.container -->
    <?php //Sólo mostramos los enlaces a páginas si existen registros a mostrar
      if($totalregistros>=1):  
    ?>
    <nav aria-label="Page navigation example" class="text-center">
      <ul class="pagination">
       
        <?php 
         //Comprobamos si estamos en la primera página. Si es así, deshabilitamos el botón 'anterior'
          if($pagina==1): ?>
            <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
          <?php else: ?>
            <li class="page-item"><a class="page-link" href="index.php?pagina=<?php echo $pagina-1; ?>&regsxpag=<?= $regsxpag ?>"> &laquo;</a></li>
         <?php  
          endif;
          //Mostramos como activos el botón de la página actual
          for($i=1;$i<=$numpaginas;$i++){
            if($pagina==$i){
              echo '<li class="page-item active"> 
                <a class="page-link" href="index.php?pagina=' . $i . '&regsxpag=' . $regsxpag . '">'. $i .'</a></li>';
             }else {
              echo '<li class="page-item"> 
                <a class="page-link" href="index.php?pagina=' . $i . '&regsxpag=' . $regsxpag . '">'. $i .'</a></li>';
            }
          }
         //Comprobamos si estamos en la última página. Si es así, deshabilitamos el botón 'siguiente'
          if($pagina==$numpaginas): ?>  
             <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
          <?php else: ?>
            <li class="page-item"><a class="page-link" href="index.php?pagina=<?php echo $pagina+1; ?>&regsxpag=<?= $regsxpag ?>"> &raquo; </a></li>
          <?php endif; ?>    
      </ul>         
    </nav>
    <?php endif;  //if($totalregistros>=1): ?>

  </body>
</html>
