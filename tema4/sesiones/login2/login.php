<html>

<head>
   <title>Ejercicio Login </title>
   <meta charset="UTF-8" />
</head>

<body>
   <form action="inicio.php" method="post" id="frmLogin">
      <div class="error-msg"><?php if (isset($mensaje)) {
                                 echo $mensaje;
                              } ?></div>
      <div class="field-group">
         <div><label for="login">Usuario</label></div>
         <div><input name="usuario" type="text" value="<?php if (isset($_COOKIE['usuario'])) {
                                                            echo $_COOKIE['usuario'];
                                                         } ?>" class="input-field">
         </div>
         <div class="field-group">
            <div><label for="password">Contraseña</label></div>
            <div><input name="password" type="password"
                                      value="<?php if (isset($_COOKIE['password'])) {
                                                   echo $_COOKIE['password'];
                                                } ?>" class="input-field">
            </div>
            <div class="field-group">
               <div><input type="checkbox" name="recuerda" id="recuerda" <?php if (isset($_COOKIE['recuerda'])) { ?> checked <?php } ?> />
                  <label for="recuerda">Recuérdame</label>
               </div>
               <div class="field-group">
                  <div><input type="submit" name="entrar" value="Login" class="form-submit-button"></span></div>
               </div>
   </form>
</body>

</html>