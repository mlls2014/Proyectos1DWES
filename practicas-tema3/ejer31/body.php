<div class="container">
   <h1>Datos personales</h1>  
   <!-- Si el formulario es autoprocesado podemos usar $_SERVER['PHP_SELF'] -->
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
      <div class="row form-group">
         <div class="col col-md-5">
            <label for="nombre">Escriba su nombre: </label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Entre su nombre" <?php echo "value='" . @$nombre . "'"; ?> required>
            <?php echo mostrar_error($errors, "nombre"); ?>
         </div>

         <div class="col col-md-7">
            <label for="apellidos">Escriba sus apellidos: </label>
            <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Entre sus apellidos"
            <?php if(isset($apellidos)){echo "value='$apellidos'";} ?> required>
            <?php echo mostrar_error($errors, "apellidos"); ?>
         </div>
      </div>
      <div class="row form-group">
         <div class="col">
            <label for="biografia">Biografia:</label>
            <textarea class="form-control" id="biografia" name="biografia" placeholder="Cuéntenos su historia..." rows="3" required><?php echo @$biografia; ?></textarea>
         </div>
      </div>
      <div class="row form-group">
         <div class="col col-md-7">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Entre su email" <?php echo "value='" . @$email . "'"; ?> required>
            <?php echo mostrar_error($errors, "email"); ?>
         </div>

         <div class="col col-md-5">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Entre su password" <?php echo "value='" . @$password . "'"; ?> required>
            <?php echo mostrar_error($errors, "password"); ?>
         </div>
      </div>
     
      <div class="form-group">
         <label for="imagen">Imagen:</label>
         <input type="file" class="form-control-file" id="imagen" name="imagen" accept="image/png, .jpeg, .jpg, image/gif">
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
   </form>
   <?php echo validez($errors); ?>
   <?php if (isset($_POST["submit"]) && (count($errors) == 0)) { valoresfrm(); } ?>
</div>