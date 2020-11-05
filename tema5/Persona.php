<?php
class Persona
{
   private $name;
   protected $codigo;
   function __construct($persons_name = 'Juan')
   {
      $this->name = $persons_name;
   }
   function __destruct()
   {
      print '<br>Objeto con nombre ' . $this->name . ' destruido';
   }
   function set_name($new_name)
   {
      $this->name = $new_name;
   }
   function get_name()
   {
      return $this->name;
   }
   function hablar()
   {
      print 'Hola, soy una persona y me llamo ' . $this->name;
   }
}

$per1 = new Persona; //el constructor usará valor del argumento por defecto
print $per1->get_name();
$per2 = new Persona('Pepe');
print $per2->get_name();
