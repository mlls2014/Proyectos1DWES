<?php  
   /**
    * Script que se encarga de redirigir las rutas de los enlaces pulsados en la
    * vista del listado. A él deberá llegar el nombre de la acción y, si fuese
    * necesario, el id del usuario sobre el que se va a realizar dicha acción.
    * Lo hacemos así para poder llamar directamente a los métodos del controlador, 
    * de lo contrario tendríamos que especificar los controladores en ficheros 
    * diferentes
    * PROGRAMA INCOMPLETO
    */
   include_once 'DBManager.php'; 
   require_once 'MedicoControlador.php';
   //Definimos un objeto controlador
   $controlador = new MedicoControlador();
   
   if ($_GET && $_GET["accion"]) :
     //Sanear los datos que recibamos mediante el GET
     $accion = filter_input(INPUT_GET, "accion", FILTER_SANITIZE_STRING);
     //Verificamos que el objeto controlador que hemos creado implementa el 
     //método que le hemos pasado mediante GET
     if (method_exists($controlador, $accion)) :
         $controlador->$accion(); //Ejecutamos la operación indicada en $accion
     else :
         $controlador->index();   //Redirigimos a la página de inicio 
     endif;
   
   else :
     $controlador->index();
   endif;

