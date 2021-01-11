<!-- Estos problemas no se han revisado en profundidad -->
<!-- Solución a los ejercicios 1 y 2. No sigue el modelo MVC, .. -->
<?php
session_start();
?>
<html>

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Consulta de servicios</title>
   <?php
   include_once 'db.php';
   function visualizar_formulario_consulta($controles, $db)
   {
   ?>
      <form action='<?php echo $_SERVER['PHP_SELF'] ?>' method='POST'>
         <table class="table">
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
                        echo "<option value= ''>Cualquiera</option>";
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                           echo "<option value= '{$row['codtipo']}'";
                           if ($row['codtipo'] == @$controles['tipos_servicio']) echo " selected ";
                           echo ">{$row['descripcion']}</option>\n";
                        }
                     }
                     ?>
                  </select>
               </td>
               <td>Médico asignado:</td>
               <td>
                  <select name="medico">
                     <?php
                     $con = "SELECT codmedico, nombre FROM medicos ORDER BY nombre";
                     $result = $db->query($con);
                     if (!$result)
                        echo "Error al ejecutar consulta sobre medicos.";
                     else {
                        echo "<option value= ''>Cualquiera</option>";
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
               <td>Nombre Paciente:</td>
               <td>
                  <input type="text" name="paciente" value=<?php echo @$controles['paciente']; ?>>
               </td>
               <td>Fecha inicio >= que:</td>
               <td>
                  Día:
                  <select name="dia">
                     <?php
                     for ($i = 1; $i <= 31; $i++) {
                        echo "<option value= '$i'";
                        if ($i == @$controles['dia']) echo " selected ";
                        echo ">$i</option>";
                     }
                     ?>
                  </select>
                  Mes:
                  <select name="mes">
                     <?php
                     for ($i = 1; $i <= 12; $i++) {
                        echo "<option value= '$i'";
                        if ($i == @$controles['mes']) echo " selected ";
                        echo ">$i</option>";
                     }
                     ?>
                  </select>
                  Año:
                  <select name="ano">
                     <?php
                     for ($i = 1999; $i <= 2025; $i++) {
                        echo "<option value= '$i'";
                        if ($i == @$controles['ano']) echo " selected ";
                        echo ">$i</option>";
                     }
                     ?>
                  </select>
               </td>
            </tr>
            <tr>
               <td colspan="4" align="center">
                  <input type='submit' name="Limpiar" value='Limpiar'>
                  <input type='submit' name="Consultar" value='Consultar'>
               </td>
            </tr>
         </table>
      </form>
   <?php
   }

   function visualizar_resultado_consulta($controles, $db)
   {
      echo "<hr><h4 align='center'> Resultado de la consulta de servicios </h4>";
      $consulta = construir_consulta($controles, $parametros);
      $result = $db->prepare($consulta);
      if (!$result->execute($parametros)) {
         print("Error al ejecutar consulta.");
         return;
      }
   ?>
      <table class="table">
         <tr>
            <th>Descripción Servicio</th>
            <th>Nombre Paciente</th>
            <th>Nombre Médico</th>
            <th>Fecha de inicio</th>
            <th>Coste Servicio</th>
         </tr>
      <?php
      while ($row = $result->fetch(PDO::FETCH_NUM)) {
         echo "<tr>";
         foreach ($row as $valor) echo "<td>$valor</td>";
         echo "</tr>";
      }
      echo "</table>";
   }

   function construir_consulta($controles, &$parametros)
   {

      $con = "SELECT tserv.descripcion, pac.nombre, med.nombre, DATE_FORMAT(serv.fecha_inicio, '%d-%m-%Y'), serv.coste ";
      $con = $con . "FROM servicios serv, pacientes pac, tipos_servicio tserv, medicos med ";
      $con = $con . "WHERE serv.codpaciente = pac.codpaciente AND serv.codtipo=tserv.codtipo AND serv.codmedico=med.codmedico";

      $where = "";
      if (trim($controles['tipos_servicio']) != "") {
         $where = $where . " AND serv.codtipo = ? ";
         $parametros[] = $controles['tipos_servicio'];
      }
      if (trim($controles['medico']) != "") {
         $where = $where . " AND serv.codmedico = ? ";
         $parametros[] = $controles['medico'];
      }
      if (trim($controles['paciente']) != "") {
         $where = $where . " AND pac.nombre LIKE ? ";
         $parametros[] = "%{$controles['paciente']}%";
      }
      $fecha = $controles['ano'] . "-" . $controles['mes'] . "-" . $controles['dia'];
      $where = $where . " AND serv.fecha_inicio >= '" . $fecha . "'";

      $con = $con . $where;
      return $con;
   }
      ?>
</head>

<body style="text-align: center;">
   <div class="container-md">
      <h2 mt-3>Consulta de servicios</h2>
      <?php
      $db = conectarBD();
      if (!isset($_POST['Consultar']) || isset($_POST['Limpiar'])) {
         if (isset($_POST['Limpiar'])) {
            unset($_SESSION['consulta']);
         }
         if (isset($_SESSION['consulta'])) {
            visualizar_formulario_consulta($_SESSION['consulta'], $db);
            visualizar_resultado_consulta($_SESSION['consulta'], $db);
         } else {
            visualizar_formulario_consulta(array(), $db);
         }
      } else {
         $post['medico'] = recoge('medico');
         $post['paciente'] = recoge('paciente');
         $post['tipos_servicio'] = recoge('tipos_servicio');
         $post['dia'] = recoge('dia');
         $post['mes'] = recoge('mes');
         $post['ano'] = recoge('ano');
         visualizar_formulario_consulta($post, $db);
         visualizar_resultado_consulta($post, $db);
         $_SESSION['consulta'] = $post;
      }
      ?>
      <br>
      <a href="altadeservicio.php">Insertar nuevo servicio</a>
   </div>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>