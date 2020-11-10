<div class="encabezado text-center">	
  <h1><img class="alineadoTextoImagen" src="images//bombilla.png" />DAWES-Práctica#2:Sesiones y Cookies</h1>
</div>    
<div class="centrar">	
  <div class="container cuerpo text-center">	
    <p><h2><img class="alineadoTextoImagen" src="images//user.png" width="50px"/> Login de usuario:</h2></p>
  </div>
  <div class="container">
    <form  action="frmLogin.php" method="POST">
      <label for="name">Usuario:
        <input type="text" name="usuario" class="form-control" /> 
      </label>
      <br/>
      <label for="password">Contraseña:
        <input type="password" name="password" class="form-control" />            
      </label>
      <br/>
      <label><input type="checkbox" name="recuerdo">Recuérdame :)</label>
      <br/>     
      <?php
        if(isset($_GET['error'])){
           if ($_GET['error'] == "datos") {
               echo '<div class="alert alert-danger" style="margin-top:5px;">' . "Tu usuario o/y tu contraseña no son correctos, inténtelo de nuevo!! :( <br/>" . '</div>';
             }
          elseif ($_GET['error'] == "fuera") {
               echo '<div class="alert alert-danger" style="margin-top:5px;">' . "No puede acceder  directamente en esta página, ha de loguearse!! :O <br/>" . '</div>';          
             }
        }     
      ?>      
      <input type="submit" value="Enviar" name="submit" class="btn btn-success" />
    </form>
  </div>
</div>  