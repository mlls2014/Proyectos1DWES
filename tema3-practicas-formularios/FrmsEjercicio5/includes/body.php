<div class="encabezado text-center">	
  <h1><img class="alineadoTextoImagen" src="images//bombilla.png" /> Práctica#1: DAWES </h1>
</div>    

<div class="centrar">	
  <div class="container cuerpo text-center">	
    <p><h2><img class="alineadoTextoImagen" src="images//user.png" width="50px"/> Datos de usuario:</h2></p>
    <?php echo validez($errors); ?>
  </div>
  <div class="container">
    <form  action="frmusuarios.php" method="POST" enctype="multipart/form-data">

      <label for="name">Nombre:
        <input type="text" name="name" class="form-control" <?php if(isset($_POST["name"])){echo "value='{$_POST["name"]}'";} ?> /> 
        <?php echo mostrar_error($errors, "name"); ?>    
      </label>
      <br/>
      <label for="surname"> Apellidos:
        <input type="text" name="surname" class="form-control" <?php if(isset($_POST["surname"])){echo "value='{$_POST["surname"]}'";} ?> /> 
        <?php echo mostrar_error($errors, "surname"); ?>  
      </label>
      <br/>
      <label for="bio">Biografia:
        <textarea name="bio" class="form-control"> <?php if(isset($_POST["bio"])){ echo $_POST["bio"]; } ?> </textarea>
        <?php echo mostrar_error($errors, "bio"); ?>                  
      </label>
      <br/>

      <label for="email">Correo:
        <input type="email" name="email" class="form-control" <?php if(isset($_POST["email"])){echo "value='{$_POST["email"]}'";} ?> /> 
        <?php echo mostrar_error($errors, "email"); ?>                      
      </label>
      <br/>

      <label for="image">Imagen:
        <input type="file" name="image" class="form-control" /> 
        <?php echo mostrar_error($errors, "image"); ?>                         
      </label>
      <br/>

      <label for="password">Contraseña:
        <input type="password" name="password" class="form-control" <?php if(isset($_POST["password"])){echo "value='{$_POST["password"]}'";} ?> />
        <?php echo mostrar_error($errors, "password"); ?>                       
      </label>
      <br/>

      <label for="role">Rol:
        <select name="role" class="form-control">
          <option value="0" <?php if(isset($_POST["role"])){ if($_POST["role"]==0){ echo "selected='selected'"; }} ?> >Normal</option>
          <option value="1" <?php if(isset($_POST["role"])){ if($_POST["role"]==1){ echo "selected='selected'"; }} ?> >Administrador</option>
        </select>
        <?php echo mostrar_error($errors, "role"); ?>                    
      </label>
      <br/>           
      <input type="submit" value="Enviar" name="submit" class="btn btn-success" />
    </form>
  </div>
</div>  