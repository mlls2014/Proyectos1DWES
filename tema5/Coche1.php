<?php

/**
 * Representa un coche
 */
class Coche1
{
   /**
    * Modelo de coche
    *
    * @var string
    */
   public $modelo;

   /**
    * Color del coche
    *
    * @var string
    */
   public $color;

   /**
    * Velocidad del coche
    *
    * @var integer
    */
   public $velocidad;

   /**
    * Constructor principal de la clase
    * Inicializa las tres propiedades del objeto {@link $modelo} {@link $color} {@link $velocidad}
    *
    * @param string $modelo
    * @param string $color
    * @param integer $velocidad
    */
   public function __construct($modelo, $color, $velocidad = 0)
   {
      $this->modelo = $modelo;
      $this->color = $color;
      $this->velocidad = $velocidad;
   }

   /**
    * Obtiene la propiedad color
    *
    * @return string
    */
   function getColor()
   {
      // Devolvemos un atributo
      return $this->color;
   }

   /**
    * Establece la propiedad color
    *
    * @param string $color
    * @return void
    */
   public function setColor($color)
   {
      //Le damos un valor a un atributo
      $this->color = $color;
   }

   /**
    * Acelera el coche incrementado la velocidad del vehículo en 1
    *
    * @return void
    */
   public function acelerar()
   {
      $this->velocidad++;
   }

   /**
    * Frena. Disminuye la velocidad del coche en 1
    *
    * @return void
    */
   public function frenar()
   {
      $this->velocidad--;
   }

   /**
    * Obtiene la velocidad del coche
    *
    * @return string
    */
   public function getVelocidad()
   {
      return $this->velocidad;
   }

   /**
    * Devuelve como string la información del coche
    *
    * @return string
    */
   public function mostrarInfo()
   {
      // Llamamos a otros métodos
      $info = "<h1>Información del coche:</h1>";
      $info .= "<br/> Modelo: " . $this->modelo;
      $info .= "<br/> Color: " . $this->getColor();
      $info .= "<br/> Velocidad: " . $this->getVelocidad();

      return $info;
   }
}
?>

<!DOCTYPE HTML>
<html lang="es">

<head>
   <meta charset="utf-8" />
       <title>Ejemplo de POO en PHP :O</title>
</head>

<body>
    
   <?php
   // Creamos el objeto. Instanciamos la clase y le pasamos los parámetros del constructor
   $coche = new Coche1("BMW VICTOR", "ROJO", 100);
   // Mostramos la información del primer coche
   echo $coche->mostrarInfo();
   $coche2 = new Coche1("SEAT 500", "VERDE");
   // Mostramos la información del segundo coche
   echo $coche2->mostrarInfo();
   ?>
   </body>

</html>