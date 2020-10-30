    <div class="encabezado text-center">	
        <h1><img class="alineadoTextoImagen" src="images//bombilla.png" /> Práctica#1: DAWES </h1>
    </div>    

    <div class="centrar">	
        <div class="container cuerpo text-center">	
          <h2> Datos de usuario:</h2>
        </div>
        <div class="container">
            <form  action="varpost.php" method="POST" enctype="multipart/form-data">

              <label for="name">Nombre:
                     <input type="text" name="name" class="form-control" /> 
              </label>
              <br/>
              <label for="surname"> Apellidos:
                     <input type="text" name="surname" class="form-control" /> 
              </label>
              <br/>
              <label for="bio">Biografia:
                     <textarea name="bio" class="form-control"></textarea>
              </label>
              <br/>

              <label for="email">Correo:
                     <input type="email" name="email" class="form-control" /> 
              </label>
              <br/>

              <label for="image">Imagen:
                      <input type="file" name="image" class="form-control" /> 
              </label>
              <br/>

              <label for="password">Contraseña:
                      <input type="password" name="password" class="form-control" />
              </label>
              <br/>

              <label for="role">Rol:
                      <select name="role" class="form-control">
                              <option value="0">Normal</option>
                              <option value="1">Administrador</option>
                      </select>
              </label>
              <br/>           
              <input type="submit" value="Enviar" name="submit" class="btn btn-success" />
            </form>
          </div>
    </div>  <!-- Container Cuerpo --> 	