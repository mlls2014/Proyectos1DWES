<?php

/**
 * Para utilizar las librerías instaladas con el composer
 */
// require './vendor/autoload.php'; //equivalente a lo siguiente
require __DIR__ . '/vendor/autoload.php';
include "DBManager.php";

/**
 * Usa el espacio de nombres de la clase Html2Pdf
 */

use Spipu\Html2Pdf\Html2Pdf;



if (isset($_POST['crear'])) {
   $db = DBManager::getInstance()->getConnection();

   $resultSet = null;
   $sql = "SELECT * FROM usuarios ORDER BY nombre";
   $registros = $db->query($sql);
   $resultSet = $registros->fetchAll(PDO::FETCH_ASSOC);

   ob_start();
   require_once 'print_view.php';
   $html = ob_get_clean();
   $html2pdf = new Html2Pdf('P', 'A4', 'es', 'true', 'UTF-8');
   $html2pdf->writeHTML($html);
   $html2pdf->output('pdf_generated.pdf'); // Como parámetro opcional nombre de fichero a descargar
   ob_end_clean();
}
?>

<form action="" method="POST">
   <input type="text" placeholder="Título" name="titulo" />
   <input type="submit" value="Crear un pdf" name="crear" />
</form>