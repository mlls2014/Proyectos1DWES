<html>

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Alta de servicio médico</title>
   <?php
   include_once 'db.php';
   function visualizar_formulario_insercion($controles, $db)
   {
   ?>
      <form action='<?php echo $_SERVER['PHP_SELF'] ?>' method='POST'>
         <table class="table mt-5">
            <th colspan="2">Alta de Servicio Médico</th>
            <tr>
               <td>Paciente:</td>
               <td>
                  <select name="paciente">
                     <?php
                     $con = "SELECT codpaciente, nombre FROM pacientes ORDER BY nombre";
                     $result = $db->query($con);
                     if (!$result)
                        echo "Error al ejecutar consulta sobre pacientes.";
                     else {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                           echo "<option value= '{$row['codpaciente']}'";
                           if ($row['codpaciente'] == @$controles['paciente']) echo " selected ";
                           echo ">{$row['nombre']}</option>\n";
                        }
                     }
                     ?>
                  </select>
               </td>
            </tr>
            <tr>
               <td>Tipo de servicio:</td>
               <td>
                  <select name="tipos_servicio">
                     <?php
                     $con = "SELECT codtipo, descripcion FROM tipos_servicio ORDER BY especialidad";
                     $result = $db->query($con);
                     if (!$result)
                        echo "Error al ejecutar consulta sobre tipos_servicio.";
                     else {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                           echo "<option value= '{$row['codtipo']}'";
                           if ($row['codtipo'] == @$controles['tipos_servicio']) echo " selected ";
                           echo ">{$row['descripcion']}</option>\n";
                        }
                     }
                     ?>
                  </select>
               </td>
            </tr>
            <tr>
               <td>Médico asignado:</td>
               <td>
                  <select name="medico">
                     <?php
                     $con = "SELECT codmedico, nombre FROM medicos ORDER BY nombre";
                     $result = $db->query($con);
                     if (!$result)
                        echo "Error al ejecutar consulta sobre medicos.";
                     else {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                           echo "<option value= '{$row['codmedico']}'";
                           if ($row['codmedico'] == @$controles['medico']) echo " selected ";
                           echo ">{$row['nombre']}</option>\n";
                        }
                     }
                     ?>
                  </select>
               </td>
            </tr>
            <tr>
               <td>Fecha Inicio:</td>
               <td><input type="date" id="fecha" name="fecha" placeholder="dd/mm/aaaa" value="<?= isset($controles['fecha'])?$controles['fecha']:"2013-01-08"; ?>" ></td>
            </tr>
            <tr>
               <td>Coste:</td>
               <td><input type="text" name="coste" value=<?php echo @$controles['coste']; ?>></td>
            </tr>
            <tr>
               <td><input type='submit' name="Limpiar" value='Limpiar'></td>
               <td><input type='submit' name="Insertar" value='Insertar'></td>
            </tr>
         </table>
      </form>
   <?php
   }
   function validar($controles, $db, &$errores)
   {
      $con = "SELECT coste_minimo, coste_maximo FROM tipos_servicio where codtipo = ";
      $con = $con . $controles['tipos_servicio'];
      $result = $db->query($con);
      if (!$result)
         echo "Error al ejecutar consulta sobre costes.";
      else {
         $row = $result->fetch(PDO::FETCH_ASSOC); //debe existir la fila 
         $minimo = $row['coste_minimo'];
         $maximo = $row['coste_maximo'];
      }
      if ($controles['coste'] == "" || !is_numeric($controles['coste']) || $controles['coste']  < $minimo || $controles['coste'] > $maximo) {
         $errores[] = "¡El valor del coste no es correcto, debe estar comprendido entre $minimo y $maximo!";
      }
      if ($controles['fecha'] == ""){
         $errores[] = "Fecha vacía. Formato dd-mm-yyyy";
      }else{
         $fecha = explode('-', $controles['fecha']);
         // $fecha[2] contiene el día
         // $fecha[1] contiene el mes
         // $fecha[0] contiene el año
         if (!checkdate($fecha[1], $fecha[2], $fecha[0])) {
            $errores[] = "Fecha no válida. Formato dd-mm-yyyy";
         }
      }

      if (count($errores) > 0) return false;
      else return true;
   }
   function insertar_servicio($controles, $db, &$errores)
   {
      $con = "INSERT INTO servicios (codpaciente, codtipo, codmedico, fecha_inicio, coste) VALUES ( ?, ?, ?, ?, ?)";
      $result = $db->prepare($con);
      if (!$result->execute(array($controles['paciente'], $controles['tipos_servicio'], $controles['medico'], $controles['fecha'], $controles['coste']))) {
         $e = $result->errorInfo();
         $errores[1] = "Error al ejecutar consulta. " . $e[2];
      } else {
         echo "<h3> Alta del servicio realizada correctamente.</h3>";
      }
   }
   ?>
</head>

<body>
   <div class="container-md">
      <?php
      $db = conectarBD();
      $errores = [];
      if (!isset($_POST['Insertar']) || isset($_POST['Limpiar'])) {
         visualizar_formulario_insercion(array(), $db);
      } else {
         $post['fecha'] = recoge('fecha');
         $post['coste'] = recoge('coste');
         $post['tipos_servicio'] = recoge('tipos_servicio');
         $post['medico'] = recoge('medico');
         $post['paciente'] = recoge('paciente');
         visualizar_formulario_insercion($post, $db);
         $validado = validar($post, $db, $errores);
         if ($validado) {
            insertar_servicio($post, $db, $errores);
         } else {
            foreach ($errores as $valor) {
               print("$valor <br>");
            }
         }
      }
      ?>
      <br>
      <a href="consultadeservicios.php">Volver a la consulta anterior.</a>
   </div>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>