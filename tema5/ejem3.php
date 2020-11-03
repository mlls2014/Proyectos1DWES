<?php
/* crearemos una clase con los diferentes tipos de variables y métodos */
class Coche
{
   /* las propiedades han de tener especificada su visibilidad */
   public $potencia = "135 C.V.";
   public $tipo_iva = "21";
   private $precio = "24535 euros";
   protected $modelo = "HF345";
   /* un método publico ya que no especificamos visibilidad */
   function precio_final()
   {
      return (int)($this->precio) * (1 + $this->tipo_iva / 100);
   }
   /* un método privado al que solo podremos acceder desde la propia clase*/
   private function precio_amigo($descuento = 15)
   {
      return $this->precio_final() * (1 - $descuento / 100);
   }
   /* un metodo publico que nos lleva a otro privado. La funcion siguien-te es accesible
     por su condición de pública. Ella puede acceder a las funciones
     privadas de la propia clase. Asi que le pedimos que "se cuele"
     por "la puerta trasera" en el método precio_amigo y nos devuelva el resultado */
   function puerta_trasera($porcentaje)
   {
      return $this->precio_amigo($porcentaje);
   }
   /* un metodo publico que accede a una propiedad privada. No podemos cambiar precios directamente porque están en una variable privada. Pero esta función pública si tiene acceso a cualquier propiedad o método de su clase. La utilizamos para cambiar el precio */
   function set_precio($precio)
   {
      $this->precio = $precio;
   }
}

/*Hasta aquí la clase. Ahora toca instanciar objetos de la clase Coche */
$car = new Coche;
/* visualizamos sus propiedades publicas */
print "<br>La potencia es: " . $car->potencia;
print "<br>El tipo de IVA es: " . $car->tipo_iva;
print "<br>No puedo conocer el modelo. Es una propiedad absurdamente protegida";
print "<br>Tampoco puedo acceder al precio. Es una propiedad privada";
print "<br>Cambio el precio: a 100 euros";
$car->set_precio('100 euros');
print "<br>Compruebo el precio final: " . $car->precio_final();
print "<br>El precio de amigo (25% descuento)es: " . $car->puerta_trasera(25);
/* instanciemos un nuevo objeto. Al nuevo cliente no le afectarán las modificaciones anteriores */
$nuevo = new Coche;
print "<br>Para el nuevo objeto el precio final: " . $nuevo->precio_final();
