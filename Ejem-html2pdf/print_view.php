<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8" />
   <title>Generar PDFs con PHP</title>
   <style type="text/css">
      h2 {
         color: blue;
      }

      #cajas {
         width: 100%;
      }

      .caja {
         width: 150px;
         height: 150px;
         border: 1px solid black;
         background: #CCC;
         float: left;
      }

      .rosa {
         background: pink;
      }

      .verde {
         background: green;
      }
   </style>
</head>

<body>
   <div id="cabecera">
      <?= @$_POST['titulo']; ?>
      <h1>Hola mundo!! desde html2pdf</h1>
      <img src="https://www.html2pdf.fr/img/_langue/es/logo.gif" alt="imagen" />
   </div>
   <h2>Más información</h2>
   <div id='cajas'>
      <div class='caja rosa'></div>
      <div class='caja verde'></div>
   </div>
   <table border="1">
      <thead>
         <tr>
            <th>Id</th>
            <th>Nombre</th>            
            <th>email</th>
         </tr>
      </thead>
      <tbody>
         <?php if (!is_null($resultSet) && count($resultSet) >= 1) :
            foreach ($resultSet as $fila) :
         ?>
               <tr>
                  <td><?= $fila['id']; ?></td>
                  <td><?= $fila['nombre']; ?></td>
                  <td><?= $fila['email']; ?></td>
               </tr>

         <?php endforeach;
         endif; ?>
      </tbody>
   </table>
</body>

</html>