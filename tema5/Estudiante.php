<?php 
require("Persona.php");

class Estudiante extends Persona{
	private $curso;

   function __construct() {
   //Los constructores de la clase padre no son llamados implícitamente si la clase
   //child define un constructor. Para ejecutar el constructor del parent, se requiere
   //invocar a parent::__construct() desde el constructor del hijo.   
     parent::__construct();
     $this->curso = 'Primero';
   }

	function set_curso($new_curso) {
   	$this->curso = $new_curso;		
	}
   function get_curso() {
   	return $this->curso;
  	}

	function hablar(){
   	print 'Hola, soy un estudiante de ' . $this->curso;
  	}

	function muestra_codigo(){
   	print $this->codigo;
	}       
}
