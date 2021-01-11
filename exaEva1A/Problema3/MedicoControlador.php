<?php
require_once('MedicoModelo.php');
/**
 * Controlador de la página de entrada al portal desde la que se pueden hacer las funciones que te permita tu rol
 */
class MedicoControlador
{
   private $medico;

   public function __construct()
   {
      $this->medico = new MedicoModelo();
   }

   public function index()
   {
      $this->listado();
   }

   public function listado($mensaje = null)
   {

      $regsxpag = (isset($_GET['regsxpag'])) ? (int)$_GET['regsxpag'] : 5;

      //Establecemos la página que vamos a mostrar, por página, por defecto la 1
      $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;

      $medicos = $this->medico->getAllPag($pagina, $regsxpag);
      $allmedicos = $medicos["datos"];
      $numpaginas = $medicos["numpaginas"];
      $regsxpag = $medicos["regsxpag"];
      $totalregistros = $medicos["totalregistros"];
      $pagina = $pagina;
      $alert = $mensaje;
      
      include_once 'medicosListadoView.php';
   }

   public function filtrar()
   {
     //Pendiente
   }

   public function nueva()
   {
     //Pendiente
   }

   public function editar()
   {
     //Pendiente
   }

   public function borrar()
   {
     //Pendiente
   }
}
