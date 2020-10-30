<?php
/**
 * Manera 'paranoica' de eliminar sesión
 * Lo habitual es usar sólo la llamada a session_destroy()
 */
// 1. Retomamos la sesión
session_start();
// 2. Eliminamos las variables de sesión y sus valores
$_SESSION = array();
// 3. Eliminamos la cookie del usuario que identifcaba a esa
// sesión, verificando "si existía"
if (ini_get("session.use_cookies") == true) {
   // ini_get_ devuelve el valor de una directiva de configuración
   $parametros = session_get_cookie_params();
   setcookie(
      session_name(),
      '',
      time() - 99999,
      $parametros["path"],
      $parametros["domain"],
      $parametros["secure"],
      $parametros["httponly"]
   );
}
// 4. Eliminamos el archivo de sesión del servidor
session_destroy();
