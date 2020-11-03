<?php
//// Clase Vehiculo
class Vehiculo
{
   //// atributos publicos
   public $velocidadMaxima;
   public $potencia;
   public $color;
   public $peso;

   //// constructor
   function __construct($potencia, $peso)
   {
      $this->potencia = $potencia;
      $this->peso = $peso;
   }

   //// metodo relacionPesoPotencia()
   function relacionPesoPotencia()
   {
      if ($this->potencia > 0) {
         return ($this->peso / $this->potencia);
      }
      return -1;
   }
} //// termina def. clase Vehiculo

//// funcion kitDePotencia ()
//// Aumenta la potencia de un vehiculo
function kitDePotencia($vehiculo)
{
   $vehiculo->potencia = $vehiculo->potencia + 5;
}

//// creamos un vehiculo (5 CV, 80 Kg)
$obj_vehiculo = new Vehiculo(5, 80);
echo $obj_vehiculo->relacionPesoPotencia() . "<br>";
//// muestra 16

//// asignacion de objetos = asignacion de manejadores (handlers)
$obj_alias = $obj_vehiculo;
echo $obj_alias->relacionPesoPotencia() . "<br>";
//// muestra 16

//// los dos manejadores referencian al mismo objeto
$obj_alias->peso = 60;
echo $obj_vehiculo->relacionPesoPotencia() . "<br>";
//// muestra 12

echo $obj_alias->relacionPesoPotencia() . "<br>";
//// muestra 12

//// creamos un objeto vehiculo  (5 CV, 80 Kg)
$obj_vehiculo = new Vehiculo(5, 80);
echo $obj_vehiculo->relacionPesoPotencia() . "<br>";
//// muestra 16

//// aumentamos potencia
kitDePotencia($obj_vehiculo);

echo $obj_vehiculo->relacionPesoPotencia() . "<br>";
//// ahora muestra 8
