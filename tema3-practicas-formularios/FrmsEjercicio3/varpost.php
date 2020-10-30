<?php
/**
 * Script que muestra en una tabla los valores enviados por el usuario a través 
 * del formulario utilizando el método POST
 */
//  if(isset($_POST["submit"])){
//	if(!empty($_POST["name"])) 
//           { echo "Nombre:" . $_POST["name"]."<br/>"; }
//	
//	if(!empty($_POST["surname"]))
//           { echo "Apellidos:" . $_POST["surname"]."<br/>"; }
//	
//	if(!empty($_POST["bio"]))
//          { echo "Biografía:" . $_POST["bio"]."<br/>"; }
//	
//	if(!empty($_POST["email"]))
//          { echo "email:" . $_POST["email"]."<br/>"; }
//	
//	if(!empty($_POST["password"]))
//          { echo "Contraseña:" . sha1($_POST["password"])."<br/>"; }
//	
//	if(!empty($_POST["role"]))
//          { echo "Perfil:" . $_POST["role"]."<br/>"; }
//	
//	if(isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"]))
//          { echo "Fotografía:" . "La imagen nos ha llegado ;)"; }
// }
// 
// $arrayclaves  = array_keys($_POST);
// $arrayvalores = array_values($_POST);
// print_r($arrayclaves);
// print_r($arrayvalores);
?>
<?php
  if(isset($_POST["submit"])){
     $arrayclaves  = array_keys($_POST);
     $arrayvalores = array_values($_POST);
//     (isset($_FILES["image"]))? print_r($_FILES['image']):"No se recibió la foto :(";
 ?>
   <html>
    <head lang="es">
      <?php require 'includes/header.php'; ?>
    </head>
    <body>

   <div class="container">
    <h2>Datos enviados en $_POST</h2>       
    <table class="table table-striped">
      <thead>
        <tr>
          <?php
           for($i=0;$i<count($arrayclaves); $i++)
               echo "<th>" . strtoupper($arrayclaves[$i]) . "</th>";
           echo "<th>" . "Fotografía" . "</th>";
          ?> 
               
        </tr>
      </thead>
      <tbody>
        <tr>
         <?php 
           for($i=0;$i<count($arrayvalores); $i++)
               echo "<td>" . $arrayvalores[$i] . "</td>";
           echo "<td>" . $_FILES['image']['name'] . "</td>";
           ?>
        </tr>
      </tbody>
    </table>
  </div>
        </body>
  </html>
  <?php } ?>