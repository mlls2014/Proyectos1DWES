
<?php
/**
 * Prueba de cookies
 */
$value = 'something from somewhere';

//Esta cookie finaliza o caduca cuando se cierra el navegador

$res = setcookie("TestCookie", $value);
$value = 'otro valor';
// //Esta expira en 1 hora 
setcookie("TestCookie", $value, time()+3600);

//La siguiente cookie no se establecerá ya que el dominio usado por nosotros es la ip del servidor y no example.com
//$res= setcookie("TestCookie", $value, time()+3600, "/~rasmus/", "example.com");

//Actualizar una cookie. Mediante las superglobals $_COOKIE y $_REQUEST


//Eliminar una cookie
// establecer la fecha de expiración a una hora atrás
// setcookie("TestCookie", "", time() - 3600);

?>
