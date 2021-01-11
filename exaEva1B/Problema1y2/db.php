<?php

define("HOST", "localhost");
define("USUARIO", "root");
define("PASSWORD", "");
define("BD", "bdexaeva1b");

function conectarBD($user = USUARIO, $pass = PASSWORD, $bd = BD)
{
   try {
      //$db = new PDO("mysql:host=localhost;dbname=" . BD, USUARIO, PASSWORD);
      $db = new PDO(
         "mysql:host=" . HOST . ";dbname=" . $bd,
         $user,
         $pass,
         array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
      );
      //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return ($db);
   } catch (PDOException $e) {
      print "<p>Error: No puede conectarse con la base de datos. " . $e->getMessage() . "</p>\n";
      exit(); //fin de script
   }
}

/**
 * Para recoger de forma saneada los datos de los formularios
 * Se explica bien en https://www.mclibre.org/consultar/php/lecciones/php-recogida-datos.html
 *
 * @param string $var
 * @return void
 */
function recoge($var, $m = "")
{
   if (!isset($_REQUEST[$var])) {
      $tmp = (is_array($m)) ? [] : "";
   } elseif (!is_array($_REQUEST[$var])) {
      $tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
   } else {
      $tmp = $_REQUEST[$var];
      array_walk_recursive($tmp, function (&$valor) {
         $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
      });
   }
   return $tmp;
}
